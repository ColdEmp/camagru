<?php
require_once "../config/functions.php";
$username = $_GET['username'];
$verification_token = $_GET['verification_token'];
if(!valid_token($username, $verification_token))
{
    header("Location: ../index.php");
}
//capture a password and pass that password to:
//change_password($username,$new_password);
?>