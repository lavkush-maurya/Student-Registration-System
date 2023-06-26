<?php include('header1.php');
session_start();
$se_admin=$_SESSION['admin'];
if($se_admin==false){
    header('location:login1.php');
}
?>