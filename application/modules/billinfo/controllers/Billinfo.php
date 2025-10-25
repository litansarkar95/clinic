<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billinfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("loggedin")) {
            redirect(base_url() . "login", "refresh");
        }
         $this->load->model('billinfo_model');
      
          
    }
    public function index()
    {
        $day = date('d');
        $month = date('m');
        $year = date('Y');

        


        $this->form_validation->set_rules("patient_name", "Patient Name", "required");
        $this->form_validation->set_rules("mobile_no","Mobile No", "required");
      if ($this->form_validation->run() == NULL) {
      
      } else {
    //      echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit;
    

 
       
        

        $sales_id = $this->billinfo_model->create();
       
        if ($sales_id) {
           $this->session->set_flashdata('success', display('save_successfully'));
            redirect(base_url() . "billinfo", "refresh");
          }else{
            
              $this->session->set_flashdata('error',  display('please_try_again'));
          }
        
       redirect(base_url() . "billinfo", "refresh");
      }

      
        $data = array();
        $data['active']     = "bill_invoice";
        $data['title']      = "Bill Invoice"; 
        $data['allDst']     =  $this->common_model->view_data("districts", array("is_active" => 1), "id", "DESC");
        $data['allOccu']    =  $this->common_model->view_data("occupation", array("is_active" => 1), "name", "ASC");
        $data['allCountry']    =  $this->common_model->view_data("country", array("is_active" => 1), "name", "ASC");
        $data['allDoctors']    =  $this->common_model->view_data("doctors", array("is_active" => 1), "name", "ASC");
        
  
        $int_no = $this->billinfo_model->number_generator();
  	    $registration_no = 'R-'.str_pad($int_no,6,"0",STR_PAD_LEFT);
        //serial_no
       // $data['serial_no']  = $this->billinfo_model->get_daily_serial($day, $month, $year);
        // registration_no
        $data['registration_no'] = $registration_no;  
        $data['content']    = $this->load->view("billing-create", $data, TRUE);
        $this->load->view('layout/master', $data);

    }


        public function create()
    {
        $day = date('d');
        $month = date('m');
        $year = date('Y');

     //print_r($data['cart']);exit();
        $data = array();
        $data['active']     = "bill_invoice";
        $data['title']      = "Create Billing"; 
        $data['allPdt']    =  $this->common_model->view_data("facials", array("is_active" => 1), "name", "ASC");
  
        $int_no = $this->billinfo_model->number_generator();
  	    $registration_no = 'R-'.str_pad($int_no,6,"0",STR_PAD_LEFT);
        
       $cart =  $this->session->userdata('cart_items') ?? [];
       $data['cart'] = $cart; 
        //serial_no
       // $data['serial_no']  = $this->billinfo_model->get_daily_serial($day, $month, $year);
        // registration_no
        $data['registration_no'] = $registration_no;  
        $data['content']    = $this->load->view("billing-create", $data, TRUE);
        $this->load->view('layout/master', $data);

    }


 public function add_to_session() {
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $regular_price = (float)$this->input->post('regular_price'); // আসল দাম
    $offer_price = (float)$this->input->post('price');     // অফার দাম, যদি থাকে

    $cart = $this->session->userdata('cart_items') ?? [];

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
    } else {
        $cart[$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $offer_price, // কার্টে দেখানোর দাম
            'original_price' => $regular_price, // আসল দাম
            'qty' => 1
        ];
    }

    $this->session->set_userdata('cart_items', $cart);

    // Cart summary
    $cart_count = 0;
    $cart_total = 0;
    $subtotal = 0;
    $discount_total = 0;

    foreach ($cart as $item) {
        $cart_count += $item['qty'];
        $cart_total += $item['price'] * $item['qty'];
        $subtotal += $item['original_price'] * $item['qty'];
    }

    $discount_total = $subtotal - $cart_total;

    echo json_encode([
        'status' => 'success',
        'cart_count' => $cart_count,
        'qty' => 1,
        'subtotal' => number_format($subtotal, 2),
        'discount' => number_format($discount_total, 2),
        'cart_total' => number_format($cart_total, 2)
    ]);
}


    public function confirm_page() {
        $data = array();
        $data['active']     = "bill_invoice";
        $data['title']      = "Create Billing"; 
        $data['cart_items'] = $this->session->userdata('cart_items') ?? [];
       // print_r($data['cart_items']);exit();
        $data['payment_methods'] = $this->db->get('payment_methods')->result();
        $int_no = $this->billinfo_model->number_generator();
  	    $registration_no = 'INV-'.str_pad($int_no,6,"0",STR_PAD_LEFT);
        //serial_no
       // $data['serial_no']  = $this->billinfo_model->get_daily_serial($day, $month, $year);
        // registration_no
        $data['registration_no'] = $registration_no;  
        $data['allRef']  = $this->billinfo_model->ReferenceList();
        $data['content']    = $this->load->view("confirm_page", $data, TRUE);
        $this->load->view('layout/master', $data);
    }

 public function get_payment_methods() {
    $methods = $this->db->get('payment_methods')->result();
    echo json_encode($methods);
}

public function remove_from_session()
{
    $id = $this->input->post('id');
    $cart = $this->session->userdata('cart_items') ?? [];

    if (isset($cart[$id])) {
        unset($cart[$id]);
        $this->session->set_userdata('cart_items', $cart);

        // নতুন মোট হিসাব করো
        $cart_total = 0;
        foreach ($cart as $item) {
            $cart_total += $item['price'];
        }

        echo json_encode([
            'status' => 'success',
            'cart_total' => $cart_total
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Item not found in cart']);
    }
}
public function remove_from_billing() {
    $id = $this->input->post('id');
    $cart = $this->session->userdata('cart_items') ?? [];

    if (isset($cart[$id])) {
        unset($cart[$id]);
        $this->session->set_userdata('cart_items', $cart);
    }

    // সারাংশ পুনঃগণনা
    $cart_count = 0;
    $cart_total = 0;
    foreach ($cart as $item) {
        $cart_count += $item['qty'];
        $cart_total += $item['price'] * $item['qty'];
    }

    echo json_encode([
        'status' => 'removed',
        'cart_count' => $cart_count,
        'cart_total' => number_format($cart_total, 2)
    ]);
}


public function search_customer()
{
    $query = $this->input->post('query');
    $this->db->like('name', $query);
    $this->db->or_like('mobile_no', $query);
    $result = $this->db->get('customer')->result_array();

    echo json_encode($result);
}
public function save_bill()
{
    $customer_id = $this->input->post('patient_id');
    $name = trim($this->input->post('customer_name'));
    $mobile = trim($this->input->post('mobile_no'));
    $date = date('Y-m-d H:i:s'); 

    // Customer check/insert
    if (empty($customer_id)) {
        $existing = $this->db->get_where('customer', ['mobile_no' => $mobile])->row();
        if ($existing) {
            $customer_id = $existing->id;
        } else {
            $data = [
                'branch_id' =>  $this->session->userdata("loggedin_branch_id"),
                'registration_no' => 'CUST-' . time(),
                'name' => $name,
                'mobile_no' => $mobile,
                'is_active' => 1,
                'create_date' => strtotime($date)
            ];
            $this->db->insert('customer', $data);
            $customer_id = $this->db->insert_id();
        }
    }

    $cart = $this->session->userdata('cart_items');
    if (empty($cart)) {
        redirect('billinfo/create'); 
    }

    // Without OfferTotal calculation
    $total = 0;
    foreach ($cart as $item) {
        $original_price += $item['original_price'] * 1;
    }

   
    $original_price = $original_price ;


     // Total calculation
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * 1;
    }

    $adjustment = floatval($this->input->post('adjustment') ?? 0);
    $grand_total = $total - $adjustment;

    // Billing summary insert
   
        $sales_id = $this->billinfo_model->number_generator();
	   $sales_number = 'R-'.str_pad($sales_id,6,"0",STR_PAD_LEFT);

    $summary = [
        "branch_id"                 => $this->session->userdata("loggedin_branch_id"), 
        "reference_id"              => $this->input->post('reference_id'), 
		//'date_code'	                => date("y"),
		//'month_code' 		        => date("m"),
		'code_random'		        => $sales_id,
		'invoice_no'	         	=> $sales_number,
        'customer_id'               => $customer_id,
        'invoice_date'              => $date,
        'original_price'            => $original_price,
        'subtotal'                  => $total,
        'adjustment'                => $adjustment,
        'total_amount'              => $grand_total,
        'payment_status'            => 'Pending',
        "create_id"                 => $this->session->userdata("loggedin_userid"), 
        'created_at'                => $date
    ];

    $this->db->insert('billing_summary', $summary);
    $billing_id = $this->db->insert_id();

    // Billing details insert
    foreach ($cart as $item) {
        $detail = [
            'billing_id' => $billing_id,
            'product_id' => $item['id'],
            'product_name' => $item['name'],
            'original_price' => $item['original_price'],
            'price' => $item['price'],
            'quantity' => 1,
        ];
        $this->db->insert('billing_details', $detail);
    }

    // 🤑 Multiple payments insert
    $payment_amounts = $this->input->post('payment_amount');
    $payment_methods = $this->input->post('payment_method');

    if (!empty($payment_amounts) && !empty($payment_methods)) {
        foreach ($payment_amounts as $key => $amount) {
            $method = $payment_methods[$key] ?? null;
            if ($amount > 0 && $method) {
                $this->db->insert('billing_payment', [
                    'billing_id' => $billing_id,
                    'payment_method_id' => $method,
                    'amount' => $amount,
                    'payment_date' => $date
                ]);
            }
        }
    }

    // Clear session
    $this->session->unset_userdata('cart_items');
    $this->session->set_flashdata('success', 'Save Successfully');
    redirect('billinfo/create');
}




    public function list()
    {
      
        $data = array();
        $data['active']     = "bill_invoice_list";
        $data['title']      = "Bill Invoice List"; 

        $invoice_id          = $this->input->post("invoice_id") ;
        $from_date           = $this->input->post("from_date") ;
        $to_date             = $this->input->post("to_date") ;


        $data['invoice_id']        = $this->input->post("invoice_id") ;
        $data['from_date']         = $this->input->post("from_date") ;
        $data['to_date']           = $this->input->post("to_date") ;



        $data['allPdt']     = $this->billinfo_model->billinfoList($invoice_id,$from_date,$to_date );
        //echo "<pre>";  print_r($data['allPdt']);exit();
        $data['content']    = $this->load->view("bill-invoice-list", $data, TRUE);
        $this->load->view('layout/master', $data);

    }


  

    
    public function invoice($billing_id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = " Invoice"; 
        $data['id']         = $id;

       // Billing summary
        $data['billing_summary'] = $this->db->get_where('billing_summary', ['id' => $billing_id])->row_array();

        // Customer
        $data['customer'] = $this->db->get_where('customer', ['id' => $data['billing_summary']['customer_id']])->row_array();

        // Billing details (Cart items)
        $data['cart_items'] = $this->db->get_where('billing_details', ['billing_id' => $billing_id])->result_array();

        // Payment methods and amounts
        $data['billing_payments'] = $this->db->select('bp.amount, pm.method_name')
            ->from('billing_payment bp')
            ->join('payment_methods pm', 'pm.id = bp.payment_method_id', 'left')
            ->where('bp.billing_id', $billing_id)
            ->get()
            ->result_array();
       // print_r( $data['allPdt'] );exit();
        $this->load->view('billinfo/billinfo-invoice', $data);

    } 
 public function surgeryaplication($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = "ADMISSION TICKET"; 
        $data['id']         = $id;

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['allPdt']     = $this->billinfo_model->admissionTicket($id);
        $data['allDdt']     = $this->billinfo_model->BillDetailsList($id);
       //echo "<pre>"; print_r( $data['allPdt'] );exit();
        $this->load->view('billinfo/surgery-aplication', $data);

    } 


     public function surgicalinvoice($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = "Sales Invoice"; 
        $data['id']         = $id;

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['allPdt']     = $this->billinfo_model->BillList($id);
        $data['allDdt']     = $this->billinfo_model->BillDetailsList($id);
       // print_r( $data['allPdt'] );exit();
        $this->load->view('billinfo/surgical-consent-form', $data);

    } 
     public function searchPatient() {
        // Get the search query
        $search_query = $this->input->post('search_query');

        // Get the patients matching the search query
        $patients = $this->billinfo_model->searchPatients($search_query);

        if ($patients) {
            $response = [
                'status' => 'success',
                'data' => $patients
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No patients found'
            ];
        }

        echo json_encode($response);
    }



    public function get_next_serial()
{
    $date = $this->input->post('date');
    
    if ($date) {
        $next_serial = $this->billinfo_model->get_next_serial_for_date($date);
        echo json_encode(['next_serial' => $next_serial]);
    } else {
        echo json_encode(['next_serial' => 1]);
    }
}




public function account(){
    
        $id = $this->input->post("id");
       $totalamount =  $this->common_model->xss_clean($this->input->post("totalamount"));

        $selPdt = $this->common_model->view_data("bill_info",array("id"=>$id),"id","desc");
      
        foreach($selPdt as $pdt){
            $invoiceNumber = $pdt->invoiceNumber;
            $patient_id = $pdt->patient_id;
            $paidAmount = $pdt->paidAmount;
            $dueAmount = $pdt->dueAmount;
        }

          if($dueAmount == $totalamount){
                        $isPaid = "Paid";
                    }else{
                      $isPaid = "Due";
                    }
      
        $data = array(
           "paidAmount"                  => $paidAmount + $totalamount  ,
           "dueAmount"                   => $dueAmount - $totalamount,
           "isPaid"                      => $isPaid,
                        
            );


          
          
            if ($this->common_model->update_data("bill_info", $data,array("id"=>$id))) {


             // Start 
                   

                    $createdate  = strtotime(date('Y-m-d H:i:s'));

                    $taccdata = array(
							'invoice_id'           => $id,
							'patient_id'           => $patient_id,
							'amount'               => $totalamount,
							'transaction_type'     => 'credit',
							'payment_method_id'       => 'cash',
							'transaction_date'     => $createdate,
							'status'               => 'success',
							
						);

						$this->db->insert('transactions', $taccdata);


             // End


                $this->session->set_flashdata('success', 'Update Successfully');
            }
            else{
                $this->session->set_flashdata('error', 'Something error.');
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "billinfo/list", "refresh");
    }


     public function delete($id) {

        $dt = $this->common_model->view_data("bill_info", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
           
          
            $this->common_model->delete_data("bill_info", array("id" => $id));
             $this->common_model->delete_data("transactions", array("invoice_id" => $id));
             $this->common_model->delete_data("bill_details", array("bill_id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "billinfo/list", "refresh");
      
      }
}