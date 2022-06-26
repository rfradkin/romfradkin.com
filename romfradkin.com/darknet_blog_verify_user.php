<html>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

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

$sql = "SELECT usern, passw from user_infor";

foreach($conn->query($sql) as $curre_infor){
  if ($curre_infor['usern'] == $_POST["usern"]){
    if (password_verify($_POST['passw'], $curre_infor['passw'])){
      echo '<p>good</p>';
      $_SESSION['usern'] = $_POST["usern"];
      $_SESSION['login_faile'] = False;
      header("Location: darknet_blog.php"); 
      die();
    }
  }
}
$_SESSION['login_faile'] = True;

$conn->close();

header("Location: darknet_blog_login.php"); 
?>
