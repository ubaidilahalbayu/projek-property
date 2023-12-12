<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Sales extends CI_Model {

    public function get(){
        $this->db->select('*');
        $this->db->from('tb_sales');
        return $this->db->get()->result_array();
    }

    public function getById($nik_sales){
        $this->db->select('*');
        $this->db->from('tb_sales');
        $this->db->where('tb_sales.nik_sales', $nik_sales);
        return $this->db->get()->result_array();
    }

    public function insert($data){
        $this->db->insert('tb_sales', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $nik_sales){
        $this->db->where('nik_sales', $nik_sales);
        $this->db->update('tb_sales', $data);
        return $this->db->affected_rows();
    }

    public function delete($nik_sales){
        $this->db->where('nik_sales', $nik_sales);
        $this->db->delete('tb_sales');
        return $this->db->affected_rows();
    }


    public function getMember(){
        return $this->db->get('tb_lv_member')->result_array();
    }

    public function getMemberById($id_member){
        return $this->db->get_where('tb_lv_member', array('id_member' => $id_member))->result_array();
    }

    public function insertMember($data){
        $this->db->insert('tb_lv_member', $data);
        return $this->db->affected_rows();
    }

    public function updateMember($data, $id_member){
        $this->db->where('id_member', $id_member);
        $this->db->update('tb_lv_member', $data);
        return $this->db->affected_rows();
    }

    public function deleteMember($id_member){
        $this->db->where('id_member', $id_member);
        $this->db->delete('tb_lv_member');
        return $this->db->affected_rows();
    }

}