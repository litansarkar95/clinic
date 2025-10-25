<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionReport extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model("reports_model");
        // $this->load->model("suppliers/suppliers_model");
        // $this->load->model("customer/customer_model");
        
    }

    public function index()
    {
        $data = array();
        $data['active'] = "transactionReport";
        $data['title'] = "Transaction Reports"; 
       // $data['allSup'] = $this->customer_model->CustomersList();
        $data['content'] = $this->load->view("transaction/transaction-new", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
    public function search()
    {
     


      $data = array();
      $data['active'] = "loss_profits";
      $data['title'] = "Transaction Reports";


     
      if ($this->input->post('from_date') && $this->input->post('to_date')) {
          $filters['from_date'] = $this->input->post('from_date');
          $filters['to_date'] = $this->input->post('to_date');
      }
      $data['allSup']     = $this->main_model->InvoiceHeader();
      $data['allPdt'] = $this->reports_model->TransactionReports($filters);
    
      $data['from_date'] =        $this->input->post('from_date');
      $data['to_date'] =         $this->input->post('to_date');
    
     
     // echo "<pre>"; print_r($data['allPdt']);exit();

     $this->load->view('reports/transaction/transaction-summary', $data);
    }


     public function duereports()
    {
        $data = array();
        $data['active'] = "transactionReport";
        $data['title'] = "Transaction Reports"; 
       // $data['allSup'] = $this->customer_model->CustomersList();
        $data['content'] = $this->load->view("transaction/due-transaction-new", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
    public function paymentsearch()
    {
     


      $data = array();
      $data['active'] = "loss_profits";
      $data['title'] = "Transaction Reports";

      $filters = [];
     
      if ($this->input->post('payment_from_date') && $this->input->post('payment_to_date')) {
          $filters['from_date'] = $this->input->post('payment_from_date');
          $filters['to_date'] = $this->input->post('payment_to_date');
      }
         $patient_id   = $this->input->post('patient_id');
    
    if ($this->input->post('payment_method_id')) {
      $filters['payment_method_id'] = $this->input->post('payment_method_id');
       
    }
      $data['allPdt'] = $this->reports_model->paymentTransactionReports($filters);
    
      $data['from_date'] =        $this->input->post('payment_from_date');
      $data['to_date'] =         $this->input->post('payment_to_date');
    
     
    //  echo "<pre>"; print_r($data['allPdt']);exit();

     $this->load->view('reports/transaction/due-summary', $data);
    }

     public function referencesearch()
    {
     


      $data = array();
      $data['active'] = "loss_profits";
      $data['title'] = "Transaction Reports";

      $filters = [];
     
      if ($this->input->post('due_from_date') && $this->input->post('due_to_date')) {
          $filters['from_date'] = $this->input->post('due_from_date');
          $filters['to_date'] = $this->input->post('due_to_date');
      }
         $patient_id   = $this->input->post('patient_id');
    
    if ($this->input->post('reference_id')) {
      $filters['reference_id'] = $this->input->post('reference_id');
       
    }
      $data['allPdt'] = $this->reports_model->referencenReports($filters);
    
      $data['from_date'] =        $this->input->post('due_from_date');
      $data['to_date'] =         $this->input->post('due_to_date');
    
     
    //  echo "<pre>"; print_r($data['allPdt']);exit();

     $this->load->view('reports/transaction/due-summary', $data);
    }
}