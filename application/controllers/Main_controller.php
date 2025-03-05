<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function index() {
        $data['title'] = 'Home Page';
    
        $data['totalUsers'] = $this->Main_model->countTotalUsers();

        $data['usersToday'] = $this->Main_model->countUsersToday();
 
        $data['totalService'] = $this->Main_model->countTotalServices();

        $data['recentServices'] = $this->Main_model->countRecentServices();

        $data['totalServices'] = $this->Main_model->getServices();

        $data['totalPrice'] = array_sum(array_column($data['totalServices'], 'price'));

        $data['totalCategories'] = $this->Main_model->countTotalCategories();

        $data['monthlyCategories'] = $this->Main_model->countMonthlyCategories();

        $this->load->view('user_interface/main_view', $data);
    }

    
    public function manageUsers() {
        $data['title'] = 'Manage Users';
        $data['users'] = $this->Main_model->getUsers();
        $this->load->view('user_interface/manageusers', $data);
    }

    public function updateUser ($id = null) {
        if ($id === null) {
            show_error('Missing User ID', 400);
        }
        
        $data = $this->input->post();
        
        if ($this->Main_model->updateUser ($id, $data)) {
            redirect('Main_controller/manageUsers');
        } else {
            show_error('Failed to update user.', 500);
        }
    }
    
    public function deleteUser ($id = null) {
        if ($id === null) {
            show_error('Missing User ID', 400);
        }
        
        if ($this->Main_model->deleteUser ($id)) {
            redirect('main_controller/manageUsers');
        } else {
            show_error('Failed to delete user.', 500);
        }
    }

     
    public function manageCategories() {
        $data['title'] = 'Manage Categories';
        $data['categories'] = $this->Main_model->getCategories();
        $this->load->view('user_interface/category', $data);
    }

    
    public function editCategory($id) {
      
        $data['category'] = $this->Main_model->getCategoryById($id); 
        if (!$data['category']) {
            show_404(); 
        }
        $this->load->view('admin/edit_category', $data); 
    }

   
    public function updateCategory($id = null) {
        if ($id === null) {
            show_error('Missing Category ID', 400);
        }

       
        $data = array(
            'cat_name' => $this->input->post('cat_name'),
            'img' => $this->input->post('img'),
            'slug' => $this->input->post('slug'),
            'is_active' => $this->input->post('is_active')
        );

       
        if ($this->Main_model->updateCategory($id, $data)) {
            redirect('Main_controller/manageCategories');
        } else {
            show_error('Failed to update category.', 500);
        }
    }

    public function deleteCategory ($id = null) {
        if ($id === null) {
            show_error('Missing User ID', 400);
        }
        
        if ($this->Main_model->deleteCategory ($id)) {
            redirect('main_controller/manageCategories');
        } else {
            show_error('Failed to delete user.', 500);
        }
    }

   
    public function manageServices() {
        $data['title'] = 'Manage Services';
        $data['services'] = $this->Main_model->getServices();
        $this->load->view('user_interface/manageservices', $data);
    }

    public function addServices() {
        $data['title'] = 'Add Services';
        $data['categories'] = $this->Main_model->get_categories(); 
    
        $this->load->view('user_interface/addservices', $data);
    }
    public function addCategories() {
        $data['title'] = 'Add Categories';
        $this->load->view('user_interface/add_category', $data);
    }
    public function addCategory() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10048; 
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            show_error($error, 500);
        } else {
            $uploadData = $this->upload->data();
            $fileName = $uploadData['file_name'];
    
            $data = array(
                'cat_name' => $this->input->post('cat_name'),
                'slug' => $this->input->post('slug'),
                'is_active' => $this->input->post('is_active'),
                'parent_category' => $this->input->post('parent_category'),
                'img' => $fileName
            );
    
            if ($this->Main_model->addCategories($data)) {
                redirect('main_controller/manageCategories');
            } else {
                show_error('Failed to add category.', 500);
            }
        }
    }
    public function addService() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|webp';
        $config['max_size'] = 10048; 
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            show_error($error, 500);
        } else {
            $uploadData = $this->upload->data();
            $fileName = $uploadData['file_name'];
    
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'status' => $this->input->post('status'),
                'category_id' => $this->input->post('category_id'),
                'img' => $fileName
            );
    
            if ($this->Main_model->addService($data)) {
                redirect('main_controller/manageServices');
            } else {
                show_error('Failed to add service.', 500);
            }
        }
    }

    public function delete_service($id = null) {
        if ($id === null) {
            show_error('Missing User ID', 400);
        }
        
        if ($this->Main_model->delete_service($id)) {
            redirect('main_controller/manageServices');
        } else {
            show_error('Failed to delete service.', 500);
        }
    }

    public function edit_user($id) {
        $data['user'] = $this->Main_model->get_user_by_id($id);
        $this->load->view('admin/edit_user', $data);
    }
    
    public function update_user() {
        $this->Main_model->update_user($this->input->post());
        redirect('Main_controller/manageUsers');
    }
    
    public function edit_service($id) {
        $data['service'] = $this->Main_model->get_service_by_id($id);
    
        if (!$data['service']) {
            show_404(); 
        }
    
        $data['services'] = $this->Main_model->getServices(); 
        $this->load->view('admin/edit_service', $data);
    }    
    
    public function update_service($id = null) {
        if (!$id) {
            show_error('Service ID is missing.', 500);
        }
    
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id')   
        );
    
        if ($this->Main_model->update_service($id, $data)) {
            redirect('Main_controller/manageServices');
        } else {
            show_error('Failed to update service.', 500);
        }
    }
    
    
    public function get_chart_data() {
        $data = $this->Main_model->get_services_count();
        echo json_encode($data);
    }

    public function get_users_data() {
        $weeklyUsers = $this->Main_model->get_weekly_users();
        echo json_encode($weeklyUsers);
    }
    public function get_category_counts() {
        $data['totalCategories'] = $this->Main_model->get_total_categories();
        $data['monthlyCategories'] = $this->Main_model->get_monthly_categories();
        return $data;
    }
    
}
?>