<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testinfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("reports_model");
          
    }

    public function index()
    {
        $data = array();
        $data['active'] = "testinfo";
        $data['title'] = " Testinfo"; 
        $data['content'] = $this->load->view("testinfo", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
   public function search()
{
    $data = array();
    $data['active'] = "loss_profits";
    $data['title'] = "Profit & Loss"; 

    $filters = [];
    $start_date = $this->input->post('from_date');
    $end_date   = $this->input->post('to_date');
    
    if ($start_date && $end_date) {
        // Convert 'from_date' and 'to_date' to timestamps
        $filters['from_date'] = strtotime($start_date); 
        $filters['to_date'] = strtotime($end_date . ' 23:59:59'); // End of day for 'to_date'
    }

    // Fetch the data based on date range
    $data['allPdt'] = $this->reports_model->get_bill_details_by_date($filters);
    
    // Pass the selected dates back to the view
    $data['from_date'] = $start_date;
    $data['to_date'] = $end_date;

    // Optionally, if you need to debug the result:
    echo "<pre>"; print_r($data['allPdt']);exit();

    // Load the view with the data
    $this->load->view('reports/testinfo-summary', $data);
}


}