<?php
include_once "functions.php";
$host = 'localhost';
$user = 'server01';
$password = 'Password@php1';
$dbname = 'camgru_db';

try{
$dsn = 'mysql:host=' . $host;
// $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$connection = new PDO($dsn, $user, $password);
}catch(PDOException $e){
    die('Connection Error: ' . $e->getMessage() );
}
//$connection = new mysqli($host,$user,$password);
$statement = $connection->prepare("CREATE DATABASE IF NOT EXISTS $dbname");
if($statement->execute())
{
    echo "Success Database\n";
}
//mysqli_query($connection,"CREATE DATABASE IF NOT EXISTS camagru_db");
//$db = mysqli_connect($host,"server01","Password@php1","camagru_db");
// mysqli_select_db($connection, 'camagru_db');
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$connection = new PDO($dsn, $user, $password);

//user table
$username = "username TEXT(50)";
$firstname = "firstname TEXT(50)";
$surname = "surname TEXT(50)";
$email = "email TEXT(50)";
$user_password = "user_password TEXT(50000)";
$notification_pref = "notifications BOOLEAN";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Users ($username,$firstname,$surname,$user_password,$email,$notification_pref)");
if($statement->execute())
{
    echo "Success Users\n";
}
// mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Users ($username,$firstname,$surname,$password,$email,$notification_pref)");

//image table
$image = "image TEXT(100)";
$imagename = "imagename TEXT(50)";
$uploader = "uploader TEXT(50)";
$date_created = "date_created DATE";
$edited = "edited BOOLEAN";
$statement = $connection->prepare("CREATE TABLE IF NOT EXISTS Images ($image,$imagename,$uploader,$date_created,$edited)");
if($statement->execute())
{
    echo "Success Images\n";
}
// mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Images ($image,$imagename,$uploader,$date_created,$edited)");
?>