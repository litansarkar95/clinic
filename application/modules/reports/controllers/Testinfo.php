<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testinfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("reports_model");
        $this->load->model("billinfo/billinfo_model");
          
    }

    public function index()
    {
        $data = array();
        $data['active'] = "testinfo";
        $data['title'] = " Invoice Reports"; 
      $data['payment_methods'] = $this->db->get('payment_methods')->result();
          $data['allRef']  = $this->billinfo_model->ReferenceList();
        $data['content'] = $this->load->view("testinfo", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
   public function search()
{
    $data = array();
    $data['active'] = "loss_profits";
    $data['title'] = "Profit & Loss"; 

    $filters = [];
    $start_date = $this->input->post('test_from_date');
    $end_date   = $this->input->post('test_to_date');
    
    if ($start_date && $end_date) {
        $filters['from_date'] = strtotime($start_date); 
        $filters['to_date'] = strtotime($end_date . ' 23:59:59'); 
    }
    $data['allSup']     = $this->main_model->InvoiceHeader();
    $data['bill_summary'] = $this->reports_model->get_bill_details_by_date($filters);
    $data['testinfo_summary'] = $this->reports_model->get_testinfo_summary_by_category($filters);
    
    $data['from_date'] = $start_date;
    $data['to_date'] = $end_date;
    //echo "<pre>"; print_r($data['testinfo_summary']);exit();

    $this->load->view('reports/testinfo-summary', $data);
}

public function operationsearch()
{
    $data = array();
    $data['active'] = "loss_profits";
    $data['title'] = "Operation Results"; 

    $filters = [];
    $start_date = $this->input->post('operation_from_date');
    $end_date   = $this->input->post('operation_to_date');
    $surgery_dr_id   = $this->input->post('surgery_dr_id');
    
    if ($start_date && $end_date) {
        $filters['from_date'] = strtotime($start_date); 
        $filters['to_date'] = strtotime($end_date . ' 23:59:59'); 
        $filters['surgery_dr_id'] = $surgery_dr_id;
    }
    $data['allSup']     = $this->main_model->InvoiceHeader();
    $data['allPdt'] = $this->reports_model->get_testinfo_Operation($filters);
    
    $data['from_date'] = $start_date;
    $data['to_date'] = $end_date;
    //echo "<pre>"; print_r($data['testinfo_summary']);exit();

  $this->load->view('reports/transaction/operation-summary', $data);
}

public function patientregistrationsearch()
{
    $data = array();
    $data['active'] = "loss_profits";
    $data['title'] = "Operation Results"; 

    $filters = [];
    $start_date = $this->input->post('patient_from_date');
    $end_date   = $this->input->post('patient_to_date');
    $patient_id   = $this->input->post('patient_id');
    
    if ($start_date && $end_date) {
        $filters['from_date'] = strtotime($start_date); 
        $filters['to_date'] = strtotime($end_date . ' 23:59:59'); 
       
    }
     $filters['patient_id'] = $patient_id;
    $data['allSup']     = $this->main_model->InvoiceHeader();
    $data['allPdt']     = $this->reports_model->get_patient($filters);
    
    $data['from_date'] = $start_date;
    $data['to_date'] = $end_date;
   // echo "<pre>"; print_r($data['allPdt']);exit();

  $this->load->view('reports/transaction/patient-summary', $data);
}
public function collectionsearch()
{
    $data = array();
    $data['active'] = "loss_profits";
    $data['title'] = "Collection Results"; 

    $filters = [];
    $start_date = $this->input->post('collection_from_date');
    $end_date   = $this->input->post('collection_to_date');
    
    if ($start_date && $end_date) {
        $filters['from_date'] = strtotime($start_date); 
        $filters['to_date'] = strtotime($end_date . ' 23:59:59'); 
    }
    $data['allSup']     = $this->main_model->InvoiceHeader();
    $data['allPdt']     = $this->reports_model->get_collection($filters);
    
    $data['from_date'] = $start_date;
    $data['to_date'] = $end_date;
   // echo "<pre>"; print_r($data['allPdt']);exit();

  $this->load->view('reports/transaction/collection-summary', $data);
}
}