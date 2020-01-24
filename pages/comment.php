<?php
	include_once "./header.php";
	$newcomment = $_POST["newcomment"];
	$username = $_SESSION["username"];
	$imgid = $_POST["imageid"];
	if($_POST["submit"] == "submit")
	{
		$userid_image = find_specified("userid", "images", "imageid", $imgid);
		$notif = find_specified("notifications", "users", "userid", $userid_image);
		if($notif == 1){
		$username_image = find_specified("username", "users", "userid", $userid_image);
		$email = find_specified("email", "users", "userid", $userid_image);
		notification_email($username,$username_image,$email);
		}
		add_comment($imgid,$username,$newcomment);
	}
	header("Location: ../index.php");
?>