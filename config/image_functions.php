<?PHP
include_once 'functions.php';

function pager_images($no, $page)
{
    try
    {
        echo "<div class=\"column middle c\" onload=\"scrolltest();\">";
        home_img($no, $page, "column middle image");
        echo "</div>";
    }
    catch(PDOException $e)
    {
        echo "Failed to print home images\n";
    }
}

function home_img($amm, $page_no, $class)
{
    try
    {
        $index = $page_no;
        $arr = id_arr();
        $counter = 0;
        $max = count($arr);
        $max -= $amm * ($page_no - 1);
        $image = 0;
                // Line below needs it's function to be made
        // $posts = get_posts($page_no);
        while ($image < $amm)
        {
            $i = $arr[$max - 1];
            $page = $_GET['page'];
            if (ver_img($i) == 0)
            {
                return (0);
            }
            else
            {
                $img = retrieve_img($i, $class);
                        // Line below needs to be helped
                // $likes = get_likes(NULL, $i);
                $name = find_specified("username", "users", "userid", find_specified("userid", "images", "imageid", $i));
                echo ""; // for the actual display, very important, no touchie
                // You can insert something here to add a delete thingy for users that are logged in
                echo ""; // for the comment box
                
            }
        }
    }
    catch (PDOException $e)
    {
        
    }
}

function get_posts()
{
    try
    {

    }
    catch (PDOException $e)
    {
        
    }
}

function retrieve_img($i, $class)
{
    try
    {
        if(ver_img($i) == 0)
        {
            return (0);
        }
        else
        {
            return get_img($i, $class);
        }
    }
    catch (PDOException $e)
    {
        echo "Failed to retrieve image\n";
    }
}

function ver_img($imagesid)
{
    try
    {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT userid FROM images WHERE imageid = '$imagesid'");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$result['userid'])
        {
            return (0);
        }
        // The line below is uncertain, re-check later
        $statement->closeCursor();
        return ($result['userid']);
    }
    catch (PDOException $e)
    {
        echo "Failed to verify image\n";
    }
}

function get_img($imagesid, $class)
{
    try
    {
        $req = find_specified("image_src", "images", "imageid", $imagesid);
        if ($req == false)
        {
            return (0);
        }
        if ($class)
        {
            $return = "<img class=\"$class\" src='$req' />";
        }
        else
        {
            $return = "<img src='$req'/>";
        }
        return $return;
    }
    catch (PDOException $e)
    {
        echo "Failed to get image\n";
    }
}

function get_likes()
{
    try
    {

    }
    catch (PDOException $e)
    {
        
    }
}

function home_get_comment()
{
    try
    {

    }
    catch (PDOException $e)
    {
        
    }
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
        $max = count(id_arr());
        if ($page = $_GET['page'])
        {
            if ($page > 1 && $mode == -1)
                $page--;
            else if (($page * $amm) < $max && $mode == 1)
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