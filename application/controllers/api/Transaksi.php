<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Transaksi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Model_Transaksi');
    }

    public function index_get()
    {
        // Users from a data store e.g. database
        $transaksi = $this->Model_Transaksi->get();

        $id_transaksi = $this->get('id_transaksi');

        // If the id_transaksi parameter doesn't exist return all the transaksi

        if ($id_transaksi !== NULL){
            $transaksi = $this->Model_Transaksi->getById($id_transaksi);
            // echo json_encode($transaksi);
        }
        // Check if the transaksi data store contains transaksi (in case the database result returns NULL)
        if ($transaksi){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $transaksi], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No transaksi were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function index_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['id_transaksi'])) {
            if(count($this->Model_Transaksi->getById($data["id_transaksi"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_Transaksi->insert($data);
        }
        if ($ins > 0) {
            $this->set_response([
                'status' => TRUE,
                'message' => 'Success'
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Insert the resource fail'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_put(){
        $data = $this->put();
        $ada = FALSE;
        if (isset($data['id_transaksi']) && isset($data['id_dummy'])) {
            if ($data['id_transaksi'] != $data['id_dummy']) {
                if(count($this->Model_Transaksi->getById($data["id_transaksi"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_Transaksi->update($data, $id_dummy);
        }
        if ($upd > 0) {
            $this->set_response([
                'status' => TRUE,
                'message' => 'Success'
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Update the resource fail',
                'data' => $data
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_delete()
    {
        $id_transaksi = $this->delete('id_transaksi');
        $ada = FALSE;
        if(count($this->Model_Transaksi->getById($id_transaksi))>0){
            $ada = TRUE;
        }
        // Validate the id_transaksi.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_Transaksi->delete($id_transaksi);
            $message = [
                'status' => TRUE,
                'id_transaksi' => $id_transaksi,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

    public function metodePembayaran_get()
    {
        // Users from a data store e.g. database
        $pembayaran = $this->Model_Transaksi->getMetodePembayaran();

        $id_pembayaran = $this->get('id_pembayaran');

        // If the id_pembayaran parameter doesn't exist return all the pembayaran

        if ($id_pembayaran !== NULL){
            $pembayaran = $this->Model_Transaksi->getMetodePembayaranById($id_pembayaran);
        }
        // Check if the pembayaran data store contains pembayaran (in case the database result returns NULL)
        if ($pembayaran){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $pembayaran], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No level user were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function metodePembayaran_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['id_pembayaran'])) {
            if(count($this->Model_Transaksi->getMetodePembayaranById($data["id_pembayaran"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_Transaksi->insertMetodePembayaran($data);
        }
        if ($ins > 0) {
            $this->set_response([
                'status' => TRUE,
                'message' => 'Success'
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Insert the resource fail'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function metodePembayaran_put(){
        $data = $this->put();
        $ada = FALSE;
        if (isset($data['id_pembayaran']) && isset($data['id_dummy'])) {
            if ($data['id_pembayaran'] != $data['id_dummy']) {
                if(count($this->Model_Transaksi->getMetodePembayaranById($data["id_pembayaran"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_Transaksi->updateMetodePembayaran($data, $id_dummy);
        }
        if ($upd > 0) {
            $this->set_response([
                'status' => TRUE,
                'message' => 'Success'
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Update the resource fail',
                'data' => $data
            ], REST_Controller::HTTP_OK);
        }
    }

    public function metodePembayaran_delete()
    {
        $id_pembayaran = $this->delete('id_pembayaran');
        $ada = FALSE;
        if(count($this->Model_Transaksi->getMetodePembayaranById($id_pembayaran))>0){
            $ada = TRUE;
        }
        // Validate the id_pembayaran.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_Transaksi->deleteMetodePembayaran($id_pembayaran);
            $message = [
                'status' => TRUE,
                'id_pembayaran' => $id_pembayaran,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

}
