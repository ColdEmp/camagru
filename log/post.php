<?php
include_once "./header.php";

$action = $_POST["action"];
$image = $_POST["img"];
$username = $_SESSION["username"];

if(!isset($_POST["img"]))
{
	notify("No image received");
}

if($action = "post"){
	//$binary_img = base64_encode(file_get_contents($image));
	$image = str_replace('data:image/jpeg;base64,', '', $image);
	$image = str_replace(' ', '+', $image);
	$worthless = base64_decode($image);
	add_image($username,$image);
}
?>