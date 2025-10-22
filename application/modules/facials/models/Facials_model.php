<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facials_model extends CI_Model {



		 public function get_facial_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('facials');
        return $query->row_array();
    }

 public function update_facial($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('facials', $data);
    }

}