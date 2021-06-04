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
                <a href="">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo Buscajobs" />
                </a>
            </div>

            <div class="menu">
                <div class="abrir-menu"><a href="#">MENU</a></div>
                <div class="menu-main disable">
                <ul class="menu-list">
                    <li class="menu-item"><a href="#inicio">Início</a></li>
                    <li class="menu-item"><a href="#sobre">Sobre</a></li>
                    <li class="menu-item"><a href="#contato">Contato</a></li>
                </ul>
                <div class="menu-line"></div>

                <?php if($lista === false): ?>
                <div class="menu-featured"><a href="<?= base_url('login'); ?>">Login</a></div>
                <div class="menu-featured"><a href="<?= base_url('cadastrar'); ?>">Cadastrar</a></div>

                <?php else: ?>
               

                <?php if($lista[0]['opcao'] == 'EMPRESA'): ?>
                <div class="menu-acesso-featured"><a href=""><?= $lista[0]['nm_empresa']; ?></a></div>
                <div class="menu-acesso-logoff-featured"><a href="<?= base_url('login/sair'); ?>">Sair</a></div>
                <?php elseif($lista[0]['opcao'] == 'USUARIO'): ?>
                <div class="menu-acesso-featured"><a href=""><?= $lista[0]['nm_usuario']; ?></a></div>
                <div class="menu-acesso-logoff-featured"><a href="<?= base_url('login/sair'); ?>">Sair</a></div>
                <?php endif; ?>

                <?php endif; ?>
                </div>


            </div>
	        <div class="header-group">
	        <h2 class="header-title">Encontre os melhores profissionais</h2>
	        </div>
        </div>
    </div>




    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>

</body>
</html>