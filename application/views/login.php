<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titulo; ?></title>

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css?v=<?= time();?>" >
</head>
<body>
    <div class="main-login">
        <div class="header-login">
            <div class="logo"><a href=""><img src="<?= base_url(); ?>assets/img/logo-instasorte-branco.png"></a></div>
        </div>

        <div class="content-login"> 
            <div class="content-login-title">Acesse seu Painel</div>
            <div class="content-mensagem"><?= (isset($mensagem)) ? $mensagem : "" ?></div>
               
            <div class="content-form-login">
                <form action="<?= base_url(); ?>acesso" method="post">
                    <label for="cpf">
                        <input type="text" name="cpf" placeholder="CPF / CNPJ" autofocus="autofocus">
                    </label>
                    <label for="senha">
                        <input type="password" name="senha" placeholder="SENHA">
                    </label>
                    <button>Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>