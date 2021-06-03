<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Login extends CI_Controller {

	public function index()
	{
		$data = array(
			'titulo' => 'InstaSorte - Login'
		);

		$this->load->view('login', $data);
	}
}
