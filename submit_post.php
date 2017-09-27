<?php
if(isset($_POST["submit_post"]) & isset($_POST["post"]))
{
session_start();
require "connection.php";
$author=$_SESSION["college_id"];
$post = htmlspecialchars($_POST["post"], ENT_QUOTES, UTF-8);

//$post = $_POST["post"];
$query = "INSERT INTO ".$_SESSION["branch"]."(author,post) VALUE ($author,'$post')";
$run = mysqli_query($connection,$query);
if($run)
{ $branch = $_SESSION["branch"];
  $location = "Location:home.php?branch=$branch";
 header($location);
}
else {
  echo "FAILED";
}


}
else {
  header("Location:home.php");
}








 ?>
