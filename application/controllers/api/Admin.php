<?php
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

class Admin extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // GET all admins
    public function index_get() {
        $admins = $this->db->get('admin')->result();
        $this->response($admins, REST_Controller::HTTP_OK);
    }

    // GET a single admin by ID
    public function show_get($id) {
        $admin = $this->db->get_where('admin', ['adm_id' => $id])->row();
        if ($admin) {
            $this->response($admin, REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Admin not found'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // POST: Create a new admin
    public function store_post() {
        $data = $this->post();
        if ($this->db->insert('admin', $data)) {
            $this->response(['message' => 'Admin created'], REST_Controller::HTTP_CREATED);
        } else {
            $this->response(['message' => 'Failed to create admin'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // PUT: Update an admin
    public function update_put($id) {
        $data = $this->put();
        $this->db->where('adm_id', $id);
        if ($this->db->update('admin', $data)) {
            $this->response(['message' => 'Admin updated'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to update admin'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // DELETE: Remove an admin
    public function delete_delete($id) {
        $this->db->where('adm_id', $id);
        if ($this->db->delete('admin')) {
            $this->response(['message' => 'Admin deleted'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to delete admin'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
