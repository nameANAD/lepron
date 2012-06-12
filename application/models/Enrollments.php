<?
	class Enrollments extends CI_Model {

	var $Firstname   = '';
    var $Surname = '';
	var $Course = '';
	var $Year = '';
	var $Username = '';
	var $Password = '';

    function __construct()
    {

        parent::__construct();
    }

    function getUsername() {

		$Username = $_POST['Username'];
        $query = $this->db->query("SELECT * FROM  `students` WHERE  `Username` LIKE  '$Username'");
		$row = $query->num_rows();
		return $row;

    }


    function insert_entry()
    {

		$this->Firstname = $_POST['Firstname'];
		$this->Surname = $_POST['Lastname'];
		$this->Course = $_POST['Course'];
		$this->Year = $_POST['Year'];
		$this->Username = $_POST['Username'];
		$this->Password = $_POST['Password'];
		$this->db->insert('students', $this);

    }

	function checkLogin() {

	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$query = $this->db->query("SELECT * FROM  `students` WHERE  `Username` LIKE  '$Username' AND `Password` LIKE  '$Password'");
	$row = $query->num_rows();
	return $row;

    }

	function ViewCourses()
	{
		$query = $this->db->query('SELECT * FROM  `courses`');

		return $query->result();
	}

	function checkEnroll()
	{
		$Course = $_POST['Course'];
		$Username = $_POST['Username'];


		$query = $this->db->query("SELECT * FROM `load` WHERE `Username` LIKE '$Username' AND `CourseName` LIKE '$Course'");
		$rows = $query->num_rows();
		if($rows>0){
			return 0;
			}
		else{
		$query = $this->db->query("SELECT * FROM  `courses` WHERE  `Course` LIKE  '$Course'");
		$row = $query->result();

		foreach ($row as $item):
			$enroll = $item->Students_enrolled;
			$max = $item->Max_Students;
		endforeach;
			$free = $max-$enroll;

		return $free;
		}
	}

	function Enroll()
	{

		$data->CourseName = $_POST['Course'];
		$data->Username = $_POST['Username'];
		$data->Status = "Reserved";
		$Course = $_POST['Course'];
		
		$this->db->insert('load', $data);
		$query = $this->db->query("SELECT * FROM  `courses` WHERE  `Course` LIKE  '$Course'");
		$row = $query->result();
		foreach ($row as $item):
			$enroll = $item->Students_enrolled;
		endforeach;
		$Students_enrolled = $enroll+1;
		$this->db->query("UPDATE  `enrollment`.`courses` SET  `Students_enrolled` =  '$Students_enrolled' WHERE  `Course` = '$Course'");

	}



}


?>

