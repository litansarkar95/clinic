<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facials extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("loggedin")) {
            redirect(base_url() . "login", "refresh");
        }
        $this->load->model("facials_model");
          
    }

    public function index()
    {
        $data = array();
        $data['active'] = "facials";
        $data['title'] = "Facials Info"; 
        $data['allPdt'] = $this->common_model->view_data("facials", "", "id", "ASC");
       // echo "<pre>"; print_r($data['allPdt']);exit();
        $data['content'] = $this->load->view("facials/facials-list", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
	
    public function create()
    {
      $this->form_validation->set_rules("name", display('name'), "required");
      $this->form_validation->set_rules("regular_price", "Regular Price", "required");

      if ($this->form_validation->run() == NULL) {
      
      } else {
        $date = date("Y-m-d H:i:s");
        $data = array(   
               'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'regular_price' => $this->input->post('regular_price'),
                'discount_percentage' => $this->input->post('discount_percentage'),
                'discount_amount' => $this->input->post('discount_amount'),
                'offer_price' => $this->input->post('offer_price'),
                'discount_type' => $this->input->post('discount_type'),
                'offer_start_date' => $this->input->post('offer_start_date'),
                'offer_end_date' => $this->input->post('offer_end_date'),
                'is_active' => 1,
          
           
        );
        
   
        if ($this->common_model->save_data("facials", $data)) {
          $id=$this->common_model->Id;
    
          $this->session->set_flashdata('success', 'Save Successfully');
          }else{
            
              $this->session->set_flashdata('error', 'Something error.');
          }
        
       redirect(base_url() . "facials", "refresh");
      }


      $data = array();
      $data['active'] = "test_information";
      $data['title'] = "Test Info"; 
      $data['allPdt'] = $this->common_model->view_data("facials", "", "id", "DESC");
      $data['content'] = $this->load->view("facials/facials-create", $data, TRUE);
     $this->load->view('layout/master', $data);
    }
 public function edit($id)
    {
        $data = array();
        $data['active'] = "facials";
        $data['title'] = "Facials Info"; 
        $data['allPdt'] = $this->common_model->view_data("facials", array("id" => $id), "id", "asc");
        $data['facial'] = $this->facials_model->get_facial_by_id($id);
        // echo "<pre>"; print_r($data['allPdt']);exit();
        $data['content'] = $this->load->view("facials/facials-edit", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
    public function delete($id) {

        $dt = $this->common_model->view_data("facials", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
    
             
            $this->common_model->delete_data("facials", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "facials", "refresh");
      
      }


      //edit


      public function update($id){
    

       
            $updated_data = array(
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'regular_price' => $this->input->post('regular_price'),
                'discount_percentage' => $this->input->post('discount_percentage'),
                'discount_amount' => $this->input->post('discount_amount'),
                'offer_price' => $this->input->post('offer_price'),
                'discount_type' => $this->input->post('discount_type'),
                'offer_start_date' => $this->input->post('offer_start_date'),
                'offer_end_date' => $this->input->post('offer_end_date'),
                'is_active' => $this->input->post('is_active'),
                
            );
          

          
            if ($this->common_model->update_data("facials", $updated_data,array("id"=>$id))) {
                $this->session->set_flashdata('success', 'Update Successfully');
            }
            else{
                $this->session->set_flashdata('error', 'Something error.');
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "facials", "refresh");
    }



}