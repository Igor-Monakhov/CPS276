<?php
$number_main_list_items = 4;
$number_sub_list_items = 5;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Exercise #1</title>
</head>

<body>

    <ul>

    <?php  
        for ($i = 1; $i <= $number_main_list_items; $i++) {
            echo "<li>$i";
            echo "<ul>";
            for ($j = 1; $j <= $number_sub_list_items; $j++) {
            echo "<li>$j</li>";
            }
            echo "</ul>";
            echo "</li>";
        }
    ?>  

    </ul>

</body>
</html>
