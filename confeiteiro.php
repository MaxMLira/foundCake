<?php require "inc/cabecalho.php"; ?>
<section id="anuncio">
	
    <article class="cliente">
        	
            <p><img src="imagens/img2.jpg" alt=""></p>
           
	</article>
		
	
	<div id="form3">
	
		<fieldset><legend> <p>Informaçôes gerais!</p></legend>

		<p>Rezumo das especificaçoes de cada fornecedor; <br> Caixa de texto com o anuncio da pessoa, valores , telefones , formas de pagamentos etc ...</p>




		<p>Preencha o formulario para ser direcionado direto para o fornecedor</p>
        <fieldset>

		<form action="envia.php" method="post" id="form-contato">
		<p>
			<label for="nome">Nome:</label>
			<input type="text" id="nome" nome="nome" required placeholder="Digite seu nome aqui"><span></span>
		</p>
		<p>
			<label for="telefone">Telefone:</label>
			<input type="telefone" id="telefone" nome="telefone" required placeholder="Digite seu telefone aqui"><span></span>
		</p>
		<p>
			<label for="email">Email:</label>	
			<input type="email" required id="email" placeholder="Digite seu email aqui"><span></span>
		</p>
		<p>
			<label for="msg">Mensagem:</label>
			<textarea id="msg" name="msg" placeholder="Mande uma mensagem para esse fornecedor"></textarea><span></span>
		</p>
		<p>
			<input type="submit" id="enviar" name="enviar" value="Enviar." >
		</p>

		</form>
		
	</div>

	<fieldset><legend><p>Localização:</p></legend> 
	
	<div id="mapa"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.170100442371!2d-46.54277174911736!3d-23.526383666112306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5e45de223d91%3A0xc001e09aee26a54f!2sR.+Francisco+Coimbra%2C+406+-+Penha%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1495426638337" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe></div>

</section>


</body>
</html>