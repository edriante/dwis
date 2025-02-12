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
         $data['totalServices'] = $this->Main_model-> getServices();
    
        // Fetch activity logs
        $data['activity_logs'] = $this->Activity_model->get_activity_logs();
    
        $this->load->view('user_interface/main_view', $data);
    }
    
    
    

    public function manageUsers() {
        $data['title'] = 'Manage Users';
        $data['users'] = $this->Main_model->getUsers();
        $this->load->view('user_interface/manageusers', $data);
    }

    public function updateUser($id) {
        $data = $this->input->post();
        if ($this->Main_model->updateUser($id, $data)) {
            redirect('main_controller/manageUsers');
        }
    }

    public function deleteUser($id) {
        if ($this->Main_model->deleteUser($id)) {
            redirect('main_controller/manageUsers');
        }
    }

    public function addCategory() {
        $data['title'] = 'Add Category';
        $this->load->view('user_interface/addcategory', $data);
    }

    public function manageCategories() {
        $data['title'] = 'Manage Categories';
        $data['categories'] = $this->Main_model->getCategory();
        $this->load->view('user_interface/category', $data);
    }
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
}
?>
