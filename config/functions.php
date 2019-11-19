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

function button_test()
{
    echo ("Hello World");
}

function add_user($username, $email, $raw_password)
{
    echo "REEEEEEEEEEEEEEEEEEEEEEEEEEEE2EEEEEEEEEEEEEEEEEEEEEEEEEEEE";
    try
    {
        echo "REEEEEEEEEEEEEEEEEEEEEEEEEE1EEEEEEEEEEEEEEEEEEEEEEEEEEEEEE";
        $column = "(username,email,password,verification_token)";
        $verification_token = random_int(1000000,9999999);
        $password = hash("whirlpool", $raw_password);
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO users $column VALUES ('$username','$email','$password','$verification_token')");
        if($statement->execute())
        {
            echo "Success add_user\n";
        }
    }
    catch(PDOException $e)
    {
        echo "REEEEEEEEEEEEEEEEEEEEEEEE3EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE";
        die('Failed to add user: ' . $e->getMessage());
    }
}

function change_password($username, $new_password)
{
    try
    {
        $column = "(password)";
    }
    catch(PDOException $e)
    {
        die('Failed to change password: ' . $e->getMessage());
    }
}
?>
