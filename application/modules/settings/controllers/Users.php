<?php
class Users extends MX_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model("settings_model");
 
}

 public function index()
{

    $data = array();
    $data['active']       = "users";
    $data['title']        = "Users List"; 
    $data['allPdt']     =  $this->settings_model->UsersList();
 
    $data['content'] = $this->load->view("users-list", $data, TRUE);
    $this->load->view('layout/master', $data);
}
public function create()
{

  

  $this->form_validation->set_rules("name", " Name", "required");
  $this->form_validation->set_rules("mobile_no",  "Mobile No", "required");
  //$this->form_validation->set_rules("address",  "Address", "required");

  if ($this->form_validation->run() == NULL) {
  
  } else {
    $date = date("Y-m-d H:i:s");
    $data = array(     
        "branch_id"                  => $this->common_model->xss_clean($this->input->post("branch_id")),  
        "first_name"                 => $this->common_model->xss_clean($this->input->post("name")),    
        "contact_no"                 => $this->common_model->xss_clean($this->input->post("mobile_no")),      
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),   
        "roles_id"                   => 2, 
        "is_active"                  => 1,
        "create_date"                => strtotime($date),
       
    );
  
    if ($this->common_model->save_data("staff ", $data)) {
      $id = $this->common_model->Id;
          // login auth
          $login = array(    
            "branch_id"                  => $this->common_model->xss_clean($this->input->post("branch_id")), 
            "user_id"                    => $id,
            "username"                   => $this->common_model->xss_clean($this->input->post("mobile_no")),
            "password"                   => $this->common_model->Encryptor('encrypt', $this->input->post('password')),
            "role"                       => 2,
        );        

    $this->common_model->save_data("login_credential", $login);
      

      $this->session->set_flashdata('success', 'Save Successfully');
      }else{
      
          $this->session->set_flashdata('error', 'Something error.');
      }
    
   redirect(base_url() . "settings/users/create", "refresh");
  }


  $data = array();
  $data['active'] = "users";
  $data['title'] = "Users Create"; 
  $data['allBranch']     =  $this->common_model->view_data("branch", "", "id", "DESC");
  $data['content'] = $this->load->view("users-create", $data, TRUE);
 $this->load->view('layout/master', $data);
}

    public function delete($id) {

        $dt = $this->common_model->view_data("users", array("id" => $id), "id", "asc");
       
   
        if ($dt) {
                     
                        
            $this->common_model->delete_data("users", array("id" => $id));
            $this->session->set_flashdata('success', 'Delete Successfully');
          
        } else {
            $this->session->set_flashdata('error', 'Something error.');
        }
      
        redirect(base_url() . "settings/users", "refresh");
      
      }

 public function edit($id)
{

  $data = array();
  $data['active'] = "users";
  $data['title'] = "users Branch "; 
  $data['allPdt'] =  $this->common_model->view_data("branch", array("id" => $id), "id", "DESC");
  $data['content'] = $this->load->view("branch-edit", $data, TRUE);
  $this->load->view('layout/master', $data);
}
   public function update(){
    
        $id=$this->input->post("id");
        $selPdt=$this->common_model->view_data("users",array("id"=>$id),"id","desc");
       
        $data = array(   
        "beanch_id"                  => $this->common_model->xss_clean($this->input->post("beanch_id")),    
        "name"                       => $this->common_model->xss_clean($this->input->post("name")),    
        "mobile_no"                  => $this->common_model->xss_clean($this->input->post("mobile_no")),      
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),   
        "address"                    => $this->common_model->xss_clean($this->input->post("address")),  
        "is_active"                  => $this->common_model->xss_clean($this->input->post("is_active")),
                        
            );

             
            if ($this->common_model->update_data("users", $data,array("id"=>$id))) {
                $this->session->set_flashdata('success', 'Update Successfully');
            }
            else{
                $this->session->set_flashdata('error', 'Something error.');
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "settings/users", "refresh");
    }
 


}


