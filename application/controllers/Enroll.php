<?php
class Enroll extends CI_Controller {

	public function _construct() {
		parent::_construct();
		$this->load->model("EnrollModel", "Enroll",true);
		

	}

	public function index() {	
		$this->load->view("header");
		$this->load->view("body");
		$this->load->view("footer");
	}
	
	public function student_home() {
		$this->load->view("header-student");
		$this->load->view("body-Student");
		$this->load->view("footer");
	}
	
	public function add_student() {
		$table = "students";
		
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('FirstName','FirstName','required');
		$this->form_validation->set_rules('LastName','LastName','required');
		$this->form_validation->set_rules('Course','Course','required');
		$this->form_validation->set_rules('Year','Year','required');
		$this->form_validation->set_rules('Username','Username','required');
		$this->form_validation->set_rules('Password','Password','required');
		
		if ($this->form_validation->run() == TRUE) {
			if ($this->Enroll->Check_Username($table)) {
				$this->load->view("header");
				echo "Username is already taken!";
				$this->load->view("body-Student");
				$this->load->view("footer");
			} 
			else {
				$this->Enroll->Add_Student();
				if ($this->Enroll->Check_Username($table)) {
					$this->load->view("header");
					echo "Registration Successful";
				}
				else {
					$this->load->view("header");
					echo "There has been a system error. Please try again.";
				}	
			}
		}
		else {
			$this->load->view("header");
			$this->load->view("body-Student");
		}
	}
	
	public function logIn_student() {
		$table = "students";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('User','Username', 'required');
		$this->form_validation->set_rules('Pass','Password', 'required');
		
		if ($this->form_validation->run() == TRUE) {
			if ($this->Enroll->Check_Password($table)) {
				$this->load->library('session');
				$this->session->set_userdata('Student', $_POST['User']);
				redirect('/Enroll/studentHome_profile');
			}
			else {
				$this->student_home();
			}
		}
		else {
			$this->student_home();
		}
	}
	
	public function logOut() {
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->index();
	}
	
	public function studentHome_profile() {
		$this->load->library('session');
		if ($this->session->userdata('Student')) {
			$table = "students";
			$username = $this->session->userdata('Student');
			$this->load->model("EnrollModel", "Enroll",true);
			$FirstName = $this->Enroll->Get_FirstName($username, $table);
			$LastName = $this->Enroll->Get_LastName($username, $table);
			$data = array(
				'FirstName' => $FirstName,
				'LastName' => $LastName
			);
			$this->load->view('header-studentProfile',$data);
			$this->load->view('body-studentProfile');
			$this->load->view('footer');
		}
		else {
			redirect('/Enroll/index');
		}
	}

	public function viewSubject() {
		$this->load->library('session');
		$this->load->model("EnrollModel", "Enroll",true);
		if ($this->session->userdata('Student')) {
			$Username = $this->session->userdata('Student');
			$data['subs'] = $this->Enroll->Get_Subjects($Username,'Student');
			$FirstName = $this->Enroll->Get_FirstName($Username, 'students');
			$LastName = $this->Enroll->Get_LastName($Username, 'students');
			$data2 = array(
				'FirstName' => $FirstName,
				'LastName' => $LastName
			);
			$this->load->view('header-studentProfile',$data2);
			$this->load->view('Subjects_List',$data);
			$this->load->view('footer');
		}
		else if ($this->session->userdata('Teacher')) {
		
		}
		else {
			redirect('/Enroll/index');
		}
	}
	
	public function viewAllSubjects() {
		$this->load->library('session');
		$this->load->model("EnrollModel", "Enroll",true);
		if ($this->session->userdata('Student')) {
			$FirstName = $this->Enroll->Get_FirstName($this->session->userdata('Student'), 'students');
			$LastName = $this->Enroll->Get_LastName($this->session->userdata('Student'), 'students');
			$data2 = array(
				'FirstName' => $FirstName,
				'LastName' => $LastName
			);
			
			$data['subjects'] = $this->Enroll->Get_All_Subjects();
			$this->load->view('header-studentProfile',$data2);
			$this->load->view('all-subjects',$data);
			$this->load->view('footer');
		}
		else {
			redirect('/Enroll/index');
		}
	}
	
	public function addSubject() {
		$this->load->library('session');
		$this->load->model("EnrollModel", "Enroll",true);
		if ($this->session->userdata('Student')) {
			$subject = $_POST['subject'];
			$username = $this->session->userdata('Student');
			$this->Enroll->Enroll_Subject($subject, $username);
		}
		else {
			redirect('/Enroll/index');
		}
		
	}
	
	
}

?>
