<?php
  
Class Calculator{
    
    public function calc($operator = null, $firstNum = null, $secondNum = null) {
        
        if($operator === null || $firstNum === null || $secondNum === null){
            return "You must enter a string and two numbers</br>";
        }

        switch ($operator) {
            case "+":
                return "The sum of the numbers is " . ($firstNum + $secondNum) . "</br>";
                break;
            case "-":
                return "The difference of the numbers is " . ($firstNum - $secondNum) . "</br>";
                break;
            case "*":                    
                return "The product of the numbers is " . ($firstNum * $secondNum) . "</br>";
                break;  
            case "/":
                if ($secondNum == 0) {
                    return "Cannot divide by zero</br>";
                } else {
                    return "The division of the numbers is " . ($firstNum / $secondNum) . "</br>";
                }
                    break;
            default:
                return "You must enter a string and two numbers. Invalid operator (+ - * /)</br>";
        }

    }

}

?>


