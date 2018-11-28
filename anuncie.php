<?php require "inc/cabecalho.php"; ?>

    <main id="cadastro">
		

        <div id="form">
              <strong>   <p>Preencha o formulário com seus dados que vamos entrar em contato para você ser nosso anunciantes!</p></strong> 
            <fieldset><legend><p> <u> Seja um anunciante!</u></p></legend> 

            <form action="envia.php" method="post" id="form-contato">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" nome="nome" required placeholder="Digite seu nome aqui"><span></span>
            </p>
            <p>
                <label for="email">Email:</label>	
                <input type="email" required id="email" placeholder="Digite seu email aqui"><span></span>
            </p>
            <p>
                <label for="telefone">Telefone:</label>	
                <input type="telefone" required id="telefone" placeholder="Digite seu Telefone aqui"><span></span>
            </p>
            <p>
                <label for="msg">Mensagem:</label>
                <textarea id="msg" name="msg" placeholder="mensagem"></textarea><span></span>
            </p>
            <p>
                <input type="submit" id="enviar" name="enviar" value="Enviar." >
            </p>
                
            </form>
            </fieldset>
        </div>
        <div id="form2">
            <strong>  <p>Faça o login para sua página se já for um dos nossos anunciantes.</p></strong> 
            <fieldset><legend><p><u>Sua página!</u></p></legend> 

            <form action="envia.php" method="post" id="form-contato">
            <p>
                <label for="login">Login:</label>
                <input type="text" id="login" nome="login" required placeholder="login"><span></span>
            </p>
            <p>
                <label for="senha">Senha:</label>
                <input type="text" id="senha" nome="senha" required placeholder="senha"><span></span>
            </p>
            
            <p>
                <input type="submit" id="entrar" name="entrar" value="Entrar." >
            </p>
                
            </form>
            </fieldset>
        </div>
        
    </main>






</body>
</html>