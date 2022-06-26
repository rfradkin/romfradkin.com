<html>
<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');

    // include('darkn_only.php');
  session_start();
  if (!$_SESSION['usern']){
      header("Location: darknet_blog_login.php"); 
      die();
  }

  echo $_SESSION['usern'];
  echo time();
  echo $_POST['title'];
  echo $_POST['current_post'];


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


$sql = "SELECT usern, id from user_infor";

foreach($conn->query($sql) as $curre_infor){
  if ($curre_infor['usern'] == $_SESSION['usern']){
    $user_id = $curre_infor['id'];
    break;
  }
}

$sql = "SELECT COUNT(*) FROM user_infor;";
$post_number = $conn->query($sql);
echo "<td>" . $post_number['COUNT(*)'] . "</td>";
$curr_time = time();
$current_post = $_POST['current_post'];
$title = $_POST['title'];


$sql = "INSERT INTO blog_posts (post, title, 'time', post_id, 'user_id')
VALUES ('$current_post', '$title', '$curr_time', '$post_number', '$user_id')";
$conn->query($sql);

$conn->close();

// header("Location: darknet_blog_login.php"); 
?>
<p>done 