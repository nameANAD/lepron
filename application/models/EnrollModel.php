<?php

class EnrollModel extends CI_Model {

	function _construct() {
		parent::_construct();
	}

	function Add_Student() {
		$student['FirstName'] = $_POST['FirstName'];
		$student['LastName'] = $_POST['LastName'];
		$student['Course'] = $_POST['Course'];
		$student['Year'] = $_POST['Year'];
		$student['Username'] = $_POST['Username'];
		$student['Password'] = md5($_POST['Password']);

		$query = $this->db->insert('students',$student);
		
	}
	
	function Check_Username($table) {
		$Username = $_POST['Username'];
		$this->db->where('Username', $Username);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	function Check_Password($table) {
		$password = "";
		$Password = $_POST['Pass'];
		$Username = $_POST['User'];
		$this->db->where('Username', $Username);
		$query = $this->db->get($table,'Password');
		
		foreach($query->result() as $Pass) {
			$password = $Pass->Password;
		}
		if (md5($Password) == $password) {
			return TRUE;
		}	else {
			return FALSE;
		}
	}
	
	function Get_FirstName($Username, $table) {
		$FirstName = "";
		$this->db->where('Username', $Username);
		$query = $this->db->get($table,'FirstName');
		
		foreach($query->result() as $first) {
			$FirstName = $first->FirstName;
		}
		
		return $FirstName;
	}
	
	function Get_LastName($Username, $table) {
		$LastName = "";
		$this->db->where('Username', $Username);
		$query = $this->db->get($table, 'LastName');
	
		foreach($query->result() as $last) {
			$LastName = $last->LastName;
		}
		
		return $LastName;
	}
	
	function Get_Subjects($Username, $field) {
		if ($field == 'Student') {
			$this->db->where('Student',$Username);
			$query = $this->db->get('subjects');
			return $query->result();
		}
	}
	
	function Get_All_Subjects() {
		$query= $this->db->get('listsubjects');
		return $query->result();
	}
	
	function Enroll_Subject($subject, $username) {
		$this->db->where('Name',$subject);
		$query = $this->db->get('listsubjects');
		$max = "";
		$count = "";
		$sched = "";
		$teacher = "";
		foreach ($query->result() as $item) {
			$max = $item->Max;
			$count = $item->Count;
			$sched = $item->Schedule;
			$teacher = $item->Teacher;
		}
		
		if ($free > 0) {
			$query = $this->db->insert('students',$student) ;
		}
	}

}

?>