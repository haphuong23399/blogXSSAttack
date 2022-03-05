<html>
<head>
<title>DEMO XSS ATTACK</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<img src="img/logo.png" height="20%">
	<div>
		<h2>Login</h2>
		<form id="login" method="post" action="nav.php">
			Username: <input type="text" name="username"><br>
			<br> Password: <input type="password" name="password"><br> <br>
			<br> <input type="submit" value="Login" name="submit">
		</form>
	</div>
</body>
</html>
<?php
if (isset($_SESSION["user"]) || isset($_COOKIE["Username"])) {
    setcookie("Username", "", time() - 3600, "/", "", 0);
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }
    session_destroy();
    session_unset();
}
?>