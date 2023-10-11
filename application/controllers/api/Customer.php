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
class Customer extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Model_Customer');
    }

    public function index_get()
    {
        // Users from a data store e.g. database
        $customer = $this->Model_Customer->get();

        $id_customer = $this->get('id_customer');

        // If the id_customer parameter doesn't exist return all the customer

        if ($id_customer !== NULL){
            $customer = $this->Model_Customer->getById($id_customer);
            // echo json_encode($customer);
        }
        // Check if the customer data store contains customer (in case the database result returns NULL)
        if ($customer){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $customer], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No customer were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function index_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['id_customer'])) {
            if(count($this->Model_Customer->getById($data["id_customer"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_Customer->insert($data);
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
        if (isset($data['id_customer']) && isset($data['id_dummy'])) {
            if ($data['id_customer'] != $data['id_dummy']) {
                if(count($this->Model_Customer->getById($data["id_customer"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_Customer->update($data, $id_dummy);
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
        $id_customer = $this->delete('id_customer');
        $ada = FALSE;
        if(count($this->Model_Customer->getById($id_customer))>0){
            $ada = TRUE;
        }
        // Validate the id_customer.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_Customer->delete($id_customer);
            $message = [
                'status' => TRUE,
                'id_customer' => $id_customer,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

    public function member_get()
    {
        // Users from a data store e.g. database
        $member = $this->Model_Customer->getMember();

        $id_member = $this->get('id_member');

        // If the id_member parameter doesn't exist return all the member

        if ($id_member !== NULL){
            $member = $this->Model_Customer->getMemberById($id_member);
        }
        // Check if the member data store contains member (in case the database result returns NULL)
        if ($member){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $member], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No member were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function member_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['id_member'])) {
            if(count($this->Model_Customer->getMemberById($data["id_member"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_Customer->insertMember($data);
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

    public function member_put(){
        $data = $this->put();
        $ada = FALSE;
        if (isset($data['id_member']) && isset($data['id_dummy'])) {
            if ($data['id_member'] != $data['id_dummy']) {
                if(count($this->Model_Customer->getMemberById($data["id_member"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_Customer->updateMember($data, $id_dummy);
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

    public function member_delete()
    {
        $id_member = $this->delete('id_member');
        $ada = FALSE;
        if(count($this->Model_Customer->getMemberById($id_member))>0){
            $ada = TRUE;
        }
        // Validate the id_member.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_Customer->deleteMember($id_member);
            $message = [
                'status' => TRUE,
                'id_member' => $id_member,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

}
