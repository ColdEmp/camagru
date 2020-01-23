<?php
	include_once "./header.php";
	$newcomment = $_POST["newcomment"];
	$username = $_SESSION["username"];
	$imgid = $_POST["imageid"];
	if($_POST["submit"] == "submit")
	{
		add_comment($imgid,$username,$newcomment);
	}
	header("Location: ../index.php");
?>