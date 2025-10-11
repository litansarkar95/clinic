<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model("products_model");
          
    }

    public function index()
    {
        $data = array();
        $data['active'] = "doctors";
        $data['title'] = "Doctors"; 
        $data['allPdt'] = $this->common_model->view_data("doctors", "", "id", "DESC");
       // echo "<pre>"; print_r($data['allPdt']);exit();
        $data['content'] = $this->load->view("doctors-list", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
	
    public function create()
    {
      $this->form_validation->set_rules("name", display('name'), "required");

      if ($this->form_validation->run() == NULL) {
      
      } else {
        $date = date("Y-m-d H:i:s");
        $data = array(   
            "id_no"                       => $this->common_model->xss_clean($this->input->post("doctor_id")),   
            "name"                        => $this->common_model->xss_clean($this->input->post("name")),   
            "mobile"                      => $this->common_model->xss_clean($this->input->post("mobile_no")),
            "degree"                      => $this->common_model->xss_clean($this->input->post("degree")),
            "is_active"                   => 1,
          
           
        );
        
   
        if ($this->common_model->save_data("doctors", $data)) {
          $id=$this->common_model->Id;
    
          $this->session->set_flashdata('success', 'Save Successfully');
          }else{
            
              $this->session->set_flashdata('error', 'Something error.');
          }
        
       redirect(base_url() . "doctors/create", "refresh");
      }


      $data = array();
      $data['active'] = "doctors";
      $data['title'] = "Create Doctor "; 
      $data['allPdt'] = $this->common_model->view_data("doctors", "", "id", "DESC");
     // echo "<pre>"; print_r($data['allPdt']);exit();
      $data['content'] = $this->load->view("doctors-create", $data, TRUE);
     $this->load->view('layout/master', $data);
    }

    public function delete($id) {

        $dt = $this->common_model->view_data("doctors", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
    
             
            $this->common_model->delete_data("doctors", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "doctors", "refresh");
      
      }


      //edit


      public function update(){
    
        $id=$this->input->post("eid");
        $selPdt=$this->common_model->view_data("testinfo",array("id"=>$id),"id","desc");
      
        $data = array(
            "name"                        => $this->common_model->xss_clean($this->input->post("ename")),   
            "testFee"                     => $this->common_model->xss_clean($this->input->post("etestFee")),
            "is_active"                  => $this->common_model->xss_clean($this->input->post("is_active")),
                        
            );


          
            if ($this->common_model->update_data("testinfo", $data,array("id"=>$id))) {
                $this->session->set_flashdata('success', 'Update Successfully');
            }
            else{
                $this->session->set_flashdata('error', 'Something error.');
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "testinfo", "refresh");
    }



}