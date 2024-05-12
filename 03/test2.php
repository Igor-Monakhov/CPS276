<?php
  
  $var = "";
function func() {
    // require_once('test1.php');
    require ('test1.php');
    return $var;
}
// echo func() . "<br>";
// echo func() . "<br>";


for($i = 1; $i <= 3; $i++) {
    echo func() . "<br>";
}
?>