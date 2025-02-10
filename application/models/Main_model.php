<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load the database library
        $this->load->database();
    }

    // Fetch all users from the database
    public function getUsers() {
        return $this->db->get('users')->result_array();
    }

    // Fetch all services from the database
    public function getServices() {
        return $this->db->get('services')->result_array();
    }

    // Add a new service to the database
    public function addService($data) {
        return $this->db->insert('services', $data);
    }

    // Delete a service by ID
    public function deleteService($id) {
        $this->db->where('id', $id);
        return $this->db->delete('services');
    }

    // Update a service by ID
    public function updateService($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('services', $data);
    }
    // Add a new category to the database
    public function addCategory($data) {
        return $this->db->insert('categories', $data);
    }
    // Fetch all category from the database
    public function getCategory() {
        return $this->db->get('categories')->result_array();
    }
    //Update a category by ID
    public function updateCategory($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }
}
?>
