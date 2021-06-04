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
                <div class="abrir-menu"><a href="#">MENU</a></div>
                <div class="menu-main disable">
                <ul class="menu-list">
                    <li class="menu-item"><a href="<?= base_url(''); ?>">Início</a></li>
                    <li class="menu-item"><a href="<?= base_url('sobre'); ?>">Sobre</a></li>
                    <li class="menu-item"><a href="<?= base_url('contato'); ?>">Contato</a></li>
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
	        <h2 class="header-title">Sobre o projeto</h2>
	        </div>
        </div>
    </div>


    <!--page-->
    <div class="page">
        <div class="container">
        <p>
            O BuscaJobs é uma website, elaborado pelos acadêmicos: 
            <ul class="page-list">
                <li>Acácio Cortinhas Leal</li>
                <li>Ajay Ramchandani</li> 
                <li>Hugo Luis Lima Mesquita</li>
                <li>Heleniane Medeiros Gama</li>
                <li>Philip Ricardo dos Santos</li>
            </ul>
        </p>

        <p>
         Alunos do 8° período do curso de Engenharia da Computação pela Ser Educacional, com a proposta de ser uma solução para pessoas recém-formadas ou que precisam de alguma vaga no mercado de trabalho. 
        </p>

        <p>O website consiste em as pessoas inserirem suas informações pessoais básicas como nome, e-mail e endereço, além de inserir suas qualificações profissionais como se fosse um currículo, e, através disso, registrar essas informações em um banco de dados. </p>

        <p>Com essas informações inseridas, as empresas podem usufruir do website com intuito de buscar o profissional mais adequado para a vaga e selecioná-lo. A vantagem da elaboração deste website é justamente o fato de que hoje em dias as empresas se baseiam em longos processos seletivos para a contratação, fora que esses processos às vezes são muito custosos tanto para a empresa quanto para o candidato, e além disso, pode fazer com que a empresa contrate um profissional que não era o que se esperava para vaga, ou o candidato acabar se arrependendo da vaga escolhida. </p>

        <p>Com o BuscaJobs, o intuito é justamente deixar claro para as empresas que funcionário eles estão esperando contratar, sem burocracias ou longos processos seletivos e sim a simplicidade e transparência do website .
        </p>
        </div>
    </div>



    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>

</body>
</html>