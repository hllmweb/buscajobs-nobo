<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/site.css'); ?>">
</head>
<body>
    <!--header-->
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo Buscajobs" />
                </a>
            </div>

            <div class="menu">
                <ul class="menu-list">
                    <li class="menu-item"><a href="#inicio">Início</a></li>
                    <li class="menu-item"><a href="#sobre">Sobre</a></li>
                    <li class="menu-item"><a href="#contato">Contato</a></li>
                </ul>
                <div class="menu-line"></div>
                <div class="menu-featured"><a href="<?= base_url('login'); ?>">Login</a></div>
                <div class="menu-featured"><a href="<?= base_url('cadastrar'); ?>">Cadastrar</a></div>
            </div>
            <div class="header-group">
            <h2 class="header-title">Acesso</h2>
            </div>
        </div>
    </div>

    <!--page-->
    <div class="page">
        <div class="container">

   
            <!--form auth-->
            <form method="POST" action="<?= base_url('acesso/index'); ?>" >
            <div class="row block margin-bottom">
                <?= (isset($mensagem)) ? '<div class="row mensagem">'.$mensagem.'</div>' : ''; ?>
                <div class="flex">
                    <div class="input-container width-50 inline">
                        <input id="email" name="email"  class="input" type="text" autocomplete="off" pattern=".+" required />
                        <label class="label" for="email">E-Mail</label>
                    </div>
                    <div class="input-container width-50 inline">
                        <input id="senha" name="senha"  class="input" type="password" autocomplete="off" pattern=".+" required />
                        <label class="label" for="senha">Senha</label>
                    </div>    
                </div>
            </div>



            <div class="row block">
                <button class="btn-send">Acessar</button>
            </div>
            </form>










        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>