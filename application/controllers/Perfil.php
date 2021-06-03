<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Perfil extends CI_Controller {

    public function __construct(){
        parent::__construct();


        //models
        //$this->load->model('M_Acesso','acesso');
        $this->load->model('M_Filter','filter');

        //libs
        //$this->load->library(array('session','permissoes'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));

    }

    public function index($id_usuario)
    {

        $filter_vaga        = $this->filter->sp_filter(array(
                                              'p_operacao'  => 'FILTER_VAGA',
                                              'p_usuario'   => null,
                                              'p_cidade'    => null,
                                              'p_profissao' => null,
                                              'p_opcao'     => 2));

        $data = array(
            'titulo' => 'BuscaJobs - Os melhores profissionais, você encontra aqui!',
            'filter_vaga' => $filter_vaga
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
