<?php
session_start();
require "connection.php";

$query = "SELECT author,post,time_stamp FROM {$_GET["branch"]} WHERE id={$_GET["post_id"]}";
$run = mysqli_query($GLOBALS["connection"],$query);
$row = mysqli_fetch_assoc($run);
echo <<<END
By: {$row["author"]}
On: {$row["time_stamp"]}
<br>
{$row["post"]}
<br>
<hr>
END;
?>
<a href="home.php?branch=<?php echo $_SESSION["branch"] ?>#<?php echo $_GET["post_id"] ?>">Back to posts...</a>
<script type="text/javascript">

</script>
<form class="" action="submit_reply.php" method="post">
  <textarea name="reply" rows="8" cols="80" maxlength="200" required="required" placeholder="Reply..."></textarea>
  <br>
  <input type="hidden" name="post_id" value="<?php echo $_GET["post_id"] ?>">
  <br>
  <button type="submit" name="submit_reply">Reply</button>
</form>
<?php
require "show_replies.php";
show_replies();

 ?>
