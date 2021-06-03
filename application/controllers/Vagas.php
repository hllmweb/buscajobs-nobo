<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Vagas extends CI_Controller {

	public function index()
	{
		$data = array(
			'titulo' => 'BuscaJobs - Os melhores profissionais, você encontra aqui!'
		);

		$this->load->view('vagas/index', $data);
	}
}
