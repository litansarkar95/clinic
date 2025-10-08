<?php
class Dashboard extends MX_Controller
{
  public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("loggedin")) {
          redirect(base_url() . "login", "refresh");
      }
      
    }
  
      

public function index()
{

 
    $data = array();
    $data['active'] = "dashboard";
    $data['title'] = "Dashboard"; 

    $data['content'] = $this->load->view("dashboard", $data, TRUE);
    $this->load->view('layout/master', $data);

  
  }

 



public function setlanguage() {
  echo $language=$this->input->post("lan");
  $this->session->set_userdata("site_lang",$language);
  $this->session->set_flashdata("success","Successful Language ".ucfirst($language));

}

}


