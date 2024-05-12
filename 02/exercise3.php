<?
$rows = 15;
$cols = 5;

$my_table = "";
for ($row = 1; $row <= $rows; $row++) { 
    $my_table = $my_table . "<tr>";
         for ($col = 1; $col <= $cols; $col++) { 
            $my_table = $my_table . "<td>Row {$row} Cell {$col} ";
         }
    $my_table = $my_table . "</tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #3</title>
</head>
<body>
    <table border=1>
        <?echo "$my_table";?>
    </table>
</body>
</html>
