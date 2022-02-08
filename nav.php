<?php
include 'link-database.php';
session_start();
if(isset($_POST["submit"])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
    $user = mysqli_query($link, $sql);
    if(mysqli_num_rows($user)>0){
        $_SESSION["user"]=$username;
        if(isset($_SESSION["user"])){
            setcookie("Username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        else{
            header("location: index.php");
        }
    }
    else
    {
        header("location: index.php");
    }
}
?>
<html>
<head>
<title>NAVIGATION</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<h2>Welcome <?php echo $_SESSION["user"]?></h2>
<a href="reflectedXSS.php">Demo Reflected XSS</a>
<a href="blog.php">Demo Stored XSS</a>
</div>
</body>
</html>