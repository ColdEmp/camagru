<?php

require_once "./functions.php";
$username = "test";
$email = "cdglanville@gmail.com";
$password = "testpass";
$table = "users";
$column = "username";
$item = "test";

//add_user($username,$email,"test");
//change_password("test","unique");
//remove_item($table,$column,$item);
//valid_login("test","testpass");
//echo "stage 8<br />";
//$temp = find_specified("email" ,"users","username","test");
//echo($temp);
//verfiy_email("new_account","9854000");
//change_notification("test", 1);
//verification_email("test","cdglanville@gmail.com","5482136");
//change_email("test","test@email.com");
//add_comment(1,"test","test message to infinite");
//count_comments(1);
//add_like(1,"test");
//count_likes(1);
//remove_like(1,"test");
//remove_item("comments", "commentid", $x);
//verification_email($username,$email,"");
header("Location: ../index.php");
?>