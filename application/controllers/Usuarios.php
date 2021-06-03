<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Usuarios extends CI_Controller {
    public function __construct(){
        parent::__construct();

        //models
        $this->load->model('M_Acesso','acesso');
        
        //libs
        $this->load->library(array('session','permissoes'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));
    }
    
	public function index(){
        //verificar se a session existe
        //verificar se tem permissão
        $data = array(
            'titulo'        => 'Instagram - Usuários',
            'nome'          => $this->session->userdata('nome'),
            'view'          => 'usuarios/inicio',
            'lista'         => $this->permissoes->init_permissao($this->permissoes->init_session(),'usuarios')
        );


		$this->load->view("dashboard/inicio",$data);
    }
}

?>