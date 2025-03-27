<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/JwtAuth.php'; 

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation'); 
        $this->load->library('session');
        $this->jwt = new JwtAuth();
    }

    
    public function login() {
        $this->load->view('auth/login');
    }

    public function login_process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $admin = $this->Admin_model->get_admin($username);

        if ($admin && password_verify($password, $admin['password'])) {
            $this->set_admin_session($admin);
            redirect('main_controller');
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials.');
            redirect('auth/login');
        }
    }

    private function set_admin_session($admin) {
        $session_data = [
            'admin_id' => $admin['adm_id'],
            'username' => $admin['username'],
            'is_logged_in' => true
        ];
        $this->session->set_userdata($session_data);
    }
        
    public function register() {
        $this->load->view('auth/register');
    }

    
    public function logout() {
        $this->session->unset_userdata('adm_id');
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    
    public function api_login() {
        header("Content-Type: application/json");
        $input = json_decode(trim(file_get_contents("php://input")), true);
        
        if (!isset($input['username']) || !isset($input['password'])) {
            echo json_encode(['status' => false, 'message' => 'Missing credentials.']);
            return;
        }

        $admin = $this->Admin_model->get_admin($input['username']);
        
        if ($admin && password_verify($input['password'], $admin['password'])) {
            $token = $this->jwt->generateToken(['adm_id' => $admin['adm_id']]);
            echo json_encode(['status' => true, 'token' => $token]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Invalid login credentials.']);
        }
    }
}
