<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Cadastrar extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//models
		$this->load->model('M_Acesso','acesso');
		$this->load->model('M_Cadastro','cadastro');

		//libs
		$this->load->library(array('session','permissoes'));
		$this->load->helper(array('form', 'url', 'html', 'directory','file'));

	}

	public function index()
	{
		$data = array(
			'titulo' => 'BuscaJobs - Cadastre-se e encontre os melhores profissionais',
			'lista'  =>  $this->permissoes->init_permissao($this->session->userdata('log_hash_acesso'))
		);

		$this->load->view('cadastrar/index', $data);
	}

	public function empresa(){
		$nm_empresa = $this->input->get_post('nm_empresa');
		$email 		= $this->input->get_post('email_empresa');
		$senha 		= $this->input->get_post('senha_empresa');

		$add_empresa = $this->cadastro->sp_cadastro(array(
												'p_operacao' 			=> 'ADD_EMPRESA',
												'p_nm_empresa' 			=> $nm_empresa,
												'p_email'				=> $email,
												'p_senha'				=> $senha,
												'p_id_cidade'			=> null,
												'p_id_profissao'		=> null,
												'p_nm_usuario'			=> null,
												'p_desc_usuario'    	=> null,
												'p_nivel_experiencia'  	=> null)); 

		if($add_empresa){
			echo "<script>Cadastro efetuado com sucesso!</script>";
			
     		$dados_acesso = $this->acesso->auth(array(
                                                'p_operacao'  => 'CHECK_ACESSO',
                                                'p_email'     => $email,
                                                'p_senha'     => $senha,
                                                'p_hash_acesso' => null       
                                            ));

			$data = array(
				'titulo' => 'BuscaJobs - Encontre os melhores profissionais',
				'lista'  =>  $this->permissoes->init_permissao($dados_acesso[0]['hash_acesso'])
			);

			$this->load->view('inicio/index', $data);

		}else{
			echo "<script>Erro ao efetuar cadastro!</script>";
		}


	}


}
