<html>

<head>
<title> BODY </title>
</head>

<body>
	<br>
	<br>
	<ul>
	<h1> Sign Up </h1>
	<?php
		echo form_open('Enroll/add_student');
	?>
	
	<?php echo form_error('FirstName'); ?>
	FirstName: <input type="text" name="FirstName" value="<?php echo set_value("FirstName"); ?>" maxlength="50" />
	<br>
	<?php echo form_error('LastName'); ?>
	LastName: <input type="text" name="LastName" value="<?php echo set_value("LastName"); ?>" maxlength="50" />	
	<br>
	<?php echo form_error('Course'); ?>
	Course: <input type="text" name="Course" value="<?php echo set_value("Course"); ?>" maxlength="50" />	
	<br>	
	<?php echo form_error('Year'); ?>
	Year: <input type="text" name="Year" value="<?php echo set_value("Year"); ?>" maxlength="1" />	
	<br>	
	<?php echo form_error('Username'); ?>
	Username: <input type="text" name="Username" value="<?php echo set_value("Username"); ?>" maxlength="50" />	
	<br>	
	<?php echo form_error('Password'); ?>
	Password: <input type="password" name="Password" value="<?php echo set_value("Password"); ?>" maxlength="50" />		
	<br>	
	<input type = "submit" value = "Register">
		
	<?php
		echo form_close();
	?>
	<br>
	</ul>
	<br>
</body>

</html>