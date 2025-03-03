<?php
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

class Categories extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // GET all categories from the services table
    public function index_get() {
        $this->db->select('cat_id, cat_name, img, slug, is_active');
        $services = $this->db->get('categories')->result();
        $this->response($services, REST_Controller::HTTP_OK);
    }

    // GET a single category by ID from the services table
    public function show_get($id) {
        $this->db->select('cat_id, cat_name, img, slug, is_active');
        $service = $this->db->get_where('categories', ['cat_id' => $id])->row();
        if ($service) {
            $this->response($service, REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Category not found'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // POST: Create a new category (if needed)
    public function index_post() {
        $data = $this->post();
        if ($this->db->insert('categories', $data)) {
            $this->response(['message' => 'Category created'], REST_Controller::HTTP_CREATED);
        } else {
            $this->response(['message' => 'Failed to create category'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // PUT: Update a category (if needed)
    public function update_put($id) {
        $data = $this->put();
        $this->db->where('cat_id', $id);
        if ($this->db->update('categories', $data)) {
            $this->response(['message' => 'Category updated'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to update category'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // DELETE: Remove a category (if needed)
    public function delete_delete($id) {
        $this->db->where('cat_id', $id);
        if ($this->db->delete('categories')) {
            $this->response(['message' => 'Category deleted'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to delete category'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}