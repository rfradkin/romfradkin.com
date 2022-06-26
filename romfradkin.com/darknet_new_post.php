<?php
    // include('darkn_only.php');
    session_start();
    if (!$_SESSION['usern']){
        header("Location: darknet_blog_login.php"); 
        die();
    }
?>
<html>
<head>
<title>Dark Blog New Post</title>
</head>
<body>

<form action='darknet_store_new_post.php' method='post'>
  Title:<input type='text' name='title' required><br>
  <textarea id="post" name="current_post" rows="4" cols="50" placeholder='enter your shit' required></textarea>
  <br>
  <input type="submit">
</form>

<?php

?>

</body>
</html>