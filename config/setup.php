<?php
include_once "functions.php";
$host = 'localhost';
$user = 'server01';
$password = 'Password@php1';
$dbname = 'camgru_db';

try
{
    $dsn = 'mysql:host=' . $host;
    // $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    $connection = new PDO($dsn, $user, $password);
}
catch(PDOException $e)
{
    die('Connection Error: ' . $e->getMessage() );
}
//$connection = new mysqli($host,$user,$password);
$statement = $connection->prepare("CREATE DATABASE IF NOT EXISTS $dbname");
if($statement->execute())
{
    echo "Success Database<br />";
}
//mysqli_query($connection,"CREATE DATABASE IF NOT EXISTS camagru_db");
//$db = mysqli_connect($host,"server01","Password@php1","camagru_db");
// mysqli_select_db($connection, 'camagru_db');
//$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$connection = open_connection();//new PDO($dsn, $user, $password);

//user table
$userid = "userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
$username = "username TEXT(50)";
$email = "email TEXT(50)";
$userpass = "userpass TEXT(255)";
$verification_token = "verification_token INT";
$verified = "verified BOOLEAN DEFAULT FALSE";
$notifications = "notifications BOOLEAN DEFAULT TRUE";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Users ($userid,$username,$email,$userpass,$verification_token,$verified,$notifications)");
if($statement->execute())
{
    echo "Success Users<br />";
}
// mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Users ($username,$firstname,$surname,$password,$email,$notification_pref)");

//image table
$imageid = "imageid INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
$userid = "userid INT";
$image_src = "image_src TEXT(5000)";
$name = "name TEXT(50)";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Images ($imageid,$userid,$image_src,$name)");
if($statement->execute())
{
    echo "Success Images<br />";
}
// mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Images ($image,$imagename,$uploader,$date_created,$edited)");

//comment table
$commentid = "commentid INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
$imageid = "imageid INT";
$userid = "userid INT";
$comment_text = "comment_text TEXT(5000)";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Comments ($commentid,$imageid,$userid,$comment_text)");
if($statement->execute())
{
    echo "Success Comments<br />";
}

?>