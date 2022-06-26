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
<title>Dark Blog</title>
</head>
<body>
<!-- <label for="dog-names">Choose a dog name:</label>
<select name="dog-names" id="dog-names" method='get'>
    <option value="rigatoni">Rigatoni</option>
  <option value="dave">Dave</option>
  <option value="pumpernickel">Pumpernickel</option>
  <option value="reeses">Reeses</option>
</select> -->
<a href='darknet_new_post.php'>new post</a>
<?php

?>

</body>
</html>