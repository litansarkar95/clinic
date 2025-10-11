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
	 $sales_number = 'INV-'.str_pad($sales_id,6,"0",STR_PAD_LEFT);
	 
	 $createdate  = strtotime(date('Y-m-d H:i:s'));

	

	 if($this->input->post('dis_grandTotal',TRUE) == $this->input->post('payment_amount',TRUE) ){
		$isPaid = "Paid";
	 }else  if($this->input->post('dis_grandTotal',TRUE) == $this->input->post('due_amount',TRUE) ){
		$isPaid = "Due";
	 }else{
		$isPaid = "Partially";
	 }
	$pat_id =  $this->input->post('reg_id', TRUE) ;

	 if($pat_id > 0){
		$patient_id =  $this->input->post('reg_id', TRUE) ;
	 }else{

		$psdata = array(
            'pat_name'      => $this->input->post('pat_name'),
            'pat_address'   => $this->input->post('pat_address'),
            'pat_mobile'    => $this->input->post('pat_mobile'),
            'pat_sex'       => $this->input->post('pat_sex'),
            'pat_age'       => $this->input->post('pat_age'),
           // 'pat_age_type'  => $this->input->post('pat_age_type')
        );
		if( $this->db->insert("patients",$psdata)){
			$patient_id = $this->db->insert_id();

		}
	 }


	 $data=array(
		 'ip_address'						=>	$_SERVER['REMOTE_ADDR'],
		 'date_code'						=>  date("y"),
		 'month_code' 						=>  date("m"),
		 'code_random'			    		=>	$sales_id,
		 'invoiceNumber'	       			=>	$sales_number,
		 'patient_id'			            =>	$patient_id,
		 'doctor_id'			            =>  $this->input->post('doct_reg_id', TRUE) ,
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
 		 'status'	                        =>	1,
// 		 'create_user'			            =>	$saveid,
		 'created_at'			            =>	$createdate

	 );
	 if( $this->db->insert("bill_info",$data)){
		$returnid = $this->db->insert_id();
		
		/// Accounts  
			$accdata = array(
							'sales_id'           => $returnid,
							'transaction_date'   => $sales_newdate,
							'debit'              => $this->input->post('dis_grandTotal', TRUE),
							'credit'             => $this->input->post('payment_amount',TRUE),
						);

						$this->db->insert('account_statement', $accdata);
		
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
		 
		 
		 public function billinfoList($id=NULL) {
			if($id){
				$this->db->where("bill_info.id",$id); 
			}
			$this->db->select("bill_info.* , patients.pat_name 	, patients.pat_mobile");
			$this->db->from("bill_info");
			$this->db->join('patients', "bill_info.patient_id = patients.pat_id ",'left');
		
			$this->db->order_by("id", "DESC");
			return $this->db->get()->result();
		}

		public function BillList($id) {
		
				
		
			$this->db->select("bill_info.* , patients.pat_name 	, patients.pat_mobile , patients.pat_address, patients.pat_sex , patients.pat_age , patients.pat_age_type, doctor.name , doctor.degree");
			$this->db->from("bill_info");
			$this->db->join('patients', "bill_info.patient_id = patients.pat_id ",'left');
			$this->db->join('doctor', "bill_info.doctor_id = doctor.id ",'left');
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
}