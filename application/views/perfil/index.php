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
                <a href="<?= base_url(''); ?>">
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
	        <h2 class="header-title">Os melhores profissionais, você encontra aqui!</h2>
	        </div>
        </div>
    </div>

    <!--page-->
    <div class="page">
        <div class="container">
            <div class="page-container">
                <span class="font-media-1"><?= $filter_vaga[0]['nm_usuario']; ?></span>
                <span class="font-small-1"><?= $filter_vaga[0]['nm_profissao']; ?> - <?= $filter_vaga[0]['nivel_experiencia']; ?> - <?= $filter_vaga[0]['nm_cidade']; ?></span>

                <a href="javascript:void(0);" class="btn-subscriber" id="add-inscricao" data-usuario="<?= $filter_vaga[0]['id_usuario'] ?>" data-empresa="5">Inscreva-se</a>
            </div>
            <div class="page-description">
                <p>
                    <?= $filter_vaga[0]['desc_usuario']?>
                </p>
            </div>

        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
    <script>
            $("#add-inscricao").click(function(e){
                let usuario = $(this).data('usuario');
                let empresa = $(this).data('empresa');
                
                $.ajax({
                    url: "<?= base_url('inscricao/add'); ?>",
                    type: "POST",
                    data: {
                        empresa: empresa,
                        usuario: usuario
                    },
                    success: function(data){
                        console.log(data['opcao']);
                    }
                })

                e.preventDefault();
            });
    </script>
</body>
</html>