<?php
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

class Users extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // GET all users
    public function index_get() {
        $users = $this->db->get('users')->result();
        $this->response($users, REST_Controller::HTTP_OK);
    }

    // GET a single user by ID
    public function show_get($id) {
        $user = $this->db->get_where('users', ['id' => $id])->row();
        if ($user) {
            $this->response($user, REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'User not found'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function users_post() {
        $data = $this->post();

        if (empty($data)) {
            $this->response(['message' => 'No data provided'], REST_Controller::HTTP_BAD_REQUEST);
        }

        if ($this->Main_model->addUser($data)) {
            $this->response(['message' => 'User created successfully'], REST_Controller::HTTP_CREATED);
        } else {
            $this->response(['message' => 'Failed to create user'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // PUT: Update a user
    public function update_put($id) {
        $data = $this->put();
        $this->db->where('id', $id);
        if ($this->db->update('users', $data)) {
            $this->response(['message' => 'User updated'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to update user'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // DELETE: Remove a user
    public function delete_delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('users')) {
            $this->response(['message' => 'User deleted'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to delete user'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
