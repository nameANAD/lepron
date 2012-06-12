<?php

	class Lepron extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('Lepron_Model','model',TRUE);
			$this->load->library('session');
			
		}
		
		public function index() {
			$this->load->view('login');
			$this->load->view('SignUp');
			$this->load->view('home_body');
		}
		
		public function user_home() {
			$username = $this->session->userdata('username');
			if($username) {
				$data['userdata'] = $this->model->get_name($username);
				$this->load->view('user_home',$data);
			}
			else {
				redirect('/Lepron/index');
			}
		}
		
		public function edit_account() {
			$username = $this->session->userdata('username');
			if ($username) {
				$this->load->view('account_settings');
			}
			else {
				redirect('/Lepron/index');
			}
		}
		
		public function change_password() {
			$username = $this->session->userdata('username');
			if ($username) {
				$old = $_POST['oldPassword'];
				$new = $_POST['newPassword'];
				if ($new == $_POST['reNewPassword']) {
					if ($this->model->check_user($username,$old)) {
						$this->model->edit_password($username,$new);
					}
				}
				else {
					redirect('/Lepron/edit_account');
				}
			}
			else {
				redirect('/Lepron/index');
			}
		}

	
	}
?>

