<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function save_account_details($arr_data){
		$account_data = array();
		foreach($arr_data as $key => $row_number){			
			$account_data[]= array(
						'analyst_name'=>$row_number['A'],
						'main_program'=>$row_number['B'],
						'account_number'=>$row_number['C']
					);				
		}	
		// Delete all previous records from database
		$this->db->empty_table('account_details');
		$this->db->insert_batch('account_details', $account_data); 	
	}	
	// Function to get account details from database
	public function get_all_account_details(){
		$this->db->select('*');    
		$this->db->from('account_details');
		$this->db->where('status','0');
		$this->db->order_by('id','asc');		
		$query = $this->db->get();		
		if ( $query->num_rows() > 0 ){
			$result = $query->result_array();					
			return $result;
		}
		return false;	
	}	
}

/* End of file Admin_model.php */
/* Location: .//tmp/fz3temp-1/Admin_model.php */

