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
$userId = "userId TEXT(50)";
$username = "username TEXT(50)";
$email = "email TEXT(50)";
$password = "password TEXT(50000)";
$varification_token = "varification_token TEXT(1000)";
$varified = "varified BOOLEAN";
$notifications = "notifications BOOLEAN";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Users ($userId,$username,$email,$password,$varification_token,$varified,$notifications)");
if($statement->execute())
{
    echo "Success Users<br />";
}
// mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Users ($username,$firstname,$surname,$password,$email,$notification_pref)");

//image table
$imageId = "imageId TEXT(50)";
$userId = "userId TEXT(50)";
$image_src = "image_src TEXT(5000)";
$name = "name TEXT(50)";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Images ($imageId,$userId,$image_src,$name)");
if($statement->execute())
{
    echo "Success Images<br />";
}
// mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Images ($image,$imagename,$uploader,$date_created,$edited)");

//comment table
$commentId = "commentId TEXT(50)";
$imageId = "imageId TEXT(50)";
$comment_text = "comment_text TEXT(5000)";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Comments ($commentId,$imageId,$comment_text)");
if($statement->execute())
{
    echo "Success Comments<br />";
}

?>