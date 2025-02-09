<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the Main_model
        $this->load->model('Main_model');
    }

    public function index() {
        $data['title'] = 'Home Page';
        $this->load->view('user_interface/main_view', $data);
    }

    public function manageUsers() {
        $data['title'] = 'Manage Users';
        $data['users'] = $this->Main_model->getUsers();
        $this->load->view('user_interface/manageusers', $data);
    }

    public function addServices() {
        $data['title'] = 'Add Services';
        $this->load->view('user_interface/addservices', $data);
    }

    public function manageServices() {
        $data['title'] = 'Manage Services';
        $data['services'] = $this->Main_model->getServices();
        $this->load->view('user_interface/manageservices', $data);
    }
}
?>
