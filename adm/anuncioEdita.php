<?php require "../inc/cabecalhoADM.php"; ?>

<?php 
//outPut buffer ele separa um espaço na memoria, evita os avisos ou erros nos headers
ob_start();

$id = $_GET['id'];
require_once "config/Anuncio.php";
$anuncio = new Anuncio();
$anuncio->setId($id);
$resultado = $anuncio->lerUmAnuncio();
$dados = mysqli_fetch_assoc($resultado);



?>
        <div id="form">
            <fieldset><legend> <h2>Crie seu anúncio</h2></legend> 
                <form action="" method="post" id="form-inserir" name="form-inserir" enctype="multipart/form-data">
                    <p>
                        <label for="nome">Nome:</label><br>
                        <input type="text" id="nome" name="nome" value="<?=$dados['Nome']?>">
                    </p>

                    <p>
                        <label for="texto">Texto:</label><br>
                        <textarea  name="texto" id="texto" cols="50" rows="5" ><?=$dados['texto']?></textarea>
                    </p>
                    <p>
                        <label for="resumo">Resumo:</label><br>
                        <textarea  name="resumo" id="resumo" cols="50" rows="3" ><?=$dados['resumo']?></textarea>
                    </p>
                    <p>
                        <label for="contato">Contato:</label><br>
                        <textarea  name="contato" id="contato" cols="50" rows="3" ><?=$dados['contato']?></textarea>
                    </p>
                    <p>
                        <label for="regiao">Região:</label><br>
                        <textarea  name="regiao" id="regiao" cols="50" rows="3"><?=$dados['regiao']?></textarea>
                    </p>
                    
                    <?php 
                    if($dados['imagem'] != ''){
                ?>
                <p>    
                    <label for="imagem-existente">Imagem do anuncio:</label><br>
                    <input type="text" readonly disabled value="<?=$dados['imagem']?>" id="imagem-existente" name="imagem-existente">
                    <span id="excluir-imagem"> <a href="#">Remover imagem</a> </span>
                </p>
                    <?php } ?>
                
                <p>
                    <label for="imagem">Enviar uma nova imagem: </label>
                    <input type="file" id="imagem" name="imagem">
                </p><br>

                    <p><button id="inserir" name="Atualizar">Atualizar anúncio</button></p>                
                </form>
            </fieldset>

        <?php
        if( isset($_POST["Atualizar"]) ){
            if( empty($_POST["nome"]) || empty($_POST["texto"]) || 
                empty($_POST["resumo"]) || empty($_POST["contato"]) || empty($_POST["regiao"])){
                echo "<p class='mensagem'>Você deve preencher todos os campos!</p>";
            } else {
                
                $anuncio->setNome($_POST['nome']);
                $anuncio->setTexto($_POST['texto']);
                $anuncio->setResumo($_POST['resumo']);
                $anuncio->setContato($_POST['contato']);
                $anuncio->setRegiao($_POST['regiao']);
                //upload de imagem
                $processoUpload = $anuncio->upload($_FILES['imagem']);
                //insere post no banco
                $processoInserirAnuncio = $anuncio->atualizarAnuncio();
                //se ta tudo bem, então vamos para os posts
                if($processoUpload && $processoInserirAnuncio){
                    header("location:index.php");
                }else{//mostra um erro e o usuario chora
                    echo "<p class=\"mensagem\">Algo Deu Erarado! Tente Novamente mais tarde</p>";
                }
            }
    }
            ?>
        </div>
        <script src="js/jquery.min.js"></script>

<script>
// Manipule o evento de click para o link excluir-imagem -->
$("#excluir-imagem a").on("click", function(event){
    event.preventDefault();

    // Remover o valor do que campo imagem-existente
    $("#imagem-existente").val("");
    var img = document.getElementById('imagem');
    img.disabled = false;
    
}); 

// Manipule o evento de mudança (change) para o input file
$("#imagem").on("change", function(){  

    /* Substituir o valor preenchido no campo imagem-existente pelo
    valor vindo do input file junto com o fakepath (caminho provisório
    usado por questões de segurança) */  
    $("#imagem-existente").val( 
        $(this).val().replace(/C:\\fakepath\\/i, '') 
    );    
});  
</script>
        <?php require "../inc/rodape.php"; ?> 