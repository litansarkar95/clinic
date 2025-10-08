<?php

class Item_model extends CI_Model {

    public function search_items($term) {
        $this->db->like('name', $term);
        $query = $this->db->get('testinfo');
        return $query->result_array();
    }
}
