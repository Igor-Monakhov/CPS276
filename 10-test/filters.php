<?php
//* Filters
$result = filter_var('douglasgmail.adsfadsfadfcom',FILTER_VALIDATE_EMAIL);
if ($result===false) {
    echo('filter failed<br>');
} else {
    echo($result . '<br>');
}

$result = filter_var('dandrew1@wccnet.edu',FILTER_VALIDATE_EMAIL);
if ($result===false) {
    echo('filter failed<br>');
} else {
    echo($result . '<br>');
}

// This seems like it should fail, but does not.
// For this reason, I would make my own regular expresion to validate an email.
$result = filter_var('dandrew1@wccnet.edu.com.gov',FILTER_VALIDATE_EMAIL);
if ($result===false) {
    echo('filter failed<br>');
} else {
    echo($result . '<br>');
}



