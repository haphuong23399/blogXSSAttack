<?php
$link = new mysqli('localhost', 'root', '', 'blogdemoxssattack') or die("Kết nối thất bại");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST["logout"])){
    header("location: index.php");
}
if(isset($_POST["back"])){
    header("location: nav.php");
}
?>