<?php
//* Regular Expressions

function howMany($s) {
    $results = explode(' ',$s);
    $results = array_filter($results,function($rec) {
        return preg_match('/[a-z]/i',$rec) == 1;
    });
 //   print_r($results);
    return sizeof($results);
}

echo(howMany('he is a good programmer, he won 865 competitions, but sometimes he dont. What do you think? All test-cases should pass. Done-done?'));
echo('<hr>');


//* Regular Expressions
    $pattern = '/Andrews/';
    $x = preg_match($pattern,'Doug Andrews');
    echo('1) ');
    echo($x . '<br>');
    

    $pattern = '/Andrews/';
    $x = preg_match($pattern,'Doug andrews');
    echo('2) ');
    echo($x . '<br>');

    $pattern = '/Andrews/i';
    $x = preg_match($pattern,'Doug andrews');
    echo('3) ');
    echo($x . '<br>');
    
    // matches MBT, returns 1, .=any single char
    $x = preg_match('/MB./','The product code is 3461MB7');
    echo('4) ');
    echo($x . '<br>');
    
    // matches nothing, returns 0, \d = any digit
    $x = preg_match('/MB\d/','The product code is MBT-3461');
    echo('5) ');
    echo($x . '<br>');
    
    // matches MBT-3, returns 1, \d = any digit
    $x = preg_match('/MBT-\d/','The product code is MBT-3461');
    echo('6) ');
    echo($x . '<br>');

    // What if i wanted to extract the pattern out of the string.
    $matches = array();
    $x = preg_match('/MBT-\d/','The product code is MBT-9 MBT-3461',$matches);
    //$x = preg_match('/MBT-(\d)/','The product code is MBT-3461',$matches);
    echo('7) ');
    echo($matches[0] . '<br>');
    //echo($matches[1] . '<br>');
    // $matches[0] should be MBT-3


    // This returns MBT-34 and MBT-3a
    $matches = array();
    $x = preg_match_all('/MB.{1,4}/','The product code is MBT-34 MBT-3asdfdaf',$matches);
    echo('8) ');
    echo($matches[0][0] . '<br>');
    echo($matches[0][1] . '<br>');
    
    // Matches 3 (one occurance of either 3,6,7, or 8
    // Using the CHARACTER CLASS
    $matches = array();
    $x = preg_match('/[3678]/','The product code is MBT-3461',$matches);
    echo('9) ');
    echo($matches[0][0] . '<br>');
    
    // use - for range
    // [a-z] = all lower case letters
    // [0-9] = all digits
    // This matches 6 (one occurance of anything between 5 and 9
    $matches = array();
    $x = preg_match('/[5-9]/','The product code is MBT-3461',$matches);
    echo('10) ');
    echo($matches[0] . '<br>');
    
    // repeating patterns
    // use {} for repeats.
    // 
    // Matches 346  (looking for pattern to repeat exactly 3 times)
    $matches = array();
    $x = preg_match('/\d{3}/','The product code is MBT-346145',$matches);
    echo('11) ');
//    var_dump($matches);
    echo($matches[0] . '<br>');
    

 

?>

    
    
    
