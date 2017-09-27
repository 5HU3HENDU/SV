<?php
if(!$_POST)
{
  header("Location: index.php");
  exit;
}
echo <<<END
<!DOCTYPE html>
<html>
<head>
<title>
Loggin in...
</title>
</head>
<body>
</body>
</html>
END;

require "connection.php";


$college_id = $_POST["college_id"];
$password  = $_POST["password"];

$query = "SELECT college_id,password FROM student WHERE college_id= $college_id && password = '$password' ";
$run = mysqli_query($connection,$query);
if(mysqli_num_rows($run)==1)
{
  session_start();
  $_SESSION["college_id"]=$_POST["college_id"];
  header("Location:home.php");

}
else {

?>

  <form id="login_error" action="index.php" method="post">
    <input type="hidden" name="login_error" value="error">
  </form>
  <script type="text/javascript">
    document.getElementById('login_error').submit();
  </script>

<?php
}

?>
