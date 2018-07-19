<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
    <head>
        <title>SGI - TABERNÁCULO</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body 
            {
                padding: 0px;
                margin: 0px;
            }
            
            .boxtitle
            {
                width: 95vw;
                height: auto;
                margin: auto;
                background-color:#003f81;
                padding: 10px;
                color:#FFE000;
                text-align: center;
            }
            .container
            {
                width: 95vw;
                height: 100vh;
                color:gray;
                font-size: 15px;
                background-color:#f0fafb;
                padding: 10px;
                margin: auto;
            }
            
            
            
        </style>
    </head>
    <body>
        <div class="boxtitle" ><h1> SGI - TABERNÁCULO </h1></div>
        <div class="container">
            <h2>Seja Bem-vindo, <?php echo htmlspecialchars( $desnome, ENT_COMPAT, 'UTF-8', FALSE ); ?> !</h2>            
            <p>Seu usuário de acesso ao sistema foi criado com sucesso, os dados de acesso são:
                <br>Login: <?php echo htmlspecialchars( $deslogin, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                <br>Senha: <?php echo htmlspecialchars( $despassword, ENT_COMPAT, 'UTF-8', FALSE ); ?>

            </p>
            <p>Este e-mail foi enviado pelo site: gestao.iadtabernaculo.com.br</p>
        </div>
        
        
    </body>
</html>
