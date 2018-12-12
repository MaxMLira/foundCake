<?php 
require "../inc/cabecalhoADM.php";

// Obter o id passado via URL
$id = $_GET['id'];

// Importar a classe
require_once "config/Usuario.php";

// Criar um objeto para acessar a Classe
$usuario = new Usuario();

// Colocar o id dentro do objeto
$usuario->setId($id);

// Executar a consulta
$resultado = $usuario->lerUmUsuario();

// Preparar os dados como array
$dados = mysqli_fetch_assoc($resultado);
?>   
    <p><a href="usuarios.php">Usuários</a> / Atualizar </p>
    <hr>
    <fieldset  id="form"><legend> <h2>Atualizar Usuário</h2></legend>
    

            <form action="" method="post" id="form-atualizar" name="form-atualizar">
                <input type="hidden" name="id" value="<?=$dados['id']?>">
                <p>
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome" value="<?=$dados['nome']?>">
                </p>
                <p>
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="email"  value="<?=$dados['email']?>">
                </p>
                <p>
                    <label for="senha">Senha:</label><br>
                    <input type="password" id="senha" name="senha"  value="<?=$dados['senha']?>">
                </p>
                <p>
                    <label for="tipo">Tipo:</label><br>
                    <input type="text" id="tipo" name="tipo"  value="<?=$dados['tipo']?>">
                </p>
                <button id="atualizar" name="atualizar">Atualizar usuário</button>
            </form>
            <?php
            if( isset($_POST['atualizar']) ){
    
                /* Verificando se os campos estão vazios...*/
                if( empty($_POST['nome']) || empty($_POST['email']) ||
                    empty($_POST['senha']) || empty($_POST['tipo'])){  
                    
                    // Se estiverem, mostra a mensagem a seguir 
                    echo "<p class=\"mensagem\">Você deve preencher os campos</p>";
                } else { 
                    // Caso contrário, faça:
                    
            
                    
                    $usuario->setNome($_POST['nome']);
                    $usuario->setEmail($_POST['email']);
                    $usuario->setSenha(
                        $usuario->verificaSenha($_POST['senha'],$dados['senha'])
                    );

                    $usuario->setTipo($_POST['tipo']);
                                
                    $usuario->atualizarUsuario();
            
                    header("location:usuarios.php");
                }
            }
            ?>            

        </section>
</fieldset>
<?php require "../inc/rodape.php"; ?> 
