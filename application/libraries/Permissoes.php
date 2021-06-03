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



    function init_permissao($hash_acesso, $controller){
        $this->CI =& get_instance();
        
        $params = array(
            'p_hash_acesso' => $hash_acesso,
            'p_controller'  => $controller
        );

        $dados_acesso        = $this->CI->acesso->check_permissao($params);
        if(!isset($dados_acesso[0]["mensagem"])):
            return $dados_acesso;
        else:
            $this->CI->session->set_userdata('mensagem',$dados_acesso[0]["mensagem"]);
     
            redirect('dashboard/sempermissao','refresh');
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