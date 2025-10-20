<?php
class Dashboard extends MX_Controller
{
  public function __construct() {
        parent::__construct();
        $this->load->model("dashboard_model");

        if (!$this->session->userdata("loggedin")) {
          redirect(base_url() . "login", "refresh");
      }
      
    }
  
      

public function index()
{

 
    $data = array();
    $data['active'] = "dashboard";
    $data['title'] = "Dashboard"; 
    $data['today_patient']         = $this->dashboard_model->TodayPatientRegistration();
    $data['today_billing']         = $this->dashboard_model->TodayBilling();
    $data['today_collection']      = $this->dashboard_model->TodayCollection();
    $data['today_due']             = $this->dashboard_model->TodayDue();
    $data['this_month_patient']    = $this->dashboard_model->ThisMonthPatientRegistration();
    $data['this_month_billing']    = $this->dashboard_model->ThisMonthBilling();
    $data['this_month_collection'] = $this->dashboard_model->ThisMonthCollection();
    $data['this_month_due']        = $this->dashboard_model->ThisMonthDue();

    $data['content'] = $this->load->view("dashboard", $data, TRUE);
    $this->load->view('layout/master', $data);

  
  }

 



public function setlanguage() {
  echo $language=$this->input->post("lan");
  $this->session->set_userdata("site_lang",$language);
  $this->session->set_flashdata("success","Successful Language ".ucfirst($language));

}

}


