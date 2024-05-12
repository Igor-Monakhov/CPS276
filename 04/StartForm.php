<?php

$output = "";

require_once("Helper.php");
$newInput = new Helper();

if(isset($_POST['addname'])){
   
    $name = $_POST['name'];
    $lastNameFirstName = $newInput->reverseName($name);
   
    $existingNames = $_POST['list'];
    $listOfNames = $newInput->addName($lastNameFirstName, $existingNames);

    $output = <<<HTML
    {$listOfNames}
    HTML;

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 4</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, serif;
            font-size: 18px;
        }

        .container {
            margin: 20px;
            max-width: 500px;
        }

        .myHeader {
            display: inline-block;
            font-size: 40px;
            margin-bottom: 5px;
        }

        .myButton {
            background-color: #0070FF;
            color: #FFFFFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            line-height: 10px;
            font-weight: bold;
            padding: 15px 10px;
            margin: 5px 0;
        }

        .myText {
            width: 100%;
            padding: 5px;
        }
    </style>

</head>

<body>
    <div class="container">
        <form id="myForm" action="StartForm.php" method="post">
            <b class="myHeader">Add Names</b><br>
            <input class="myButton" type="submit" value="Add Name" name="addname">
            <input class="myButton" type="submit" value="Clear Names" name="clearname"><br><br>
            Enter Name<br>
            <input class="myText" type="text" name="name"><br><br>
            List of Names<br>
            <textarea class="myText" name="list" rows="10"><?php echo $output; ?></textarea>
        </form>
    </div>
</body>

</html>