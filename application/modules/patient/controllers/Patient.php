<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('patient_model');
    }

   public function index()
    {
      
        $data = array();
        $data['active']     = "patient";
        $data['title']      = "Patient"; 
        
        $invoice_id          = $this->input->post("invoice_id") ;
        $from_date           = $this->input->post("from_date") ;
        $to_date             = $this->input->post("to_date") ;
        $gender_id           = $this->input->post("gender_id") ;



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
      $data['gender_id']         = $this->input->post("gender_id") ;

     $data['allPdt']     = $this->patient_model->patientList($invoice_id,$from_date,$to_date,$gender_id );
  
        $data['content']    = $this->load->view("patient-list", $data, TRUE);
        $this->load->view('layout/master', $data);

    }

      public function create()
    {

        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $int_no = $this->patient_model->get_next_registration_int_no($month, $year);
        $registration_no = 'P-' . str_pad($int_no, 4, '0', STR_PAD_LEFT);

        $serial_no = $this->patient_model->get_daily_serial($day, $month, $year);


       $this->form_validation->set_rules("patient_name", "Name", "required");
       $this->form_validation->set_rules("mobile_no", "Mobile No", "required");
      if ($this->form_validation->run() == NULL) {
      
      } else {

        $is_old_patient = $this->input->post('is_old_patient') ? 1 : 0;

        $date = date("Y-m-d H:i:s");
     
        $data = array(
            "branch_id"             => $this->session->userdata("loggedin_branch_id"), 
            'month'                 => $month,
            'day'                   => $day,
            'year'                  => $year,
            'serial_no'             => $serial_no,
            'registration_int_no'   => $int_no,
            'registration_no'       => $registration_no,
            "name"                  => $this->common_model->xss_clean($this->input->post("patient_name")),
            "registration_date"     => strtotime($this->common_model->xss_clean($this->input->post("registration_date"))),
            "mobile_no"             => $this->common_model->xss_clean($this->input->post("mobile_no")),
            "age"                   => $this->common_model->xss_clean($this->input->post("age")),
            "is_active"             => 1,
            "create_date"           => strtotime($date),
           
        );

        if ($this->common_model->save_data("patients", $data)) {
          $id = $this->common_model->Id;

           

          $this->session->set_flashdata('success', 'Save Successfully');
                 redirect(base_url() . "billinfo", "refresh");
          }else{
            
              $this->session->set_flashdata('error', 'Something error.');
                redirect(base_url() . "patient/create", "refresh");
          }
        
       redirect(base_url() . "patient/create", "refresh");
      }
      
        $data = array();
        $data['active']     = "patient_create";
        $data['title']      = "Patient Registration"; 
        $data['allDst']     =  $this->common_model->view_data("districts", array("is_active" => 1), "id", "DESC");
        $data['allOccu']    =  $this->common_model->view_data("occupation", array("is_active" => 1), "name", "ASC");
        $data['allCountry']    =  $this->common_model->view_data("country", array("is_active" => 1), "name", "ASC");
        $data['allDoctors']    =  $this->common_model->view_data("doctors", array("is_active" => 1), "id", "ASC");
        
     
      // print_r($data['allTest']);exit();
       
        //serial_no
        $data['serial_no']  = $this->patient_model->get_daily_serial($day, $month, $year);
        // registration_no
        $data['registration_no'] = $registration_no;       
        $data['content']    = $this->load->view("patient-create", $data, TRUE);
        $this->load->view('layout/master', $data);

    }


       public function invoice($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = "Sales Invoice"; 
        $data['id']  = $id;

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['patient']      = $this->patient_model->patientBillList($id);
        $data['allTest']      = $this->patient_model->TestInvoiceWhere($id);
    // print_r( $data['allTest'] );exit();
        $this->load->view('patient-invoice', $data);

    } 

    
       public function registrationinvoice($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = "Sales Invoice"; 
        $data['id']  = $id;

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['patient']      = $this->patient_model->patientBillList($id);
        $data['allTest']      = $this->patient_model->TestInvoiceWhere($id);
    // print_r( $data['allTest'] );exit();
        $this->load->view('patient-registration-invoice', $data);
       // $this->load->view('patient-registration-invoice', $data);

    } 

     public function fetch_upazilla() {
       $district_id = $this->input->post('district_id');
       $districts = $this->patient_model->get_upazilla($district_id);
       echo json_encode($districts);
    }


      public function get_doctor_id_by_ref_name() {
        $ref_name_id = $this->input->post('ref_name_id');
        $doctor_info = $this->patient_model->get_doctor_by_ref_name($ref_name_id);
        echo json_encode($doctor_info);
    }


        public function delete($id) {

        $dt = $this->common_model->view_data("patients", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
           
          
            $this->common_model->delete_data("patients", array("id" => $id));
             $this->common_model->delete_data("transactions", array("patient_id" => $id));
             $this->common_model->delete_data("bill_details", array("registration_id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "patient", "refresh");
      
      }
}
