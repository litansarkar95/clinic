<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Districts extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('loggedin')){
            redirect(base_url() , "refresh");
          }
          
    }
	
    public function index()
    {
      


      $data = array();
      $data['active'] = "districts";
      $data['title'] = "Districts"; 
     $data['allPdt'] =  $this->common_model->view_data("districts", "", "id", "DESC");
     // echo "<pre>"; print_r($data['allPdt']);exit();
      $data['content'] = $this->load->view("districts", $data, TRUE);
     $this->load->view('layout/master', $data);
    }


    public function create()
    {
      

      $this->form_validation->set_rules("name", display('name'), "required|is_unique[districts.name]");
      if ($this->form_validation->run() == NULL) {
      
      } else {
        $date = date("Y-m-d H:i:s");
        $data = array(
            "name"          => $this->common_model->xss_clean($this->input->post("name")),
            "is_active"     => 1,
            "create_date"   => strtotime($date),
           
        );

        if ($this->common_model->save_data("districts", $data)) {
          $id = $this->common_model->Id;
    
          $this->session->set_flashdata('success', 'Save Successfully');
          }else{
            
              $this->session->set_flashdata('error', 'Something error.');
          }
        
       redirect(base_url() . "patient/districts", "refresh");
      }
      $data = array();
      $data['active'] = "districts";
      $data['title'] = "Districts"; 
      $data['allPdt'] =  $this->common_model->view_data("districts", "", "id", "DESC");
     // echo "<pre>"; print_r($data['allPdt']);exit();
      $data['content'] = $this->load->view("districts", $data, TRUE);
     $this->load->view('layout/master', $data);

    }
    public function delete($id) {

        $dt = $this->common_model->view_data("districts", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
           
          
            $this->common_model->delete_data("districts", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "patient/districts", "refresh");
      
      }
      public function update(){
    
        $id=$this->input->post("eid");
        $selPdt=$this->common_model->view_data("districts",array("id"=>$id),"id","desc");
      
        $data = array(
           "name"                  => $this->common_model->xss_clean($this->input->post("ename")),
           "is_active"             => $this->common_model->xss_clean($this->input->post("is_active")),
                        
            );


           
          
            if ($this->common_model->update_data("districts", $data,array("id"=>$id))) {
                $this->session->set_flashdata('success', 'Update Successfully');
            }
            else{
                $this->session->set_flashdata('error', 'Something error.');
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "patient/districts", "refresh");
    }
   

}