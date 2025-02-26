<?php
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

class Services extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // GET all services
    public function index_get() {
        $services = $this->db->get('services')->result();
        $this->response($services, REST_Controller::HTTP_OK);
    }

    // GET a single service by ID
    public function show_get($id) {
        $service = $this->db->get_where('services', ['service_id' => $id])->row();
        if ($service) {
            $this->response($service, REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Service not found'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // POST: Create a new service
    public function store_post() {
        $data = $this->post();
        if ($this->db->insert('services', $data)) {
            $this->response(['message' => 'Service created'], REST_Controller::HTTP_CREATED);
        } else {
            $this->response(['message' => 'Failed to create service'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // PUT: Update a service
    public function update_put($id) {
        $data = $this->put();
        $this->db->where('service_id', $id);
        if ($this->db->update('services', $data)) {
            $this->response(['message' => 'Service updated'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to update service'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // DELETE: Remove a service
    public function delete_delete($id) {
        $this->db->where('service_id', $id);
        if ($this->db->delete('services')) {
            $this->response(['message' => 'Service deleted'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to delete service'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
