<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Permissoes {
    private $CI;    
    public function __construct(){
        $this->CI = &get_instance();

        //models
        $this->CI->load->model('M_Acesso','acesso');

        //libs
        $this->CI->load->library('session');        
    }

    public function init_session(){
        $this->CI = & get_instance();
       
        $hash_acesso = $this->CI->session->userdata('log_hash_acesso');
        if(!isset($hash_acesso)):
            redirect("login","refresh");
        endif;
        return $hash_acesso;
    }



    function init_permissao($hash_acesso){
        $this->CI =& get_instance();
        
        $params = array(
            'p_operacao'    => 'CHECK_PERMISSAO',
            'p_email'       => null,
            'p_senha'       => null,
            'p_hash_acesso' => $hash_acesso
        );

        $dados_acesso        = $this->CI->acesso->auth($params);
        if(!isset($dados_acesso[0]["mensagem"])):
            return false;
        else:
            return $dados_acesso;
            //$this->CI->session->set_userdata('mensagem',$dados_acesso[0]["mensagem"]);
     
            //redirect('login','refresh');
        endif;
    }

    function logout(){
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->session->unset_userdata('log_hash_acesso');
        $this->CI->session->sess_destroy();
        redirect("login", "refresh");
    }

}