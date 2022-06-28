<?php
    // include('./tor_only.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tor Blog Login</title>
    </head>
    <body>
        <?php
            session_start();
            if ($_SESSION['login_failed']){
                echo '<p> Username or password Incorrect. Try again.</p>';
            }
        ?>
        <form action='./tor_blog_verify_login.php' method='post'>
            Username: <input type='text' name='username' required><br>
            Passphrase: <input type='password' name='passphrase' required><br>
            <input type='submit'>
            <p>Forgot your passphrase? Well, I told you not to. Go create another account. If you really care, I'll manually reset it (but like just don't forget). </p>
        </form>
    </body>
</html>