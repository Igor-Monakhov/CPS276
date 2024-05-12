<?php

require_once('../../shared/db.php');

$sql = 'SELECT name FROM names ORDER BY name';
$listNames = execute($sql);

if(count($listNames) == 0)
{
	$json_obj = array('masterstatus' => 'error', 'msg' => 'No names found');
	echo json_encode($json_obj);
}
else
{
    $tableDisplay = "";
    foreach ($listNames as $result) {
        $tableDisplay .= "<p>" . $result["name"] . "</p>";
    }
    $names = array('names' => $tableDisplay);
    echo json_encode($names);
}