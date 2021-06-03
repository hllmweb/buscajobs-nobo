<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Acesso extends CI_Controller {
    public function __construct(){
        parent::__construct();

        //models
        $this->load->model('M_Acesso','acesso');
        
        //libs
        $this->load->library(array('session'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));
    }
    
	public function index()
	{
        $email      = $this->input->post("email");
        $senha      = $this->input->post("senha");

        $params     = array(
            'p_email'     => $email,
            'p_senha'     => $senha
        ); 

        $dados_acesso = $this->acesso->auth(array(
                                                'p_email'     => $email,
                                                'p_senha'     => $senha
                                            ));

        // if(isset($dados_acesso)){
        //     echo "usuário existe";
        // }else{
        //     echo "não existe";
        // }

        var_dump($dados_acesso);

        // if(!isset($dados_acesso[0]["mensagem"])):
        //     $this->session->set_userdata('log_hash_acesso',$dados_acesso[0]["hash_acesso"]);
        //     $this->session->set_userdata('nome',$dados_acesso[0]['nome']);
        //     redirect('dashboard', 'refresh');
        // else:
        //     $data = array(
        //         'titulo'    => 'Login - Teste',
        //         'mensagem'  => $dados_acesso[0]["mensagem"]
        //     );
        //     $this->load->view('login',$data);
        //     //redirect('login','refresh');
        // endif;

    }
    
}
