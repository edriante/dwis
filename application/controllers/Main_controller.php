<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->model('Activity_model');
    }

    public function index() {
        $data['title'] = 'Home Page';
    
        // Get total users
        $data['totalUsers'] = $this->Main_model->countTotalUsers();
    
        // Get new users registered today
        $data['usersToday'] = $this->Main_model->countUsersToday();

        // Get total services
        $data['totalService'] = $this->Main_model->countTotalServices();

        // Get new services added in the last 7 days
        $data['recentServices'] = $this->Main_model->countRecentServices();

        // Get all services
        $data['totalServices'] = $this->Main_model->getServices();
    
        // Calculate total price of services
        $data['totalPrice'] = array_sum(array_column($data['totalServices'], 'price'));

        // Fetch activity logs
        $data['activity_logs'] = $this->Activity_model->get_activity_logs();

        $this->load->view('user_interface/main_view', $data);
    }

    // Manage Users
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
        $data['categories'] = $this->Main_model->getCategories(); // Correct function name
        $this->load->view('user_interface/category', $data);
    }    

    // Manage Services
    public function manageServices() {
        $data['title'] = 'Manage Services';
        $data['services'] = $this->Main_model->getServices();
        $this->load->view('user_interface/manageservices', $data);
    }

    public function addServices() {
        $data['title'] = 'Add Services';
        $this->load->view('user_interface/addservices', $data);
    }

    public function addService() {
        $data = $this->input->post();
        if ($this->Main_model->addService($data)) {
            redirect('main_controller/manageServices');
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
            show_404(); // Show 404 if service doesn't exist
        }
    
        $data['services'] = $this->Main_model->get_categories(); // Fetch categories
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
            'category' => $this->input->post('category'),
            'parent_category' => $this->input->post('parent_category')
        );
    
        if ($this->Main_model->update_service($id, $data)) {
            redirect('Main_controller/manageServices');
        } else {
            show_error('Failed to update service.', 500);
        }
    }
    
    // Get Chart Data
    public function get_chart_data() {
        $data = $this->Main_model->get_services_count();
        echo json_encode($data);
    }

    public function get_users_data() {
        $weeklyUsers = $this->Main_model->get_weekly_users();
        echo json_encode($weeklyUsers);
    }
}
?>