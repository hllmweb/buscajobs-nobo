<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Vagas extends CI_Controller {

    public function index()
    {
        $id_usuario = $this->input->get_post('id_usuario');

        $data = array(
            'titulo' => 'BuscaJobs - Os melhores profissionais, você encontra aqui!',
            'id_usuario' => $id_usuario
        );

        $this->load->view('perfil/index', $data);
    }
}



/*defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Perfil extends CI_Controller {
    public function __construct(){
        parent::__construct();


        //models
        $this->load->model('M_Acesso','acesso');
        
        //libs
        $this->load->library(array('session','permissoes'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));
    }

    public function index(){
       
        $data = array(
            'titulo'        => 'Instagram - Perfil',
            'nome'          => $this->session->userdata('nome'),
            'view'          => 'perfil/inicio',
            'lista'         => $this->permissoes->init_permissao($this->permissoes->init_session(),'perfil')
        );
        
        $this->load->view("dashboard/inicio", $data);
    }


}*/
