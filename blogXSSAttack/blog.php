<?php
include 'link-database.php';
?>
<html>
<head>
<title>BLOG</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<img src="img/logo.png" height="20%">
	<form method="post">
		<input type="submit" value="Logout" name="logout">
		<input type="submit" value="Back" name="back">
	</form>
	<div>
		<h2>Welcome <?php echo $_SESSION["user"]?></h2>
		<form method="post" id="blog">
			<table align="center">
				<tr>
					<td>Content:</td>
					<td><textarea rows="6" cols="80" name="content" required></textarea></td>
				</tr>
			</table>
			<input type="submit" value="Send" name="send">
		</form>
		<br>
		<br>
	</div>
	<div>
		<table id="blog" align="center">
			<thead>
				<tr height="30" align="center">
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
include 'link-database.php';
if (isset($_POST["send"])) {
    $content = $_POST['content'];
    date_default_timezone_set('Asia/Bangkok');
    $day = date("Y-m-d g:i:s");
    $user = $_SESSION["user"];
    $sql = "INSERT INTO blog (username, content, date) VALUES ('" . $user . "','" . $content . "','" . $day . "')";
    $result = mysqli_query($link, $sql) or die("Thêm dữ liệu thất bại");
    if (! $result) {
        die("Thêm thất bại");
    } else {
        echo 'Thêm thành công!!';
        header("location: blog.php");
    }
}


?>