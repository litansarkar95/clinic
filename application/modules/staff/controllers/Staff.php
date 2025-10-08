<?php
class Staff extends MX_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model("staff_model");
 
}
public function index()
{

  $data = array();
  $data['active'] = "staff_list";
  $data['title'] = "staff"; 
  $data['allPdt'] = $this->staff_model->StaffList();
  $data['content'] = $this->load->view("staff-list", $data, TRUE);
  $this->load->view('layout/master', $data);
}
 
public function create()
{
  $this->form_validation->set_rules("first_name", display('first_name'), "required");
  $this->form_validation->set_rules("contact_no", display('contact_no'), "required|is_unique[staff.contact_no]");
  $this->form_validation->set_rules("role", display('role'), "required");
  $this->form_validation->set_rules("password", display('password'), "required");

  if ($this->form_validation->run() == NULL) {
  
  } else {

    
    $date = date("Y-m-d H:i:s");
    $data = array(   
        "employee_id"                => $this->common_model->xss_clean($this->input->post("employee_id")),   
        "designation_id"             => $this->common_model->xss_clean($this->input->post("designation")),   
        "first_name"                 => $this->common_model->xss_clean($this->input->post("first_name")),
        "last_name"                  => $this->common_model->xss_clean($this->input->post("last_name")),
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),
        "roles_id"                   => $this->common_model->xss_clean($this->input->post("role")),
        "qualification"              => $this->common_model->xss_clean($this->input->post("qualification")),
        "work_exp"                   => $this->common_model->xss_clean($this->input->post("work_exp")),
        "father_name"                => $this->common_model->xss_clean($this->input->post("father_name")),
        "mother_name"                => $this->common_model->xss_clean($this->input->post("mother_name")),
        "contact_no"                 => $this->common_model->xss_clean($this->input->post("contact_no")),
        "emergency_contact_no"       => $this->common_model->xss_clean($this->input->post("emergency_contact_no")),
        "dob"                        => strtotime($this->common_model->xss_clean($this->input->post("dob"))),
        "marital_status"             => $this->common_model->xss_clean($this->input->post("marital_status")),
        "date_of_joining"            => strtotime($this->common_model->xss_clean($this->input->post("date_of_joining"))),
       // "date_of_leaving"            => strtotime($this->common_model->xss_clean($this->input->post("date_of_leaving"))),
        "local_address"              => $this->common_model->xss_clean($this->input->post("local_address")),
        "permanent_address"          => $this->common_model->xss_clean($this->input->post("permanent_address")),
        "gender"                     => $this->common_model->xss_clean($this->input->post("gender")),
        "basic_salary"               => $this->common_model->xss_clean($this->input->post("basic_salary")),
        "staff_type"                 => $this->common_model->xss_clean($this->input->post("staff_type")),
        "hourly_rate"                => $this->common_model->xss_clean($this->input->post("hourly_rate")),
        "facebook"                   => $this->common_model->xss_clean($this->input->post("facebook")),
        "twitter"                    => $this->common_model->xss_clean($this->input->post("twitter")),
        "linkedin"                   => $this->common_model->xss_clean($this->input->post("linkedin")),
        "instagram"                  => $this->common_model->xss_clean($this->input->post("instagram")),
        "is_active"                  => 1,
       // "create_user"                => $this->session->userdata('id'),
        "create_date"                => strtotime($date),
       
    );
    if ($_FILES['resume']['name'] != "") {
        $config['allowed_types'] = '*';  //supported image
        $config['upload_path'] = "./public/images/staff/";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("resume")) {
            $data['resume'] = $this->upload->data('file_name');
            //$arrayMsg['enc_name'] = "1";
        }
    }
    if ($_FILES['pic']['name'] != "") {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
        $config['upload_path'] = "./public/images/staff/";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("pic")) {
            $data['picture'] = $this->upload->data('file_name');
            //$arrayMsg['enc_name'] = "1";
        }
    }else{
        $data['picture'] = "0.png";
    }
  
    if ($this->common_model->save_data("staff", $data)) {
      $id = $this->common_model->Id;

      // login auth
      $login = array(   
        "user_id"      => $id,
        "username"     => $this->common_model->xss_clean($this->input->post("contact_no")),
        "password"     => $this->common_model->Encryptor('encrypt', $this->input->post('password')),
        "role"         => $this->common_model->xss_clean($this->input->post("role")),
    );        

    $this->common_model->save_data("login_credential", $login);

      $selected_depts = $this->input->post('dept');

    // Check if any departments were selected
    if ($selected_depts) {
     
        foreach ($selected_depts as $dept) {
     
            
            $dptdata = array(   
                "staffid"      => $id,
                "departmentid" => $dept, 
             
            );        

            $this->common_model->save_data("staff_departments", $dptdata);
        }
    }

      $this->session->set_flashdata('success', 'Save Successfully');
      }else{
        
          $this->session->set_flashdata('error', 'Something error.');
      }
    
   redirect(base_url() . "staff/create", "refresh");
  }


  $data = array();
  $data['active'] = "staff_list";
  $data['title'] = display('create')." ".display('staff'); 
  $data['allRole'] = $this->common_model->Role();
  $data['allDept'] = $this->common_model->view_data("departments",array("is_active"=>1),"id","desc");
  $data['allDesign'] = $this->common_model->view_data("designation",array("is_active"=>1),"name","ASC");
   // echo "<pre>"; print_r($data['allRole']);exit();
  $data['content'] = $this->load->view("staff/staff-create", $data, TRUE);
 $this->load->view('layout/master', $data);
}

public function delete($id) {
 
    $dt = $this->common_model->view_data("staff", array("id" => $id), "id", "asc");
   
   
    if ($dt) {
   
        $this->common_model->delete_data("staff", array("id" => $id));
        $this->session->set_flashdata('success', 'Delete Successfully');
      
    } else {
        $this->session->set_flashdata('error', 'Something error.');
    }
  
    redirect(base_url() . "staff", "refresh");
  
  }


  //edit
  public function edit($id)
  {
   
      $data = array();
      $data['active'] = "staff_list";
      $data['title'] = display('edit')." ".display('staff'); 
      $data['allRole'] = $this->common_model->Role();
      $data['allDesign'] = $this->common_model->view_data("designation",array("is_active"=>1),"name","ASC");
      $data['allDept'] = $this->common_model->view_data("departments",array("is_active"=>1),"id","desc");
      $data['allPdt'] = $this->staff_model->StaffList($id);
      $data['allSaffDept'] = $this->staff_model->StaffDepartmentsList($id);
      $data['content'] = $this->load->view("staff/staff-edit", $data, TRUE);
     $this->load->view('layout/master', $data);

  }
    //profile
  public function profile($id)
  {
  
      $data = array();
      $data['active'] = "staff_list";
      $data['title'] = display('edit')." ".display('staff'); 
      $data['allRole'] = $this->common_model->Role();
      //$data['allPdt'] = $this->main_model->StaffList($id);
      $data['content'] = $this->load->view("staff/profile", $data, TRUE);
     $this->load->view('layout/master', $data);

  }
  public function update(){

    $id=$this->input->post("id");
    $login_id = $this->input->post("login_id");
    $selPdt=$this->common_model->view_data("staff",array("id"=>$id),"id","desc");
  
    $data = array(
        "employee_id"                => $this->common_model->xss_clean($this->input->post("employee_id")),   
        "designation_id"             => $this->common_model->xss_clean($this->input->post("designation")),  
        "first_name"                 => $this->common_model->xss_clean($this->input->post("first_name")),
        "last_name"                  => $this->common_model->xss_clean($this->input->post("last_name")),
        "email"                      => $this->common_model->xss_clean($this->input->post("email")),
        "qualification"              => $this->common_model->xss_clean($this->input->post("qualification")),
        "work_exp"                   => $this->common_model->xss_clean($this->input->post("work_exp")),
        "father_name"                => $this->common_model->xss_clean($this->input->post("father_name")),
        "mother_name"                => $this->common_model->xss_clean($this->input->post("mother_name")),
        "contact_no"                 => $this->common_model->xss_clean($this->input->post("contact_no")),
        "emergency_contact_no"       => $this->common_model->xss_clean($this->input->post("emergency_contact_no")),
        "dob"                        => strtotime($this->common_model->xss_clean($this->input->post("dob"))),
        "marital_status"             => $this->common_model->xss_clean($this->input->post("marital_status")),
        "date_of_joining"            => strtotime($this->common_model->xss_clean($this->input->post("date_of_joining"))),
        // "date_of_leaving"            => strtotime($this->common_model->xss_clean($this->input->post("date_of_leaving"))),
        "local_address"              => $this->common_model->xss_clean($this->input->post("local_address")),
        "permanent_address"          => $this->common_model->xss_clean($this->input->post("permanent_address")),
        "gender"                     => $this->common_model->xss_clean($this->input->post("gender")),
        "basic_salary"               => $this->common_model->xss_clean($this->input->post("basic_salary")),
        "staff_type"                 => $this->common_model->xss_clean($this->input->post("staff_type")),
        "hourly_rate"                => $this->common_model->xss_clean($this->input->post("hourly_rate")),
        "facebook"                   => $this->common_model->xss_clean($this->input->post("facebook")),
        "twitter"                    => $this->common_model->xss_clean($this->input->post("twitter")),
        "linkedin"                   => $this->common_model->xss_clean($this->input->post("linkedin")),
        "instagram"                  => $this->common_model->xss_clean($this->input->post("instagram")),
        "is_active"                  => $this->common_model->xss_clean($this->input->post("is_active")),
                    
        );


        if ($_FILES['resume']['name'] != "") {
            $config['allowed_types'] = '*';  //supported image
            $config['upload_path'] = "./public/images/staff/";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("resume")) {
                $data['resume'] = $this->upload->data('file_name');
                //$arrayMsg['enc_name'] = "1";
            }
        }
        if ($_FILES['pic']['name'] != "") {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
            $config['upload_path'] = "./public/images/staff/";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("pic")) {
                $data['picture'] = $this->upload->data('file_name');
                //$arrayMsg['enc_name'] = "1";
            }
        }
        if ($this->common_model->update_data("staff", $data,array("id"=>$id))) {


            $permissions = $this->input->post('dept'); // Array of members IDs

            // Delete existing permissions for the role
            $this->db->delete('staff_departments', ['staffid' => $id]);
         
            // If there are selected permissions, insert them into the database
            if ($permissions) {
                foreach ($permissions as $permission_id) {
                    $this->db->insert('staff_departments', [
                        'staffid' => $id,
                        'departmentid' => $permission_id
                    ]);
                }
            }

            //login
            $data = array(
                "username"         => $this->common_model->xss_clean($this->input->post("contact_no")),
                "role"             => $this->common_model->xss_clean($this->input->post("role")),
                            
                );
                $this->common_model->update_data("login_credential", $data,array("id"=>$login_id));
            $this->session->set_flashdata('success', 'Delete Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Something error.');
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "staff", "refresh");
}

public function change(){

    $id=$this->input->post("id");
    $selPdt=$this->common_model->view_data("staff",array("id"=>$id),"id","desc");
   
    $data = array(
        "password"         => $this->common_model->Encryptor('encrypt', $this->input->post('password')),
                    
        );
        if ($this->common_model->update_data("staff", $data,array("id"=>$id))) {
            $this->session->set_flashdata('success', 'Change Password Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Server error.');
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "staff", "refresh");
}

}


