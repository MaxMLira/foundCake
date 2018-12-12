<?php
require "Database.php";
class Usuario extends Database{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipo;

    public function getId(){ return $this->id; }
    public function getNome(){ return $this->nome; }
    public function getEmail(){ return $this->email; }
    public function getSenha(){ return $this->senha; }
    public function getTipo(){ return $this->tipo;   }

    public function setId( $valorId ){
        $this->id = (int)$valorId;
    }
    public function setNome( $valorNome ){
        $this->nome = mysqli_real_escape_string($this->conexao,$valorNome);
    }
    public function setEmail( $valorEmail ){
        $this->email = mysqli_real_escape_string($this->conexao,$valorEmail);
    }
    public function setSenha( $valorSenha ){
        $this->senha = mysqli_real_escape_string($this->conexao,$valorSenha);
    }
    public function setTipo( $valorTipo ){
        $this->tipo = mysqli_real_escape_string($this->conexao,$valorTipo);
    }


    public function lerUsuarios(){
        $sql = "SELECT * FROM usuarios ORDER BY tipo";
        $resultado = mysqli_query($this->conexao, $sql) 
            or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function lerUmUsuario(){
        $sql = "SELECT * FROM usuarios WHERE id = {$this->id}";
        $resultado = mysqli_query($this->conexao, $sql) 
            or die(mysqli_error($this->conexao));
        return $resultado;
    }


    public function inserirUsuario(){
        $sql = "INSERT INTO usuarios (nome, email, senha,tipo) ";
        $sql.= " VALUES('{$this->nome}','{$this->email}','{$this->senha}','{$this->tipo}')";
        
        $resultado = mysqli_query($this->conexao, $sql) 
            or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function atualizarUsuario(){
        $sql = "UPDATE usuarios SET nome = '{$this->nome}', email ='{$this->email}', senha = '{$this->senha}',tipo ='{$this->tipo}'  ";
        $sql.= "WHERE id = '{$this->id}'";
        $resultado = mysqli_query($this->conexao, $sql) 
            or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function excluirUsuario(){
        $sql = "DELETE FROM usuarios WHERE id = '{$this->id}'";
        $resultado = mysqli_query($this->conexao, $sql) 
            or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function buscaUsuario(){
        $sql = "SELECT * FROM usuarios WHERE email ='{$this->email}'";
        $resultado = mysqli_query($this->conexao, $sql) 
            or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function codificaSenha($valorSenha){
        return password_hash( $valorSenha, PASSWORD_DEFAULT );
    }

    public function confirmaSenha(){
        $sql = "SELECT senha FROM `usuarios` WHERE email = '{$this->email}'";
        $resultado = mysqli_query($this->conexao, $sql) 
            or die(mysqli_error($this->conexao));
       
        $dados = mysqli_fetch_assoc($resultado);
        $hash = $dados['senha'];
        if(password_verify($this->senha, $hash)){
          return true;
       }else {
          return false;
        }
    }

    public function verificaSenha($senhaNoForm, $senhaNoBanco){
        
        /* Se a senha digitada no formulário for IGUAL
        a senha já existente no banco... */
        if( $senhaNoForm == $senhaNoBanco ){
            // então, retorne a mesma senha
            return $senhaNoBanco;
        } else {
            // senão, retorne a nova senha codificada
            return $this->codificaSenha($senhaNoForm);
        }
    }







}