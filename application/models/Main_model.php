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

    // Add a service
    public function addService($data) {
        return $this->db->insert('services', $data);
    }
    public function addCategories($data) {
        return $this->db->insert('categories', $data);
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

    public function delete_service($id) {
        return $this->db->where('id', $id)->delete('services');
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
   public function getCategories() {
    $this->db->select('cat_id, cat_name, img, slug, is_active, parent_category');
    $query = $this->db->get('categories');
    return $query->result_array(); 
    }

    public function getCategoryById($id) {
        return $this->db->get_where('categories', ['cat_id' => $id])->row_array();
    }
    
    public function updateCategory($id, $data) {
        $this->db->where('cat_id', $id);
        return $this->db->update('categories', $data);
    }

    // Add a new category
    public function addCategory($data) {
        return $this->db->insert('categories', $data);
    }

    public function deleteCategory($id) {
        $this->db->where('cat_id', $id);
        return $this->db->delete('categories');
    }
    
    // Count users registered today
    public function countUsersToday() {
        $this->db->where('DATE(created_at)', date('Y-m-d'));
        return $this->db->count_all_results('users');
    }

    // Count total users
    public function countTotalUsers() {
        return $this->db->count_all('users'); 
    }

    // Count total services
    public function countTotalServices() {
        return $this->db->count_all('services'); 
    }

    // Count services added in the last 7 days
    public function countRecentServices() {
        $this->db->where('created_at >=', date('Y-m-d', strtotime('-7 days')));
        return $this->db->count_all_results('services');
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }
    
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    
    public function get_service_by_id($id) {
        $query = $this->db->get_where('services', ['id' => $id]);
        return $query->row_array(); 
    }
    
    
    public function update_service($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('services', $data);
    }
       
    public function get_services_count() {
        $this->db->select('categories.cat_name as category_name, COUNT(services.id) as service_count');
        $this->db->from('categories');
        $this->db->join('services', 'categories.cat_id = services.category_id', 'left'); 
        $this->db->group_by('categories.cat_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function get_weekly_users() {
        $days = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0
        ];
    
        // Fetch users grouped by the day of the week
        $this->db->select("DAYNAME(created_at) as day, COUNT(*) as count");
        $this->db->where("created_at >=", date('Y-m-d', strtotime('-6 days'))); // Last 7 days
        $this->db->group_by("DAYNAME(created_at)");
        $query = $this->db->get("users");
    
        // Fill the days array with actual data
        foreach ($query->result() as $row) {
            $days[$row->day] = (int) $row->count;
        }
    
        return $days;
    }
    public function addUser($data) {
        return $this->db->insert('users', $data);
    }
   // Add a new admin
    public function add_admin($data) {
    return $this->db->insert('admin', $data);
    }
    public function get_categories() {
        $query = $this->db->get('categories'); 
        return $query->result_array(); 
    }
    public function countTotalCategories() {
        return $this->db->count_all('categories'); 
    }
    public function countMonthlyCategories() {
        $currentMonth = date('Y-m');
        $this->db->where('YEAR(created_at)', date('Y'));
        $this->db->where('MONTH(created_at)', date('m'));
        return $this->db->count_all_results('categories');
    }
    
     
      public function getAdminById($admin_id) {
        $this->db->where('adm_id', $admin_id);  
        $query = $this->db->get('admin');  
        return $query->row_array();  
    }

    
   
    public function update_profile_picture($img_path, $adm_id) {
        $this->db->set('img', $img_path);
        $this->db->where('adm_id', $adm_id);
    
        return $this->db->update('admin');
    }
    public function getUserProfileImage($user_id) {
        $this->db->select('img');
        $this->db->from('admin');
        $this->db->where('adm_id', $user_id);
        $query = $this->db->get();
        
        return $query->row_array();
    }
    
}
?>
