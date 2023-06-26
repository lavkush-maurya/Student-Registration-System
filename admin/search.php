<?php
include('header1.php');
include('connection.php');
?>
<html>
	<head>
		<title>
			Search
		</title>
	</head>
	<body bgcolor="#B3B6B7 ">
		<form action="" method="POST">
			<center>
				<table border="1"  height="40%" width="40%" bgcolor="white">
					<tr>
						<th colspan="2">Search Result</th>
					</tr>
					<tr align="center">
						<td>Course</td>
						<td>
						<select name="course" onchange="location = this.value;">
								<option>--Select--</option>
								<option value="Search.php?courcename=MCA" <?php if($_REQUEST['courcename']=='MCA')echo 'selected';?>>MCA</option>
								<option value="Search.php?courcename=MSCIT"<?php if($_REQUEST['courcename']=='MSCIT')echo 'selected'; ?>>MSCIT</option>
						</select>
						</td>
					</tr>
					<tr align="center">
						<td>Name</td>
						<td>
							<div>
								<select name="name" required>
									<option>--Select--</option>
<?php
$sql = mysqli_query($con, "SELECT * From student_register WHERE scourse='". $_REQUEST['courcename'] ."'");
$row1 = mysqli_num_rows($sql);
while ($row1 = mysqli_fetch_array($sql))
{
	echo "<option>" .$row1['sname'] ."</option>" ;
}
?>							
								</select>
							</div>
						</td>
					</tr>
					<tr align="center">
						<td colspan="2"><input type="submit" name="btnsearch" value="Search"></td>	
					</tr>
				</table>
			</center>
		</form>
		<?php
				if(isset($_POST['btnsearch']))
				{	
					$query = " SELECT * FROM student_register INNER JOIN result ON student_register.stud_id=result.stud_id WHERE sname = '" . $_POST["name"]."' ";
					
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
					echo "<font size='5px'>No Data Found</font>";
					echo "<br>";  
					echo "<br>";
				}
				}
else{
	exit();
}	
		?>
		<br><br>
		<center>
		<table border="1">
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





