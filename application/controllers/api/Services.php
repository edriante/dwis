<?php
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

class Services extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('upload');
    }

   
    public function index_get() {
        $services = $this->db->get('services')->result();
        $this->response($services, REST_Controller::HTTP_OK);
    }

    
    public function show_get($id) {
        $service = $this->db->get_where('services', ['id' => $id])->row();
        if ($service) {
            $this->response($service, REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Service not found'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function store_post() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10048; 
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('img')) {
            $error = $this->upload->display_errors();
            $this->response(['message' => 'Image upload failed', 'error' => $error], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        
        $uploadData = $this->upload->data();
        $fileName = $uploadData['file_name'];

        $data = array(
            'name' => $this->post('name'),
            'description' => $this->post('description'),
            'price' => $this->post('price'),
            'status' => $this->post('status'),
            'category_id' => $this->post('category_id'),
            'parent_category' => $this->post('parent_category'),
            'img' => $fileName 
        );

       
        if ($this->db->insert('services', $data)) {
            $this->response(['message' => 'Service created successfully'], REST_Controller::HTTP_CREATED);
        } else {
            $this->response(['message' => 'Failed to create service'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    
    public function update_put($id) {
        $data = $this->put();
        $this->db->where('id', $id);
        if ($this->db->update('services', $data)) {
            $this->response(['message' => 'Service updated'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to update service'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    
    public function delete_delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('services')) {
            $this->response(['message' => 'Service deleted'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to delete service'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
