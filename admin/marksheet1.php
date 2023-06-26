<?php include('connection.php');
session_start();
error_reporting(0);
$se_admin=$_SESSION['admin'];
if($se_admin==false){
    header('location:login1.php');
}
?>
<html>
<head>
    <title>marksheet</title>
	<link rel="stylesheet" href="">
</head>
<body bgcolor="rgb(0, 89, 255)">
    <?php include('header1.php'); ?>
    <br>
    <form action="" method="POST">
    <center>
        <div>
        <table class="tab" border="2" bgcolor="white" cellspacing="5px">
            <tr>
                <th colspan="2" align="center">Enter Student Marks</th>
            </tr>
            <?php
                 $query1="SELECT * FROM `student_register`";
                 $m=mysqli_query($con,$query1);
             
                ?>
                <tr>
                <td>Student Name:</td>
                
                <td><select name="selectname">
                    <option>Name</option>
                    <?php     while($row=mysqli_fetch_array($m)){ ?>
                    <option value="<?php echo $row['stud_id'];?>"><?php echo $row['sname']; ?></option>
                    <?php } ?>
                </select></td>
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
                <td>Semester:</td>
                <td><select name="selectsem">
                    <option>Select sem</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                
                </select></td>
            </tr>
            <tr>
                <td>Subject 1:</td>
                <td><input type="text" name="sub1"></td>
            </tr>
            <tr>
                <td>Subject 2:</td>
                <td><input type="text" name="sub2"></td>
            </tr>
            <tr>
                <td>Subject 3:</td>
                <td><input type="text" name="sub3"></td>
            </tr>
            <tr>
                <td>Subject 4:</td>
                <td><input type="text" name="sub4"></td>
            </tr>
            <tr>
                <td>Subject 5:</td>
                <td><input type="text" name="sub5"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="insert"></td>
            </tr>

        </table>
        </form>
        <br><br>

        <table border="3" cellspacing="3px" bgcolor="white">

        <tr align="center">
            <th>Student name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Subject1</th>
            <th>Subject2</th>
            <th>Subject3</th>
            <th>Subject4</th>
            <th>Subject5</th>
            <th>Total</th>
            <th>Percentage</th>
            <th>Class</th>
            <th>Reslt</th>
        </tr>
        <?php
    $query1="SELECT * FROM `result` INNER JOIN `student_register` ON result.stud_id = student_register.stud_id" ;
    $m=mysqli_query($con,$query1);

    while($row=mysqli_fetch_array($m)){
    ?>
    <tr align="center">
       <td><?php echo $row['sname'];?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['semester'];?> </td>
        <td><?php echo $row['sub1'];?></td>
        <td><?php echo $row['sub2'];?></td>
        <td><?php echo $row['sub3'];?></td>
        <td><?php echo $row['sub4'];?></td>
        <td><?php echo $row['sub5'];?></td>
        <td><?php echo $row['total'];?></td>
        <td><?php echo $row['percentage'];?></td>
        <td><?php echo $row['class'];?></td>
        <td><?php echo $row['result'];?></td>
    </tr>
    <?php } ?>

        </table>
        </div>
    </center>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
   $getstudentname=$_POST['selectname'];
   $getstudentcourse=$_POST['txtcourse'];
   $getstudentsemester=$_POST['selectsem'];
   $getstudentsub1=$_POST['sub1'];
   $getstudentsub2=$_POST['sub2'];
   $getstudentsub3=$_POST['sub3'];
   $getstudentsub4=$_POST['sub4'];
   $getstudentsub5=$_POST['sub5'];

   $total=$getstudentsub1 + $getstudentsub2 + $getstudentsub3 + $getstudentsub4 +  $getstudentsub5;

   $percentage=$total * 100 / 500;
  
   if($getstudentsub1 >= 50 && $getstudentsub2>=50 && $getstudentsub3>= 50 && $getstudentsub4>=50 && $getstudentsub5>=50)
   {
     $result="PASS";
        if($percentage>=70 && $percentage<=100)
     {
           $class="FIRST DISTINCTION";
       }
       elseif($percentage>=60 && $percentage<=70)
       {
           $class="FIRST CLASS";
       }
       elseif($percentage>=50 && $percentage<=60)
       {
           $class="SECOND CLASS";
       }
       elseif($percentage>=40 && $percentage<=50)
       {
           $class="PASS CLASS";
       }
   }
   else{
      $result="FAIL";
   }

   $insertquery="INSERT INTO `result`(`stud_id`, `course`, `semester`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `total`, `percentage`, `class`, `result`) VALUES ('$getstudentname','$getstudentcourse','$getstudentsemester','$getstudentsub1','$getstudentsub2','$getstudentsub3','$getstudentsub4','$getstudentsub5','$total','$percentage','$class','$result')"; 

   $m=mysqli_query($con,$insertquery);
   if($m){
           echo "insert successfully...";
          header("location:marksheet1.php");
   }
}
?>

