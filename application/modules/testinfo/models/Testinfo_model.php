<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testinfo_model extends CI_Model {



		public function TestinfoList($id=NULL) {
		if($id){
		$this->db->where("testinfo.id",$id); 
			}
				
		
			$this->db->select("testinfo.* , categories.name as categories");
			$this->db->from("testinfo");
			$this->db->join('categories', "testinfo.categories_id = categories.id ",'left');
			$this->db->order_by("id", "DESC");
			return $this->db->get()->result();
		}




}