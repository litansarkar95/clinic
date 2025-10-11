<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model("products_model");
          
    }

 
	
    public function index()
    {
   $id = $this->common_model->xss_clean($this->input->post("id"));
   
   
        $date = date("Y-m-d H:i:s");
        $data = array(   
            "sales_id"                        => $id,   
              'type'                              => 'DUE',
            "transaction_date"                => strtotime($this->common_model->xss_clean($this->input->post("invoice_date"))),
            "credit"                          => $this->common_model->xss_clean($this->input->post("payment")),
           
         
        );
  
        $allData =   $this->main_model->paymentCheck($id);
        foreach(   $allData as $val){
            $totalAmount    =     $val->totalAmount;
            $paidAmount     =     $val->paidAmount;
            $dueAmount      =     $val->dueAmount;
        }
        
        $dueAmount ;
       $paidAmount      =    $paidAmount   + $this->common_model->xss_clean($this->input->post("payment"));
       $dueAmount       =    $dueAmount - $this->common_model->xss_clean($this->input->post("payment"));
 
        if ($this->common_model->save_data("account_statement", $data)) {
         // $id=$this->common_model->Id;
          
          
          	 if($totalAmount == $paidAmount ){
	    	$isPaid = "Paid";
        	 }else  if($totalAmount == $dueAmount  ){
        		$isPaid = "Due";
        	 }else{
        		$isPaid = "Partially";
        	 }
	 
          
              $updata = array(
          
            'isPaid'	                        =>	$isPaid,
            "paidAmount"                        => $paidAmount,   
            "dueAmount"                         => $dueAmount,
  
                        
            );
             $this->common_model->update_data("bill_info", $updata,array("id"=>$id));
          $this->session->set_flashdata('success', 'Save Successfully');
          }else{
            
              $this->session->set_flashdata('error', 'Something error.');
          }
        
       redirect(base_url() . "billinfo/list", "refresh");

    }

    public function delete($id) {

        $dt = $this->common_model->view_data("doctor", array("id" => $id), "id", "asc");
       
       
        if ($dt) {
    
             
            $this->common_model->delete_data("doctor", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "billinfo/doctors", "refresh");
      
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