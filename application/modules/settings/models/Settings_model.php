<?php

class Settings_model extends CI_Model {
	
    public function Settings() {
       
		$this->db->select("setting.*");
        $this->db->from("setting");
        $this->db->where("setting.id",1);
        $this->db->order_by("id", "DESC");
        return $this->db->get()->result();
    }
    
	   public function UsersList($id=NULL) {
       if($id){
				$this->db->where("staff.id",$id); 
			}
		$this->db->select("staff.* ,branch.name ,roles.name role");
        $this->db->from("staff");
        $this->db->join('branch', "staff.branch_id = branch.id ",'left');
        $this->db->join('roles', "staff.roles_id = roles.id ",'left');
        $this->db->order_by("id", "DESC");
        return $this->db->get()->result();
    }
}