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

    
    public function index_get() {
        $this->db->select('cat_id, cat_name, img, slug, is_active, parent_category');
        $services = $this->db->get('categories')->result();
        $this->response($services, REST_Controller::HTTP_OK);
    }

    
    public function show_get($id) {
        $this->db->select('cat_id, cat_name, img, slug, is_active, parent_category');
        $service = $this->db->get_where('categories', ['cat_id' => $id])->row();
        if ($service) {
            $this->response($service, REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Category not found'], REST_Controller::HTTP_NOT_FOUND);
        }
    }

   
    public function index_post() {        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10048; 
        $config['encrypt_name'] = TRUE;
    
        
        $this->upload->initialize($config);
    
       
        if (!$this->upload->do_upload('img')) {
            $error = $this->upload->display_errors();
            $this->response([
                'status' => false,
                'message' => 'Image upload failed',
                'error' => strip_tags($error)
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }
    
        
        $uploadData = $this->upload->data();
        $fileName = $uploadData['file_name'];

        
        $this->form_validation->set_rules('cat_name', 'Category Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->response([
                'status' => false,
                'message' => validation_errors()
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }
    
        
        $data = array(
            'cat_name' => $this->post('cat_name'),
            'slug' => $this->post('slug'),
            'is_active' => $this->post('is_active') ? 1 : 0,
            'parent_category' => $this->post('parent_category'),
            'img' => $fileName 
        );

        
        if ($this->db->insert('categories', $data)) { 
            $this->response([
                'status' => true,
                'message' => 'Category created successfully'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to create category'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


public function update_put($id) {
    $data = $this->put();

    
    $category = $this->db->get_where('categories', ['cat_id' => $id])->row();
    if (!$category) {
        $this->response([
            'status' => false,
            'message' => 'Category not found'
        ], REST_Controller::HTTP_NOT_FOUND);
        return;
    }

   
    $this->form_validation->set_data($data);

    
    $this->form_validation->set_rules('cat_name', 'Category Name', 'required');
    $this->form_validation->set_rules('slug', 'Slug', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->response([
            'status' => false,
            'message' => strip_tags(validation_errors())
        ], REST_Controller::HTTP_BAD_REQUEST);
        return;
    }

    
    if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10048; 
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('img')) {
            $this->response([
                'status' => false,
                'message' => 'Image upload failed',
                'error' => strip_tags($this->upload->display_errors())
            ], REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

       
        if (!empty($category->img) && file_exists('./uploads/' . $category->img)) {
            unlink('./uploads/' . $category->img);
        }

        
        $uploadData = $this->upload->data();
        $data['img'] = $uploadData['file_name'];
    }

   
    if (isset($data['is_active'])) {
        $data['is_active'] = ($data['is_active']) ? 1 : 0;
    }

    
    $this->db->where('cat_id', $id);
    if ($this->db->update('categories', $data)) {
        $this->response([
            'status' => true,
            'message' => 'Category updated successfully'
        ], REST_Controller::HTTP_OK);
    } else {
        $this->response([
            'status' => false,
            'message' => 'Failed to update category'
        ], REST_Controller::HTTP_BAD_REQUEST);
    }
}


    
    public function delete_delete($id) {
        $this->db->where('cat_id', $id);
        if ($this->db->delete('categories')) {
            $this->response(['message' => 'Category deleted'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['message' => 'Failed to delete category'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}