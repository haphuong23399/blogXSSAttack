<html>
<head>
<title>DEMO XSS ATTACK</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<h2>Login</h2>
<form id="login" method="post" action="nav.php">
  Username: <input type="text" name="username"><br><br>
  Password: <input type="password" name="password"><br>
  <br><br>
  <input type="submit" value="Login" name="submit">
</form>
</div>
</body>
</html>
<?php 
if(isset($_SESSION["user"]) || isset($_COOKIE["Username"])){
//unset($_SESSION['user']);
setcookie( "Username", "", time()- 60, "/","", 0);
session_start();
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
}
session_destroy();
}
?>