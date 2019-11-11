<?php

function open_connection()
{
    $host = 'localhost';
    $user = 'server01';
    $password = 'Password@php1';
    $dbname = 'camgru_db';
    try
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        $connection = new PDO($dsn, $user, $password);
    }
    catch(PDOException $e)
    {
        die('Connection Error: ' . $e->getMessage() );
    }
    return $connection;
}

function add_user($username, $firstname, $surname, $email, $raw_password)
{
    try
    {
        $notification_pref = TRUE;
        $column = "(username,firstname,surname,email,user_password,notification_pref)";
        $hashed_password = hasher($raw_password);
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO Users $column VALUES ('$username','$firstname','$surname','$email',$hashed_password,$notification_pref)");
        $statement->execute();
    }
    catch(PDOException $e)
    {
    die('Failed to add user: ' . $e->getMessage() );
    }
}

?>