<?php

class Item_model extends CI_Model {

    public function search_items($term) {
        $this->db->like('name', $term);
        $query = $this->db->get('facials');
        return $query->result_array();
    }
}
