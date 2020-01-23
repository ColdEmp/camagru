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

function verification_email($username,$email,$verification_token)
{
    try
    {
        $message = "
Hello $username

Thank you for signing up!
Your account has been created, you can login to Camaguru after you have activated your account by following the link below.

http://127.0.0.1:8080/camagru/log/email_verification.php?username=$username&verification_token=$verification_token

Camaguru team
";
        //"http://127.0.0.1:8080/camagru/log/email_verification.php?username=" . $username . "&verification_token=" . $verification_token;
        mail($email, "Camaguru user: $username", $message);
    }
    catch(Exception $e)
    {
        die("Failed to send verification email: " . $e->getMessage());
    }
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
        verification_email($username,$email,$verification_token);
    }
    catch(PDOException $e)
    {
        die("Failed to add user: " . $e->getMessage());
    }
}

function forgot_password($username, $email)
{
    try
    {
        $verification_token = random_int(1000000,9999999);
        $connection = open_connection();
        $statement = $connection->prepare("UPDATE users SET verification_token=:verification_token WHERE username=:username");
        $statement->execute(array('verification_token' => $verification_token, 'username' => $username));
        $message = "
Hello $username

If you requested this password reset email please follow the link below to set a new password.

http://127.0.0.1:8080/camagru/pages/forgotPass.php?username=$username&verification_token=$verification_token

Camaguru team
";
        mail($email, "Camagru password reset: $username", $message);
    }
    catch(PDOException $e)
    {
        die("Failed to send password reset email: " . $e->getMessage());
    }
}

function forgot_password_not_verified($username, $email)
{
    try
    {
        $message = "
Hello $username

A password reset was requested for this account, but this account has not been verified yet.
Please check your email for a verification email and verify your account before requesting a password reset.

Camaguru team
";
        mail($email, "Camagru forgot password: $username", $message);
    }
    catch(Exception $e)
    {
        die("Failed to send not verified forgot password email: " . $e->getMessage());
    }
}

function forgot_password_not_exist($email)
{
    try
    {
        $message = "
Hello

A password reset was requested for an account linked to this email, but there is no Camaguru account linked to this email.

Camaguru team
";
        mail($email, "Camagru account does not exist", $message);
    }
    catch(Exception $e)
    {
        die("Failed to send no account email: " . $e->getMessage());
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
            //echo "Successfully tried to verify email";
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
        $statement->execute(array('username' => $username));
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

function valid_token($username, $verification_token)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT userid FROM users WHERE username = :username AND verification_token = :verification_token");
        if($statement->execute(array('username' => $username, 'verification_token' => $verification_token)))
        {
            $temp = $statement->fetchAll();
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
        die("Failed to validate request: " . $e->getMessage());
    }
}

// New function, testing it out, Heinrich sucks, Epstein didn't kill himself
function get_specific($target, $table, $column, $value){
	try {
		$connection = open_connection();
		$ret = $connection->prepare("SELECT * FROM `$table` WHERE `$column`=:value");
		$ret->execute(array('value' => $value));
		$result = $ret->fetch(PDO::FETCH_ASSOC);
		if (!$result[$target])
			return (0);
		return ($result[$target]);
	} catch (PDOException $e) {
		echo "failed to get_specific".$e->getMessage()."\n";
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
            if(!isset($temp[0][0]))
            {
                return(-1);
            }
            else
            {
              return ($temp[0][0]);
            }
        }
    }
    catch(PDOException $e)
    {
        print("Failed to look for $specified: " . $e->getMessage() . "<br />");
        $statement->debugDumpParams();
        die();
    }
}

//does work
function add_image($username,$image_src)
{
    try
    {
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(userid,image_src)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO images $column VALUES ('$userid',:image_src)");
        $statement->bindParam(':image_src',$image_src,PDO::PARAM_LOB);
        if($statement->execute())//array('image_src' => $image_src)))
        {
            echo "Successfully tried to add an image";
        }
    }    
    catch(PDOException $e)
    {
        die("Failed to add image: " . $e->getMessage());
    }
}

function add_comment($imageid, $username, $comment_text)
{
    try
    {
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(imageid,userid,comment_text)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO comments $column VALUES ('$imageid','$userid',:comment_text)");
        if($statement->execute(array('comment_text' => $comment_text)))
        {
            //echo "Successfully tried to add a comment";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add comment: " . $e->getMessage());
    }
}

function count_comments($imageid)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT COUNT(*) FROM comments WHERE imageid='$imageid'");
        if($statement->execute())
        {
            //echo "Successfully tried to count comments";
            $temp = $statement->fetchAll();
            //echo "<br />".$temp[0][0];
            return ($temp[0][0]);
        }
    }
    catch(PDOException $e)
    {
        die("Failed to count comments: " . $e->getMessage());
    }
}

function return_comments($imageid)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT comment_text FROM comments WHERE imageid='$imageid'");
        if($statement->execute())
        {
            $temp = $statement->fetchAll();
            return ($temp);
        }
    }
    catch(PDOException $e)
    {
        die("Failed to return comments: " . $e->getMessage());
    }
}

function add_like($imageid, $username)
{
    try
    {
        $userid = find_specified("userid", "users", "username", $username);
        $column = "(imageid,userid)";
        $connection = open_connection();
        $statement = $connection->prepare("INSERT INTO likes $column VALUES ('$imageid','$userid')");
        if($statement->execute())
        {
            //echo "Successfully tried to add a like";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to add like: " . $e->getMessage());
    }
}

function remove_like($imageid, $username)
{
    try
    {
        $userid = find_specified("userid", "users", "username", $username);
        $connection = open_connection();
        $statement = $connection->prepare("DELETE FROM likes WHERE imageid='$imageid' AND userid='$userid'");
        if($statement->execute())
        {
            //echo "Successfully tried to remove a like";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to remove like: " . $e->getMessage());
    }
}

function count_likes($imageid)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT COUNT(*) FROM likes WHERE imageid='$imageid'");
        if($statement->execute())
        {
            //echo "Successfully tried to count likes";
            $temp = $statement->fetchAll();
            //echo "<br />".$temp[0][0];
            return ($temp[0][0]);
        }
    }
    catch(PDOException $e)
    {
        die("Failed to count likes: " . $e->getMessage());
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
            //echo "Successfully changed password";
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
            //echo "Successfully changed username";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to change username: " . $e->getMessage());
    }
}

function change_email($username,$new_email)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("UPDATE users SET email=:new_email WHERE username=:username");
        if($statement->execute(array('new_email' => $new_email, 'username' => $username)))
        {
            //echo "Successfully changed email";
        }
    }
    catch(PDOException $e)
    {
        die("Failed to change email: " . $e->getMessage());
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
