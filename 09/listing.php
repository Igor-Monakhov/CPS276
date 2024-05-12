<?php

require_once('../shared/db.php');
date_default_timezone_set('America/Detroit');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_name'])) {
    header("Location: login.php");
} else {

    $sql = "SELECT note, saved FROM a9";
    $results = execute($sql);
}

?>


<html>

<span>Logged in as</span>
<b><?php echo ($_SESSION['user_name']); ?></b><br>
<a href="login.php">Return to log in</a><br><br>

<table border=1 cellpadding=2 cellspacing=0>

    <tr>
        <th>note</th>
        <th>saved</th>
    </tr>

    <?php foreach ($results as $result) { ?>
        <tr valign="top">
            <td>
                <?php echo ($result['note']); ?>
            </td>
            <td>
                <?php
                $dateString = $result['saved'];
                $dateObject = date_create_from_format('Y-m-d H:i:s', $dateString);
                $humanReadableFormat = $dateObject->format('m/d/Y h:i A');
                echo ($humanReadableFormat);
                ?>
            </td>
        </tr>
    <? } ?>

</table>

</html>