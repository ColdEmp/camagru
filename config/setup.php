<?php
include_once "functions.php";
$host = 'localhost:3306';
$user = 'server01';
$password = 'Password@php1';
$dbname = 'camgru_db';

// Set DSN
//$dsn = 'mysql:host=' . $host . ';dbname=' . $bdname;

// Create a PDO instance
// $pdo = new PDO($dsn, $user, $password);//connection

$connection = new mysqli($host,$user,$password);
mysqli_query($connection,"CREATE DATABASE IF NOT EXISTS camagru_db");
//$db = mysqli_connect($host,"server01","Password@php1","camagru_db");//unnessasary I think, see *
mysqli_select_db($connection, 'camagru_db');//*

//user table
$username = "username TEXT(50)";
$firstname = "firstname TEXT(50)";
$surname = "surname TEXT(50)";
$email = "email TEXT(50)";
$password = "password TEXT(50000)";
$notification_pref = "notifications BOOLEAN";
mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Users ($username,$firstname,$surname,$password,$email,$notification_pref)");

//image table
$image = "image TEXT(100)";
$imagename = "imagename TEXT(50)";
$uploader = "uploader TEXT(50)";
$date_created = "date_created DATE";
$edited = "edited BOOLEAN";
mysqli_query($connection,"CREATE TABLE IF NOT EXISTS Images ($image,$imagename,$uploader,$date_created,$edited)");

?>