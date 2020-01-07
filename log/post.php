<?php
include_once "./header.php";

$action = $_POST["action"];
$image = $_POST["img"];
$username = $_POST["name"];

user_nlogged_redirect();

if(!isset($_POST["img"]))
{
	notify("No image received");
}

if($action = "post"){
	add_image($img,$username);
}
?>