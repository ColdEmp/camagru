<?PHP
include_once 'index.php';

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
        $req = get_specific("image_src", "images", "imageid", $imagesid);
        if ($req == false)
        {
            return (0);
        }
        if ($class)
        {
            $return = '<img src="data:image/jpeg;base64,' . $req . '" />';
        }
        else
        {
            $return = "<img src='$req'/>"; //temp holder, fix later
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
       $statement->closeCursor();
   }
   catch(PDOException $e)
   {
        die("Failed to id_array: " . $e->getMessage());
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
        $image = 1;
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
                $name = get_specific("username", "users", "userid", get_specific("userid", "images", "imageid", $i));
                echo '
                <div class="post">
                <figure class ="image is-1by1 imgpadding">
                    ' . $img . '
                </figure>
                <div class="info">
                    <span><p class="has-text-light username left">
                        Username<i class="fa fa-heart right whitecolour" id = "like'. $image .'" onclick="color_change(\'like' . $image . '\')"></i>
                        <i class="fa fa-comment right whitecolour"></i>
                    </p></span>
                </div>
                <div class = "comments">
                    <form method="POST" action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                        <div class="commentbox">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="textarea" name="newcomment" placeholder="Large input">
                                </div>
                                <button type="submit" class="button is-light" name = "submit" value = "submit">Submit</button>	
                            </div>
                        </div>
                    </form>
                    <div class="commentbox">
                        <p class="commentusername">CommentUsername <i class="fa fa-times-circle right deletecolour" id = "delete"></i></p>
                        <div class = "commenttextbox">
                            <p class = "is-medium scroll">
                                dfgsijndfgsjindfgijndfgshnuidfgiungdfsinudfgjnuidfgijnfgijnd
                            </p>
                        </div>
                    </div>
                </div>
            </div>'; // for the actual display, very important, no touchie
                // You can insert something here (inside an if statement, with it's own echo) to add a delete thingy for users that are logged in
                echo "\n"; // for the comment box
               
                if (!isset($_SESSION["username"]))
                {
                    // pc and them put a home_get_comment function here and used a parameter for when no one was logged in
                }
                else
                {
                    // pc and them declared a user variable and used that as a parameter for a home_get_comment function
                }

                // pc and them echoed ---> "<br/><a class=\"c-btn-close\" onclick=\"openCloseComment_$i()\">&times;</a><br/>"
            }
            // check planning for how to do comments only if logged in
            if (isset($_SESSION['username']))
            {
                echo "\n";
            }
            //echo "</div>";
            $image++;
            $max--;
        }
    }
    catch (PDOException $e)
    {
        echo "Failed to print home page image list\n";
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



?>