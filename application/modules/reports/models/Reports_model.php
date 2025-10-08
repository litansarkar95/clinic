<?php

class Reports_model extends CI_Model {

    public function TransactionReports($filters = []) {
        $this->db->select("bill_info.*, patients.pat_name ");
        $this->db->from('bill_info');
		$this->db->join('patients', "bill_info.patient_id = patients.pat_id ",'left');
       
      
        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
            $from_date_timestamp = strtotime($filters['from_date']);
            $to_date_timestamp = strtotime($filters['to_date']);
        
            $this->db->where('bill_info.invoice_date >=', $from_date_timestamp);
            $this->db->where('bill_info.invoice_date <=', $to_date_timestamp);
        }
        
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