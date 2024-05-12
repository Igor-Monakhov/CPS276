<?php

require_once('../../shared/db.php');

$data = json_decode($_POST['data']);
$name = $data->name;

$firstNameLastName = explode(" ", $name);
$firstName = $firstNameLastName[0];
$lastName = $firstNameLastName[1];
$lastNameFirstName = ($lastName . ", " . $firstName);

$sql = 'INSERT INTO names (name) VALUES (?)';
$ar=[];
$ar[] = $lastNameFirstName;
execute($sql,$ar);

$json_obj = array('msg' => 'Name has been added');
echo json_encode($json_obj);