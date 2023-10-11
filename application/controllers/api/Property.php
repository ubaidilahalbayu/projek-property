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
class Property extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Model_Property');
    }

    public function index_get()
    {
        // Users from a data store e.g. database
        $property = $this->Model_Property->get();

        $id_property = $this->get('id_property');

        // If the property parameter doesn't exist return all the property

        if ($id_property !== NULL){
            $property = $this->Model_Property->getById($id_property);
            // echo json_encode($property);
        }
        // Check if the property data store contains property (in case the database result returns NULL)
        if ($property){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $property], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No property were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function index_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['id_property'])) {
            if(count($this->Model_Property->getById($data["id_property"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_Property->insert($data);
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
        if (isset($data['id_property']) && isset($data['id_dummy'])) {
            if ($data['id_property'] != $data['id_dummy']) {
                if(count($this->Model_Property->getById($data["id_property"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_Property->update($data, $id_dummy);
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
        $id_property = $this->delete('id_property');
        $ada = FALSE;
        if(count($this->Model_Property->getById($id_property))>0){
            $ada = TRUE;
        }
        // Validate the id_property.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_Property->delete($id_property);
            $message = [
                'status' => TRUE,
                'id_property' => $id_property,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

    public function tipeUnit_get()
    {
        // Users from a data store e.g. database
        $data = $this->Model_Property->getTipeUnit();

        $id_tipe = $this->get('id_tipe');

        // If the id_tipe parameter doesn't exist return all the id_tipe

        if ($id_tipe !== NULL){
            $data = $this->Model_Property->getTipeUnitById($id_tipe);
        }
        // Check if the id_tipe data store contains id_tipe (in case the database result returns NULL)
        if ($data){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $data], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No id_tipe were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function tipeUnit_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['id_tipe'])) {
            if(count($this->Model_Property->getTipeUnitById($data["id_tipe"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_Property->insertTipeUnit($data);
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

    public function tipeUnit_put(){
        $data = $this->put();
        $ada = FALSE;
        if (isset($data['id_tipe']) && isset($data['id_dummy'])) {
            if ($data['id_tipe'] != $data['id_dummy']) {
                if(count($this->Model_Property->getTipeUnitById($data["id_tipe"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_Property->updateTipeUnit($data, $id_dummy);
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

    public function tipeUnit_delete()
    {
        $id_tipe = $this->delete('id_tipe');
        $ada = FALSE;
        if(count($this->Model_Property->getTipeUnitById($id_tipe))>0){
            $ada = TRUE;
        }
        // Validate the id_tipe.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_Property->deleteTipeUnit($id_tipe);
            $message = [
                'status' => TRUE,
                'id_tipe' => $id_tipe,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

}
