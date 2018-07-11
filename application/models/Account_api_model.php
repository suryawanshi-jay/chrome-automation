<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_api_model extends CI_Model {

	public function get_account_details(){
		$this->db->select('id,analyst_name,main_program,account_number');    
		$this->db->from('account_details');
		$this->db->where('status','0');
		$this->db->order_by('id','asc');
		$this->db->limit(1);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 ){
			$result = $query->row_array();			
			return $result;
		}
		return false;		
	}	
	// Set account details
	public function set_account_details($account_details){				
		$this->db->where('account_number',$account_details['account_number']);
		$this->db->where('main_program',$account_details['main_program']);
		$this->db->update('account_details',$account_details);
	}

}

/* End of file Admin_model.php */
/* Location: .//tmp/fz3temp-1/Admin_model.php */

