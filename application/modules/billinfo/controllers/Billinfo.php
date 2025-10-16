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
            redirect(base_url() . "billinfo/invoice/$sales_id", "refresh");
          }else{
            
              $this->session->set_flashdata('error',  display('please_try_again'));
          }
        
       redirect(base_url() . "patient/districts", "refresh");
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
    public function list()
    {
      
        $data = array();
        $data['active']     = "bill_invoice_list";
        $data['title']      = "Bill Invoice List"; 
      //  $data['allPdt']     = $this->billinfo_model->billinfoList();
        $data['content']    = $this->load->view("bill-invoice-list", $data, TRUE);
        $this->load->view('layout/master', $data);

    }


  

    
    public function invoice($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = "Sales Invoice"; 
        $data['id']         = $id;

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['allPdt']     = $this->billinfo_model->BillList($id);
        $data['allDdt']     = $this->billinfo_model->BillDetailsList($id);
       // print_r( $data['allPdt'] );exit();
        $this->load->view('billinfo/billinfo-invoice', $data);

    } 
 public function surgeryaplication($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = "Sales Invoice"; 
        $data['id']         = $id;

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['allPdt']     = $this->billinfo_model->BillList($id);
        $data['allDdt']     = $this->billinfo_model->BillDetailsList($id);
       // print_r( $data['allPdt'] );exit();
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

}