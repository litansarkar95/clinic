<?php
class Designation extends MX_Controller
{
  public function __construct() {
    parent::__construct();
 
}

 
public function index()
{

    
  $this->form_validation->set_rules("name", display('name'), "required|is_unique[designation.name]");

  if ($this->form_validation->run() == NULL) {
  
  } else {
    $date = date("Y-m-d H:i:s");
    $data = array(   
        "name"                       => $this->common_model->xss_clean($this->input->post("name")),   
        "is_active"                  => 1,
        "create_date"                => strtotime($date),
       
    );

    if ($this->common_model->save_data("designation", $data)) {
      $id=$this->common_model->Id;

      $this->session->set_flashdata('success', 'Save Successfully');
      }else{
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
          $this->session->set_flashdata('error', 'Something error.');
      }
    
   redirect(base_url() . "staff/designation", "refresh");
  }


  $data = array();
  $data['active'] = "designation";
  $data['title'] = display('create')." ".display('designation'); 
  $data['allPdt'] =  $this->common_model->view_data("designation", "", "id", "asc");
 
  $data['content'] = $this->load->view("staff/designation", $data, TRUE);
 $this->load->view('layout/master', $data);
}

public function delete($id) {
   
    $dt = $this->common_model->view_data("designation", array("id" => $id), "id", "asc");
   
   
    if ($dt) {
   
        $this->common_model->delete_data("designation", array("id" => $id));
        $this->session->set_flashdata('success', 'Delete Successfully');
      
    } else {
        $this->session->set_flashdata('error', 'Something error.');
    }
  
    redirect(base_url() . "staff/designation", "refresh");
  
  }


 
  public function update(){

    $id=$this->input->post("id");
    $selPdt=$this->common_model->view_data("departments",array("id"=>$id),"id","desc");
  
    $data = array(
        "name"                       => $this->common_model->xss_clean($this->input->post("ename")),   
        "commission"                 => $this->common_model->xss_clean($this->input->post("ecommission")),   
        "imap_username"              => $this->common_model->xss_clean($this->input->post("eimap_username")),
        "email"                      => $this->common_model->xss_clean($this->input->post("eemail")),
        "host"                       => $this->common_model->xss_clean($this->input->post("ehost")),
        "password"                   => $this->common_model->xss_clean($this->input->post("epassword")),
        "encryption"                 => $this->common_model->xss_clean($this->input->post("eencryption")),
        "hidefromclient"             => $this->common_model->xss_clean($this->input->post("ehidefromclient")),
        "is_active"                  => $this->common_model->xss_clean($this->input->post("is_active")),
                    
        );


  
        if ($this->common_model->update_data("departments", $data,array("id"=>$id))) {
            $this->session->set_flashdata('success', 'Delete Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Something error.');
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "departments", "refresh");
}

public function change(){

    $id=$this->input->post("id");
    $selPdt=$this->common_model->view_data("staff",array("id"=>$id),"id","desc");
   
    $data = array(
        "password"         => $this->common_model->Encryptor('encrypt', $this->input->post('password')),
                    
        );
        if ($this->common_model->update_data("staff", $data,array("id"=>$id))) {
            $this->session->set_flashdata('success', 'Change Password Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Server error.');
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "staff", "refresh");
}

}


