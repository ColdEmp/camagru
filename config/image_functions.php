<?PHP

function pager_images()
{
    try
    {

    }
    catch(PDOException $e)
    {
        
    }
}

function home_img()
{
    
}

function get_posts()
{
    
}

function retrieve_img()
{
    
}

function ver_img()
{
    
}

function get_img()
{
    
}

function get_likes()
{
    
}

function home_get_comment()
{
    
}


function id_arr()
{
   try
   {
       $connection = open_connection();
       $statement = $connection->prepare("SELECT imageid FROM images");
       $statement->execute();
       $result = $statement->fetchAll(PDO::FETCH_COLUMN);
       return ($result);
    //    $statement->closeCursor();
   }
   catch(PDOException $e)
   {
        die("Failed to id_array: " . $e->getMessage());
   }
}

function pager($mode, $amm)
{
    try
    {
        // $max = count(id_arr());
        $max = 32;
        if ($page = $_GET['page'])
        {
            if ($page > 1 && mode == -1)
                $page--;
            else if (($page * $amm) < $max && mode == 1)
                $page++;
        }
        else
        {
            $page = 1;
        }
        echo "./index.php?page=$page";
    }
    catch(PDOException $e)
    {
        echo "Failed to get page linking thingy...\n";
    }
}

?>