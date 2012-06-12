<html>

<head>
	<title>Login</title>
</head>

<body>
	<h4> LogIn </h4>
	<?php
		
		echo form_open('Login/login');
				echo "Username: <input type = 'text' name = 'Username' value = '' size = '50' maxlength = '100'>";
				echo "Password: <input type = 'password' name = 'Password' value = '' size = '50' maxlength = '100'>";
				echo "<input type = 'submit' value = 'LogIn'>";
		echo form_close();
		
	?>

</body>

</html>