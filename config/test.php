<?php
include_once "functions.php";
$username = "Test";
$email = "john.smith@email.com";
$password = "testpass";

try
{
    add_user($username,$email,$password);
}
catch(PDOException $e)
{
    die('Failed to add user: ' . $e->getMessage());
}

?>