<?php
	function user_logged_redirect()
	{
		if (isset($_SESSION["username"])){
			header("Location: ../index.php");
		}
	}
	function user_nlogged_redirect()
	{
		if (!isset($_SESSION["username"])){
			header("Location: ../index.php");
		}
	}
?>