<?php

if(isset($_POST['submit']))
{
   $getstudentname=$_POST['sname'];
   $getstudentcourse=$_POST['course'];
   $getstudentsemester=$_POST['semester'];
   $getstudentsub1=$_POST['sub1'];
   $getstudentsub2=$_POST['sub2'];
   $getstudentsub3=$_POST['sub3'];
   $getstudentsub4=$_POST['sub4'];
   $getstudentsub5=$_POST['sub5'];

   $total=$getstudentsub1 + $getstudentsub2 + $getstudentsub3 + $getstudentsub4 +  $getstudentsub5;

   $percentage=$total * 100/500;
  
   if($getstudentsub1 >= 50 && $getstudentsub2=>50 && $getstudentsub3>= 50 && $getstudentsub4>=50 && $getstudentsub5>=50)
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

   $insertquery="INSERT INTO 'result'('stud_id','course','semester','sub1','sub2','sub3','sub4','sub5' ,'total','percentage','class','result') VALUES($stud_id,'$course',$semester,$sub1,$sub2,$sub3,$sub4,$sub5,$total,$percentage,'$class','$result')";
?>











<?php
    $query1="SELECT * FROM `result`";
    $m=mysqli_query($con,$query1);

    while($row=mysqli_fetch_array($m)){
    ?>
    <tr>
       <td><?php echo $row['sname'];?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['semester'];?> </td>
        <td><?php echo $row['sub1'];?></td>
        <td><?php echo $row['sub2'];?></td>s
        <td><?php echo $row['sub3'];?></td>
        <td><?php echo $row['sub4'];?></td>
        <td><?php echo $row['sub5'];?></td>
    </tr>
    <?php } ?>
