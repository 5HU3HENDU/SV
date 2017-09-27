<?php


$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "socialvjti";

$connection = mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_errno())
{
  echo "connection failed";
}


?>
