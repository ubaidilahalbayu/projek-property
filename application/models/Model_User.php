<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Model_User extends CI_Model {

    public function get(){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_lv_user', 'tb_lv_user.id_lv_user = tb_user.level');
        return $this->db->get()->result_array();
    }

    public function getById($username){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_lv_user', 'tb_lv_user.id_lv_user = tb_user.level');
        $this->db->where('tb_user.username', $username);
        return $this->db->get()->result_array();
    }

    public function insert($data){
        $this->db->insert('tb_user', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $username){
        $this->db->where('username', $username);
        $this->db->update('tb_user', $data);
        return $this->db->affected_rows();
    }

    public function delete($username){
        $this->db->where('username', $username);
        $this->db->delete('tb_user');
        return $this->db->affected_rows();
    }


    public function getLvUser(){
        return $this->db->get('tb_lv_user')->result_array();
    }

    public function getLvUserById($id_lv_user){
        return $this->db->get_where('tb_lv_user', array('id_lv_user' => $id_lv_user))->result_array();
    }

    public function insertLvUser($data){
        $this->db->insert('tb_lv_user', $data);
        return $this->db->affected_rows();
    }

    public function updateLvUser($data, $id_lv_user){
        $this->db->where('id_lv_user', $id_lv_user);
        $this->db->update('tb_lv_user', $data);
        return $this->db->affected_rows();
    }

    public function deleteLvUser($id_lv_user){
        $this->db->where('id_lv_user', $id_lv_user);
        $this->db->delete('tb_lv_user');
        return $this->db->affected_rows();
    }

}