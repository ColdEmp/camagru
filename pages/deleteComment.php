<?PHP
	include_once "./header.php";
	$id = $_POST["commentid"];
	remove_comment($id);
?>