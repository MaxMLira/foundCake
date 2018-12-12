<?php require "../inc/cabecalhoADM.php"; 
require_once "config/Anuncio.php";
$anuncio = new Anuncio();
$anuncio->setUsuarioId($_SESSION['id']);

$resultado = $anuncio->lerPorUser();
$dados = mysqli_fetch_assoc($resultado);




?>



<section class="conteudo">
        
            <h1>Bem-vindo(a)<?=$_SESSION['nome']?> </h1>
            <fieldset>
            <p>Você está no painel de controle e administração do
            site FoundCake.</p>
             <p>Aqui você pode gerenciar o conteudo que vai aparecer para seu cliente:</p>
            <ul>
            <?php
                if($_SESSION['tipo'] == "ADMIN"){
            
            ?>
                <li><a href="anunciosAdm.php">Adicionar informações:</a></li>
               
                <li><a href="usuarios.php">Usuarios:</a></li>
                <?php } else { 
                        if($dados['id'] != null){
                            ?>
                    
                    <li><a href="anuncioEdita.php?id=<?=$dados['id']?>">Editar Informações:</a></li>
                <?php 
                        }  else {     ?>    
                    <li><a href="anunciosAdm.php">Adicionar informações:</a></li>
                        <?php
                        }
            } ?>
            </ul>
            </fieldset>
        </section>

        <?php require "../inc/rodape.php"; ?> 