<?php require "inc/cabecalho.php"; ?>
   
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

   
        <div class="posts conteudo">
            <h3>Você procurou por:  </h3>


            <article class="post-resultado">

                <h2><a href=""></a></h2>
                      
                <time datetime=""></time>
                
            </article>            

        </div>

<?php require "inc/rodape.php"; ?> 