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
<title>BLOG</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post"><input type="submit" value="Logout" name="logout"></form>
<div>
<h2>Welcome <?php echo $_SESSION["user"]?></h2>
<form method="get" id="blog">
<table align="center">
<tr>
<td>Title: </td>
<td><input type="text" name="title" ></td>
</tr>
<tr>
<td>Content: </td>
<td><textarea rows="6" cols="80"></textarea></td>
</tr>
</table>
<input type="submit" value="Send" name="send">
</form><br><br>
</div>
<div>
<table id="blog" align="center">
<thead>
<tr height="30" bgcolor="#ffb717" align="center">
	<th width="80">Owner</th>
	<th width="200">Date</th>
	<th width="400">Content</th>
</tr>
</thead>
<tbody>
<?php include 'showblogs.php';?>
</tbody>
</table>
</div>
</body>
</html>
<?php 
if(isset($_GET["send"])){
    
}
if(isset($_POST["logout"])){
    session_destroy("user");
    setcookie("Username", "", time() - 3600);
    header("location: index.php");
}
?>