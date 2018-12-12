<?php require_once "inc/cabecalho.php"; ?>

        <main>
        <h2 id="tituloh2"><p>Procurando por encomendas de doces ou salgados?<br>
        Aqui você vai encontrar os melhores confeiteiros, docerias, padarias e tudo mais que precisar para fazer seu dia mais gostoso.</p> </h2>
        <div class="barra">
        <form action="search.php" method="get" class="form-busca2"  name="form-busca">
                <input type="search" class="buscar" name="q" id="q" placeholder="Pesquise aqui" size="25" id="pesquisa"> 
                <label for="regioes">Zona</label>
                
        </form>
        <select name="regioes" class="regioes">
            <option  value="Todas as Regiões">Todas as Regiões</option>
            <option  value="Leste">Leste</option>
            <option  value="Sul">Sul</option>
            <option  value="Oeste">Oeste</option>
            <option  value="Norte">Norte</option>
            <option  value="Centro">Centro</option>
            <option  value="Leste/Sul"> Leste/Sul</option>
            <option  value="Leste/Oeste"> Leste/Oeste</option>
            <option  value="Leste/Norte"> Leste/Norte</option>
            <option  value="Leste/Centro"> Leste/Centro</option>
            <option  value="Sul/Oeste"> Sul/Oeste</option>
            <option  value="Sul/Norte"> Sul/Norte</option>
            <option  value="Sul/Centro"> Sul/Centro</option>
            <option  value="Oeste/Norte"> Oeste/Norte</option>
            <option  value="Oeste/Centro"> Oeste/Centro</option>
            <option  value="Norte/Centro"> Norte/Centro</option>
        </select>
    </div>
            <?php 
            
            require_once "adm/config/Anuncio.php";
            $anuncio = new Anuncio();
            $resultado = $anuncio->lerTodosAnuncios();
            
            
            // while($dados = mysqli_fetch_assoc($resultado)){
            
            ?>
        <section>
             <?php while($dados = mysqli_fetch_assoc($resultado)){ ?>   
            <article class="col">
                <h1><?=$dados['Nome']?></h1>
                <p><a href="confeiteiro.php?id=<?=$dados['id']?>" title="confeiteiro"><img width="300px" height="225px" src="adm/img/<?=$dados['imagem']?>" alt="anuncio do confeiteiro"></a></p>
                    <p class="resumo"><?=$dados['resumo']?></p>
            </article>	
             <?php } ?>
            <!-- <article class="col">
                <h1>Destaque 2</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                <p>Titulo e rezumo do anuncio!</p>
            </article>
            
            <article class="collast">
                <h1>Destaque 3</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img class="img" src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                
                    <p class="resumo">Titulo e rezumo do anuncio!</p>
            </article> -->
        </section>
      </main>
      <?php require "inc/rodape.php"; ?> 