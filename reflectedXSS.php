<?php include 'link-database.php';?>
<html>
<head>
<title>DEMO REFLECTED XSS</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<img src="img/logo.png" height="20%">
	<form method="post">
		<input type="submit" value="Logout" name="logout"> <input
			type="submit" value="Back" name="back">
	</form>
	<div>
		<h2>DEMO REFLECTED XSS</h2>
		<form method="get">
			Yourname: <input type="text" name="txt" required><br>
			<br> <input type="submit" value="Send" name="send">
		</form>
		<br>
<?php
if (isset($_GET['send'])) {
    $ten = $_GET['txt'];
    echo "<font color='red'>Hello " . $ten . "</font>";
}
?>
</div>
</body>
</html>