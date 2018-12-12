<?php
    require_once "config/ControleDeAcesso.php";
    $controle = new ControleDeAcesso();
    $controle->verificaPermissao();
    if(isset($_GET['logout'])){
        $controle->logout();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Confeiteiros São Paulo</title>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/main.css">





<link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

</head>

<body>
        <header id="menu">  
            <section>
                <nav >
                    <img id="logo" src="imagens/cupcake.png" alt="CupCake icone do foundcake">
                      
                       <h1 id="tituloh1">Found Cake</h1>
                       
                        <ul>
                            <li><a	href="index.php" title="pagina inicial">Home</a></li>|
                            <li><a	href="anuncie.php" title="galeria">Anuncie Aqui</a></li>|
                            <li><a	href="?logout" title="galeria">Sair</a></li>
                        </ul>        
                </nav>
            </section>
        </header>
        
<style> 
section #logo{
    max-width:125px;
    max-height:75px;
    float:left;  
}
</style>