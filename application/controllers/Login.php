<?php
  // login class
	class Login extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('Lepron_Model','model',TRUE);
			$this->load->library('session');		
		}
		
		public function login() {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Username', 'Username','required');
			$this->form_validation->set_rules('Password', 'Password', 'required');
			
			if($this->form_validation->run() == TRUE) {
				$username = $_POST['Username'];
				$password = $_POST['Password'];
				if ($this->model->check_user($username,$password)) {
					$this->session->set_userdata('username', $username);
					redirect('/Lepron/user_home');
				} else {
					redirect('/Lepron/index');
				}
			}	
			else {
				redirect('/Lepron/index');
			}
			
		}
		
		public function signup() {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Firstname','Firstname','required');
			$this->form_validation->set_rules('Lastname','Lastname','required');
			$this->form_validation->set_rules('Username','Username','required');
			$this->form_validation->set_rules('Birth','Birth','required');
			$this->form_validation->set_rules('Password','Password','required');
			$this->form_validation->set_rules('Re-Password','Re-Password','required');
			
			if($this->form_validation->run() == TRUE) {
				$firstname = $_POST['Firstname'];
				$lastname = $_POST['Lastname'];
				$username = $_POST['Username'];
				$birth = $_POST['Birth'];
				$password = $_POST['Password'];
				$repassword = $_POST['Re-Password'];
				
				if($this->model->check_name($firstname,$lastname)) {
					if(!$this->model->check_username($username)) {
						if($password == $repassword) {
							echo "asdsad";
							$this->model->add_user($username,$password,$firstname,$lastname,$birth);
						}
					}
					else {
						redirect('/Lepron/index');
					}
				}
				else {
					redirect('/Lepron/index');
				}
			}
			else {
				redirect('/Lepron/index');
			}
		}
		
		public function logout() {
			$this->session->sess_destroy();
			redirect('/Lepron/index');
		}
	
	}
	
?>	
