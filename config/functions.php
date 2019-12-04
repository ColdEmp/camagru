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
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        print("Connection Error: " . $e->getMessage());
        die();
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
        $statement = $connection->prepare("INSERT INTO users $column VALUES (:user,:email,'$userpass','$verification_token')");
        $statement->execute(array('user' => $username, 'email' => $email));

    }
    catch(PDOException $e)
    {
        die("Failed to add user: " . $e->getMessage());
    }
}

function verification_email($username,$email,$verification_token)
{
    try
    {
        $message = "http://127.0.0.1:8080/camagru/log/email_verification.php?username=" . $username . "&verification_token=" . $verification_token;
        mail($email, "camgru user: $username", $message);
    }
    catch(Exception $e)
    {
        die("Failed to send verification email: " . $e->getMessage());
    }
}

function verfiy_email($username, $verification_token)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("UPDATE users SET verified=TRUE WHERE username=:username AND verification_token=:verification_token");
        if($statement->execute(array('username' => $username,'verification_token' => $verification_token)))
        {
            echo "Successfully tried to verify email";
        }
    }
    catch(Exception $e)
    {
        die("Failed to verify email: " . $e->getMessage());
    }
}

//pass 1 for true and 0 for false
function change_notification($username, $notification_setting)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("UPDATE users SET notifications='$notification_setting' WHERE username=:username");
        if($statement->execute(array('username' => $username)))
        {
            echo "Successfully tried to change notification setting";
        }
    }
    catch(Exception $e)
    {
        die("Failed to change notification setting: " . $e->getMessage());
    }
}

function valid_login($login_u, $login_p)
{
    try
    {
        $userpass = hash("whirlpool", $login_p);
        $connection = open_connection();
        $statement = $connection->prepare("SELECT userid FROM users WHERE username = :user AND userpass = '$userpass' AND verified = '1'");
        if($statement->execute(array('user' => $login_u)))
        {
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

//$specified is the name of column you want info from
//table is the table you want to look in
//column is the column where item is
//$item is the info you have
function find_specified($specified, $table, $column, $item)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT $specified FROM $table WHERE $column = :item");
        if($statement->execute(array('item' => $item)))
        {
            //echo "Successfully looked for $specified <br />";
            $temp = $statement->fetchAll();
            //print_r($temp);
            return ($temp[0][0]);
        }
    }
    catch(PDOException $e)
    {
        print("Failed to look for $specified: " . $e->getMessage() . "<br />");
        $statement->debugDumpParams();
        die();
    }
}

function add_image($username, $image_src, $name)
{
    try
    {
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(userid,iamge_src,name)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO images $column VALUES ('$userid',' . $connection->quote(:image_src) . ',:'name')");
        if($statement->execute(array('iamge_src' => $image_src, 'name' => $name)))
        {
            echo "Successfully tried to add an image";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add image: " . $e->getMessage());
    }
}

function add_comment($name, $username, $comment_text)
{
    try
    {
        $imageid = find_specified("imageid", "images", "name", $name);
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(imageid,userid,comment_text)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO comments $column VALUES ('$imageid','$userid',:comment_text)");
        if($statement->execute(array('comment_text' => $comment_text)))
        {
            echo "Successfully tried to add a comment";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add comment: " . $e->getMessage());
    }
}

function add_like($username, $name)
{
    try
    {
        $imageid = find_specified("imageid", "images", "name", $name);
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(imageid,userid)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO likes $column VALUES ('$imageid','$userid')");
        if($statement->execute())
        {
            echo "Successfully tried to add a like";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add like: " . $e->getMessage());
    }
}

function remove_like($username, $name)
{
    try
    {
        $imageid = find_specified("imageid", "images", "name", $name);
        $userid = find_specified("userid", "users", "username", $username);
        $connection = open_connection();
        $statement = $connection->prepare("DELETE FROM likes WHERE imageid='$imageid' AND userid='$userid'");
        if($statement->execute())
        {
            echo "Successfully tried to remove a like";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to remove like: " . $e->getMessage());
    }
}

function change_password($username,$raw_password)
{
    try
    {
        $userpass = hash("whirlpool", $raw_password);
        $connection = open_connection();
        $statement = $connection->prepare("UPDATE users SET userpass='$userpass' WHERE username=:username");
        if($statement->execute(array('username' => $username)))
        {
            echo "Successfully changed password";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to change password: " . $e->getMessage());
    }
}

function change_username($username,$new_username)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("UPDATE users SET username=:new_username WHERE username=:username");
        if($statement->execute(array('new_username' => $new_username, 'username' => $username)))
        {
            echo "Successfully changed username";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to change username: " . $e->getMessage());
    }
}

function remove_item($table, $column, $item)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("DELETE FROM $table WHERE $column=:item");
        if($statement->execute(array('item' => $item)))
        {
            //echo "Successfully deleted $item";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to delete item: " . $e->getMessage());
    }
}
?>
