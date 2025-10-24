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

        


    //     $this->form_validation->set_rules("patient_name", "Patient Name", "required");
    //     $this->form_validation->set_rules("mobile_no","Mobile No", "required");
    //   if ($this->form_validation->run() == NULL) {
      
    //   } else {
    // //      echo '<pre>';
    // // print_r($_POST);
    // // echo '</pre>';
    // // exit;
    

 
       
        

    //     $sales_id = $this->billinfo_model->create();
       
    //     if ($sales_id) {
    //        $this->session->set_flashdata('success', display('save_successfully'));
    //         redirect(base_url() . "billinfo", "refresh");
    //       }else{
            
    //           $this->session->set_flashdata('error',  display('please_try_again'));
    //       }
        
    //    redirect(base_url() . "billinfo", "refresh");
    //   }

      
        $data = array();
        $data['active']     = "bill_invoice";
        $data['title']      = "Create Billing"; 
        $data['allPdt']    =  $this->common_model->view_data("facials", array("is_active" => 1), "name", "ASC");
  
        $int_no = $this->billinfo_model->number_generator();
  	    $registration_no = 'R-'.str_pad($int_no,6,"0",STR_PAD_LEFT);
        //serial_no
       // $data['serial_no']  = $this->billinfo_model->get_daily_serial($day, $month, $year);
        // registration_no
        $data['registration_no'] = $registration_no;  
        $data['content']    = $this->load->view("billing-create", $data, TRUE);
        $this->load->view('layout/master', $data);

    }

     // 🟢 Add product to session (AJAX call)
    public function add_to_session() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $price = $this->input->post('price');

        // আগের session data আনো
        $cart = $this->session->userdata('cart_items') ?? [];

        // নতুন পণ্য যোগ করো
        $cart[$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price
        ];

        // আবার সেভ করো
        $this->session->set_userdata('cart_items', $cart);

        echo json_encode(['status' => 'success', 'cart_count' => count($cart)]);
    }

    // 🟢 Show page with selected products (after Confirm)
    public function confirm_page() {
        $data['cart_items'] = $this->session->userdata('cart_items') ?? [];
    
          $data['content']    = $this->load->view("confirm_page", $data, TRUE);
        $this->load->view('layout/master', $data);
    }

    // 🔴 Remove product from session (AJAX)
public function remove_from_session() {
    $id = $this->input->post('id');
    $cart = $this->session->userdata('cart_items') ?? [];

    if (isset($cart[$id])) {
        unset($cart[$id]); // পণ্যটি রিমুভ করো
        $this->session->set_userdata('cart_items', $cart);
        echo json_encode(['status' => 'success', 'message' => 'Item removed']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Item not found']);
    }
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


$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * 1;
}

$adjustment = floatval($this->input->post('adjustment') ?? 0);
$grand_total = $total + $adjustment;

$summary = [
    'customer_id' => $customer_id,
    'invoice_date' => $date,
    'subtotal' => $total,
    'adjustment' => $adjustment,
    'total_amount' => $grand_total,
    'payment_status' => 'Pending',
    'created_at' => $date
];

$this->db->insert('billing_summary', $summary);
$billing_id = $this->db->insert_id();


    // ৩️⃣ Billing details insert
 foreach ($cart as $item) {
    $detail = [
        'billing_id' => $billing_id,
        'product_id' => $item['id'],
        'product_name' => $item['name'],
        'price' => $item['price'],
        'quantity' => 1,
    ];
    $this->db->insert('billing_details', $detail);
}


    // ৪️⃣ Session clean
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
        $status_id           = $this->input->post("status_id") ;



        // if( $invoice_id == NULL  ){ 
        // $invoice_id        =  0;
        // } 
        
        // if( $this->input->post("from_date") != NULL  ){ 
        // $from_date        =  date("d-m-Y");
        // } 

        // if( $this->input->post("to_date") != NULL  ){
        // $to_date        =  date("d-m-Y");
        // } 

        // if( $status_id == NULL  ){ 
        // $status_id        =  0;
        
        //  } 


      $data['invoice_id']        = $this->input->post("invoice_id") ;
      $data['from_date']         = $this->input->post("from_date") ;
      $data['to_date']           = $this->input->post("to_date") ;
      $data['status_id']         = $this->input->post("status_id") ;



        $data['allPdt']     = $this->billinfo_model->billinfoList($invoice_id,$from_date,$to_date,$status_id );
        //echo "<pre>";  print_r($data['allPdt']);exit();
        $data['content']    = $this->load->view("bill-invoice-list", $data, TRUE);
        $this->load->view('layout/master', $data);

    }


  

    
    public function invoice($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = " Invoice"; 
        $data['id']         = $id;

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['allPdt']     = $this->billinfo_model->BillList($id);
        $data['allDdt']     = $this->billinfo_model->BillDetailsList($id);
        $data['surgery']     = $this->billinfo_model->SurgeryDoctorName($id);
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
							'payment_method'       => 'cash',
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