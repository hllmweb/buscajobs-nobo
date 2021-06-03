<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Inscricao extends CI_Controller {

    public function __construct(){
        parent::__construct();


        //models
        //$this->load->model('M_Acesso','acesso');
        $this->load->model('M_Inscricao','inscricao');

        //libs
        //$this->load->library(array('session','permissoes'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));

    }

    public function add()
    {

        $id_empresa     = $this->input->get_post('id_empresa');
        $id_usuario     = $this->input->get_post('id_usuario');
        $add_inscricao  = $this->inscricao->sp_inscricao(array(
                                              'p_operacao'      => 'INSCRICAO',
                                              'p_empresa'       => $id_empresa,
                                              'p_usuario'       => $id_usuario
                                            ));

        echo $add_inscricao;

        /*
        $data = array(
            'add_inscricao' => $add_inscricao
        );

        $this->load->view('perfil/index', $data);*/
    }
}

?>