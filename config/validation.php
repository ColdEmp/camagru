<?PHP
require_once("../log/page_prot.php");
function valid_username($username)
{
    try
    {
        if(ctype_alnum($username))
        {
           // if(find_specified("username", "users", "username", $username) == NULL)
           // {
                return (TRUE);
          //   }
          //  else
          //      return (FALSE);
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
            return (false);
        }
        else
        {
            return (true);
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

function allowed_name($username)
{
	if (valid_username($username))
		{
			if(find_specified("username", "users", "username", $username) == -1)
			{
                if(strlen($username) < 50){
                    return(true);
                }
                else{
                    notify("Username is needs to be 50 characters long or shorter");
                    return(false);
                }
            }
			else{
                notify("Username is already in use");
                return(false);
			}
		}
		else
		{
            notify("Only alphanumeric characters may be used for the username.");	
            return(false);
		}
}


function allowed_email($email)
{
    if(find_specified("email", "users", "email", $email) == -1)
	{	
    	if (valid_email($email) == 1)
		{
			return (true);
		}
		else{
        notify("Invalid email");
        return(false);
		}
	}
    else
    {
    notify("That email is already in use");
    return(false);  
    }
}
?>