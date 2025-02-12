<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all users
    public function getUsers() {
        return $this->db->get('users')->result_array();
    }

    // Get user by ID
    public function getUserById($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    // Add a services
    public function addService($data) {
        return $this->db->insert('services', $data);
    }

    // Update user
    public function updateUser($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Delete user
    public function deleteUser($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    // Count total users
    public function countUsers() {
        return $this->db->count_all('users');
    }

    // Fetch all services
    public function getServices() {
        return $this->db->get('services')->result_array();
    }

    // Fetch all categories
    public function getCategory() {
        return $this->db->get('categories')->result_array();
    }

    // Add a new category
    public function addCategory($data) {
        return $this->db->insert('categories', $data);
    }

        // Update a category
    public function updateCategory($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }
       // Count total users
    public function countUsersToday() {
        $this->db->where('DATE(created_at)', date('Y-m-d'));
        return $this->db->count_all_results('users');
    }
    public function countTotalUsers() {
        return $this->db->count_all('users'); 
    }
    
       // Count total services
    public function countTotalServices() {
    return $this->db->count_all('services'); // Counts all services in the table
    }
      // Count services added in the last 7 days
    public function countRecentServices() {
    $this->db->where('created_at >=', date('Y-m-d', strtotime('-7 days')));
    return $this->db->count_all_results('services');
    }

}
?>
