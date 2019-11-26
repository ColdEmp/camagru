<?PHP

function valid_username($username)
{
    try
    {
        if(ctype_alnum($username))
        {
            if(find_specified("username", "users", "username", $username) == NULL)
            {
                return (TRUE);
            }
            else
                return (FALSE);
        }
        else
        {
            return (FALSE);
        }
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
        if(ctype_lower($rawpass))
        {
            return (0);
        }
        else
        {
            return (1);
        }
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
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return (1);
        }
        else
        {
            return (0);
        }
    }
    catch(PDOException $e)
    {
        die("Failed to validate email: " . $e->getMessage());
    }
}

?>