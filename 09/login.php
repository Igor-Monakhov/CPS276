<?php

require_once('../shared/db.php');
date_default_timezone_set('America/Detroit');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$errorMsg = '';
if (!empty($_REQUEST['button'])) {
    if (($_POST['username'] == "") || ($_POST['password'] == "")) {
        $errorMsg = 'ERROR: "Enter user name and password"';
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $ar = [];
        $ar[] = $username;
        $sql = 'SELECT user_name,password_hash FROM login WHERE user_name = ?';
        $listNames = execute($sql, $ar);

        if (!$listNames) {
            $errorMsg = 'ERROR:"No match is found"';
        } else {
            $username_db = $listNames[0]["user_name"];
            $password_db = $listNames[0]["password_hash"];

            if (strcmp(hash('md5', $password), $password_db) === 0) {
                $_SESSION['user_name'] = $username;
                header("Location: listing.php");
            }
        }
    }
}

?>


<html>

<h3>Please Log In</h3>

<form method="post" action="login.php">
    <input placeholder="User Name" type="text" size=35 name="username" value=""><br><br>
    <input placeholder="Password" type="password" size=35 name="password" value=""><br><br>
    <input type="submit" value="Log In" name="button"><br><br>
    <p style="color: rgb(139, 0, 0);"><?php echo ($errorMsg); ?></p>
</form>

</html>