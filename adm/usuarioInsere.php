<?php require "../inc/cabecalhoADM.php"; ?>

       
    <p><a href="usuarios.php">Usuários</a> / insere </p>
    <hr>
    <fieldset  id="form"><legend> <h2>Inserir novo Usuário</h2></legend>
    

            <form action="" method="post" id="form-atualizar" name="form-atualizar">
                <input type="hidden" name="id" value="">
                <p>
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome" value="">
                </p>
                <p>
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="email"  value="">
                </p>
                <p>
                    <label for="senha">Senha:</label><br>
                    <input type="password" id="senha" name="senha"  value="">
                </p>
                <p>
                    <label for="tipo">Tipo:</label><br>
                    <input type="text" id="tipo" name="tipo"  value="">
                </p>
                <button id="inserir" name="inserir">Inserir usuário</button>
            </form>

</fieldset>
<?php
if( isset($_POST['inserir']) ){
    
    /* Verificando se os campos estão vazios...*/
    if( empty($_POST['nome']) || empty($_POST['email']) ||
        empty($_POST['senha']) || empty($_POST['tipo'])){  
        
        // Se estiverem, mostra a mensagem a seguir 
        echo "<p class=\"mensagem\">Você deve preencher os campos</p>";
    } else { 
	    // Caso contrário, faça:
        
        // 1) Importar a classe
        require_once "config/Usuario.php";

        // 2) Criar um objeto
        $usuario = new Usuario();

        // 3) "Setar" os dados no objeto
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha(
            $usuario->codificaSenha($_POST['senha'])
        );
        $usuario->setTipo($_POST['tipo']);

        // 4) Inserir no banco
        $usuario->inserirUsuario();

        // 5) Redirecionar para listagem de usuários
        header("location:usuarios.php");
    }
}           
?>
<?php require "../inc/rodape.php"; ?> 
