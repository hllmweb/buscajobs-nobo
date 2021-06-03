<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Submit extends CI_Controller {
	public function __construct(){
		parent::__construct();

		//models
		$this->load->model('M_Filter','filter');

		//libs
		//$this->load->library(array('session','permissoes'));
		$this->load->helper(array('form', 'url', 'html', 'directory','file'));

	}
	
	public function getFilter()
	{
		
		$cidade 	= (!empty($this->input->get_post('cidade')) ? $this->input->get_post('cidade') : null);
		$profissao 	= (!empty($this->input->get_post('profissao')) ? $this->input->get_post('profissao') : null);	
	
		$filter_vaga    	= $this->filter->sp_filter(array(
													  'p_operacao'  => 'FILTER_VAGA',
													  'p_usuario' 	=> null, 
													  'p_cidade'    => $cidade,
													  'p_profissao' => $profissao,
													  'p_opcao'     => 1));

	

		$data = array(
			'filter_vaga'		=> $filter_vaga
		);	

		$this->load->view('filter', $data);

	}


}
