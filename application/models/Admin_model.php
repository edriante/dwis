<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get admin by username
    public function get_admin($username) {
      
        $this->db->where('username', $username); 
    
       
        $query = $this->db->get('admin');  
        
      
        $result = $query->row_array();
        
        
        return $result;
    }

    public function insert_admin($username, $password, $email) {
        
        $data = [
            'username' => $username,
            'password' => $password,
            'email' => $email
        ];
        
        return $this->db->insert('admin', $data);
    }



}
