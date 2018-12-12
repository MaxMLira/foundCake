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
        $this->regiao = mysqli_real_escape_string($this->conexao,$valorRegiao);    
    } 
    public function setContato($valorContato){
        $this->contato = mysqli_real_escape_string($this->conexao,$valorContato);    
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
    public function atualizarAnuncio(){
        $sql = "UPDATE anuncio SET nome = '{$this->nome}' ";
        $sql.= " , texto = '{$this->texto}', resumo = '{$this->resumo}',regiao = '{$this->regiao}',contato ='{$this->contato}', ";
        $sql.= "imagem ='{$this->imagem}' WHERE id = {$this->id}";
        
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function lerTodosAnuncios(){
        $sql = "SELECT * FROM anuncio";
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    }

    public function lerPorUser(){
        $sql = "SELECT * FROM anuncio WHERE usuario_id = '{$this->usuarioId}'";
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


    public function upload($dadosImagem) {
        /* Se o nome da imagem (vindo do array FILES) for diferente de vazio... */
        if($dadosImagem["name"] != ""){
            /* Então faça: */
            
            // Configurações para o upload da imagem
            $this->imagem = $dadosImagem["name"]; // pega o nome e a extensão da imagem
            $nomeTemporario = $dadosImagem['tmp_name'];	// pega o nome temporário 
            
            // Obtendo SOMENTE a extensão
            $tipoDeArquivo = strtolower( pathinfo($this->imagem, PATHINFO_EXTENSION) ); 
            
            // Definição do diretório/pasta de destino já com o caminho para o nome/extensão      
            $pasta = "img/{$this->imagem}"; 
        
            // Avaliando se é uma extensão de imagem válida
            switch($tipoDeArquivo){
                // Caso seja qualquer uma dessas abaixo...
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                case 'svg':
                    // ... então mova o arquivo do diretorio temp do servidor para o destino
                    move_uploaded_file($nomeTemporario, $pasta); 
                    
                    // e retorne a operação como true (houve upload e deu tudo certo)
                    return true;
                break;

                // Caso seja qualquer outra extensão...
                default:
                    // ...então atribua uma string vazia para a propriedade imagem
                    $this->imagem = "";
                    
                    // e retorne false (não houve upload e vai gerar um erro)
                    return false;
                break;
            }           
        /* Senão... */
        } else {
            // ... atribua uma string vazia para a propriedade imagem
            $this->imagem = "";
            
            // e retorne a operação como true (não houve upload, mas deu tudo certo!)
            return true;
        }
    } // fim método upload

}