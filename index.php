<!DOCTYPE html>
<html>

<head>
    <title>Kaching Software</title>
    <link rel="stylesheet" type="text/css" href="Front+/css/reset.css">
    <link rel="stylesheet" type="text/css" href="Front+/css/style.css">
    <link rel="stylesheet" type="text/css" href="Front+/css/fonts-icones.css">
</head>

<body>

    <main class="main_content container">

        <section class="section-seu-codigo container">

            <div class="content">
                <center>
                    <img src="Front+/img/logoKaching.png" alt="logoKaching" width="248" height="248">
                </center>

                <div class="box-artigo">

                    <form class="formulario" method="post" action="Login.php">
                        <div class="title icon icon-forward-1"> Login</div>
                        <div class="input-container">
                            <input id="email" class="input" type="text" name="email" placeholder="" />
                            <div class="legenda-p"></div>
                            <label for="nome" class="label icon icon-user-1"> Email</label>
                        </div>

                        <div class="input-container">
                            <input id="senha" class="input" type="password" name="senha" placeholder="" />
                            <div class="legenda-p"></div>
                            <label for="email" class="label icon icon-lock-1"> Senha</label>
                        </div>

                        <button type="text" class="btn">Entrar</button>

                    </form>

                </div>
                <div class="clear"></div>
            </div>
        </section>
    </main>
</body>

</html>