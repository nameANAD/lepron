<html>

<head>
<title>Student Home Profile Header</title>
</head>

<body>
	<?php echo anchor('Enroll/logOut', 'LogOut'); ?>
	<?php echo anchor('Enroll/studentHome_profile', 'Home'); ?>
	<center><h1> WELCOME </h1></center>
	<h3><?php echo $FirstName." ".$LastName; ?></h3>
	<br/>
</body>
</html>