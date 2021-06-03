<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Filter extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function sp_filter($p){
        $params = array(
            array('value' => $p['p_operacao']),
            array('value' => $p['p_usuario']),
            array('value' => $p['p_cidade']),
            array('value' => $p['p_profissao']),
            array('value' => $p['p_opcao']),
        );

        $query = $this->db->query("call sp_filter(?,?,?,?,?)",$params);
        mysqli_next_result($this->db->conn_id);
        return $query->result_array();

    }



    /*public function check_acesso($p){
        $params = array(
            array('value' => $p['p_cpf']),
            array('value' => $p['p_email']),
            array('value' => $p['p_senha'])
        );

        $query = $this->db->query("call sp_acesso(?,?,?)",$params);
        return $query->result_array();
    }

    public function check_permissao($p){
        $params = array(
            array('value' => $p['p_hash_acesso']),
            array('value' => $p['p_controller'])
        );

        $query = $this->db->query("call sp_permissao(?,?)",$params);
        return $query->result_array();
    }*/

}