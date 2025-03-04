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

    
    public function index_get() {
        $admins = $this->db->get('admin')->result();
        $this->response($admins, REST_Controller::HTTP_OK);
    }

    
    public function show_get($id) {
        $admin = $this->db->get_where('admin', ['adm_id' => $id])->row();
        if ($admin) {
            $this->response($admin, REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Admin not found'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    
    public function store_post() {
        $data = json_decode(file_get_contents("php://input"), true);

        
        if (!isset($data['username']) || !isset($data['password'])) {
            $this->response(['message' => 'Username and Password are required'], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        
        $existing = $this->db->get_where('admin', ['username' => $data['username']])->row();
        if ($existing) {
            $this->response(['message' => 'Username already taken'], REST_Controller::HTTP_CONFLICT);
            return;
        }

       
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        
        if ($this->db->insert('admin', $data)) {
            $insert_id = $this->db->insert_id();
            $this->response([
                'message' => 'Admin created successfully',
                'admin_id' => $insert_id
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response(['message' => 'Failed to create admin'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    
    public function update_put($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        
        
        if (isset($data['username'])) {
            $existing = $this->db->get_where('admin', ['username' => $data['username'], 'adm_id !=' => $id])->row();
            if ($existing) {
                $this->response(['message' => 'Username already taken'], REST_Controller::HTTP_CONFLICT);
                return;
            }
        }

       
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        $this->db->where('adm_id', $id);
        if ($this->db->update('admin', $data)) {
            $this->response(['message' => 'Admin updated successfully'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to update admin'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    
    public function delete_delete($id) {
        $this->db->where('adm_id', $id);
        if ($this->db->delete('admin')) {
            $this->response(['message' => 'Admin deleted'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to delete admin'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
