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
        die('Connection Error: ' . $e->getMessage());
    }
    return $connection;
}

function hasher($raw)
{
    $password = password_hash($raw,PASSWORD_DEFAULT);
    return ($password);
}

function add_user($username,$email,$raw_password)
{
    try
    {
        $column = "(username,email,password,verification_token)";
        $verification_token = random_int(1000000,9999999);
        $password = hasher($raw_password);
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO users $column VALUES ($username,$email,$password,$verification_token)");
        if($statement->execute())
        {
            echo "Success add_user\n";
        }
    }
    catch(PDOException $e)
    {
        die('Failed to add user: ' . $e->getMessage());
    }
}

?>