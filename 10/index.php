<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$validPages = ['addAdmin','addContact','deleteAdmin','deleteContact','welcome'];
$page = empty($_REQUEST['page']) ? '' : $_REQUEST['page'];
$page = in_array($page, $validPages) ? $page : '';

if (empty($page)) {
    unset($_SESSION['user']);
    $page='login';
}

// unset SESSION when Staff try to access admin pages.
if($page === 'addAdmin' || $page === 'deleteAdmin'){
    if($_SESSION['access'] !== 'Admin'){
        unset($_SESSION['user']);
        $page='login';
    }
}

$page = "$page.php";

require_once($page);

?>