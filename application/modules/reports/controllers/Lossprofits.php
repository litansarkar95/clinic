<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lossprofits extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("reports_model");
          
    }

    public function index()
    {
        $data = array();
        $data['active'] = "loss_profits";
        $data['title'] = " Profit & Loss"; 
        $data['content'] = $this->load->view("loss-profits", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
    public function search()
    {
     


      $data = array();
      $data['active'] = "loss_profits";
      $data['title'] = " Profit & Loss"; 

      $filters = [];
    
      if ($this->input->post('from_date') && $this->input->post('to_date')) {
          $filters['from_date'] = $this->input->post('from_date');
          $filters['to_date'] = $this->input->post('to_date');
      }

      $data['allPdt'] = $this->reports_model->Lossprofits($filters);
    
      $data['from_date'] =        $this->input->post('from_date');
      $data['to_date'] =         $this->input->post('to_date');
    
     
      //echo "<pre>"; print_r($data['allPdt']);exit();

     $this->load->view('reports/loss-profits-summary', $data);
    }

}