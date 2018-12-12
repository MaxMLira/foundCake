<?php require "../inc/cabecalhoADM.php"; ?>


            <fieldset> <legend><h2>Usuários</h2></legend> 
            <p>Administração de usuários.</p>
            <p><a class="inserir" href="usuarioInsere.php">Inserir novo usuário</a></p>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Tipo</th>
                
                <th colspan="2">Operações</th>
            </tr>
        </thead>
        <tbody>
  <?php
        // 1) Importando a classe Usuario
        require_once "config/Usuario.php";

        // 2) Criando um objeto para acessar recursos da classe
        $usuarios = new Usuario();

        // 3) trazer os dados da consulta ao banco
        $resultado = $usuarios->lerUsuarios();

        // 4) Transformar o resultado da consulta em um ARRAY
        // 4.1) Também usamos um loop/laço para exibir todos os dados
        while ( $dados = mysqli_fetch_assoc($resultado) ) { 
?>
            <tr>
                <td> <?=$dados['nome']?> </td>
                <td> <?=$dados['email']?> </td>
                <td> <?=$dados['tipo']?></td>
                <td><a class="atualizar" href="usuariosAtualiza.php?id=<?=$dados['id']?>">Atualizar</a></td>
                <td><a class="excluir" href="excluiUsuario.php?id=<?=$dados['id']?>">Excluir</a></td>
            </tr>
        
        </tbody>                
        <?php } ?>
    </table>
</fieldset>
<style>

table {
    margin: 20px auto;
    max-width: 100%;
    border-collapse: collapse;
}
tr, th, td { 
    border: solid 1px lightslategrey; 
    padding: 10px;
}
thead th { 
    background-color: #efb5b2; 
    color: #6d2e01;
}
tr:nth-child(even){ background-color: whitesmoke; }


/* Classes para formatar os links de inserir, alterar e excluir */
.inserir, .atualizar, .excluir { 
    color: white; 
    padding: 5px;
}
.inserir { background-color: #C33A3A; } /* tom de azul */
.atualizar { background-color: #7E3342; } /* tom de laranja */
.excluir { background-color:#9d0a22; } /* tom de vermelho */
</style>
<?php require "../inc/rodape.php"; ?> 
