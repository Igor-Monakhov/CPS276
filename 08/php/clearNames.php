<?php

require_once('../../shared/db.php');

$sql = 'DELETE FROM names';
$tableDisplay = execute($sql);

$json_obj = array('msg' => 'Names cleared');
echo json_encode($json_obj);

