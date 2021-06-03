<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Cadastrar extends CI_Controller {

	public function index()
	{
		$data = array(
			'titulo' => 'BuscaJobs - Cadastre-se e encontre os melhores profissionais'
		);

		$this->load->view('cadastrar/index', $data);
	}
}
