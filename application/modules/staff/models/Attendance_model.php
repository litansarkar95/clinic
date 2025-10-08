<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {

     ######################### INSERT 

     public function StaffAttenShow($date) {
       
        $sql = "
    SELECT   staff.id,
        staff.employee_id,
        staff.designation_id,
        staff.first_name,
        staff.last_name,  
        staff.picture,
        IFNULL(staff_attendences.date, 'xxx') AS date, IFNULL(staff_attendences.attendence_type_id, 0) as attendence_id,
        IFNULL(staff_attendences.remark, 0) as remark,
        IFNULL(staff_attendences.in_time, 0) as in_time,
        IFNULL(staff_attendences.out_time, 0) as out_time,
        IFNULL(staff_attendences.create_date, 'xxx') AS attendance_date,
        staff_attendences.remark
    FROM 
        staff
    LEFT JOIN 
        staff_attendences ON staff.id = staff_attendences.staff_id 
    AND
        staff_attendences.date = '" . $this->db->escape_str($date) . "' OR staff_attendences.date IS NULL
    where staff.staff_type =1  ORDER BY 
        staff.id DESC
";

$query = $this->db->query($sql);
return $query->result_array();

    }
     public function CheckStudentAttendence($staff_id,$date){

        $this->db->select("staff_attendences.* ");
        $this->db->from("staff_attendences");
        $this->db->where("staff_attendences.staff_id", $staff_id);
        $this->db->where("staff_attendences.date", $date);
        $this->db->order_by("staff_attendences.id",'DESC');
        return $this->db->get()->result();
    }

    public function get_attendance_grouped_by_date() {
        $this->db->select('staff_attendences.date ,  staff_attendences.description ,COUNT(id) as total_staff, COUNT(CASE WHEN attendence_type_id = 1 THEN 1 END) as total_present,  COUNT(CASE WHEN attendence_type_id = 4 THEN 1 END) as total_absent ,  COUNT(CASE WHEN attendence_type_id = 7 THEN 1 END) as total_leave');
        $this->db->from('staff_attendences');
        $this->db->group_by('date');
        return $this->db->get()->result();
    }


    public function get_student_attendences($id = null) {
        $this->db->select()->from('attendence_type');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->where('is_active', 'yes');
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
}