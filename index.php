<?php require_once "inc/cabecalho.php"; ?>

        <main>
            <h1 id="tituloh1">Found Cake</h1>
            <h2 id="tituloh2"><p> Encontre os melhores confeiteiros de São Paulo para fazer seu doce ou Salgado!!!</p> </h2>
            <div class="barra">
                <form action="search.php" method="get" class="form-busca2"  name="form-busca">
                        <input type="search" class="buscar" name="q" id="q" placeholder="Pesquise aqui" size="25" id="pesquisa"> 
                        <label for="regioes">Zona</label>
                        
                </form>
                <select name="regioes" class="regioes">
                    <option  value="Leste">Leste</option>
                    <option  value="Sul">Sul</option>
                    <option  value="Oeste">Oeste</option>
                    <option  value="Norte">Norte</option>
                    <option  value="Centro">Centro</option>
            </select>
            </div>
        <section>
            <article class="col">
                <h1>Destaque 1</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                    <p class="resumo">Titulo e rezumo do anuncio!</p>
            </article>	
           
            <article class="col">
                <h1>Destaque 2</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                <p>Titulo e rezumo do anuncio!</p>
            </article>
            
            <article class="collast">
                <h1>Destaque 3</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img class="img" src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                
                    <p class="resumo">Titulo e rezumo do anuncio!</p>
            </article>
        </section>
      </main>
      <footer><p class="footer">Todos os direitos reservados<p></footer>
   </body>
</html>