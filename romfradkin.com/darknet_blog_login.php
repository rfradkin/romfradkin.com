<?php
    include('redir.php');
    // include('darkn_only.php');
?>
<html>
<head>
<title>Dark Blog Login</title>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['login_faile']){
        echo '<p> Username or password Incorrect. Try again.</p>';
    }
?>
<form action='darknet_blog_verify_user.php' method='post'>
Username: <input type='text' name='usern' required><br>
Password: <input type='password' name='passw' required><br>
<input type='submit'>
<p>Forgot your password? Well, I told you not to. Go create another account. If you really care, I'll manually reset it (but like just don't forget). </p>
</form>
</body>
</html>