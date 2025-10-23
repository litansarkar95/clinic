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
 

    public function patientList($invoice_id, $from_date, $to_date, $status_id) {

    $this->db->select("patients.* ");
    $this->db->from("patients");
     $branch_id  = $this->session->userdata("loggedin_branch_id");


	 if (!empty($branch_id)) {
             $this->db->where("patients.branch_id", $branch_id); 
	 }


    if (!empty($invoice_id)) {
        $this->db->where("patients.registration_no", $invoice_id); 


    } else {
        if (!empty($status_id)) {
            $this->db->where("patients.gender", $status_id); 
        }

        if (!empty($from_date) && !empty($to_date)) {
            $from_date_str = strtotime($from_date);
            $to_date_str = strtotime($to_date . ' 23:59:59');

            $this->db->where('patients.registration_date >=', $from_date_str);
            $this->db->where('patients.registration_date <=', $to_date_str);
        }
        if (empty($status_id) && (empty($from_date) || empty($to_date))) {
            return []; 
        }
    }

    $this->db->order_by("id", "DESC");
    return $this->db->get()->result();
}
public function patientBillList($id)
{
    $this->db->select("patients.*, districts.name as districts , upazila.name upazilla , doctors.name doctor");
    $this->db->from("patients");
    $this->db->join('districts', 'patients.district_id = districts.id', 'left');
    $this->db->join('upazila', 'patients.upazilla_id = upazila.id', 'left');
    $this->db->join('doctors', 'patients.doctor_id = doctors.id', 'left');
    $this->db->where("patients.id", $id);
    $this->db->order_by("patients.id", "DESC");
    return $this->db->get()->row(); 
}
public function TestListWhere()
{
    $this->db->select("testinfo.*");
    $this->db->from("testinfo");
    $this->db->limit(1);
    $this->db->order_by("testinfo.id", "ASC");
   return $this->db->get()->result(); 
}

  
    public function get_daily_serial($day, $month, $year) {
        $this->db->select_max('serial_no');
        $this->db->where('day', $day);
        $this->db->where('month', $month);
        $this->db->where('year', $year);
        $query = $this->db->get('patients');
        $result = $query->row();
        return isset($result->serial_no) ? $result->serial_no + 1 : 1;
    }

    
 public function get_next_registration_int_no($month, $year) {
    $this->db->select('registration_int_no');
    $this->db->where('month', $month);
    $this->db->where('year', $year);
    $this->db->order_by('registration_int_no', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('patients');
    $result = $query->row();

    return isset($result->registration_int_no) ? $result->registration_int_no + 1 : 1;
}

    public function TestInvoiceWhere($id)
    {
    
        $this->db->select("bill_details.*, testinfo.name as tname");
        $this->db->from("bill_details");
        $this->db->join('testinfo', 'bill_details.test_info_id = testinfo.id', 'left');
        $this->db->where("bill_details.registration_id", $id);
        $this->db->order_by("bill_details.id", "ASC");
        return $this->db->get()->result(); 
    }


     public function get_doctor_by_ref_name($ref_name_id) {
         $this->db->select('id_no');
        $this->db->where('id', $ref_name_id);  
        $query = $this->db->get('doctors');  

        return $query->row(); 
    }
}
