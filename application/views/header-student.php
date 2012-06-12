<html>

<head>
<title>Header Student</title>
</head>

<body bgcolor = 'gray'>
	<?php echo anchor('Enroll/index', 'Home'); ?>
	<center>
	<?php echo "<h3>".anchor('Enroll/student_home', 'Student')."&nbsp".anchor('Enroll/teacher_home', 'Teacher')."&nbsp".anchor('Enroll/admin_home', 'Administrator'); ?>
	<?php echo form_open('Enroll/logIn_student'); ?>
	<br/><br/>
	
	<?php echo form_error('User'); ?>
	Username: <input type = "text" name = "User" value = "<?php echo set_value('User'); ?>" maxlength = '50'>
	<?php echo form_error('Pass'); ?>
	Password: <input type = "password" name = "Pass" value = "" maxlength = '50'>
	<input type = "submit" value = "LogIn">
	
	<?php echo form_close(); ?>
</body>
</html>
