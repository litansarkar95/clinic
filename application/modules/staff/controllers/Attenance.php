<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attenance extends MX_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model("staff_model");
    $this->load->model("attendance_model");
 
}

    public function index()
    {
        $data = array();
        $data['active'] = "daily_attendance";
        $data['title'] = display('daily_attendance')." ".display('list'); 
        $data['allPdt'] = $this->attendance_model->get_attendance_grouped_by_date();
       // echo "<pre>"; print_r($data['allPdt']);exit();
        $data['content'] = $this->load->view("staff/attenance-list", $data, TRUE);
       $this->load->view('layout/master', $data);

    }
	
    public function create()
    {

        $date = $this->input->post('date');
       
      
        $date =strtotime($date);
        $date = date('Y-m-d',$date);
        $data['date'] = $date;
       
        $search = $this->input->post('search');
        $holiday = $this->input->post('holiday');

        if ($search == "saveattendence") {

         $session_ary = $this->input->post('staff_id');
            $absent_student_list = array();
            foreach ($session_ary as $key => $value) {
             //   echo "<pre>"; print_r($session_ary);exit();
                // $checkForUpdate = $this->input->post('attendendence_id' . $value);
                 //check 

                 $staff_id = $this->common_model->xss_clean($this->input->post("staff_id"))[$key];
               
                 $check = $this->attendance_model->CheckStudentAttendence($staff_id,$date);
            
                       ###################### HOLIDAY
              if($holiday){
                if($check){
                    $this->session->set_flashdata('msg', 'warning');
                    $this->session->set_flashdata('msg_alert', $this->lang->line('already_holiday_assign'));
                    
                 }else{
                    $arr = array(
                        'staff_id'                   => $session_ary[$key],
                        'attendence_type_id'         => $this->input->post('attendencetype' . $value),
                        "str_date"                   => strtotime($date),
                        'in_time'                    => $this->input->post("in_time")[$key],
                        'out_time'                   => $this->input->post("out_time")[$key],
                        'remark'                     => $this->input->post("remark")[$key],
                        'description'                => $this->input->post("description"),
                        'date'                       => $date,
                        'create_date'                => strtotime($cdate),
                    );
                    $this->session->set_flashdata('msg', 'success');
                    $this->session->set_flashdata('msg_alert', $this->lang->line('successful_holiday_assign'));
                    $this->common_model->save_data("staff_attendences",$arr);
                   
                 }
             
                }  ##################### END HOLIDAY
                else{
                    if($check){
                   
                        $this->session->set_flashdata('msg', 'warning');
                        $this->session->set_flashdata('msg_alert', $this->lang->line('already_attendence'));
                       
                     }else{
                       
                           $arr = array(
                            'staff_id'                   => $session_ary[$key],
                            'attendence_type_id'         => $this->input->post('attendencetype' . $value),
                            "str_date"                   => strtotime($date),
                            'in_time'                    => $this->input->post("in_time")[$key],
                            'out_time'                   => $this->input->post("out_time")[$key],
                            'remark'                     => $this->input->post("remark")[$key],
                            'description'                => $this->input->post("description"),
                            'date'                       => $date,
                            'create_date'                => strtotime($cdate),
                        );
                        
                        $this->session->set_flashdata('msg', 'success');
                        $this->session->set_flashdata('msg_alert', $this->lang->line('successful_attendence'));
                        $this->common_model->save_data("staff_attendences",$arr);
                       
                     }
                }
       
            }


        }


      $data = array();
      $data['active'] = "daily_attendance";
      $data['title'] = display('create')." ".display('daily_attendance'); 
      $data['allPdt'] = $this->attendance_model->StaffAttenShow($date);

    
      $attendencetypes = $this->attendance_model->get_student_attendences();
      $data['attendencetypeslist'] = $attendencetypes;
      $date = $this->input->post('date');
       
      
      // $date =strtotime($date);
      // $date = date('Y-m-d',$date);
       $data['date'] = $date;
    //   echo "<pre>"; print_r($data['allPdt']);exit();
      $data['content'] = $this->load->view("staff/daily_attendance-create", $data, TRUE);
     $this->load->view('layout/master', $data);
    }


}