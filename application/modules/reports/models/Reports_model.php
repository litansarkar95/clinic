<?php

class Reports_model extends CI_Model {

      public function TransactionReports($filters = []) {
        $this->db->select("bill_info.*, patients.name , patients.registration_no ");
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
    $this->db->select("bill_info.*, patients.name, patients.registration_no");
    $this->db->from('bill_info');
    $this->db->join('patients', "bill_info.patient_id = patients.id", 'left');

    if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
        $from_date_timestamp = strtotime($filters['from_date']);
        $to_date_timestamp = strtotime($filters['to_date']);
    
        $this->db->where('bill_info.invoice_date >=', $from_date_timestamp);
        $this->db->where('bill_info.invoice_date <=', $to_date_timestamp);
    }
    $this->db->where_in('bill_info.isPaid', ["Due", "Partially"]);

    $query = $this->db->get();
    return $query->result();
}


        public function get_testinfo_Operation($filters = []) {
        $this->db->select("operation.*  , patients.name, patients.mobile_no , doctors.name doctor_name");
        $this->db->from('operation');
       
        $this->db->join('doctors', "operation.surgery_dr_id = doctors.id", 'left');
        $this->db->join('patients', "operation.patient_id = patients.id", 'left');
        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
         

            $from_date_time = date("Y-m-d",$filters['from_date']);
            $to_date_time = date("Y-m-d",$filters['to_date']);

            $surgery_dr_id = $filters['surgery_dr_id'];
        
            $this->db->where('operation.date >=', $from_date_time);
            $this->db->where('operation.date <=', $to_date_time);
        }

            if (!empty($filters['surgery_dr_id'])) {
         
            $this->db->where('operation.surgery_dr_id', $surgery_dr_id);
        }
        $query = $this->db->get();
        return $query->result();
        
    }
  public function get_patient($filters = []) {
        $this->db->select("patients.*  , doctors.name doctor_name , country.name as nationality , districts.name district, upazila.name upazilla ,occupation.name as occupation" );
        $this->db->from('patients');
       
        $this->db->join('doctors', "patients.doctor_id = doctors.id", 'left');
        $this->db->join('country', "patients.nationality_id = country.id", 'left');
        $this->db->join('districts', "patients.district_id = districts.id", 'left');
        $this->db->join('upazila', "patients.upazilla_id = upazila.id", 'left');
        $this->db->join('occupation', "patients.occupation_id = occupation.id", 'left');
        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
         

            $from_date_time = $filters['from_date'];
            $to_date_time   = $filters['to_date'];

          
        
            $this->db->where('patients.registration_date >=', $from_date_time);
            $this->db->where('patients.registration_date <=', $to_date_time);
        }
          $patient_id = $filters['patient_id'];

            if (!empty($filters['patient_id'])) {
         
            $this->db->where('patients.id', $patient_id);
        }
        $query = $this->db->get();
        return $query->result();
        
    }
      public function get_collection($filters = []) {
        $this->db->select("transactions.* ,patients.name , patients.registration_no , bill_info.invoiceNumber" );
        $this->db->from('transactions');
       
        $this->db->join('patients', "transactions.patient_id = patients.id", 'left');
        $this->db->join('bill_info', "transactions.invoice_id = bill_info.id", 'left');

        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
         

            $from_date_time = $filters['from_date'];
            $to_date_time   = $filters['to_date'];

          
        
            $this->db->where('transactions.transaction_date >=', $from_date_time);
            $this->db->where('transactions.transaction_date <=', $to_date_time);
        }
              $this->db->where('transactions.transaction_type', 'credit');
          
        $query = $this->db->get();
        return $query->result();
        
    }
}