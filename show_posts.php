<?php

function show_posts()
{

  $query="SELECT id,author,post,time_stamp FROM  {$_GET["branch"]} WHERE reply IS NULL ORDER BY id DESC" ;
  $run = mysqli_query($GLOBALS['connection'],$query);


  if(mysqli_num_rows($run)>0)
  {



    while($row = mysqli_fetch_assoc($run))
    { $reply_count_query = "SELECT COUNT(post) FROM {$_SESSION['branch']} WHERE reply = {$row['id']} ";
      $reply_count_run = mysqli_query($GLOBALS['connection'],$reply_count_query);
      $result = mysqli_fetch_assoc($reply_count_run);
      $number_of_reply = $result["COUNT(post)"];
      echo <<<END
      <div id="{$row["id"]}">
      <a href="view_post.php?branch={$_SESSION["branch"]}&post_id={$row["id"]}">
      <hr>
      <span>By {$row["author"]}</span>
      <span>On {$row["time_stamp"]}</span>
      <br>
      {$row["post"]}
      <br>
      <span>Reply ({$number_of_reply})</span>
      <hr>
      </a>
      </div>
END;
    }
  }
  else {
        echo "<br> NO POSTS FOUND !";
       }


}
?>
