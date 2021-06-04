<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Cadastro extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }


    public function sp_cadastro($p){
        $params = array(
            array('value' => $p['p_operacao']),
            array('value' => $p['p_nm_empresa']),
            array('value' => $p['p_email']),
            array('value' => $p['p_senha']),
            array('value' => $p['p_id_cidade']),
            array('value' => $p['p_id_profissao']),
            array('value' => $p['p_nm_usuario']),
            array('value' => $p['p_desc_usuario']),
            array('value' => $p['p_nivel_experiencia'])
        );

        $query = $this->db->query("call sp_cadastro(?,?,?,?,?,?,?,?,?)",$params);
        if($query){
            return true;
        }else{
            return false;
        }
    }


}