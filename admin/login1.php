<html>
<head>
    <title></title>
    <link rel="stylesheet" href="loginstyle.css">

</head>
<body bgcolor="rgb(0, 89, 255)">
    <form method="POST">
    <div class="container" align="center">
        <h1 style="color:white;">Admin Login</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label style="color:white;">Username:</label>
                <input type="text" name="username1" class="">
            </div><br>
            <div class="form-group">
                <label style="color:white;">Password:</label>
                <input type="password" name="password1" class="">
            </div><br><br>
            <input type="submit" name="submit" value="LOGIN">
        </form>
    </div>
    </form>
</body>
</html>
<?php

if(isset($_POST['submit'])){
    $username=$_POST['username1'];
    $password=$_POST['password1'];

    if($username=="lavkush@1" && $password=="12345"){
        session_start();
        $_SESSION["admin"]=$username;
        header('location:index1.php');

    }else{
        header("location:login1.php");   
     }
}

?> 