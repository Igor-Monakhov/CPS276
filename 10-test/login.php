<?php
//* Final Homework - Routing
// This is a VIEW part of the VIEW/CONTROLLER architecture

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!empty($_REQUEST['button'])) {
    // We are just simulating a valid login here
    $_SESSION['user']='some name';
    $_SESSION['access']='admin OR staff';
    header("Location: index.php?page=welcome");
}

?>
<h1>Log In</h1>
<form method="POST">
    <input type="submit" name="button" value="Log In">
</form>

