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
	function notify($message){
		echo "
		<div class = 'box has-text-centered has-background-grey-dark'>
		<p class=\"content is-5 has-text-light\">" . $message . "</p>
		</div>
		";
	}
?>