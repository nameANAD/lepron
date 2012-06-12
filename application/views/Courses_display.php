<html>
<head>
</head>
<body>

<center>
<? echo form_open('enrollment/Enroll'); ?>
<table border = 1>
<tr>
<td>Course</td>
<td>Unit</td>
<td>Schedule</td>
<td>Teacher</td>
<td>Number of Students Enrolled</td>
<td>Enroll</td>

</tr>
<ul>	
<?php 
foreach ($val as $item):
	$Course = $item->Course;
 echo "<tr><td>". $item->Course ."</td><td>". $item->Unit. "</td><td>". $item->Schedule. "</td><td>". $item->Teacher. "</td><td>". $item->Students_enrolled. "/". $item->Max_Students. "</td><td>". form_open('enrollment/Enroll'). "<input type= 'hidden' name = 'Username' value = $Username><input type = 'hidden' name = 'Course' value = $Course><input type = 'submit' name = 'submit' value = 'enroll'></td></tr>". form_close();
 

 endforeach;
 ?>
</table>
</center>
</ul>

</body>
</html>