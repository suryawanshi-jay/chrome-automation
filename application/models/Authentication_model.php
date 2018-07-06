<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_model extends CI_Model {

	public function login($data){
		// print_r($data['email']);
		if(!count($this->db->select('email')->where('email', $data['email'])->get('users')->result_array())==0){
			if(!count($this->db->where('email', $data['email'])->where('password', md5($data['password']))->get('users')->result_array())==0){
				if(!count($this->db->where('email', $data['email'])->where('status',1)->get('users')->result_array())==0){
					$this->session->set_userdata('user',$this->db->where('email', $data['email'])->get('users')->result_array()[0]);
					$this->session->set_flashdata('login_success', 'welcome '.$this->session->user['firstname'].' to dashboard');
					redirect('admin');
				}else
					return 3;
			}else
				return 2;

		}else
			return 1;

	}	

}

/* End of file Authentication_model.php */
/* Location: .//tmp/fz3temp-1/Authentication_model.php */


// INSERT INTO `chrome_extension`.`MyGuests` (`id`, `firstname`, `lastname`, `email`, `password`, `reg_date`, `status`) VALUES (null, 'Bobby', 'Hurlbut', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', CURRENT_TIMESTAMP, '1');