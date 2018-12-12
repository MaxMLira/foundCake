<?php
//protege o arquivo
// require_once "../config/ControleDeAcesso.php";
// $sessao = new ControleDeAcesso();
// $sessao->verificaPermissao();

// recebimento do id via url
$id = $_GET['id'];

// importar a classe Usuario
require_once "config/Usuario.php";

// criar objeto
$usuario = new Usuario();

// colocar o id dentro do objeto
$usuario->setId($id);

// executar o método excluirUsuario
$usuario->excluirUsuario();

// redirecionar para a lista de usuarios
header("location:usuarios.php");