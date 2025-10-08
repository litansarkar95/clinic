<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

         /*invoice no generator*/
         public function  SalesDateId($table) {
            $CurrentYear = date('Y');
    
            $this->db->select_max('date_code', 'date_code');
            $query      = $this->db->get($table);
            $result     = $query->result_array();
            $invoice_no = $result[0]['date_code'];
            if ($invoice_no == $CurrentYear) {
                
                $invoice_no=1  ;
            } else {
                $invoice_no = 0;
            }
            return $invoice_no;
        }
    
        public function  MonthDateId($table) {
    
            $CurrentMonth = date('m');
    
            $this->db->select_max('month_code', 'month_code');
            $query      = $this->db->get($table);
            $result     = $query->result_array();
     
            $invoice_no = $result[0]['month_code'];
           
            if ($invoice_no == $CurrentMonth) {
                
                $invoice_no=1  ;
            } else {
                $invoice_no = 0;
            }
            return $invoice_no;
        }
        public function  number_generator($table) {
            $ThisYear = date('Y');
            $ThisMonth = date('m');
    
           $CurrentYear = $this->SalesDateId($table);
             $CurrentMonth = $this->MonthDateId($table);
           
            $this->db->select_max('code_random', 'code_random');
            $this->db->where('date_code',$ThisYear);
            $this->db->where('month_code',$ThisMonth);
            $query      = $this->db->get($table);
            $result     = $query->result_array();
         
             $invoice_no = $result[0]['code_random'];
    
       if($CurrentYear OR $CurrentMonth){
       
    
        if ($invoice_no != '') {
                
            $invoice_no = $invoice_no + 1;
        } else {
            $invoice_no = 1;
        }
        return $invoice_no;
    }
    else{
    
           $invoice_no = 1;
    
        return $invoice_no;
    }
    
    
       }

       public function InvoiceHeader() {
		$this->db->select('setting.* ');
        $this->db->from('setting');
        $this->db->limit(1);
        $this->db->where("setting.id",1);
        $this->db->order_by('setting.id','DESC');
        $query = $this->db->get();
        return $query->row_array();

    }

    public function UnitList($id = NULL)
    {
        if ($id) {
            $this->db->where("unit_of_measurement.id", $id);
        }
    
        $this->db->select("unit_of_measurement.*, 
                           uom.unit_name AS parent_name"); 
                           
        $this->db->from("unit_of_measurement");
        $this->db->join('unit_of_measurement AS uom', 'uom.id = unit_of_measurement.unit_base_id', 'left');
        $this->db->order_by("unit_of_measurement.id", "DESC");
        return $this->db->get()->result(); 
    }
    
   
    public function BreakingList()
    {
    
        $this->db->select("breaking_news.*");           
        $this->db->from("breaking_news");
        $this->db->where("breaking_news.is_active", 1);
        $this->db->limit(10);
        $this->db->order_by("breaking_news.id", "DESC");
        return $this->db->get()->result(); 
    }
public function paymentCheck($id)
{
    $this->db->select("bill_info.totalAmount, bill_info.paidAmount, bill_info.dueAmount");           
    $this->db->from("bill_info");
    $this->db->where("bill_info.id", $id);
    $query = $this->db->get();
return $query->result();
}

    
    
}