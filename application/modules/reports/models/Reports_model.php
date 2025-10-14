<?php

class Reports_model extends CI_Model {

   public function get_bill_details_by_date($filters)
{
    $this->db->select('
        bill_details.id,
        bill_details.bill_id,
        bill_details.registration_id,
        bill_details.test_info_id,
        bill_details.price,
        bill_details.create_date,
        bill_details.comments,
        testinfo.name AS test_name,
        testinfo.testFee,
        testinfo.categories_id,
        categories.name AS category_name
    ');
    
    $this->db->from('bill_details');
    $this->db->join('testinfo', 'testinfo.id = bill_details.test_info_id', 'left');
    $this->db->join('categories', 'categories.id = testinfo.categories_id', 'left');

    if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
        $this->db->where('bill_details.create_date >=', $filters['from_date']);
        $this->db->where('bill_details.create_date <=', $filters['to_date']);
    }

    $query = $this->db->get();
    return $query->result();
}

}