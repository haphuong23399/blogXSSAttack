<html>
<head>
<title>DEMO XSS ATTACK</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<h2>Login</h2>
<form id="login" method="post" action="blog.php">
  Username: <input type="text" name="username"><br><br>
  Password: <input type="password" name="password"><br>
  <br><br>
  <input type="submit" value="Login" name="submit">
</form>
</div>
</body>
</html>