<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Transaksi extends CI_Model {

    public function get(){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_pembayaran', 'tb_pembayaran.id_pembayaran = tb_transaksi.metode_pembayaran');
        return $this->db->get()->result_array();
    }

    public function getById($id_transaksi){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_pembayaran', 'tb_pembayaran.id_pembayaran = tb_transaksi.metode_pembayaran');
        $this->db->where('tb_transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result_array();
    }

    public function insert($data){
        $this->db->insert('tb_transaksi', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id_transaksi){
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('tb_transaksi', $data);
        return $this->db->affected_rows();
    }

    public function delete($id_transaksi){
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('tb_transaksi');
        return $this->db->affected_rows();
    }


    public function getMetodePembayaran(){
        return $this->db->get('tb_pembayaran')->result_array();
    }

    public function getMetodePembayaranById($id_pembayaran){
        return $this->db->get_where('tb_pembayaran', array('id_pembayaran' => $id_pembayaran))->result_array();
    }

    public function insertMetodePembayaran($data){
        $this->db->insert('tb_pembayaran', $data);
        return $this->db->affected_rows();
    }

    public function updateMetodePembayaran($data, $id_pembayaran){
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('tb_pembayaran', $data);
        return $this->db->affected_rows();
    }

    public function deleteMetodePembayaran($id_pembayaran){
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->delete('tb_pembayaran');
        return $this->db->affected_rows();
    }

}