<?php
if(isset($_POST["submit_reply"]) & isset($_POST["reply"]))
{
session_start();
require "connection.php";
$author=$_SESSION["college_id"];
$post = htmlspecialchars($_POST["reply"], ENT_QUOTES, UTF-8);

//$post = $_POST["reply"];
$post_id = $_POST["post_id"];
$query = "INSERT INTO {$_SESSION["branch"]} (author,post,reply) VALUE ($author,'$post',$post_id)";
$run = mysqli_query($connection,$query);
if($run)
{ $branch = $_SESSION["branch"];
  $location = "Location:view_post.php?branch=$branch&post_id=$post_id";
 header($location);
}
else {
  echo "FAILED";
}


}
else {
  header("Location:home.php");
}
