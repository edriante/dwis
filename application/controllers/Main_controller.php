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
  
}
?>