<html>
<body>
<?
echo  "Welcome ". $Username;
echo form_open('enrollment/ViewCourse');
echo "<input type = 'hidden' name = 'Username' value = $Username>";
echo '<center><br/><input type = "submit" name = "submit" value = "View List of Courses">';
echo form_close();
echo form_open('enrollment/Enroll');
echo "<input type = 'hidden' name = 'Username' value = $Username>";
echo '<center><br/><input type = "submit" name = "submit" value = "Enroll to a Course">';
echo form_close();
echo form_open('enrollment/CourseEnroll');
echo "<input type = 'hidden' name = 'Username' value = $Username>";
echo '<center><br/><input type = "submit" name = "submit" value = "View list of Courses Enrolled">';
echo form_close();



?>
</body>

</html>