<?php
include("header2.php");
include("connection1.php");
session_start();
if(!$_SESSION['studentlogin'])
{
	header("location:login.php");
}
?>
<html>
	<head>
		<title>
			Result
		</title>
	</head>
	<body bgcolor="gray">
	<br>
	<?php	

$query = " SELECT * FROM student_register INNER JOIN result ON 
student_register.stud_id=result.stud_id WHERE semail = '" . $_SESSION['studentlogin']."' ";
					
					$query_run1 = mysqli_query($con,$query);
					while($row = mysqli_fetch_assoc($query_run1))
					{
						$id = $row['stud_id'];
                        $name = $row['sname'];
						$course = $row['course'];
						$sem = $row['semester'];
						$sub1 = $row['sub1'];
						$sub2 = $row['sub2'];
						$sub3 = $row['sub3'];
						$sub4 = $row['sub4'];
						$sub5 = $row['sub5'];
						$total = $row['total'];
						$percentage = $row['percentage'];
						$class = $row['class'];
						$result = $row['result'];
			}
if(mysqli_num_rows($query_run1)==0){
echo "<center><font size='5px'>No Result Found</font></center>";
exit();
}
		?>
		<br><br><br><br><br><br><br><br><br><br>
		<center>
		<table border="3" bgcolor="white" cellspacing="2px" height="20px" width="50%">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Course</th>
					<th>sem</th>
					<th>sub1</th>
					<th>sub2</th>
					<th>sub3</th>
					<th>sub4</th>
					<th>sub5</th>
					<th>Total</th>
					<th>Percentage</th>
					<th>Class</th>
					<th>Result</th>
				</tr>
				<tr>
					<td><?php echo $id ?></td>
					<td><?php echo $name ?></td>
					<td><?php echo $course ?></td>
					<td><?php echo $sem ?></td>
					<td><?php echo $sub1 ?></td>
					<td><?php echo $sub2 ?></td>
					<td><?php echo $sub3 ?></td>
					<td><?php echo $sub4 ?></td>
					<td><?php echo $sub5 ?></td>
					<td><?php echo $total ?>/500</td>
					<td><?php echo $percentage ?>%</td>
					<td><?php echo $class ?></td>
					<td><?php echo $result ?></td>
				</tr>
			</table>
		</center>
	</body>
</html> 