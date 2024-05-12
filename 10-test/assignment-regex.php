<?php
//* Final Homework - Regular Expressions for Assignment 10

/*
Name – alpha characters (upper and lower case), hyphens, apostrophes, spaces only (cannot be blank).
Address – start with a number, then alpha characters, spaces, hyphens, or periods (cannot be blank).
City – Must be alpha characters only. (cannot be blank)
Phone – Must be in the format 999.999.9999, where 9 is a digit of 0 to 9 (cannot be blank)
Email address – Valid email address (cannot be blank).
DOB – mm/dd/yyyy should format to a proper date (cannot be blank).
*/

// ? means 0 or 1, or use {0,1}
// * means 0 or more, or use {0,}
// \s means space
// + means 1 or more, or use use {1,}    
// ^ means starts with
// $ means ends with


// Address
$pattern = '/^\d+\s([a-z]|\s)+$/i';
$x = preg_match($pattern,'123 da streetb');
echo($x . '<br>');

// Name
$pattern = '/^([a-z]|-|\'|\s)+$/i';
$x = preg_match($pattern,"d-a st'reetb");
echo($x . '<br>');

// Phone
$pattern = '/^\d{3}\.\d{3}\.\d{4}$/';
$x = preg_match($pattern,"222.333.4444");
echo($x . '<br>');

// Email
// $pattern = '/^[a-z0-9^@]+@[a-z0-9][a-z0-9\.]+\..+$/i';
// $x = preg_match($pattern,"222@doug.com.edu.net");
// echo($x . 'X<br>');

// City
$pattern = '/^[a-z\s]+$/i';
$x = preg_match($pattern,"ann arbor");
echo($x . '<br>');

// DOB
$pattern = '/^\d{4}-\d{2}-\d{2}$/';
$x = preg_match($pattern,"2023-11-21");
echo($x . '<br>');

// Email
$result = filter_var('ertt@wccnet.edu',FILTER_VALIDATE_EMAIL);
if ($result===false) {
    echo('filter failed<br>');
} else {
    echo($result . '<br>');
}


// PASSWORD
$pattern = '/^\S+$/';
$x = preg_match($pattern,"20sdf gsdfgZ*23-11-21");
echo($x . '<br>');
