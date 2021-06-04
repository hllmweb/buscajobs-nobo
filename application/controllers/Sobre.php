<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();

		//models
		// $this->load->model('M_Filter','filter');

		//libs
		$this->load->library(array('session','permissoes'));
		$this->load->helper(array('form', 'url', 'html', 'directory','file'));
	}


	public function index(){
		$data = array(
			'titulo' => 'Sobre o Projeto - BuscaJobs',
			'lista'  =>  $this->permissoes->init_permissao($this->session->userdata('log_hash_acesso'))
		);


		$this->load->view('sobre',$data);
	}



}
?>