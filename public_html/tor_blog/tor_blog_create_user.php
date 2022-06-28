<?php
    // include('./tor_only.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TOR Blog New User</title>
    </head>
    <body>
        <p>If your thinking to yourself, I'm on the dark web. I shouldn't provide my name. This is supposed to be anonymous.<br>
            1) You can provide a fake name.<br>
            2) This darkweb page is NOT secure, its just for me to learn a little about hosting websites. Just provide your real name cause I'm interested
            in who made it this far (or not, idrc tbh).
        </p>
        <?php
            session_start();
            if ($_SESSION['username_used']) {
                echo '<p> You must choose a different username. That one is already in use</p>';
            }
            $_SESSION['username_used'] = False;
        ?>
        <form action='./tor_blog_store_user.php' method='post'>
            First Name: <input type='text' name='first_name' required><br>
            Last Name: <input type='text' name='last_name' required><br>
            Username: <input type='text' name='username' required><br>
            Passphrase (you can still use a password, but a passpharse is more safe (and should be implemented everywhere imo...)): <input type='text' name='passphrase' required><br>
            <input type='submit'>
        </form>
        <p>** Also, I don't store your password as plain text, I salt and hash it (cause I have half a brain cell). If you don't know what that means, essentially no one will ever see your password so don't worry.<br></p>
        <p>** That also means I can't recover your password, so don't forget it cause I'm not implementing an email system to reset it. Too much effort</p>
    </body>
</html>