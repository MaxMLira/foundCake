<?php require "inc/cabecalho.php"; ?>
<?php
if(isset( $_GET['logout']) ){
    $feedback = "Você saiu do sistema";
}elseif(isset( $_GET['acesso_proibido']) ){
    $feedback = "Faça login primeiro, caro colega";
}elseif(isset( $_GET['campos_obrigatorios']) ){
    $feedback = "Por favor preencha todos os campos!";
}elseif(isset($_GET['nao_encontrado'])){
    $feedback = "Usuário/Senha Não encontrado!";
}else {
    $feedback = "";
}
?>
    <main id="cadastro">
		

        <div id="form">
              <strong>   <p>Preencha o formulário com seus dados que vamos entrar em contato para você ser um anunciante</p></strong> 
            <fieldset><legend><p> <u> Seja um anunciante!</u></p></legend> 

            <form action="envia.php" method="post" id="form-contato">
            <p>
                <label for="nome">Nome:</label> <br>
                <input type="text" id="nome" nome="nome" required placeholder="Digite seu nome aqui"><span></span>
            </p>
            <p>
                <label for="email">Email:</label>	<br>
                <input type="email" required id="email" placeholder="Digite seu email aqui"><span></span>
            </p>
            <p>
                <label for="telefone">Telefone:</label>	<br>
                <input type="telefone" required id="telefone" placeholder="Digite seu Telefone aqui"><span></span>
            </p>
            <p>
                <label for="msg">Mensagem:</label> <br>
                <textarea id="msg" rows="7"col="50" name="msg" placeholder="mensagem"></textarea><span></span>
            </p>
            <p>
                <input type="submit" id="enviar" class="botao" name="enviar" value="Enviar" >
            </p>
                
            </form>
            </fieldset>
        </div>
        <div id="form2">
            <strong>  <p>Faça o login para sua página se já for um dos nossos anunciantes.</p></strong> 
            <fieldset><legend><p><u>Sua página!</u></p></legend> 

            <form action="" method="post" id="form-contato">
            <p class="mensagem"><?=$feedback?></p>
            <p>
                <label for="login">Login:</label>
                <input type="text" id="login" name="email" required placeholder="login"><span></span>
            </p>
            <p>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required placeholder="senha"><span></span>
            </p>
            
            <p>
                <input type="submit" id="entrar" class="botao" name="entrar" value="Entrar" >
            </p>
                
            </form>
            </fieldset>
  
<?php
                if( isset($_POST['entrar']) ){
                    if( empty($_POST['email']) || empty($_POST['senha']) ){
                        header("location:anuncie.php?campos_obrigatorios");
                    } else {
                        // Com os campos acima preenchidos, então:
                        
                        //importar a classe
                        require_once "adm/config/Usuario.php";

                        $usuario = new Usuario();

                        $usuario->setEmail($_POST['email']);
                        $usuario->setSenha( $_POST['senha'] );
                        $linhas = $usuario->confirmaSenha();
                        

                        
                        // echo $usuario->getSenha();
                        //Buscar no banco
                        $resultado = $usuario->buscaUsuario();
                        // //guarde a quantidade de linhas que a consulta retorna
                        // $linhas = mysqli_num_rows($resultado);
                        
                        if($linhas == true){
                            
                            //gerando um array com os dados do usuario
                            $dados = mysqli_fetch_assoc($resultado);
                
                            require_once "adm/config/ControleDeAcesso.php";
                            //criando um objeto para o acesso
                            $controle =  new ControleDeAcesso();
                            //executando o metodo de login
                            $controle->login($dados['id'],$dados['nome'],$dados['email'],$dados['tipo']);

                            //redirecionando para o painel
                            header("Location:adm/index.php");
                        }else{
                            header("Location:anuncie.php?nao_encontrado");
                        }                        
                        
                    
                    }
                }            
                
?>
        </div>
        
    </main>


    <?php require "inc/rodape.php"; ?> 

