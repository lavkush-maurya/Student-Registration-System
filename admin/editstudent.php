<?php 
include("connection.php");
$select_query = "SELECT * FROM student_register WHERE stud_id='" . $_GET["editid"] . "'";
$result = mysqli_query($con,$select_query);
$row = mysqli_fetch_array($result);
?>
<html>
	<head>
		<title>
			Edit Student
		</title>
	</head>
	<body>
		<form action="editstudent.php?editid=<?php echo $row['stud_id']; ?>" method="POST">
			<center>
				<table bgcolor="#ffffff" width=95% align="center" cellspacing=10>
					<tr>
						<td colspan=2>
							<h2>&nbsp;&nbsp;&nbsp;Edit Student Result</h2>
							<hr>
						</td>	
					</tr>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name"  value="<?php echo $row['sname']; ?>">
						</td>
					</tr>
					<tr>
						<td>Course</td>
						<td>
						<select name="course">
						<option value="MCA"
							<?php if($row["scourse"]=='MCA'){echo "selected";}?>>MCA
						</option>
						<option value="MSCIT"
							<?php if($row["scourse"]=='MSCIT'){echo "selected";}?>>MSCIT
						</option>
						</select>
						
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email"  value="<?php echo $row['semail']; ?>">	
						</td>
					</tr>
					<tr>
						<td>Contact</td>
						<td><input type="text" name="contact"  value="<?php echo $row['scontact']; ?>"></td>
					</tr>				
					
					<tr>
						<td>Gender</td>
						<td>
							<input value="male"  type="radio" name="gender"  <?php if($row['sgender']=="male"){echo "checked";}?>/>Male
							<input value="female"  type="radio" name="gender"  <?php if($row['sgender']=="female"){echo "checked";}?>/>Female
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<hr>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="btnupdate" value="Update Student" class="btn"></td>	
					</tr>
				</table>
			</center>
		</form> 
	</body>
</html> 
<?php 
if(isset($_POST['btnupdate']))
{
	$id = $_GET["editid"];
	$name = $_POST['name'];
	$course = $_POST['course'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$query = "UPDATE student_register SET sname='$name',scourse='$course',semail='$email',scontact='$contact',sgender='$gender' WHERE stud_id=$id";
	$c=mysqli_query($con,$query);
	if($c == true)
	{
		echo"<script>alert('Student Record Upadate Successfully!!!!');</script>";
		echo"<script>location.replace('registration1.php');</script>";
		
	}
	else
	{
		echo '<script>alert("Error In Record Upadate");</script>';
	}	
}
?>
