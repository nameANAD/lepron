<?
	class Enrollments extends CI_Model {
	
	var $Firstname   = '';
    var $Surname = '';

    function __construct()
    {

        parent::__construct();
    }
    
    

    function insert_entry()
    {
        $this->Firstname   = $_POST['Firstname']; 
        $this->Surname		= $_POST['Surname'];


        $this->db->insert('students', $this);
    }

    
}


?>

