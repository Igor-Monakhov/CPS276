<?php

require_once('menu.php');

?>


<html>

<head>
    <title>Final Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="container">
    <br><br>
    <h1>Welcome</h1>
    Welcome <?php echo ($_SESSION['user']); ?>
</body>

</html>