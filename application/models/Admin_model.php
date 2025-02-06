<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get admin by username
    public function get_admin($username) {
      // Ensure the username is safe for querying
        $this->db->where('username', $username); 
    
        // Execute the query and return the result
        $query = $this->db->get('admin');  // The table name is 'admin', no need for the array in get_where()
        
        // Return the result as an array or null if no record is found
        $result = $query->row_array();
        
        
        return $result;
    }

    public function insert_admin($username, $password) {
        
        $data = [
            'username' => $username,
            'password' => $password
        ];
        // Insert the data into the 'admin' table
        return $this->db->insert('admin', $data);
    }



}
