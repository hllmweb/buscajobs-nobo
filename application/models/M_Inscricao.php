<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Inscricao extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function sp_inscricao($p){
        $params = array(
            array('value' => $p['p_operacao']),
            array('value' => $p['p_empresa']),
            array('value' => $p['p_usuario'])
        );

        $query = $this->db->query("call sp_filter(?,?,?)",$params);
        mysqli_next_result($this->db->conn_id);
        return $query->result_array();

    }

}

?>