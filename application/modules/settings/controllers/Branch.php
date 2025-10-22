<?php
class Branch extends MX_Controller
{
  public function __construct() {
    parent::__construct();
   
 
}

 public function index()
{

    $data = array();
    $data['active']       = "branch";
    $data['title']        = "Branch List"; 
    $data['allPdt']     =  $this->common_model->view_data("branch", "", "id", "DESC");
 
    $data['content'] = $this->load->view("branch-list", $data, TRUE);
    $this->load->view('layout/master', $data);
}
public function create()
{

  

  $this->form_validation->set_rules("name", " Name", "required");
  //$this->form_validation->set_rules("mobile_no",  "Mobile No", "required");
  $this->form_validation->set_rules("address",  "Address", "required");

  if ($this->form_validation->run() == NULL) {
  
  } else {
    $date = date("Y-m-d H:i:s");
    $data = array(     
        "name"                       => $this->common_model->xss_clean($this->input->post("name")),    
        "mobile_no"                  => $this->common_model->xss_clean($this->input->post("mobile_no")),      
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),   
        "address"                    => $this->common_model->xss_clean($this->input->post("address")),  
        "is_active"                  => 1,
        "create_date"                => strtotime($date),
       
    );
  
    if ($this->common_model->save_data("branch ", $data)) {
      $id = $this->common_model->Id;

      

      $this->session->set_flashdata('success', 'Save Successfully');
      }else{
      
          $this->session->set_flashdata('error', 'Something error.');
      }
    
   redirect(base_url() . "settings/branch/create", "refresh");
  }


  $data = array();
  $data['active'] = "branch";
  $data['title'] = "Branch Create"; 

  $data['content'] = $this->load->view("branch-create", $data, TRUE);
 $this->load->view('layout/master', $data);
}

    public function delete($id) {

        $dt = $this->common_model->view_data("branch", array("id" => $id), "id", "asc");
       
   
        if ($dt) {
                     
                        
            $this->common_model->delete_data("branch", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "settings/branch", "refresh");
      
      }

 public function edit($id)
{

  $data = array();
  $data['active'] = "branch";
  $data['title'] = "Edit Branch "; 
  $data['allPdt'] =  $this->common_model->view_data("branch", array("id" => $id), "id", "DESC");
  $data['content'] = $this->load->view("branch-edit", $data, TRUE);
  $this->load->view('layout/master', $data);
}
   public function update(){
    
        $id=$this->input->post("id");
        $selPdt=$this->common_model->view_data("branch",array("id"=>$id),"id","desc");
       
        $data = array(   
        "name"                       => $this->common_model->xss_clean($this->input->post("name")),    
        "mobile_no"                  => $this->common_model->xss_clean($this->input->post("mobile_no")),      
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),   
        "address"                    => $this->common_model->xss_clean($this->input->post("address")),  
        "is_active"                  => $this->common_model->xss_clean($this->input->post("is_active")),
                        
            );

             
            if ($this->common_model->update_data("branch", $data,array("id"=>$id))) {
                $this->session->set_flashdata('success', 'Update Successfully');
            }
            else{
                $this->session->set_flashdata('error', 'Something error.');
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "settings/branch", "refresh");
    }
 


}


