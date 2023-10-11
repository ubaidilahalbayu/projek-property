<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Customer extends CI_Model {

    public function get(){
        $this->db->select('*');
        $this->db->from('tb_customer');
        $this->db->join('tb_lv_member', 'tb_lv_member.id_member = tb_customer.level_member');
        return $this->db->get()->result_array();
    }

    public function getById($id_customer){
        $this->db->select('*');
        $this->db->from('tb_customer');
        $this->db->join('tb_lv_member', 'tb_lv_member.id_member = tb_customer.level_member');
        $this->db->where('tb_customer.id_customer', $id_customer);
        return $this->db->get()->result_array();
    }

    public function insert($data){
        $this->db->insert('tb_customer', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id_customer){
        $this->db->where('id_customer', $id_customer);
        $this->db->update('tb_customer', $data);
        return $this->db->affected_rows();
    }

    public function delete($id_customer){
        $this->db->where('id_customer', $id_customer);
        $this->db->delete('tb_customer');
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