<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model {
    public function get_activity_logs() {
        // Fetch activity logs from the database
        $this->db->order_by('timestamp', 'DESC'); // Order by timestamp descending
        $query = $this->db->get('activity_logs'); // Get all records from activity_logs
        return $query->result_array(); // Return the result as an array
    }
}
?>