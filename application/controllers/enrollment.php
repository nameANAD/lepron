<?
class Enrollment extends CI_Controller {
	

    public function index()
    {
		
		$this->load->helper('url');

        $this->load->view("Home");
    }
	
	public function student_home()
	{
		$this->load->helper('url');

		$this->load->view('student_home');	
			
	}
	
	public function LogIn()
	{
		$this->load->helper(array('url','form'));
		$this->load->view('Login');
		
	}
	
	public function SignUp()
	{
		$this->load->helper(array('url','form'));
		$this->load->view('SignUp');
		
	}
	
	public function ProcessSignUp()
	{
		$config['hostname'] = "localhost";
		$config['username'] = "root";
		$config['password'] = "";
		$config['database'] = "Enrollment";
		$config['dbdriver'] = "mysql";
		$config['dbprefix'] = "";
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;

		$this->load->model('Enrollments', 'model', $config);
		
		
		$Firstname = $_POST['Firstname'];
		$Lastname = $_POST['Lastname'];
		$Course = $_POST['Course'];
		$Year = $_POST['Year'];
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];


			if($Firstname=='' || $Lastname=='' || $Course=='' || $Year=='' || $Username=='' || $Password==''){
			echo '<center>fill-up all fields</center>';
			$this->SignUp();
			}
			else{
			if($Year=='1' || $Year == '2' || $Year == '3' || $Year == '4'){
			
			$val=$this->model->getUsername();
			if($val>0){
			echo '<center>Username already taken</center>';
			$this->SignUp();
			}
			else{
			$this->model->insert_entry();
			echo '<center> SingUp Success </center>';
			$this->LogIn();
				}
			}
			else{
				echo '<center> Year is a number from 1 to 4 </center>';
				$this->SignUp();
				}
			}	


	}
	
	public function processLogIn()
	{
		$config['hostname'] = "localhost";
		$config['username'] = "root";
		$config['password'] = "";
		$config['database'] = "Enrollment";
		$config['dbdriver'] = "mysql";
		$config['dbprefix'] = "";
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		
		$this->load->model('Enrollments', 'model', $config);
		$this->load->helper(array('url','form'));
		
				$Username = $_POST['Username'];
				$Password = $_POST['Password'];
				$value['Username'] = $_POST['Username'];
				if($Password=="" || $Username == ""){
					echo "<center> Fill-up everything</center>";
					$this->LogIn();
					}
				
				else{
					$val = $this->model->checkLogin();
					if($val==0){
						echo "<center> Wrong Username or Password</center>";
						$this->LogIn();
						}
					else{
						$this->load->helper('url');
						$this->load->view('home_student', $value);	
						}
					}
	}
	
	public function ViewCourse()
	{
		
		$config['hostname'] = "localhost";
		$config['username'] = "root";
		$config['password'] = "";
		$config['database'] = "Enrollment";
		$config['dbdriver'] = "mysql";
		$config['dbprefix'] = "";
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		
		$this->load->model('Enrollments', 'model', $config);
		$this->load->helper(array('url','form'));
		
		$data['Username'] = $_POST['Username'];
		

		
		echo "<center> LIST OF COURSES</center>";
		
		$data['val']=$this->model->ViewCourses();

		$this->load->view('Courses_display',$data);
	
	}
	
	public function Enroll()
	{
		$config['hostname'] = "localhost";
		$config['username'] = "root";
		$config['password'] = "";
		$config['database'] = "Enrollment";
		$config['dbdriver'] = "mysql";
		$config['dbprefix'] = "";
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		
		$this->load->model('Enrollments', 'model', $config);


		$val = $this->model->checkEnroll();
		if($val>0){
			$this->model->Enroll();
			echo " Enrollment Successfull";
			}
		else{
			echo "Full are you are already enrolled";
			}
	}
	
	
	
}
?>