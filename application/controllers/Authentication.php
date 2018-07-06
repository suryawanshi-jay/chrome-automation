<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function index(){
		$data['error']=$this->session->flashdata('error');
		$this->load->view('public/login', $data);
	}

	public function login(){
		$result = $this->Authentication_model->login($this->input->post()); 
		if($result==1){
			$this->session->set_flashdata('error', 'user Does Not Exits');
			redirect('Authentication');
		}else if($result==2){
			$this->session->set_flashdata('error', 'Wrong Credentials Entered,Please Check Your Credentials');
			redirect('Authentication');
		}else if($result==3){
			$this->session->set_flashdata('error', 'User is Inactive. Please contact Adminstrator');
			redirect('Authentication');
		}
	}



}

/* End of file Authentication.php */
/* Location: .//tmp/fz3temp-1/Authentication.php */