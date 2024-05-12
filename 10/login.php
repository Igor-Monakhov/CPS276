<?php

require_once('../shared/db.php');

date_default_timezone_set('America/Detroit');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = '';
$password = '';
$errorMsg = '';
$username_db = '';
$password_db = '';
$status_db = '';
$name_db = '';

if (!empty($_REQUEST['login'])) {

    $username = $_POST['user'];
    $password = $_POST['password'];

    if (($_POST['user'] == "") || ($_POST['password'] == "")) {
        $errorMsg = 'Enter Email and Password';
    } else {
        $ar = [];
        $ar[] = $username;
        $sql = 'SELECT email,password,status,name FROM admin WHERE email = ?';
        $listNames = execute($sql, $ar);

        if (!$listNames) {
            $errorMsg = 'Invalid Email or Password';
        } else {
            $username_db = $listNames[0]["email"];
            $password_db = $listNames[0]["password"];
            $status_db = $listNames[0]["status"];
            $name_db = $listNames[0]["name"];

            if ($password === $password_db) {
                $_SESSION['user'] = $name_db;
                $_SESSION['access'] = $status_db;

                header("Location: index.php?page=welcome");

                $errorMsg = 'Ok! ';
            } else {
                $errorMsg = 'Invalid Email or Password';
            }
        }
    }
}

?>




<html>

<head>
    <title>Final Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="container">

    <h1>Login</h1>

    <form method="post">

        <div class="form-group">
            <label for="email" class="space">Email</label>
            <input type="email" class="form-control" name="user" id="email" value="<?php echo ($username); ?>">
        </div>

        <div class="form-group">
            <label for="password" class="space">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?php echo ($password); ?>">
        </div>

        <input type="submit" name="login" class="btn btn-primary">&nbsp;&nbsp;
        <p style="color: rgb(139, 0, 0);"><?php echo ($errorMsg); ?></p>

    </form>

</body>

</html>