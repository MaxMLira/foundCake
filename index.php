<?php require_once "inc/cabecalho.php"; ?>

        <main>
            <h1 id="tituloh1">Fond Cake</h1>
            <h2 id="tituloh2"><p> Encontre os melhores confeiteiros de São Paulo para fazer seu doce ou Salgado!!!</p> </h2>
            <form action="search.php" method="get" id="form-busca"
                   name="form-busca">
                    <input type="search" name="q" id="q" placeholder="Pesquise aqui" size="25" id="pesquisa">
                </form>
            <select class="form-busca" >
                  <option class="form-busca" value="volvo">Volvo</option>
                  <option class="form-busca"  value="saab">Saab</option>
                  <option class="form-busca" value="opel">Opel</option>
                  <option class="form-busca" value="audi">Audi</option>
            </select>
        </main>
        <section>
            <article class="col">
                <h1>Destaque 1</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                <p>Titulo e rezumo do anuncio!</p>
            </article>	
           
            <article class="col">
                <h1>Destaque 2</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                <p>Titulo e rezumo do anuncio!</p>
            </article>
            
            <article class="collast">
                <h1>Destaque 3</h1>
                <p><a href="confeiteiro.php" title="confeiteiro"><img src="imagens/_img3.jpg" alt="anuncio do confeiteiro"></a></p>
                <p>Titulo e rezumo do anuncio!</p>
            </article>
        </section>
    
   </div>     
    </body>
</html>