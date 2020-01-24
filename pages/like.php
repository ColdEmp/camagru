<?php
	include_once "./header.php";
	$action = $_POST["action"];
	$img = $_POST["img"];
	$user = $_POST["user"];

	if($action == "like"){
		add_like($img,$user);
	}else
	{
		remove_like($img,$user);
	}
?>