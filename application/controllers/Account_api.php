<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_api extends CI_Controller {
	
	// Function to upload file
	public function get_accout_details(){
		$this->load->model('account_api_model');
		$account_details = $this->account_api_model->get_account_details();
		echo json_encode($account_details);
	}
	
	// Save account Details
	public function set_account_details($accont_details){
		$this->load->model('account_api_model');
		$this->account_api_model->set_account_details($accont_details);		
	}

}

/* End of file Admin.php */
/* Location: .//tmp/fz3temp-2/Admin.php */