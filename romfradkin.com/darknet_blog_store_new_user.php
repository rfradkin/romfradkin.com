<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

# Information required for the database entry to be created
$requi_infor = array("first_name", "last_name", "usern", "passw");

$servername = "romfradkin.com";
$username = "rfradkin";

// Recieve the password from a file so not shown on Github... (pls don't look at the version history)
$file = fopen('/var/www/romfradkin.com/sensi_infor.txt','r');
while ($line = fgets($file)) {
  if (substr($line, 0, 8) == 'mariadb:'){
    $password = substr($line, 8);
    break;
  }
  die('Password not found.');
}
fclose($file);

$dbname = "darkn_blog_romfr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from user_infor";
if ($user_infor = $conn->query($sql)) {
    // Return the number of rows in result set
    $user_infor_rows = mysqli_num_rows($user_infor);
 }

// Checks to make sure the inputs are filled
if (count($_POST) == 4){
  foreach($_POST as $input){
    if (empty($input)){
      $conn->close();
      header("Location: darknet_blog_new_user.php"); 
      die();
    }
  }
}

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$usern = $_POST["usern"];
$passw = $_POST["passw"];

$hashe_passw = password_hash($passw, PASSWORD_DEFAULT);

$sql = "SELECT usern from user_infor";
foreach($store_usern = $conn->query($sql) as $curre_usern){
  if ($usern == $curre_usern['usern']){
    $_SESSION['usern_used'] = True;
    $conn->close();
    die(header("Location: darknet_blog_create_new_user.php")); 
  }
}

$sql = "INSERT INTO user_infor (id, first_name, last_name, usern, passw)
VALUES ($user_infor_rows + 1, '$first_name', '$last_name', '$usern', '$hashe_passw')";
$conn->query($sql);

$conn->close();

# Store the username as a session variable to keep the user logged in
# I don't use cookies cause TOR browser deletes them after each session, 
# so the effect would be the same
$_SESSION['usern'] = $usern;

header("Location: index.php"); 
?>
