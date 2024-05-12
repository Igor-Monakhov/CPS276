<?php

require_once("Calculator.php");
$myCalc = new Calculator();
echo($myCalc->calc("/", 10, 0));  // This will echo 'Cannot divide by zero'
echo($myCalc->calc("*", 10, 2));  // This will echo 'The product of the numbers is 20'
echo($myCalc->calc("/", 10, 2));  // This will echo 'The division of the numbers is 5'
echo($myCalc->calc("-", 10, 2));  // This will echo 'The difference of the numbers is 8'
echo($myCalc->calc("+", 10, 2));  // This will echo 'The sum of the numbers is 12'
echo($myCalc->calc("*", 10));     // This will echo 'You must enter a string and two numbers'
echo($myCalc->calc(10));          // This will echo 'You must enter a string and two numbers'

?>
