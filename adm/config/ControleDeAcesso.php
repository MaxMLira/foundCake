<?php 
class ControleDeAcesso {
    public function __construct(){
        //iniciar uma seção php
        session_start();
    }

    public function login($id,$nome,$email,$tipo){
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['tipo'] = $tipo;
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location:../anuncie.php?logout");
        exit;
    }

    public function verificaPermissao(){
        if(!isset($_SESSION['id'])){
            session_destroy();
            header("Location:../anuncie.php?acesso_proibido");
            exit;
        }else{
            return true;
        }
    }


}