<html>
<head>
<title>DEMO REFLECTED XSS</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
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
if(isset($_POST["logout"])){
    header("location: index.php");
}

if(isset($_POST["back"])){
    header("location: nav.php");
}
?>
</div>
</body>
</html>