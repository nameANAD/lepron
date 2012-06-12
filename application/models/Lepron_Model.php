<?php

class Lepron_Model extends CI_Model {

	function check_user($username, $password) {
		$query = $this->db->query("SELECT * FROM  `users` WHERE  `Username` LIKE  '$username' AND `Password` LIKE  '$password'");
		$row = $query->num_rows();
		return $row;
	}
	
	function check_name($firstname, $lastname) {
		$query = $this->db->query("SELECT * FROM `users` WHERE `FirstName` LIKE '$firstname' AND `LastName` LIKE '$lastname' AND `Username` LIKE ''");
		$row = $query->num_rows();
		return $row;
	}
	
	function check_username($username) {
		$query = $this->db->query("SELECT * FROM `users` WHERE `Username` LIKE '$username'");
		$row = $query->num_rows();
		return $row;
	}
	
	function add_user($username,$password,$firstname,$lastname,$birth) {
		$query = $this->db->query("UPDATE `users` SET `Username` = '$username', `Password` = '$password', `Birthday` = '$birth' WHERE `FirstName` = '$firstname' AND `LastName` = '$lastname'");
	}
	
	function get_name($username) {
		$query = $this->db->query("SELECT * FROM `users` WHERE `Username` LIKE '$username'");
		return $query->result();
	}
	
	function edit_password($username,$password) {
		$query = $this->db->query("UPDATE users SET Password = '$password' WHERE Username = '$username'");
	}
}

?>