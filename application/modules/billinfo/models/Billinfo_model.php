<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billinfo_model extends CI_Model {



	public function create()
	{
		$saveid = $this->session->userdata('loggedin_userid');
	 // inventory 
	 $sales_date = str_replace('/','-',$this->input->post('invoice_date',TRUE));
	 $newdate= date('Y-m-d' , strtotime($sales_date));
	 
	$sales_newdate= strtotime(date('Y-m-d'));
	

	 $sales_id = $this->number_generator();
	 $sales_number = 'R-'.str_pad($sales_id,4,"0",STR_PAD_LEFT);
	 
	 $createdate  = strtotime(date('Y-m-d H:i:s'));

	

	 if($this->input->post('dis_grandTotal',TRUE) == $this->input->post('payment_amount',TRUE) ){
		$isPaid = "Paid";
	 }else  if($this->input->post('dis_grandTotal',TRUE) == $this->input->post('due_amount',TRUE) ){
		$isPaid = "Due";
	 }else{
		$isPaid = "Partially";
	 }
	

	
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $int_no = $this->get_next_registration_int_no($month, $year);
        $registration_no = 'R-' . str_pad($int_no, 4, '0', STR_PAD_LEFT);

$is_surgery = $this->input->post('is_surgery') ? 1 : 0;

	 $data=array(
		 'ip_address'		        => $_SERVER['REMOTE_ADDR'],
		 'date_code'	            => date("y"),
		 'month_code' 		        => date("m"),
		 'code_random'		        => $sales_id,
		 'invoiceNumber'	       	=> $sales_number,
		 'patient_id'	            => $this->input->post('patient_id', TRUE),
		 'subTotal'			                =>	$this->input->post('gtotal_amount', TRUE),
		 'discountType'	                    =>	$this->input->post('discount_type',TRUE),
		 'discountAmount'	                =>	$this->input->post('discountAmount',TRUE),
		 'totalDisAmount'	                =>	($this->input->post('gtotal_amount',TRUE) - $this->input->post('dis_grandTotal', TRUE)),
		 'isPaid'	                        =>	$isPaid,
		 'totalAmount'			            =>	$this->input->post('dis_grandTotal', TRUE),
		 'paidAmount'	                    =>	$this->input->post('payment_amount',TRUE),
		 'dueAmount'	                    =>	$this->input->post('due_amount',TRUE),
		 'paymentType'	                    =>	"Cash",
		 'invoice_date'		                =>	$sales_newdate,
 		 'is_surgery'	                    =>	$is_surgery,
 		 'status'	                        =>	1,
// 		 'create_user'			            =>	$saveid,
		 'created_at'			            =>	$createdate

	 );
	 if( $this->db->insert("bill_info",$data)){
		$returnid = $this->db->insert_id();

		/// Accounts  
		$is_surgery = $this->input->post('is_surgery') ? 1 : 0;
		if($is_surgery  == 1){
			$surgery_data = array(
							'bill_id'           => $returnid,
							'date'              => $this->input->post('surgery_date', TRUE),
							'patient_id'	    => $this->input->post('patient_id', TRUE),
							'surgery_dr_id'	    => $this->input->post('surgery_dr_name', TRUE),
							'serial'            => $this->input->post('serial', TRUE),
							'created_at'	    =>	$createdate
						);

						$this->db->insert('operation', $surgery_data);
					}
		
		// end Accounts
		
		/// Accounts  
			$accdata = array(
							'invoice_id'           => $returnid,
							'patient_id'           => $this->input->post('patient_id', TRUE),
							'amount'               => $this->input->post('gtotal_amount', TRUE),
							'transaction_type'     => 'debit',
							'transaction_date'     => $sales_newdate,
							'status'               => 'success',
							
						);

						$this->db->insert('transactions', $accdata);

						if($this->input->post('payment_amount',TRUE) > 0){
							$taccdata = array(
							'invoice_id'           => $returnid,
							'patient_id'           => $this->input->post('patient_id', TRUE),
							'amount'               => $this->input->post('payment_amount',TRUE),
							'transaction_type'     => 'credit',
							'payment_method'       => 'cash',
							'transaction_date'     => $sales_newdate,
							'status'               => 'success',
							
						);

						$this->db->insert('transactions', $taccdata);
						}
		
		// end Accounts
		
		

			
				// Start Item
				 $productIds = $this->input->post('product_id');  // array of IDs
				$prices = $this->input->post('price');           // array of prices
				$comments = $this->input->post('comments');           // array of prices

					foreach ($productIds as $index => $productId) {
						$data1 = array(
							'bill_id'       => $returnid,
							'test_info_id'  => $productId,
						            'price'         => isset($prices[$index]) ? $prices[$index] : null,
							'comments'      => isset($comments[$index]) ? $comments[$index] : null,
							'create_date'   => $createdate
						);
						

						$this->db->insert('bill_details', $data1);
					}


							//end item
								
	
				return $returnid;

			}

				return 0;

			}



	public function number_generator() {
        
  
		$this->db->select_max('code_random');      
		$this->db->from('bill_info');
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
		 
		 
	public function billinfoList($invoice_id, $from_date, $to_date, $status_id) {

    $this->db->select("bill_info.* , patients.name  , patients.mobile_no");
    $this->db->from("bill_info");
    $this->db->join('patients', "bill_info.patient_id = patients.id",'left');

    if (!empty($invoice_id)) {
        $this->db->where("bill_info.invoiceNumber", $invoice_id); 


    } else {
        if (!empty($status_id)) {
            $this->db->where("bill_info.isPaid", $status_id); 
        }

        if (!empty($from_date) && !empty($to_date)) {
            $from_date_str = strtotime($from_date);
            $to_date_str = strtotime($to_date . ' 23:59:59');

            $this->db->where('bill_info.invoice_date >=', $from_date_str);
            $this->db->where('bill_info.invoice_date <=', $to_date_str);
        }
        if (empty($status_id) && (empty($from_date) || empty($to_date))) {
            return []; 
        }
    }

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
		
				
		
			$this->db->select("bill_details.* , testinfo.name ");
			$this->db->from("bill_details");
			$this->db->join('testinfo', "bill_details.test_info_id = testinfo.id ",'left');
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