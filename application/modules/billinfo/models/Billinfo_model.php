<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billinfo_model extends CI_Model {



	


	public function number_generator() {
        
  
		$this->db->select_max('code_random');      
		$this->db->from('billing_summary');
		$query = $this->db->get();
		$result =  $query->result_array();
		$invoice_no = $result[0]['code_random'];
		if ($invoice_no != '') {
			$invoice_no = $invoice_no + 1;
		} else {
			$invoice_no = 1;
		}
		return $invoice_no;
		 }
		 
		 
public function billinfoList($invoice_id = null, $from_date = null, $to_date = null)
{
    $branch_id  = $this->session->userdata("loggedin_branch_id");

    if (!empty($branch_id)) {
        $this->db->where("billing_summary.branch_id", $branch_id);
    }
    $this->db->select("
        billing_summary.*, 
        customer.name, 
        customer.mobile_no
    ");
    $this->db->from("billing_summary");
    $this->db->join('customer', "billing_summary.customer_id = customer.id", 'left');
    if (!empty($invoice_id)) {
        $this->db->where("billing_summary.invoice_no", $invoice_id);
    } 
    else {
    
        if (!empty($from_date) && !empty($to_date)) {
            $from_date_fmt = date('Y-m-d', strtotime($from_date));
            $to_date_fmt   = date('Y-m-d', strtotime($to_date));
            $this->db->where('billing_summary.invoice_date >=', $from_date_fmt);
            $this->db->where('billing_summary.invoice_date <=', $to_date_fmt);
        } 
        else {
          
            return [];
        }
    }

    $this->db->order_by("billing_summary.id", "DESC");

    $query = $this->db->get();
    return $query->result();
}




		public function ReferenceList() {
		
			$branch_id  = $this->session->userdata("loggedin_branch_id");
			if (!empty($branch_id)) {
					$this->db->where("staff.branch_id", $branch_id); 
			}
		
			$this->db->select("staff.*");
			$this->db->from("staff");
			$this->db->order_by("id", "DESC");
			return $this->db->get()->result();
		}

			public function BillList($id) {
		
				
		
			$this->db->select("bill_info.* , patients.name , patients.mobile_no , patients.registration_no ,  patients.gender , patients.age , patients.religion , patients.father_husband_name, patients.adult_child, doctors.name doctors_name, doctors.degree,  country.name nationality ,occupation.name occupation");
			$this->db->from("bill_info");
			$this->db->join('patients', "bill_info.patient_id = patients.id ",'left');
			$this->db->join('country', "country.id = patients.nationality_id ",'left');
			$this->db->join('occupation', "occupation.id = patients.occupation_id ",'left');
			$this->db->join('doctors', "patients.doctor_id = doctors.id ",'left');
			$this->db->where("bill_info.id",$id); 
			$this->db->order_by("id", "DESC");
			return $this->db->get()->result();
		}



		public function admissionTicket($id) {
		
				
		
			$this->db->select("bill_info.* , patients.name , patients.mobile_no , patients.registration_no ,  patients.gender ,  patients.village, patients.age , patients.religion , patients.father_husband_name, patients.adult_child, doctors.name doctors_name, doctors.degree,  country.name nationality ,occupation.name occupation , operation.serial ,operation.date");
			$this->db->from("bill_info");
			$this->db->join('patients', "bill_info.patient_id = patients.id ",'left');
			$this->db->join('country', "country.id = patients.nationality_id ",'left');
			$this->db->join('occupation', "occupation.id = patients.occupation_id ",'left');
			$this->db->join('operation', "bill_info.id = operation.bill_id ",'left');
			$this->db->join('doctors', "patients.doctor_id = doctors.id ",'left');
	
			$this->db->where("bill_info.id",$id); 
			$this->db->order_by("id", "DESC");
			return $this->db->get()->result();
		}
		public function BillDetailsList($id) {
		
				
		
			$this->db->select("bill_details.* , facials.name  , facials.regular_price , facials.discount_percentage , facials.discount_amount , facials.offer_price, facials.discount_type");
			$this->db->from("bill_details");
			$this->db->join('facials', "bill_details.test_info_id = facials.id ",'left');
			$this->db->where("bill_details.bill_id",$id); 
			$this->db->order_by("id", "DESC");
			return $this->db->get()->result();
		}


public function get_next_registration_int_no($month, $year) {
    $this->db->select('registration_int_no');
    $this->db->where('month', $month);
    $this->db->where('year', $year);
    $this->db->order_by('registration_int_no', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('bill_info');
    $result = $query->row();

    return isset($result->registration_int_no) ? $result->registration_int_no + 1 : 1;
}

public function searchPatients($search_query) {
    $this->db->select('patients.*, doctors.name as doctor');
    $this->db->from('patients');
    
    $this->db->group_start(); 
    $this->db->like('patients.name', $search_query);
    $this->db->or_like('patients.mobile_no', $search_query);
    $this->db->or_like('patients.registration_no', $search_query);
    $this->db->group_end();
    
    $this->db->join('doctors', 'patients.doctor_id = doctors.id', 'left');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;  
    }
}


public function get_next_serial_for_date($date)
{
    $this->db->select_max('serial');
    $this->db->where('date', $date);
    $query = $this->db->get('operation');

    $row = $query->row();
    if ($row && $row->serial) {
        return $row->serial + 1;
    } else {
        return 1;
    }
}
    public function SurgeryDoctorName($bill_id) {
    $this->db->select('o.id, o.bill_id, o.date, o.patient_id, o.surgery_dr_id, o.serial, o.created_at, 
                       d.name AS doctor_name, d.degree AS doctor_degree');
    $this->db->from('operation o');
    $this->db->join('doctors d', 'o.surgery_dr_id = d.id');
    $this->db->where('o.bill_id', $bill_id);
    $this->db->limit(1); 
    $query = $this->db->get();

    return $query->row();  
}

}