<?php
if(isset($_POST["college_id"]) & isset($_POST["name"]) & isset($_POST["email"]) & isset($_POST["password"])) //make it more precise
{


require "connection.php";

$college_id = $_POST["college_id"];
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, UTF-8);
//$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$query="INSERT INTO student(college_id,name,email,password) VALUES ($college_id,'$name','$email','$password')";
$run = mysqli_query($connection,$query);
if($run)
{
  ?>
  <form id="success" action="index.php" method="post">
    <input type="hidden" name="success" value="success">
  </form>
  <script type="text/javascript">
    document.getElementById('success').submit();
  </script>

<?php
}
else {
  ?>
  <form id="error" action="index.php" method="post">
    <input type="hidden" name="error" value="error">
  </form>
  <script type="text/javascript">
    document.getElementById('error').submit();
  </script>
  <?php
}

}
else {
  header("Location : index.php");
}
   ?>
