<?php 
include("header2.php");
session_start();
if(!$_SESSION['studentlogin'])
{
	header("location:login.php");
}
 ?>
<html>
	<head>
		<title>
			Forgot Password
		</title>
	</head>
	<body bgcolor="gray">
		<form action="" method="POST">
			<center><br><br><br><br><br><br><br>
				<table border="3" cellspacing="2px" bgcolor="white" width="25%">
					<tr>
						<th colspan="2">Forgot Password</th>
					</tr>
					<tr align="center">
						<td>Old Password</td>
						<td><input type="password" name="opwd" required placeholder="Enter Old Password"></td>
					</tr>
					<tr align="center">
						<td>New Password</td>
						<td><input type="password" name="npwd" required placeholder="Enter New Password"></td>
					</tr>
					<tr align="center">
						<td>Conform Password</td>
						<td><input type="password" name="cpwd" required placeholder="Enter Confrim Password"></td>
					</tr>
					<tr align="center">
						<td colspan="2"><input type="submit" name="changepw" value="Change Password"></td>	
					</tr>
				</table>
			</center>
		</form>
	</body>
</html>
<?php
include("connection1.php");
if(isset($_POST['changepw']))
{
 $oldpass=($_POST['opwd']);
 $email=$_SESSION['studentlogin'];
 $npassword=($_POST['npwd']);
 $cpassword=($_POST['cpwd']);
	$sql=mysqli_query($con,"SELECT spassword FROM student_register where spassword='$oldpass' && semail='$email'");
	$num=mysqli_fetch_array($sql);
	if($npassword != $cpassword)
	{
		echo"<script>alert('New Password And Conform Passowrd Do Not Match');</script>";
	}
	else if($num>0)
	{
		$conn=mysqli_query($con,"update student_register set spassword='$npassword' where semail='$email'");
		echo"<script>alert('Passowrd Changed');</script>";
	}
	else
	{
		echo"<script>alert('Please enter true Old Passowrd');</script>";
	}
}
?>