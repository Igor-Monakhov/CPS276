<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || str_ends_with($_SERVER['SCRIPT_NAME'], 'index.php') === false) {
    header("Location: index.php");
}

if($_SESSION['access'] == 'Admin'){
    
    echo("
    <a href='index.php?page=addContact'>Add Contact</a>&nbsp;&nbsp;&nbsp;
    <a href='index.php?page=deleteContact'>Delete Contact(s)</a>&nbsp;&nbsp;&nbsp;
    <a href='index.php?page=addAdmin'>Add Admin</a>&nbsp;&nbsp;&nbsp;
    <a href='index.php?page=deleteAdmin'>Delete Admin(s)</a>&nbsp;&nbsp;&nbsp;
    <a href='index.php'>Log Out</a>");

}else{
    echo("<a href='index.php?page=addContact'>Add Contact</a>&nbsp;&nbsp;&nbsp;
    <a href='index.php?page=deleteContact'>Delete Contact(s)</a>&nbsp;&nbsp;&nbsp;
    <a href='index.php'>Log Out</a>");
}

?>
