<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/JwtAuth.php'; 

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation'); 
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
            $this->session->set_userdata('admin_id', $admin['adm_id']);
            redirect('main_controller');
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials.');
            redirect('auth/login');
        }
    }

        
    public function register() {
        $this->load->view('auth/register');
    }

    public function register_process() {
        
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/register');
        } else {
            $password = $this->input->post('password');

           
            if (empty($password)) {
                $this->session->set_flashdata('error', 'Password is required.');
                redirect('auth/register');
            }

            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            
            if (!$password_hash) {
                $this->session->set_flashdata('error', 'Password hashing failed.');
                redirect('auth/register');
            }
    
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $password_hash,
            ];

            $inserted = $this->Admin_model->insert_admin($data['username'], $data['password']);
            
            if ($inserted) {
                $this->session->set_flashdata('success', 'Registration successful!');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Registration failed!');
                redirect('auth/register');
            }
        }
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
