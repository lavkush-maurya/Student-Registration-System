<?php 
  session_start();
	if(isset($_SESSION["studentlogin"])) {
    header("Location:StudentDashboard.php");
    }
?>
<html>
	<head>
		<title>
			Student Login
		</title>
	</head>
	<body bgcolor="rgb(0, 89, 255)">
		<form action="" method="POST">
			<center><br><br><br><br><br><br><br><br><br>
				<table border="3" cellspacing="3px" bgcolor="white" height="26%" width="20%">
					<tr>
						<th colspan="2">Student Login</th>
					</tr>
					<tr align="center">
						<td>Email</td>
						<td><input type="email" name="email" required placeholder="Enter Name"></td>
					</tr>
					<tr align="center">
						<td>Password</td>
						<td><input type="password" name="password" required placeholder="Enter Password"></td>
					</tr>
					<tr align="center">
						<td colspan="2"><input type="submit" name="btnlogin" value="login"></td>	
					</tr>
				</table>
			</center>
		</form>
	</body>
</html>
<?php 
include('connection1.php');
if(isset($_POST['btnlogin']))
{
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql= "SELECT * FROM student_register WHERE semail='$email' and spassword='$password'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	if($row>0)
	{
		if($row['status']=='Active')
		{
			$_SESSION["studentlogin"]= $_POST['email'];
			header('location:StudentDashboard.php');
		}
		else
		{
			echo"<script>alert('Your Account Has Been Disabled.!!!')</script>";
		}
	}
	else
	{
		echo"<script>alert('Wrong Credentials OR Error Try Again....')</script>";
	}
	
}
?>