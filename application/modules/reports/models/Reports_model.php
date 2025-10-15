<?php

class Reports_model extends CI_Model {

      public function TransactionReports($filters = []) {
        $this->db->select("bill_info.*, patients.name ");
        $this->db->from('bill_info');
		$this->db->join('patients', "bill_info.patient_id = patients.id ",'left');
       
      
        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
            $from_date_timestamp = strtotime($filters['from_date']);
            $to_date_timestamp = strtotime($filters['to_date']);
        
            $this->db->where('bill_info.invoice_date >=', $from_date_timestamp);
            $this->db->where('bill_info.invoice_date <=', $to_date_timestamp);
        }
        
        $query = $this->db->get();
        return $query->result();
        
    } 
public function get_bill_details_by_date($filters)
{
    $this->db->select('
        categories.name AS category_name,categories.id cid,
        SUM(testinfo.testFee) AS total_test_fee
    ');
    
    $this->db->from('bill_details');
    $this->db->join('testinfo', 'testinfo.id = bill_details.test_info_id', 'left');
    $this->db->join('categories', 'categories.id = testinfo.categories_id', 'left');
    
    if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
        $this->db->where('bill_details.create_date >=', $filters['from_date']);
        $this->db->where('bill_details.create_date <=', $filters['to_date']);
    }

    $this->db->group_by('categories.name');  // Group by category name
    $query = $this->db->get();
    
    return $query->result();
}
public function get_testinfo_summary_by_category($filters)
{
    $this->db->select('
        categories.name AS category_name,categories.id cid,
        testinfo.name AS test_name,
        COUNT(bill_details.id) AS total_count,
        SUM(testinfo.testFee) AS total_test_fee
    ');
    
    $this->db->from('bill_details');
    $this->db->join('testinfo', 'testinfo.id = bill_details.test_info_id', 'left');
    $this->db->join('categories', 'categories.id = testinfo.categories_id', 'left');
    
    if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
        $this->db->where('bill_details.create_date >=', $filters['from_date']);
        $this->db->where('bill_details.create_date <=', $filters['to_date']);
    }
    
    $this->db->group_by('categories.name, testinfo.name');  // Group by category name and test info name
    $query = $this->db->get();
    
    return $query->result();
}
     public function DueTransactionReports($filters = []) {
        $this->db->select("account_statement.*  , bill_info.invoiceNumber");
        $this->db->from('account_statement');
       
        $this->db->join('bill_info', "account_statement.sales_id = bill_info.id", 'left');
        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
            $from_date_timestamp = strtotime($filters['from_date']);
            $to_date_timestamp = strtotime($filters['to_date']);
        
            $this->db->where('account_statement.transaction_date >=', $from_date_timestamp);
            $this->db->where('account_statement.transaction_date <=', $to_date_timestamp);
        }
         $this->db->where('account_statement.type', "DUE");
        $query = $this->db->get();
        return $query->result();
        
    }

}