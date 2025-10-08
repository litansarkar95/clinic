<?php

class Staff_model extends CI_Model {
	
    public function StaffList($id=NULL) {
        if($id){
            $this->db->where("staff.id",$id); 
        }
		$this->db->select("staff.*, roles.name role , login_credential.id login_id");
        $this->db->from("staff");
        $this->db->join('login_credential', "login_credential.user_id = staff.id",'left');
        $this->db->join('roles', "login_credential.role = roles.id",'left');
      
        $this->db->where("login_credential.role !=",4); 
        $this->db->where("staff.roles_id !=",1); 
        $this->db->order_by("id", "DESC");
        return $this->db->get()->result();
    }
    
    public function StaffDepartmentsList($id) {
        
		$this->db->select("staff_departments.*");
        $this->db->from("staff_departments");
        $this->db->where("staff_departments.staffid",$id); 
        $this->db->order_by("id", "DESC");
        return $this->db->get()->result();
    }
}