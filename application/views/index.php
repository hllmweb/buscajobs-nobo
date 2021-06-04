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

    <!--search-->
    <div class="search">
        <div class="container">
			
			<form method="POST" id="form-filter">
			<div class="flex-col">
                <div class="inline width-40">
                    <div class="select">
                        <select name="cidade" id="cidade" class="select-text" required>
                            <option value="" selected></option>
                            <?php foreach($filter_cidade as $row): ?>
                            <option value="<?= $row['id_cidade']; ?>"><?= $row['nm_cidade']; ?></option>
                            <?php endforeach; ?>        
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label for="cidade" class="select-label">Selecione a Cidade</label>
                    </div>   
                </div>

                <div class="inline width-40">
                    <div class="input-container">
                        <div class="select">
                            <select name="profissao" id="profissao" class="select-text" required>
                                <option value="" selected></option>
                                <?php foreach($filter_profissao as $row): ?> 
                                <option value="<?= $row['id_profissao']; ?>"><?= $row['nm_profissao']; ?></option> 
                                <?php endforeach; ?>
                            </select>
                            <span class="select-highlight"></span>
                            <span class="select-bar"></span>
                            <label for="profissao" class="select-label">Selecione a Vaga</label>
                        </div>   
                    </div>    
                </div>
                
                <div class="inline width-20"><button class="btn-filter">Filtrar</button></div>
            </div>
        	</form>

        </div>
    </div>


    <!--cards-->
    <div id="page-content" class="cards grid container">
    
        <?php foreach($filter_vaga as $row): ?>
        <div class="item">
            <a href="<?= base_url('perfil').'/'.$row['id_usuario']; ?>">
            <div class="flex">
                <div class="title width-100 padding text-left">
                    <span class="color-line-1"><?= $row['nm_profissao'].' - '.$row['nm_cidade']; ?></span>
                    <div class="description"><?= $row['nm_usuario']; ?></div>
                </div>
                <button class="btn-more"><span class="responsive">Visualizar</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="36px" width="36px" role="img" aria-hidden="true"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path></svg>
                </button>
            </div>
            </a>
        </div>
        <?php endforeach; ?>
       
    </div>



    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
    <script> 
        $("#form-filter").submit(function(e){
            let cidade      = $("#cidade").val();
            let profissao   = $("#profissao").val(); 

            $.ajax({
                url: "<?= base_url('submit/getFilter'); ?>",
                type: "POST",
                data: {
                    cidade: cidade,
                    profissao: profissao
                },
                beforeSend: function(){
                    $("#page-content").html("<h3>Carregando....</h3>");
                },
                success: function(data){
                    $("#page-content").html(data);
                }
            });

            e.preventDefault();
        });

    </script>
</body>
</html>