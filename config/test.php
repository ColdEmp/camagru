<?php
include_once "functions.php";
$username = "Test";
$email = "john.smith@email.com";
$password = "testpass";
$table = "users";
$column = "username";
$item = "test";

//add_user($username,$email,$password);
//change_password("test","unique");
remove_item($table,$column,$item);

?>