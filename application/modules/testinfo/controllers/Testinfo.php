<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testinfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("loggedin")) {
            redirect(base_url() . "login", "refresh");
        }
        $this->load->model("testinfo_model");
          
    }

    public function index()
    {
        $data = array();
        $data['active'] = "test_information";
        $data['title'] = "Test Info"; 
        $data['allPdt'] = $this->testinfo_model->TestinfoList();
        $data['allCat'] = $this->common_model->view_data("categories", "", "id", "ASC");
       // echo "<pre>"; print_r($data['allPdt']);exit();
        $data['content'] = $this->load->view("testinfo/testinfo-list", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
	
    public function create()
    {
      $this->form_validation->set_rules("name", display('name'), "required");
      $this->form_validation->set_rules("testFee", "Test Fee", "required");

      if ($this->form_validation->run() == NULL) {
      
      } else {
        $date = date("Y-m-d H:i:s");
        $data = array(   
            "name"                        => $this->common_model->xss_clean($this->input->post("name")),   
            "categories_id"               => $this->common_model->xss_clean($this->input->post("categories_id")),
            "testFee"                     => $this->common_model->xss_clean($this->input->post("testFee")),
            "is_active"                   => 1,
            "create_date"                 => strtotime($date),
          
           
        );
        
   
        if ($this->common_model->save_data("testinfo", $data)) {
          $id=$this->common_model->Id;
    
          $this->session->set_flashdata('success', 'Save Successfully');
          }else{
            
              $this->session->set_flashdata('error', 'Something error.');
          }
        
       redirect(base_url() . "testinfo", "refresh");
      }


      $data = array();
      $data['active'] = "test_information";
      $data['title'] = "Test Info"; 
      $data['allPdt'] = $this->common_model->view_data("testinfo", "", "id", "DESC");
      $data['content'] = $this->load->view("testinfo/testinfo-list", $data, TRUE);
     $this->load->view('layout/master', $data);
    }

    public function delete($id) {

        $dt = $this->common_model->view_data("testinfo", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
    
             
            $this->common_model->delete_data("testinfo", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "testinfo", "refresh");
      
      }


      //edit


      public function update(){
    
        $id=$this->input->post("eid");
        $selPdt=$this->common_model->view_data("testinfo",array("id"=>$id),"id","desc");
      
        $data = array(
            "name"                        => $this->common_model->xss_clean($this->input->post("ename")), 
            "categories_id"               => $this->common_model->xss_clean($this->input->post("ecategories_id")),  
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