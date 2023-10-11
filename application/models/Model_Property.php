<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Property extends CI_Model {

    public function get(){
        $this->db->select('*');
        $this->db->from('tb_property');
        $this->db->join('tb_tipe_unit', 'tb_tipe_unit.id_tipe = tb_property.jenis');
        return $this->db->get()->result_array();
    }

    public function getById($id_property){
        $this->db->select('*');
        $this->db->from('tb_property');
        $this->db->join('tb_tipe_unit', 'tb_tipe_unit.id_tipe = tb_property.jenis');
        $this->db->where('tb_property.id_property', $id_property);
        return $this->db->get()->result_array();
    }

    public function insert($data){
        $this->db->insert('tb_property', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id_property){
        $this->db->where('id_property', $id_property);
        $this->db->update('tb_property', $data);
        return $this->db->affected_rows();
    }

    public function delete($id_property){
        $this->db->where('id_property', $id_property);
        $this->db->delete('tb_property');
        return $this->db->affected_rows();
    }


    public function getTipeUnit(){
        return $this->db->get('tb_tipe_unit')->result_array();
    }

    public function getTipeUnitById($id_tipe){
        return $this->db->get_where('tb_tipe_unit', array('id_tipe' => $id_tipe))->result_array();
    }

    public function insertTipeUnit($data){
        $this->db->insert('tb_tipe_unit', $data);
        return $this->db->affected_rows();
    }

    public function updateTipeUnit($data, $id_tipe){
        $this->db->where('id_tipe', $id_tipe);
        $this->db->update('tb_tipe_unit', $data);
        return $this->db->affected_rows();
    }

    public function deleteTipeUnit($id_tipe){
        $this->db->where('id_tipe', $id_tipe);
        $this->db->delete('tb_tipe_unit');
        return $this->db->affected_rows();
    }

}