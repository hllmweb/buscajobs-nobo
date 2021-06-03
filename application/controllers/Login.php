<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Login extends CI_Controller {

	public function index()
	{


		$email = (isset($this->session->userdata('email')) ? $this->session->userdata('email') : '');
		$senha = (isset($this->session->userdata('senha')) ? $this->session->userdata('senha') : '');


		$data = array(
			'titulo' => 'Login - BuscaJobs',
			'email'	 => $email
		);

		$this->load->view('login', $data);
	}

    public function sair(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('senha');
        $this->session->sess_destroy();
        redirect("login", "refresh");
    }


}
