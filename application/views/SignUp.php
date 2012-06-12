<html>

<head>
	<title>SignUp</title>
</head>

<body>
	<center>
	<h4> SignUp </h4>
	<?php
		echo form_open('Login/signup');
			echo "<br>FirstName: <input type = 'text' name = 'Firstname' value = '' size = '50' maxlength = '50'>";
			echo "<br>LastName: <input type = 'text' name = 'Lastname' value = '' size = '50' maxlength = '50'>";
			echo "<br>UserName: <input type = 'text' name = 'Username' value = '' size = '50' maxlength = '50'>";
			echo "<br>Birthday eg.(year-month-day): <input type = 'date' name = 'Birth' value = '1994-01-01'>";
			echo "<br>Password: <input type = 'password' name = 'Password' value = '' size = '50' maxlength = '50'>";
			echo "<br>Re-Password: <input type = 'password' name = 'Re-Password' value = '' size = '50' maxlength = '50'>";
			echo "<br><input type = 'Submit' value = 'SignUp'>";
		echo form_close();
	?>

</body>

</html>
