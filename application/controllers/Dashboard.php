<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();

        //models
        $this->load->model('M_Acesso','acesso');
        
        //libs
        $this->load->library(array('session','permissoes'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));
        //$this->load->controller('Permissao','permissao_controller');

    }
    
	public function index(){
        // verifica se a session foi iniciada
        $data = array(
            'titulo'        => 'InstaSorte - Login',
            'nome'          => $this->session->userdata('nome'),
            'view'          => 'dashboard/home',
            'lista'         => $this->permissoes->init_permissao($this->permissoes->init_session(),'')  
        );
        
		$this->load->view("dashboard/inicio",$data);
    }


    public function sempermissao(){
        $data = array(
            'nome'     => $this->session->userdata('nome'),
            'mensagem' => $this->session->userdata('mensagem'),
            'view'          => 'dashboard/home',
            'lista'    => $this->permissoes->init_permissao($this->permissoes->init_session(),'')
        );

       $this->load->view("dashboard/inicio",$data);
    }

    public function logout(){
        return $this->permissoes->logout();
    }

/*    public function ini_session(){
        $session_hash_acesso = $this->session->userdata('log_hash_acesso');
        if(!isset($session_hash_acesso)):
            redirect("login","refresh");
        endif;

        return $session_hash_acesso;
    }*/

    //verifica se a session que foi iniciada tem permissão para acessar as páginas
    // public function ini_permissao($session_hash_acesso){
    //     //$session_hash_acesso = $this->session->userdata('log_hash_acesso');
    
    //     $params = array(
    //         'p_hash_acesso' => $session_hash_acesso,
    //         'p_controller'  => ''
    //     );

    //     $dados_acesso        = $this->acesso->check_permissao($params);

    //     // if(!isset($dados_acesso) and !isset($session_hash_acesso)):
    //     //     redirect("login","refresh");
    //     // endif;

    //     return $dados_acesso;

    // }


    public function sair(){
        $this->session->unset_userdata('log_hash_acesso');
        $this->session->sess_destroy();
        redirect("login", "refresh");
    }

}