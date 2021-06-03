<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();

		//models
		$this->load->model('M_Filter','filter');

		//libs
		//$this->load->library(array('session','permissoes'));
		$this->load->helper(array('form', 'url', 'html', 'directory','file'));

	}
	
	public function index()
	{
		
		$filter_cidade 		= $this->filter->sp_filter(array(
													  'p_operacao'  => 'FILTER_CIDADE',
													  'p_cidade'	=> null,
													  'p_profissao' => null,
													  'p_opcao'		=> null,
													));
		$filter_profissao 	= $this->filter->sp_filter(array(
													  'p_operacao'  => 'FILTER_PROFISSAO',
													  'p_cidade'	=> null,
													  'p_profissao' => null,
													  'p_opcao'		=> null
													));
		$filter_vaga    	= $this->filter->sp_filter(array(
													  'p_operacao'  => 'FILTER_VAGA',
													  'p_cidade'    => null,
													  'p_profissao' => null,
													  'p_opcao'     => 0));


		$data = array(
			'titulo'		 	=> 'BuscaJobs - Encontre os melhores profissionais',
			'filter_cidade'  	=> $filter_cidade,
			'filter_profissao' 	=> $filter_profissao,
			'filter_vaga'		=> $filter_vaga
		);	

		$this->load->view('index', $data);

	}


}
