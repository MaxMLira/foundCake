<?php

require "Database.php";
class Anuncio extends Database{
    private $id;
    private $nome;
    private $texto;
    private $resumo;
    private $regiao;
    private $contato;
    private $imagem;
    private $usuarioId;
    private $termo;
        
    // getters (métodos para leitura de dados das propriedades)
    public function getId(){ return $this->id; }
    public function getNome(){ return $this->nome; }
    public function getTexto(){ return $this->texto; }
    public function getResumo(){ return $this->resumo; }
    public function getRegiao(){ return $this->regiao; }
    public function getContato(){ return $this->contato; }
    public function getImagem(){ return $this->imagem; }
    public function getUsuarioId(){ return $this->usuarioId; }
    public function getTermo(){ return $this->termo; }

    
    // setters (métodos para atribuir dados às propriedades)
    public function setId($valorId){
        $this->id = (int)$valorId;    
    }
    public function setNome($valornome){    
        $this->nome = mysqli_real_escape_string($this->conexao,$valornome);
    }
    public function setTexto($valorTexto){
        $this->texto = mysqli_real_escape_string($this->conexao,$valorTexto);    
    }
    public function setResumo($valorResumo){
        $this->resumo = mysqli_real_escape_string($this->conexao,$valorResumo);    
    }  
    public function setRegiao($valorRegiao){
        $this->resumo = mysqli_real_escape_string($this->conexao,$valorRegiao);    
    } 
    public function setContato($valorContato){
        $this->resumo = mysqli_real_escape_string($this->conexao,$valorContato);    
    }   
    public function setImagem($valorImagem){
        $this->imagem = mysqli_real_escape_string($this->conexao,$valorImagem);    
    } 
    public function setUsuarioId($valorUsuarioId){
        $this->usuarioId = (int)$valorUsuarioId;    
    } 

    public function setTermo($valorTermo){
        $this->termo = mysqli_real_escape_string($this->conexao,$valorTermo);    
    } 

    public function insereAnuncio(){
        $sql = "INSERT INTO anuncio (nome, texto, resumo,regiao,contato, imagem, usuario_id)";
        $sql.= " VALUES('{$this->nome}', '{$this->texto}', '{$this->resumo}','{$this->regiao}','{$this->contato}', ";
        $sql.= "'{$this->imagem}', {$this->usuarioId})";
        
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function lerTodosAnuncios(){
        $sql = "SELECT * FROM anuncio ORDER BY desc";
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function lerPorRegiao(){
        $sql = "SELECT * FROM anuncio WHERE regiao = '{$this->regiao}'";
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function lerUmAnuncio(){
        $sql = "SELECT * FROM anuncio WHERE id = '{$this->id}'";
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function busca(){
        $sql = "SELECT * FROM anuncio WHERE titulo LIKE '%{$this->termo}%' OR texto LIKE '%{$this->termo}%'";
        $sql .= " OR resumo LIKE '%{$this->termo}%' OR regiao LIKE '%{$this->termo}% OR contato LIKE'%{$this->termo}%'";
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }

}