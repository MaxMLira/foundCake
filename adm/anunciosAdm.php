<?php require "../inc/cabecalhoADM.php"; ?>
        <div id="form">
            <fieldset><legend> <h2>Crie seu anúncio</h2></legend> 
                <form action="" method="post" id="form-inserir" name="form-inserir" enctype="multipart/form-data">
                    <p>
                        <label for="nome">Nome:</label><br>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome aqui">
                    </p>

                    <p>
                        <label for="texto">Texto:</label><br>
                        <textarea  name="texto" id="texto" cols="50" rows="5" placeholder="Faça uma descrição sobre seu trabalho, publico alvo, descrição de protudos, etc..."></textarea>
                    </p>
                    <p>
                        <label for="resumo">Resumo:</label><br>
                        <textarea  name="resumo" id="resumo" cols="50" rows="3" placeholder="Faça um breve resumo sobre seu anúncio"></textarea>
                    </p>
                    <p>
                        <label for="contato">Contato:</label><br>
                        <textarea  name="contato" id="contato" cols="50" rows="3" placeholder="Deixe seu contato"></textarea>
                    </p>
                    <p>
                        <label for="regiao">Região:</label><br>
                        <textarea  name="regiao" id="regiao" cols="50" rows="3" placeholder="Coloque a região que você atende"></textarea>
                    </p>
                    
                    <p>
                        <label for="imagem">Selecionar uma imagem para este post: </label>
                        <input type="file" id="imagem" name="imagem">
                    </p><br>

                    <p><button id="inserir" name="inserir">Inserir anúncio</button></p>                
                </form>
            </fieldset>

        <?php
        if( isset($_POST["inserir"]) ){
            if( empty($_POST["nome"]) || empty($_POST["texto"]) || 
                empty($_POST["resumo"]) || empty($_POST["contato"]) || empty($_POST["regiao"])){
                echo "<p class='mensagem'>Você deve preencher todos os campos!</p>";
            } else {
                require_once "config/Anuncio.php";
                $anuncio = new Anuncio();
                $anuncio->setNome($_POST['nome']);
                $anuncio->setTexto($_POST['texto']);
                $anuncio->setResumo($_POST['resumo']);
                $anuncio->setContato($_POST['contato']);
                $anuncio->setRegiao($_POST['regiao']);
                $anuncio->setUsuarioId($_SESSION['id']);
                //upload de imagem
                $processoUpload = $anuncio->upload($_FILES['imagem']);
                //insere post no banco
                $processoInserirAnuncio = $anuncio->insereAnuncio();
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
        
        <?php require "../inc/rodape.php"; ?> 