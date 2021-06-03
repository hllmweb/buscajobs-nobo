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

        $p_empresa      = $this->input->get_post('empresa');
        $p_usuario      = $this->input->get_post('usuario');
      

        $add_inscricao  = $this->inscricao->sp_inscricao(array(
                                              'p_operacao'      => 'INSCRICAO',
                                              'p_empresa'       => $p_empresa,
                                              'p_usuario'       => $p_usuario
                                            ));

        if($add_inscricao[0]['opcao'] == 1){
            echo 'existe';
        }else{
            echo 'insert';
        }

        /*
        $data = array(
            'add_inscricao' => $add_inscricao
        );

        $this->load->view('perfil/index', $data);*/
    }
}

?>