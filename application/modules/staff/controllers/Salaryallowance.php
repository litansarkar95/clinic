<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salaryallowance extends CI_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model("products_model");
          
    }

    public function index()
    {
        $data = array();
        $data['active'] = "salary_allowance";
        $data['title'] = display('salary_allowance')." ".display('list'); 
       // $data['allPdt'] = $this->products_model->ProductsList();
       // echo "<pre>"; print_r($data['allPdt']);exit();
        $data['content'] = $this->load->view("staff/salary_allowance-list", $data, TRUE);
       $this->load->view('layout/master', $data);

    }


}