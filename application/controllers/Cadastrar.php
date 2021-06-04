<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Cadastrar extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//models
		$this->load->model('M_Filter','filter');
		$this->load->model('M_Acesso','acesso');
		$this->load->model('M_Cadastro','cadastro');

		//libs
		$this->load->library(array('session','permissoes'));
		$this->load->helper(array('form', 'url', 'html', 'directory','file'));

	}

	public function index()
	{

		$filter_cidade 		= $this->filter->sp_filter(array(
													  'p_operacao'  => 'FILTER_CIDADE',
													  'p_usuario' 	=> null,
													  'p_cidade'	=> null,
													  'p_profissao' => null,
													  'p_opcao'		=> null,
													));
		$filter_profissao 	= $this->filter->sp_filter(array(
													  'p_operacao'  => 'FILTER_PROFISSAO',
													  'p_usuario'   => null,
													  'p_cidade'	=> null,
													  'p_profissao' => null,
													  'p_opcao'		=> null
													));

		$data = array(
			'titulo' => 'BuscaJobs - Cadastre-se e encontre os melhores profissionais',
			'lista'  =>  $this->permissoes->init_permissao($this->session->userdata('log_hash_acesso')),
			'filter_cidade'  	=> $filter_cidade,
			'filter_profissao' 	=> $filter_profissao,
		);

		$this->load->view('cadastrar/index', $data);
	}

	#empresa
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
			echo "<script>alert('Cadastro efetuado com sucesso!'); </script>";
			$dados_acesso = $this->acesso->auth(array(
                                                'p_operacao'  => 'CHECK_ACESSO',
                                                'p_email'     => $email,
                                                'p_senha'     => $senha,
                                                'p_hash_acesso' => null       
                                            ));
			
			if(!isset($dados_acesso[0]["mensagem"])):
            	$this->session->set_userdata('log_hash_acesso',$dados_acesso[0]['hash_acesso']);


            	redirect('inicio', 'refresh');
        	endif;
     		

		}else{
			echo "<script>alert('Erro ao efetuar cadastro!');</script>";
		}

	}



	#usuario
	public function usuario(){
		$nm_usuario 			= $this->input->get_post('nm_usuario');
		$email 					= $this->input->get_post('email_usuario');
		$senha 					= $this->input->get_post('senha_usuario');
		$id_cidade 				= $this->input->get_post('cidade');
		$id_profissao   		= $this->input->get_post('profissao');
		$desc_usuario   		= $this->input->get_post('desc_usuario');
		$nivel_experiencia 		= $this->input->get_post('nivel_experiencia');
	

		$add_usuario = $this->cadastro->sp_cadastro(array(
												'p_operacao' 			=> 'ADD_USUARIO',
												'p_nm_empresa' 			=> null,
												'p_email'				=> $email,
												'p_senha'				=> $senha,
												'p_id_cidade'			=> $id_cidade,
												'p_id_profissao'		=> $id_profissao,
												'p_nm_usuario'			=> $nm_usuario,
												'p_desc_usuario'    	=> $desc_usuario,
												'p_nivel_experiencia'  	=> $nivel_experiencia)); 

		if($add_usuario){
			echo "<script>alert('Cadastro efetuado com sucesso!'); </script>";
			$dados_acesso = $this->acesso->auth(array(
                                                'p_operacao'  => 'CHECK_ACESSO',
                                                'p_email'     => $email,
                                                'p_senha'     => $senha,
                                                'p_hash_acesso' => null       
                                            ));
			
			if(!isset($dados_acesso[0]["mensagem"])):
            	$this->session->set_userdata('log_hash_acesso',$dados_acesso[0]['hash_acesso']);


            	redirect('inicio', 'refresh');
        	endif;
     		

		}else{
			echo "<script>alert('Erro ao efetuar cadastro!');</script>";
		}

	}

}
