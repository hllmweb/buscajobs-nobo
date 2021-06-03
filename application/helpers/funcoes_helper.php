<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// function init_sistema() {
//     $CI =& get_instance();
//     //$CI->load->library(array('form_validation','session','tracert','email','upload','sistema'));
//     //$CI->load->helper(array('url','form','html','directory','file','funcoes'));
    
//     //carregamento dos models
//     $this->load->model('M_Acesso', 'acesso');
// }

function init_session(){
    $CI =& get_instance();
    $CI->load->library('session');
    $hash_acesso = $CI->session->userdata('log_hash_acesso');
    if(!isset($hash_acesso)):
        redirect("login","refresh");
    endif;
    return $hash_acesso;
}

function init_permissao($hash_acesso, $controller){
    $CI =& get_instance();
    $CI->load->model('M_Acesso','acesso');
    $CI->load->library('session');
    $params = array(
        'p_hash_acesso' => $hash_acesso,
        'p_controller'  => $controller
    );

    $dados_acesso        = $CI->acesso->check_permissao($params);
   
    //if(empty($dados_acesso)):
    if(!isset($dados_acesso[0]["mensagem"])):
        return $dados_acesso;
    else:
        $CI->session->set_userdata('mensagem',$dados_acesso[0]["mensagem"]);
     
        redirect('dashboard/sempermissao','refresh');

        //$CI->load->view('dashboard/sempermissao', $data);
       // redirect("dashboard","refresh");
       //echo "você não tem permissao";
       //exit;
    endif;
    
}

function logout(){
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->session->unset_userdata('log_hash_acesso');
    $CI->session->sess_destroy();
    redirect("login", "refresh");
}