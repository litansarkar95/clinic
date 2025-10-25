<?php

class Reports_model extends CI_Model {

      public function TransactionReports($filters = []) {
    $this->db->select("
        billing_summary.*, 
        customer.name, 
        customer.registration_no
    ");
    $this->db->from('billing_summary');
    $this->db->join('customer', "billing_summary.customer_id = customer.id", 'left');

    $branch_id  = $this->session->userdata("loggedin_branch_id");
    if (!empty($branch_id)) {
        $this->db->where("billing_summary.branch_id", $branch_id); 
    }

 
    if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
        $from_date = date('Y-m-d 00:00:00', strtotime($filters['from_date']));
        $to_date   = date('Y-m-d 23:59:59', strtotime($filters['to_date']));

        $this->db->where('billing_summary.invoice_date >=', $from_date);
        $this->db->where('billing_summary.invoice_date <=', $to_date);
    }

    $query = $this->db->get();
    return $query->result();
}



public function paymentTransactionReports($filters = []) {
    $this->db->select("
        billing_summary.*, 
        customer.name, 
        customer.registration_no,
        GROUP_CONCAT(CONCAT(payment_methods.method_name, ' (৳', billing_payment.amount, ')') SEPARATOR ', ') AS payment_details
    ");
    $this->db->from('billing_summary');
    $this->db->join('customer', "billing_summary.customer_id = customer.id", 'left');
    $this->db->join('billing_payment', "billing_payment.billing_id = billing_summary.id", 'left');
    $this->db->join('payment_methods', "payment_methods.id = billing_payment.payment_method_id", 'left');

    // ✅ শাখা অনুযায়ী ফিল্টার
    $branch_id  = $this->session->userdata("loggedin_branch_id");
    if (!empty($branch_id)) {
        $this->db->where("billing_summary.branch_id", $branch_id); 
    }

  
    if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
        $from_date = date('Y-m-d 00:00:00', strtotime($filters['from_date']));
        $to_date   = date('Y-m-d 23:59:59', strtotime($filters['to_date']));
        $this->db->where('billing_summary.invoice_date >=', $from_date);
        $this->db->where('billing_summary.invoice_date <=', $to_date);
    }

  
    if (!empty($filters['payment_method_id'])) {
        $this->db->where('billing_payment.payment_method_id', $filters['payment_method_id']);
    }

    $this->db->group_by('billing_summary.id');
    $query = $this->db->get();
    return $query->result();
}



      public function referencenReports($filters = []) {
    $this->db->select("
        billing_summary.*, 
        customer.name, 
        customer.registration_no,
        GROUP_CONCAT(CONCAT(payment_methods.method_name, ' (৳', billing_payment.amount, ')') SEPARATOR ', ') AS payment_details
    ");
    $this->db->from('billing_summary');
    $this->db->join('customer', "billing_summary.customer_id = customer.id", 'left');
    $this->db->join('billing_payment', "billing_payment.billing_id = billing_summary.id", 'left');
    $this->db->join('payment_methods', "payment_methods.id = billing_payment.payment_method_id", 'left');

    // ✅ শাখা অনুযায়ী ফিল্টার
    $branch_id  = $this->session->userdata("loggedin_branch_id");
    if (!empty($branch_id)) {
        $this->db->where("billing_summary.branch_id", $branch_id); 
    }

  
    if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
        $from_date = date('Y-m-d 00:00:00', strtotime($filters['from_date']));
        $to_date   = date('Y-m-d 23:59:59', strtotime($filters['to_date']));
        $this->db->where('billing_summary.invoice_date >=', $from_date);
        $this->db->where('billing_summary.invoice_date <=', $to_date);
    }

  
    if (!empty($filters['reference_id'])) {
        $this->db->where('billing_summary.reference_id', $filters['reference_id']);
    }

    $this->db->group_by('billing_summary.id');
    $query = $this->db->get();
    return $query->result();
}

}