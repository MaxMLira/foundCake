<?php require "inc/cabecalho.php"; 

require_once 'adm/config/Anuncio.php';

$id = $_GET['id'];

// Criar um objeto para acessar a Classe
$anuncio = new Anuncio();

// Colocar o id dentro do objeto
$anuncio->setId($id);

// Executar a consulta
$resultado = $anuncio->lerUmAnuncio();
$dados = mysqli_fetch_assoc($resultado);


?>

<!--<style> 
#form3{
	float: left;
}
.cliente{
	float: left;
    clear: both;
}

</style>-->

<fieldset id="imagem"><legend> <h2><?=$dados['Nome']?></h2></legend>
    <article class="cliente">
        	
            <p><img width="600px" height="400px" src="adm/img/<?=$dados['imagem']?>" alt=""></p>
           
	</article>
</fieldset>

	<section id="anuncio">	
	
	<div id="form3">
	
		<fieldset><legend> <p>Informaçôes gerais!</p></legend>

		<p><?=$dados['resumo']?> <br><br><?=$dados['texto']?> <br><br>Endereço:<br> <?=$dados['contato']?> </p>




		<p>Preencha o formulario para ser direcionado direto para o fornecedor</p>
        <fieldset>

		<form action="envia.php" method="post" id="form-contato">
		<p>
			<label for="nome">Nome:</label><br>
			<input type="text" id="nome" nome="nome" required placeholder="Digite seu nome aqui"><span></span>
		</p>
		<p>
			<label for="telefone">Telefone:</label><br>
			<input type="telefone" id="telefone" required nome="telefone" required placeholder="Digite seu telefone aqui"><span></span>
		</p>
		<p>
			<label for="email">Email:</label>	<br>
			<input type="email" required id="email" required placeholder="Digite seu email aqui"><span></span>
		</p>
		<p>
			<label for="msg">Mensagem:</label><br>
			<textarea id="msg" name="msg" required placeholder="Mande uma mensagem para esse fornecedor"></textarea><span></span>
		</p>
		<p>
			
			<p><button id="inserir" name="enviar">Enviar</button></p>

		</form>
		 
	</div>

</section>

<?php require "inc/rodape.php"; ?> 

