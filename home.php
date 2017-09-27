<?php

session_start();
if(!$_POST & !$_SESSION )
{
  header("Location: index.php");
  exit;
}

require "connection.php";
if (!isset($_GET["branch"])) {
    $_GET = array("branch"=>"general");
}

echo "hello ",$_SESSION["college_id"] ;
echo "You are in ",$_GET["branch"] , "<br>";
$_SESSION["branch"]=$_GET["branch"];


echo <<<PAGE
<!DOCTYPE html>
<html>
<head>
<title>
{$_GET["branch"]}
</title>
</head>
<body>
<nav>
  <ul>
    <li><a href="home.php?branch=btech_it">BTech IT</a></li>
    <li><a href="home.php?branch=btech_computer">BTech Computer</a></li>
    <li><a href="home.php?branch=btech_mechanical">BTech Mechanical</a></li>
  </ul>
</nav>




<form class="" action="submit_post.php" method="post">
  <textarea name="post" rows="8" cols="80" maxlength="200" required = "required" id="post" placeholder="Speak it out..."></textarea>
  <br>
  <span id="count"></span>
  <br>

  <button type="submit" name="submit_post">Submit</button>
</form>


</body>
</html>
PAGE;

require "show_posts.php";
show_posts();
 ?>
