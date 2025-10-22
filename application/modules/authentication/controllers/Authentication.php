<?php
class Authentication extends MX_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model("authentication_model");
 
}
public function index()
{



      $this->form_validation->set_rules('username', 'Username',  "required");
      $this->form_validation->set_rules("password", "Password", "required");
  
  if ($this->form_validation->run() == NULL) {

  }else{
    //$this->session->unset_userdata('captcha');
    $username       = $this->security->xss_clean($this->input->post("username"));
    $password       = $this->security->xss_clean($this->input->post("password"));
    

    $login_credential = $this->authentication_model->login_credential($username, $password);


    if ($login_credential) {
        if ($login_credential->active) {
            if ($login_credential->role == 1) {
                $userType = 'superadmin';
            } elseif($login_credential->role == 2) {
                $userType = 'admin';
            } elseif($login_credential->role == 3) {
                $userType = 'staff';
            } elseif($login_credential->role == 4) {
                $userType = 'suppliers';
            }  elseif($login_credential->role == 5) {
                $userType = 'delivery_person';
            } elseif($login_credential->role == 6) {
                $userType = 'doctor';
            }else {
                $userType = 'user';
            }
            $getUser = $this->authentication_model->getUserNameByRoleID($login_credential->role, $login_credential->user_id);
                   // get logger name
                   $sessionData = array(
                    'name' => $getUser['name'],
                    'logger_photo' => $getUser['picture'],
                    'logger_contact' => $getUser['contact_no'],
                    'loggedin_branch_id' => $login_credential->branch_id,
                    'loggedin_id' => $login_credential->id,
                    'loggedin_userid' => $login_credential->user_id,
                    'loggedin_role_id' => $login_credential->role,
                    'loggedin_type' => $userType,
                    'loggedin' => true,
                );
             
                $this->session->set_userdata($sessionData);
                $this->db->update('login_credential', array('last_login' => date('Y-m-d H:i:s')), array('id' => $login_credential->id));
                // is logged in
                if ($this->session->has_userdata('redirect_url')) {
                    redirect($this->session->userdata('redirect_url'));
                } else {
                    redirect(base_url('dashboard'));
                }
        }else {
            $this->session->set_flashdata('error', display('inactive_account'));
           
            redirect(base_url('authentication'));
        }

    }else {
        $this->session->set_flashdata('error', display('username_password_incorrect'));
   
        redirect(base_url('authentication'));
    }

    
  }

    $data = array();
    $data['active'] = "authentication";
    $data['title'] = "Authentication"; 
    $data['css'] = [
        base_url('public/dist/css/style.css')
    ];
   $this->load->view('auth', $data);
}
 
public function logout() {
  $this->session->sess_destroy();
  redirect("");
}

}


