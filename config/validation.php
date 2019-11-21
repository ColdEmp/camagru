<?PHP

function valid_username($username)
{
    try
    {

    }
    catch(PDOException $e)
    {
        die("Failed to validate username: " . $e->getMessage());
    }
}

function valid_password($rawpass)
{
    try
    {

    }
    catch(PDOException $e)
    {
        die("Failed to validate password: " . $e->getMessage());
    }
}

function valid_email($email)
{
    try
    {

    }
    catch(PDOException $e)
    {
        die("Failed to validate email: " . $e->getMessage());
    }
}

?>