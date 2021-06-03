<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

/*
    CARREGA O INICIO E LISTA AS INFORMAÇÕES
*/

class M_Inicio extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function lista(){
        /*$query = $this->db->query("select * from pessoa");
        return $query->result();*/

        $query = $this->db->query("call sp_pessoa()");
        return $query->result();

    }

}
?>