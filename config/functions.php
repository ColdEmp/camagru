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
        die("Connection Error: " . $e->getMessage());
    }
    return $connection;
}

function add_user($username, $email, $raw_password)
{
    try
    {
        $column = "(username,email,userpass,verification_token)";
        $verification_token = random_int(1000000,9999999);
        $userpass = hash("whirlpool", $raw_password);
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO users $column VALUES ('$username','$email','$userpass','$verification_token')");
        if($statement->execute())
        {
            echo "Successfully added user";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add user: " . $e->getMessage());
    }
}

function add_image($username, $email, $raw_password)
{
    try
    {
        // $column = "(username,email,userpass,verification_token)";
        // $verification_token = random_int(1000000,9999999);
        // $userpass = hash("whirlpool", $raw_password);
        // $connection = open_connection();
        // $statement = $connection->prepare("INSERT INTO users $column VALUES ('$username','$email','$userpass','$verification_token')");
        // if($statement->execute())
        // {
        //     echo "Successfully added user";
        // }
    }
    catch(PDOException $e)
    {
        die("Failed to add image: " . $e->getMessage());
    }
}

function change_password($username,$raw_password)
{
    try
    {
        $userpass = hash("whirlpool", $raw_password);
        $connection = open_connection();
        $statement = $connection->prepare("UPDATE users SET userpass='$userpass' WHERE username='$username'");
        if($statement->execute())
        {
            echo "Successfully changed password";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to change password: " . $e->getMessage());
    }
}

function remove_item($table, $column, $item)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("DELETE FROM $table WHERE $column='$item'");
        if($statement->execute())
        {
            echo "Successfully deleted $item";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to delete item: " . $e->getMessage());
    }
}
?>
