
<?php
session_start();
error_reporting(0);
$se_admin=$_SESSION['admin'];
if($se_admin==false){
    header('location:login1.php');
}
?>
<html>
<head>
    <title>Document</title>
</head>
<body bgcolor="rgb(0, 89, 255)">
<?php include('header1.php'); include('connection.php'); ?>
<div align="center">

    <h1 style="color:white;">Student Registration</h1>

    <form action="" method="POST" enctype="multipart/form-data">

    <table border="5" bgcolor="white" cellspacing="5px">
<tr>
    <td>Name:</td>
    <td><input type="text" name="studname"></td>
</tr>
<tr>
    <td>Course:</td>
    <td>
        <select name="selectcourse" id="">
            <option value="mca">MCA</option>
            <option value="mscit">MSC IT</option>
        </select>
    </td>
</tr>
<tr>
    <td>Email Id:</td>
    <td><input type="email" name="email"></td>
</tr>
<tr>
    <td>Password:</td>
    <td><input type="password" name="pass"></td>
</tr>
<tr>
    <td>Mobile No:</td>
    <td><input type="text" name="mobile"></td>
</tr>
<tr>
    <td>Gender:</td>
    <td>
        <input type="radio" name="textgender" value="male">Male
        <input type="radio" name="textgender" value="female">Female
    </td>
</tr>
<tr>    
    <td>
        Image
    </td>
    <td>
        <input type="file" name="img">
    </td>
</tr>
<tr>
    <td colspan="2" align="center">
    <input type="submit" name="btnsave" value="save">
    </td>
</tr>


    </table>
</form>
<br><br>
<table border="5" cellspacing="2px" bgcolor="white">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Email</th>
        <th>Mobile no</th>
        <th>Gender</th>
        <th>Image</th>
        <th>Status</th>
        <th colspan="2">Action</th>

    </tr>
    <?php
    $query1="SELECT * FROM `student_register`";
    $m=mysqli_query($con,$query1);

    while($row=mysqli_fetch_array($m)){
    ?>
    
    <tr>
        <td ><?php echo $row['stud_id'];?></td>
        <td><?php echo $row['sname']; ?></td>
        <td><?php echo $row['scourse'];?> </td>
        <td><?php echo $row['semail'];?></td>
        <td><?php echo $row['scontact'];?></td>
        <td><?php echo $row['sgender'];?></td>
        <td><img src="<?php echo $row['image'];?>" height="100px" width="100px"></td>
        <td><?php echo $row['status']; ?></td>
        <td><a href="editstudent.php?editid=<?php echo $row['stud_id']; ?>">edit</a></td>
        <?php if($row['status']=='Active')
        {
            ?><td><a href="registration1.php?Statuss=<?php echo $row['stud_id']; ?>">deactive</a></td>
        <?php }
        else
        {
            ?><td><a href="registration1.php?Statuss=<?php echo $row['stud_id']; ?>">active</a></td>
        <?php }?>
    </tr>
    </tr>
    <?php } ?>
</table>
</body>
</html>
<?php

//status enable disable code
if(isset($_REQUEST['Statuss']))
{
	$Statuss=$_REQUEST['Statuss'];

	$selectt1="SELECT * FROM student_register WHERE stud_id=$Statuss";
	$exeselect1=mysqli_query($con,$selectt1);
	while($d9=mysqli_fetch_array($exeselect1))
	{
		if($d9['status']=='Active')
		{
			$del="UPDATE student_register SET Status='Deactive' WHERE stud_id=$Statuss";
		}
		else
		{
			$del="UPDATE student_register SET Status='Active' WHERE stud_id=$Statuss";
		}
	}
	$dell=mysqli_query($con,$del);
	if($dell)
	{
		header("location:registration1.php");
	}
}

if(isset($_POST['btnsave']))
{
    $name=$_POST['studname'];
    $course=$_POST['selectcourse'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $mobile=$_POST['mobile'];
    $gender=$_POST['textgender'];
    $Image=$_FILES['img'];

    $target = "uploadd/";
    // basename(path, suffix)
		$target1 = $target . basename($_FILES['img']['name']);

        // move_uploaded_file(file,destination)
		move_uploaded_file($_FILES['img']['tmp_name'],$target1);

    
    $query = "INSERT INTO student_register(sname,scourse,scontact,spassword,semail,sgender,image,status) 
    VALUES('$name','$course','$mobile','$password', '$email','$gender','$target1','Active')";
    
    
   $aa = mysqli_query($con,$query);
  // echo $query;
   if($aa === true)
   {
       echo"<script>alert('Student Record Inserted Successfully!!!!');</script>";
   }
   else
   {
       echo "<script>alert('Error In Record Insert');</script>";
   }
}

if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

?>

