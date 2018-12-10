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
<?php
                if( isset($_POST['entrar']) ){
                    if( empty($_POST['email']) || empty($_POST['senha']) ){
                        header("location:login.php?campos_obrigatorios");
                    } else {
                        // Com os campos acima preenchidos, então:
                        
                        //importar a classe
                        require_once "config/Usuario.php";

                        $usuario = new Usuario();

                        $usuario->setEmail($_POST['email']);

                        $usuario->setSenha( $usuario->codificaSenha($_POST['senha']) );
                        
                        //Buscar no banco
                        $resultado = $usuario->buscaUsuario();
                        //guarde a quantidade de linhas que a consulta retorna
                        $linhas = mysqli_num_rows($resultado);
                        
                        if($linhas == 1){
                            
                            //gerando um array com os dados do usuario
                            $dados = mysqli_fetch_assoc($resultado);

                            require_once "config/ControleDeAcesso.php";
                            //criando um objeto para o acesso
                            $controle =  new ControleDeAcesso();
                            //executando o metodo de login
                            $controle->login($dados['id'],$dados['nome'],$dados['email'],$dados['tipo']);

                            //redirecionando para o painel
                            header("Location:admin/index.php");
                        }else{
                            header("Location:login.php?nao_encontrado");
                        }                        
                        
                    
                    }
                }            
                
?>