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
      
        $data = array();
        $data['active']     = "bill_invoice";
        $data['title']      = "Bill Invoice"; 
        $data['allDst']     =  $this->common_model->view_data("districts", array("is_active" => 1), "id", "DESC");
        $data['allOccu']    =  $this->common_model->view_data("occupation", array("is_active" => 1), "name", "ASC");
        $data['allCountry']    =  $this->common_model->view_data("country", array("is_active" => 1), "name", "ASC");
        $data['allDoctors']    =  $this->common_model->view_data("doctors", array("is_active" => 1), "name", "ASC");
        
        $int_no = $this->billinfo_model->get_next_registration_int_no($month, $year);
        $registration_no = 'R-' . str_pad($int_no, 4, '0', STR_PAD_LEFT);
       
        //serial_no
       // $data['serial_no']  = $this->billinfo_model->get_daily_serial($day, $month, $year);
        // registration_no
        $data['registration_no'] = $registration_no;  
        $data['content']    = $this->load->view("bill-invoice-create", $data, TRUE);
        $this->load->view('layout/master', $data);

    }
    public function list()
    {
      
        $data = array();
        $data['active']     = "bill_invoice_list";
        $data['title']      = "Bill Invoice List"; 
        $data['allPdt']     = $this->billinfo_model->billinfoList();
        $data['content']    = $this->load->view("bill-invoice-list", $data, TRUE);
        $this->load->view('layout/master', $data);

    }


    public function insertorder() {
     
      
        $sales_id = $this->billinfo_model->create();
        if ($sales_id) {

            $this->session->set_flashdata('success', display('save_successfully'));
            redirect(base_url() . "billinfo/invoice/$sales_id", "refresh");
           } else {
            $this->session->set_flashdata('error',  display('please_try_again'));
           }
           redirect(base_url() . "billinfo", "refresh"); 

    }

    
    public function invoice($id)
    {
        $data = array();
        $data['active']     = "sales";
        $data['title']      = "Sales Invoice"; 

        $data['allSup']     = $this->main_model->InvoiceHeader();
        $data['allPdt']     = $this->billinfo_model->BillList($id);
        $data['allDdt']     = $this->billinfo_model->BillDetailsList($id);
     //print_r( $data['allSup'] );exit();
        $this->load->view('billinfo/billinfo-invoice', $data);

    } 

    public function get_address($category_id) {
        $subcategories = $this->sales_model->get_address_by_customer($category_id);
        
        // Return subcategories as JSON
        echo json_encode($subcategories);
    }


    public function assign(){
          // login auth
          $date = date("Y-m-d H:i:s");
          $data = array(   
          
            "sales_id"            => $this->common_model->xss_clean($this->input->post("id")),
            "sales_person_id"     => $this->common_model->xss_clean($this->input->post("shipping_method")),
            "status_id"           => $this->common_model->xss_clean($this->input->post("status_id")),
            "remarks"              => $this->common_model->xss_clean($this->input->post("remarks")),
            "create_date"         => strtotime($date),
        );        
    
        if ($this->common_model->save_data("delivery_status", $data)) {
            $sales_id  = $this->common_model->xss_clean($this->input->post("id"));

            $updatedata = array(   
                "status_id"              => $this->common_model->xss_clean($this->input->post("status_id")),
                "delivery_person_id"     => $this->common_model->xss_clean($this->input->post("shipping_method")),
               
            );      
            $this->common_model->update_data("sales", $updatedata,array("id"=>$sales_id));

            $this->session->set_flashdata('success', 'Update Successfully');
            redirect(base_url() . "sales", "refresh");
            }else{
              
                $this->session->set_flashdata('error', 'Something error.');
            }
            redirect(base_url() . "sales", "refresh");
    }
}