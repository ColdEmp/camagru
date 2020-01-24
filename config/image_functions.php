<?PHP
include_once 'index.php';

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
            $return = "<img src='$req'/>";
        }
        return $return;
    }
    catch (PDOException $e)
    {
        echo "Failed to get image\n";
    }
}

function id_arr_editor($userid)
{
   try
   {
        $connection = open_connection();
        $statement = $connection->prepare("SELECT imageid FROM images WHERE userid = '$userid'");
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
        $image = 0;
                // Line below needs it's function to be made
        // $posts = get_posts($page_no);
        while ($image < $amm)
        {
            $i = $arr[$max - 1];
            $page = $_GET['page'];
            $j = 0;
            $comcount = count_comments($i);
            if (ver_img($i) == 0)
            {
                return (0);
            }
            else
            {
                $comments = return_comments($i);
                $img = retrieve_img($i, $class);
                        // Line below needs to be helped
                // $likes = get_likes(NULL, $i);
                $name = find_specified("username", "users", "userid", find_specified("userid","images","imageid",$i));
                echo '
                <div class="post">
                <figure class ="image is-1by1 imgpadding">
                    ' . $img . '
                </figure>
                <div class="info">
                    <span><p class="has-text-light username left"> ' . $name;
                    if (isset($_SESSION["username"])){
                        echo  '<i class="fa fa-heart right ';
                        $exists = find_specified("userid","likes","likeid",find_specified("likeid","likes","imageid",$i));
                        if($_SESSION["id"] == $exists ){echo "redcolour";}else{echo "whitecolour";}
                        echo '" id = "like' . $i . '" onclick="color_change(\'like' . $i . '\',\''. $i .'\')"></i>';
                    }
                       echo ' <i class="fa fa-comment right whitecolour" onclick = "displayComments(\'commentsection' . $i . '\')"></i>
                    </p></span>
                </div>
                <div class = "comments">';
                if(isset($_SESSION["username"]))
                {
                echo '<form method="POST" action="pages/comment.php">
                        <div class="commentbox">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="textarea" name="newcomment" placeholder="Enter your comment">
                                    <input type = "text" name="imageid" value="' . $i . '" style = "display:none">
                                </div>
                                <button type="submit" class="button is-light" name = "submit" value = "submit">Submit</button>	
                            </div>
                        </div>
                    </form>';
                }
                echo    '<div id="commentsection'. $i .'" class="commentStart">';
                while($j < $comcount)
                {
                $commentusername = find_specified("username", "users", "userid", $comments[$j][1]);
                $commentid = $comments[$j][2];
                echo    '<div class="commentbox">
                            <p class="commentusername">' . $commentusername . ' 
                            <i class="fa fa-times-circle right redcolour ';
                            if($commentusername != $_SESSION["username"]){echo 'commentStart';}else{}
                            echo'" id = "delete' . $commentid . '" onclick = "deleteComment(\'delete' . $commentid . '\',\''.$commentid.'\')"></i></p>
                            <div class = "commenttextbox">
                                <p class = "is-medium scroll">
                                   '. $comments[$j][0] .'
                                </p>
                            </div>
                        </div>';
                    $j++;
                }
         echo'      </div>
                </div>'; 
                // for the actual display, very important, no touchie
                // You can insert something here (inside an if statement, with it's own echo) to add a delete thingy for users that are logged in
                // for the comment box
               
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
            echo "</div>";
            $image++;
            $max--;
        }
    }
    catch (PDOException $e)
    {
        echo "Failed to print home page image list\n";
    }
}

function edit_img($amm, $page_no, $class, $userid)
{
    try
    {
        $index = $page_no;
        $arr = id_arr_editor($userid);
        $max = count($arr);
        $counter = 0;
        $max -= $amm * ($page_no - 1);
        $image = 0;
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
                echo '
                <div class="post">
                <figure class ="image is-1by1 imgpadding">
                    ' . $img . '
                </figure>
                </div>';
            }
            // echo "</div>";
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

function paging($mode, $amm)
{
    try
    {
        $max = count(id_arr_editor($_SESSION['id']));
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
        echo "./editor.php?page=$page";
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
        echo "<div class=\"column middle c\">";
        home_img($no, $page, "column middle image");
        echo "</div>";
    }
    catch(PDOException $e)
    {
        echo "Failed to print home images\n";
    }
}

function editor_images($no, $page)
{
    try
    {
        echo "<div class=\"column middle c\">";
        edit_img($no, $page, "column middle image", $_SESSION['id']);
        echo "</div>";
    }
    catch(PDOException $e)
    {
        echo "Failed to print home images\n";
    }
}

?>