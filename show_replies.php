<?php

function show_replies()
{
  $post_id = $_GET["post_id"] ;
  $query = "SELECT author,time_stamp,post FROM {$_SESSION["branch"]} WHERE reply={$post_id}";
  $run = mysqli_query($GLOBALS["connection"],$query);
if(mysqli_num_rows($run)>0)
{
  while($row = mysqli_fetch_assoc($run))
  {
    echo <<<END
    <div>
    <hr>
    <span>By {$row["author"]}</span>
    <span>On {$row["time_stamp"]}</span>
    <br>
    {$row["post"]}
    <br>
    <hr>
    </div>
END;
  }
}
else
{
  echo "No relplies yet.";
}

}


?>
