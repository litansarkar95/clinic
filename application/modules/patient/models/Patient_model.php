<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

    public function UpazilaList($id = NULL)
    {
        if ($id) {
            $this->db->where("upazila.id", $id);
        }
    
        $this->db->select("upazila.*, districts.name districts "); 
                           
        $this->db->from("upazila");
        $this->db->join('districts', 'upazila.district_id = districts.id', 'left');
        $this->db->order_by("upazila.id", "DESC");
        return $this->db->get()->result(); 
    }

    public function get_upazilla($district_id) {
        $this->db->where('district_id', $district_id);
        $query = $this->db->get('upazila');
        return $query->result_array();
    }
}
