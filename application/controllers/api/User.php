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
class User extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Model_User');
    }

    public function index_get()
    {
        // Users from a data store e.g. database
        $users = $this->Model_User->get();

        $username = $this->get('username');

        // If the username parameter doesn't exist return all the users

        if ($username !== NULL){
            $users = $this->Model_User->getById($username);
            // echo json_encode($users);
        }
        // Check if the users data store contains users (in case the database result returns NULL)
        if ($users){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $users], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function index_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['username'])) {
            if(count($this->Model_User->getById($data["username"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_User->insert($data);
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
        if (isset($data['username']) && isset($data['username_dummy'])) {
            if ($data['username'] != $data['username_dummy']) {
                if(count($this->Model_User->getById($data["username"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $username_dummy = $data['username_dummy'];
            unset($data['username_dummy']);
            $upd = $this->Model_User->update($data, $username_dummy);
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
        $username = $this->delete('username');
        $ada = FALSE;
        if(count($this->Model_User->getById($username))>0){
            $ada = TRUE;
        }
        // Validate the username.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_User->delete($username);
            $message = [
                'status' => TRUE,
                'username' => $username,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

    public function lvUser_get()
    {
        // Users from a data store e.g. database
        $level_user = $this->Model_User->getLvUser();

        $id_lv_user = $this->get('id_lv_user');

        // If the id_lv_user parameter doesn't exist return all the level_user

        if ($id_lv_user !== NULL){
            $level_user = $this->Model_User->getLvUserById($id_lv_user);
        }
        // Check if the level_user data store contains level_user (in case the database result returns NULL)
        if ($level_user){
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $level_user], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No level user were found'
            ], REST_Controller::HTTP_OK);//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function lvUser_post()
    {
        $data = $this->post();
        $ada = FALSE;
        if (isset($data['id_lv_user'])) {
            if(count($this->Model_User->getLvUserById($data["id_lv_user"]))>0){
                $ada = TRUE;
            }
        }
        $ins = 0;
        if (!$ada) {
            $ins = $this->Model_User->insertLvUser($data);
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

    public function lvUser_put(){
        $data = $this->put();
        $ada = FALSE;
        if (isset($data['id_lv_user']) && isset($data['id_dummy'])) {
            if ($data['id_lv_user'] != $data['id_dummy']) {
                if(count($this->Model_User->getLvUserById($data["id_lv_user"]))>0){
                    $ada = TRUE;
                }
            }
        }
        $upd = 0;
        if (!$ada) {
            $id_dummy = $data['id_dummy'];
            unset($data['id_dummy']);
            $upd = $this->Model_User->updateLvUser($data, $id_dummy);
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

    public function lvUser_delete()
    {
        $id_lv_user = $this->delete('id_lv_user');
        $ada = FALSE;
        if(count($this->Model_User->getLvUserById($id_lv_user))>0){
            $ada = TRUE;
        }
        // Validate the id_lv_user.
        if (!$ada){
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
            $this->Model_User->deleteLvUser($id_lv_user);
            $message = [
                'status' => TRUE,
                'id_lv_user' => $id_lv_user,
                'message' => 'Deleted the resource'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);//REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

}
