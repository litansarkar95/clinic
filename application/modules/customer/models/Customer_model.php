<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

 
 

    public function CustomerList( $from_date, $to_date) {

    $this->db->select("customer.* ");
    $this->db->from("customer");
     $branch_id  = $this->session->userdata("loggedin_branch_id");


	 if (!empty($branch_id)) {
             $this->db->where("customer.branch_id", $branch_id); 
	 }


    if (!empty($invoice_id)) {
        $this->db->where("customer.registration_no", $invoice_id); 


    } else {
       
        if (!empty($from_date) && !empty($to_date)) {
            $from_date_str = strtotime($from_date);
            $to_date_str = strtotime($to_date . ' 23:59:59');

            $this->db->where('customer.create_date >=', $from_date_str);
            $this->db->where('customer.create_date <=', $to_date_str);
        }
        if (empty($status_id) && (empty($from_date) || empty($to_date))) {
            return []; 
        }
    }

    $this->db->order_by("id", "DESC");
    return $this->db->get()->result();
}
}
