<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		$data['login_success'] = $this->session->flashdata('login_success');
		$data['error'] = $this->session->flashdata('error');
		$data['success'] = $this->session->flashdata('success');
		$this->load->view('admin/dashboard', $data);
	}

}

/* End of file Admin.php */
/* Location: .//tmp/fz3temp-2/Admin.php */