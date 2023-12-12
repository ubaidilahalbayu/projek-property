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
class Sales extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Model_Sales');
    }

    public function index_get()
    {
        // Users from a data store e.g. database
        $customer = $this->Model_Sales->get();

        $nik_sales = $this->get('nik_sales');

        // If the nik_sales parameter doesn't exist return all the customer

        if ($nik_sales !== NULL){
            $customer = $this->Model_Sales->getById($nik_sales);
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
        if (isset($data['nik_sales'])) {
            if(count($this->Model_Sales->getById($data["nik_sales"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_Sales->insert($data);
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
        if (isset($data['nik_sales']) && isset($data['id_dummy'])) {
            if ($data['nik_sales'] != $data['id_dummy']) {
                if(count($this->Model_Sales->getById($data["nik_sales"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_Sales->update($data, $id_dummy);
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
        $nik_sales = $this->delete('nik_sales');
        $ada = FALSE;
        if(count($this->Model_Sales->getById($nik_sales))>0){
            $ada = TRUE;
        }
        // Validate the nik_sales.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_Sales->delete($nik_sales);
            $message = [
                'status' => TRUE,
                'nik_sales' => $nik_sales,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

}
