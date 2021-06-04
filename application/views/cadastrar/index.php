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
	        <div class="header-group">
	        <h2 class="header-title">Cadastre-se e encontre os melhores profissionais</h2>
	        </div>
        </div>
    </div>

    <!--page-->
    <div class="page">
        <div class="container">
            <div class="row block margin-bottom">
                
                <!--menu-form-->
                <div class="menu-form">
                    <ul class="menu-form-list flex">
                        <li class="menu-form-item">
                            <a href="javascript:void(0);" data-form-id="form-1" class="active">
                                <span class="font-media-1">Para Empresa</span>
                                <span class="font-small-1">Inicie seu recrutamento completo e escolha o melhor profissional!</span>
                            </a>
                        </li>
                        <li class="menu-form-item">
                            <a href="javascript:void(0);" data-form-id="form-2">
                                <span class="font-media-1">Profissionais</span>
                                <span class="font-small-1">Não perca mais tempo, comece agora mesmo!</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
            </div>


            <!--form 1 (empresa)-->
            <form method="POST" action="<?= base_url('cadastrar/empresa'); ?>" id="form-1" class="tab_contents form-active">
            <div class="row block margin-bottom">
                <div class="flex">
                    <div class="input-container width-100 block">
                        <input id="nm_empresa" name="nm_empresa"  class="input" type="text" pattern=".+" required />
                        <label class="label" for="nm_empresa">Nome Empresa</label>
                    </div>
                </div>
            </div>


            <div class="row block margin-bottom">
                <div class="flex">
                    <div class="input-container width-50 inline">
                        <input id="email_empresa" name="email_empresa"  class="input" type="text" autocomplete="off" pattern=".+" required />
                        <label class="label" for="email_empresa">E-Mail</label>
                    </div>
                    <div class="input-container width-50 inline">
                        <input id="senha_empresa" name="senha_empresa" autocomplete="off"  class="input" type="password" pattern=".+" required />
                        <label class="label" for="senha_empresa">Senha</label>
                    </div>                   
                </div>
            </div>



            <div class="row block">
                <button class="btn-send">Cadastrar</button>
            </div>
            </form>



            <!--form 2 (usuario)-->
            <form method="POST" action="<?= base_url('cadastrar/usuario'); ?>" id="form-2" class="tab_contents">
            <div class="row block margin-bottom">
                <div class="flex">
                    <div class="input-container width-50 inline">
                        <input id="nm_usuario" name="nm_usuario"  class="input" type="text" pattern=".+" required />
                        <label class="label" for="nm_usuario">Nome Completo</label>
                    </div>
                    <div class="input-container width-25 inline">
                        <div class="select">
                            <select name="cidade" id="cidade" class="select-text" required>
                                <option value="" selected=""></option>
                                <option value="Manaus">Manaus</option> 
                                <option value="Rio de Janeiro">Rio de Janeiro</option> 
                            </select>
                            <span class="select-highlight"></span>
                            <span class="select-bar"></span>
                            <label for="cidade" class="select-label">Selecione a Cidade</label>
                        </div> 
                    </div>
                    <div class="input-container width-25 inline">
                        <div class="select">
                            <select name="profissao" id="profissao" class="select-text" required>
                                <option value="" selected=""></option>
                                <option value="Programador PHP">Programador PHP</option> 
                                <option value="Editor de Vídeo">Editor de Vídeo</option> 
                            </select>
                            <span class="select-highlight"></span>
                            <span class="select-bar"></span>
                            <label for="profissao" class="select-label">Selecione a Vaga</label>
                        </div>  
                    </div>    
                </div>
            </div>


            <div class="row block margin-bottom">
                <div class="flex">
                    <div class="input-container width-50 inline">
                        <input id="email_usuario" name="email_usuario"  class="input" type="text" autocomplete="off" pattern=".+" required />
                        <label class="label" for="email_usuario">E-Mail</label>
                    </div>
                    <div class="input-container width-50 inline">
                        <input id="senha_usuario" name="senha_usuario"  class="input" type="password" autocomplete="off" pattern=".+" required />
                        <label class="label" for="senha_usuario">Senha</label>
                    </div>                   
                </div>
            </div>


              <div class="row block margin-bottom">
                <div class="flex">
                    <div class="input-container width-50 inline">
                        <div class="select">
                            <select name="nivel_experiencia" id="nivel_experiencia" class="select-text" required>
                                <option value="" selected=""></option>
                                <option value="Básico">Básico</option> 
                                <option value="Intermédiario">Intermédiario</option> 
                                <option value="Avançado">Avançado</option>
                            </select>
                            <span class="select-highlight"></span>
                            <span class="select-bar"></span>
                            <label for="nivel_experiencia" class="select-label">Nível de Experiência</label>
                        </div> 
                    </div>

                    <div class="input-container width-50 inline">
                        <input id="desc_usuario" name="desc_usuario"  class="input" pattern=".+" required />
                        <label class="label" for="desc_usuario">Descrição</label>
                    </div>                   
                </div>
            </div>

            <div class="row block">
                <button class="btn-send">Cadastrar</button>
            </div>
            </form>










        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>