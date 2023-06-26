<html>
<?php
session_start();
error_reporting(0);
$se_admin=$_SESSION['admin'];
if($se_admin==false){
    header('location:login1.php');
}
?>
<head>
    <title>header</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
    <nav>
        <lable class="logo" style="color:black;">Admin Dashboard</lable>
        <ul>
            <li ><a href="registration1.php"  style="color:black;">student registration</a></li>
            <li><a href="marksheet1.php"  style="color:black;">student marksheet</a></li>
            <li><a href="search.php"  style="color:black;">search</a></li>
            <li><a href="logout.php"  style="color:black;">logout</a></li>
            
        </ul>
    </nav>
   <lable align="center" style="color:cyan;"> Username: <?php echo $se_admin; ?></lable>
</body>
</html>