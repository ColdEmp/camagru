<?php
include_once "./functions.php";

$username = "Test";
$firstname = "John";
$surname = "Smith";
$email = "john.smith@email.com";
$user_password = "testpass";

try
{
add_user($username,$firstname,$surname,$email,$user_password);
}
catch(PDOException $e)
{
    die('Failed to add user: ' . $e->getMessage() );
}

?>