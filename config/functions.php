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

function valid_login($login_u, $login_p)
{
    try
    {

        $userpass = hash("whirlpool", $login_p);
        $connection = open_connection();
        $statement = $connection->prepare("SELECT userid FROM users WHERE username = '$login_u' AND userpass = '$userpass' AND verified = '1'");
        if($statement->execute())
        {
            echo "Successfully validated login <br />";
            //print_r($statement->fetchAll());
            $temp = $statement->fetchAll();
            //echo $temp[0][0];
            if ($temp != NULL)
            {
                return (TRUE);
            }
            else
            {
                return (FALSE);
            }
        }
    }
    catch(PDOException $e)
    {
        die("Failed to validate login: " . $e->getMessage());
    }
}

function find_specified($specified, $table, $column, $item)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT $specified FROM $table WHERE $column = '$item'");
        if($statement->execute())
        {
            echo "Successfully looked for $specified <br />";
            $temp = $statement->fetchAll();
            return ($temp[0][0]);
        }
    }
    catch(PDOException $e)
    {
        die("Failed to look for $specified: " . $e->getMessage());
    }
}

// function find_userid($username)
// {
//     try
//     {
//         $connection = open_connection();
//         $statement = $connection->prepare("SELECT userid FROM users WHERE username = '$username'");
//         if($statement->execute())
//         {
//             echo "Successfully looked for userid <br />";
//             $temp = $statement->fetchAll();
//             return ($temp[0][0]);
//         }
//     }
//     catch(PDOException $e)
//     {
//         die("Failed to look for userid: " . $e->getMessage());
//     }
// }

// function find_imageid($name)
// {
//     try
//     {
//         $connection = open_connection();
//         $statement = $connection->prepare("SELECT imageid FROM images WHERE 'name' = '$name'");
//         if($statement->execute())
//         {
//             echo "Successfully looked for imageid <br />";
//             $temp = $statement->fetchAll();
//             return ($temp[0][0]);
//         }
//     }
//     catch(PDOException $e)
//     {
//         die("Failed to look for iamgeid: " . $e->getMessage());
//     }
// }

// function find_email($username)
// {
//     try
//     {
//         $connection = open_connection();
//         $statement = $connection->prepare("SELECT email FROM users WHERE username = '$username'");
//         if($statement->execute())
//         {
//             echo "Successfully looked for email <br />";
//             $temp = $statement->fetchAll();
//             return ($temp[0][0]);
//         }
//     }
//     catch(PDOException $e)
//     {
//         die("Failed to find email: " . $e->getMessage());
//     }
// }

function add_image($username, $image_src, $name)
{
    try
    {
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(userid,iamge_src,name)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO images $column VALUES ('$userid',' . $connection->quote($image_src) . ','$name')");
        if($statement->execute())
        {
            echo "Successfully tried to add an image";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add image: " . $e->getMessage());
    }
}

function add_commnet($name, $username, $comment_text)
{
    try
    {
        $imageid = find_specified("imageid", "images", "name", $name);
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(imageid,userid,comment_text)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO comments $column VALUES ('$imageid','$userid','$comment_text')");
        if($statement->execute())
        {
            echo "Successfully tried to add a comment";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add comment: " . $e->getMessage());
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
