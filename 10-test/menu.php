<?php
//* Final Homework - Routing
// This file is included at the top of all the VIEWs


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || str_ends_with($_SERVER['SCRIPT_NAME'], 'index.php') === false) {
    header("Location: index.php");
}
// check $_SESSION['access'] to see which menu items should be displayed.  
// I am displaying them all in this example

?>
<a href='index.php?page=addAdmin'>Add Admin</a>&nbsp;&nbsp;&nbsp;
<a href='index.php?page=addContact'>Add Contact</a>&nbsp;&nbsp;&nbsp;
<a href='index.php?page=deleteAdmin'>Delete Admin</a>&nbsp;&nbsp;&nbsp;
<a href='index.php?page=deleteContact'>Delete Contact</a>&nbsp;&nbsp;&nbsp;
<a href='index.php'>Log Out</a>