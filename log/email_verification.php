<?php

$username = $_GET['username'];
$verification_token = $_GET['verification_token'];
verfiy_email($username, $verification_token);
header("Location: ../index.php");

?>