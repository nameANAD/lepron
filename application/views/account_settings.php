<html>

<head>
<title>Account Settings</title>
</head>

<body>
	<h2>Change Account Settings</h2>
	<center>
		<?php
			echo "<h3>Edit Username</h3>";
			echo form_open('Lepron/change_username');
				echo "Old Username: <input type = 'text' name = 'oldUsername' value = '' maxlength = '50'><br>";
				echo "New Username: <input type = 'text' name = 'newUsername' value = '' maxlength = '50'><br>";
				echo "<input type = 'submit' value = 'edit'>";
			echo form_close();
			echo "<h3>Edit Password</h3>";
			echo form_open('Lepron/change_password');
				echo "Old Password: <input type = 'password' name = 'oldPassword' value = '' maxlength = '50'><br>";
				echo "New Password: <input type = 'password' name = 'newPassword' value = '' maxlength = '50'><br>";
				echo "Retype New Password: <input type = 'password' name = 'reNewPassword' value = '' maxlength = '50'><br>";
				echo "<input type = 'submit' value = 'edit'>";
			echo form_close();
				
		?>
</body>

</html>