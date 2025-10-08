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
        //$data['allStatus']            = $this->common_model->view_data("status", array("is_active" => 1), "id", "asc");
        $data['content']    = $this->load->view("patient-list", $data, TRUE);
        $this->load->view('layout/master', $data);

    }

      public function create()
    {
      
        $data = array();
        $data['active']     = "patient_create";
        $data['title']      = "Patient Create"; 
        $data['allDst']     =  $this->common_model->view_data("districts", array("is_active" => 1), "id", "DESC");
        $data['allOccu']    =  $this->common_model->view_data("occupation", array("is_active" => 1), "name", "ASC");
        //$data['allStatus']            = $this->common_model->view_data("status", array("is_active" => 1), "id", "asc");
        $data['content']    = $this->load->view("patient-create", $data, TRUE);
        $this->load->view('layout/master', $data);

    }

     public function fetch_upazilla() {
       $district_id = $this->input->post('district_id');
       $districts = $this->patient_model->get_upazilla($district_id);
     echo json_encode($districts);
    }
}
