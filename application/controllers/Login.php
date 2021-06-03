<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //models
        // $this->load->model('M_Acesso','acesso');
        
        //libs
        $this->load->library(array('session','permissoes'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));
    }


	public function index()
	{

		$data = array(
			'titulo' 		=> 'Login - BuscaJobs',
			'init_session' 	=>  $this->permissoes->init_session()
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
