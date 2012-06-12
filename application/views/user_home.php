<html>
	
<head>
<title> Home </title>
</head>

<body>

	<?php
		foreach($userdata as $val):
	?>
	
		<img src ="<?=base_url()."assets/images/".$val->LastName."/".$val->Picture?>" width = "100" height = "100">
			
	<?php
		echo "<h3>".$val->FirstName." ".$val->LastName."</h3>";	
		endforeach;
		echo anchor('Login/logout','Logout','Logout');
		echo "<br>";
		echo anchor('Lepron/edit_account','Edit Account Settings','Settings');
	?>
		
</body>
</html>