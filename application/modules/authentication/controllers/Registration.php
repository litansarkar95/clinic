<?php
class Registration extends MX_Controller
{
  public function __construct() {
    parent::__construct();
    //$this->load->model("accounts/accounts_model");
   // $this->load->model("suppliers_model");
   $this->load->helper('string');
   $this->load->library('email');
 
}

 
 public function index()
{

  $this->form_validation->set_rules("name", display('name'), "required");
  $this->form_validation->set_rules("username", display('contact_no'), "required|is_unique[customers.contact_no]");
  $this->form_validation->set_rules("password", display('password'), "required|min_length[4]");

  if ($this->form_validation->run() == NULL) {
  
  } else {

   
    $date = date("Y-m-d H:i:s");
    $data = array(    
        "ip_address"                 => $_SERVER['REMOTE_ADDR'],
        "name"                       => $this->common_model->xss_clean($this->input->post("name")),   
        "contact_no"                 => $this->common_model->xss_clean($this->input->post("username")),
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),
        "party_type"                 => "Retailer",
        "is_active"                  => 1,
        "create_date"                => strtotime($date),
       
    );

  
    if ($this->common_model->save_data("customers", $data)) {
      $id = $this->common_model->Id;

         // login auth
         $login = array(   
          "user_id"      => $id,
          "username"     => $this->common_model->xss_clean($this->input->post("username")),
          "password"     => $this->common_model->Encryptor('encrypt', $this->input->post('password')),
          "role"         => 7,
      );        
  
      $this->common_model->save_data("login_credential", $login);

      

      $this->session->set_flashdata('success', 'Registration Successfully!  Login Now');
      redirect(base_url() . "login", "refresh");
      }else{
        
          $this->session->set_flashdata('error', 'Something error.');
      }
      redirect(base_url() . "registration", "refresh");
 
  }

  $data = array();
    $data['active'] = "registration";
    $data['title'] = display('registration'); 
    $data['css'] = [
        base_url('public/dist/css/style.css')
    ];
    $this->load->view('registration', $data);

   // $this->load->view('1', $data);
}

public function send_otp() {
  $phone = $this->input->post('phone');
  
  // Generate random OTP
  $otp = random_string('numeric', 6); 

  $this->session->set_userdata('otp', $otp);

  $this->send_sms($phone, $otp); 

  echo json_encode(['status' => 'success']);
}

private function send_sms($sender, $otp) {

  // Construct the message
  $message = "Your OTP is: $otp"; 
  // Call to your mailSMS service method to send SMS
  $json_string = $this->mailsmsconf->send_mailsms($sender, $message);
  
  $dataArray = json_decode($json_string, true);
  if (json_last_error() != JSON_ERROR_NONE) {
      log_message('error', 'Invalid JSON response from SMS API: ' . $json_string);
      return false;
  }
  $response_code = isset($dataArray['response_code']) ? $dataArray['response_code'] : null;
  $message_id = isset($dataArray['message_id']) ? $dataArray['message_id'] : null;
  $success_message = isset($dataArray['success_message']) ? $dataArray['success_message'] : null;
  
  if ($response_code == '200' && $message_id) {
      log_message('info', 'SMS sent successfully. Message ID: ' . $message_id);
      return true;
  } else {
      log_message('error', 'Failed to send SMS. Response: ' . $json_string);
      return false;
  }
}



// Verify OTP code entered by the user
public function verify_otp() {
  $entered_otp = $this->input->post('otp');
  $session_otp = $this->session->userdata('otp');

  if ($entered_otp == $session_otp) {
    $date = date("Y-m-d H:i:s");
    $data = array(    
        "ip_address"                 => $_SERVER['REMOTE_ADDR'],
        "name"                       => $this->common_model->xss_clean($this->input->post("name")),   
        "contact_no"                 => $this->common_model->xss_clean($this->input->post("username")),
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),
        "party_type"                 => "Retailer",
        "is_active"                  => 1,
        "create_date"                => strtotime($date),
       
    );

  
    if ($this->common_model->save_data("customers", $data)) {
      $id = $this->common_model->Id;

         // login auth
         $login = array(   
          "user_id"      => $id,
          "username"     => $this->common_model->xss_clean($this->input->post("username")),
          "password"     => $this->common_model->Encryptor('encrypt', $this->input->post('password')),
          "role"         => 5,
      );        
  
      $this->common_model->save_data("login_credential", $login);

      

      $this->session->set_flashdata('success', 'Registration Successfully!  Login Now');
      redirect(base_url() . "login", "refresh");
    }
      echo json_encode(['status' => 'success']);
  } else {
      // Invalid OTP
      echo json_encode(['status' => 'error']);
  }
}

}


