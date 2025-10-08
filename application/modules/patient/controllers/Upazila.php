<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upazila extends MX_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model("patient_model");
        if (!$this->session->userdata('loggedin')){
            redirect(base_url() , "refresh");
          }
          
    }
	
    public function index()
    {
      


      $data = array();
      $data['active'] = "upazila";
      $data['title'] = "Upazila"; 
      $data['allClass'] =  $this->common_model->view_data("districts", "", "id", "DESC");
      $data['allPdt'] =  $this->patient_model->UpazilaList();
      $data['content'] = $this->load->view("upazila", $data, TRUE);
     $this->load->view('layout/master', $data);
    }


    public function create()
    {
      

      $this->form_validation->set_rules("name", " Name", "required");
      $this->form_validation->set_rules("districts_id", "Districts Name", "required");
      if ($this->form_validation->run() == NULL) {
      
      } else {
        $date = date("Y-m-d H:i:s");
        $data = array(
            "district_id"                    => $this->common_model->xss_clean($this->input->post("districts_id")),
            "name"                           => $this->common_model->xss_clean($this->input->post("name")),
            "is_active"                      => 1,
            "create_date"                    => strtotime($date),
           
        );

     
        if ($this->common_model->save_data("upazila", $data)) {
          $id = $this->common_model->Id;
    
          $this->session->set_flashdata('success', 'Save Successfully');
          }else{
            
              $this->session->set_flashdata('error', 'Something error.');
          }
        
       redirect(base_url() . "patient/upazila", "refresh");
      }
      $data = array();
      $data['active'] = "upazila";
      $data['title'] = "Upazila"; 
      $data['allClass'] =  $this->common_model->view_data("districts", "", "id", "DESC");
      $data['allPdt'] =  $this->patient_model->UpazilaList();
      $data['content'] = $this->load->view("upazila", $data, TRUE);
     $this->load->view('layout/master', $data);

    }
    public function delete($id) {

        $dt = $this->common_model->view_data("upazila", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
         
            $this->common_model->delete_data("upazila", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "patient/upazila", "refresh");
      
      }
      public function update(){
    
        $id=$this->input->post("eid");
        $selPdt=$this->common_model->view_data("upazila",array("id"=>$id),"id","desc");
      
        $data = array(
            "district_id"                    => $this->common_model->xss_clean($this->input->post("edistricts_id")),
            "name"                           => $this->common_model->xss_clean($this->input->post("ename")),
            "is_active"                      => $this->common_model->xss_clean($this->input->post("is_active")),
                        
            );


          
          
            if ($this->common_model->update_data("upazila", $data,array("id"=>$id))) {
                $this->session->set_flashdata('success', 'Update Successfully');
            }
            else{
                $this->session->set_flashdata('error', 'Something error.');
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "patient/upazila", "refresh");
    }
   

}