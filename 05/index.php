<?php 

$errorMessage = "";
$outputNewFile = "";
$shortFileName = "";
$fileContents = "";

function scanExistingFiles(){
    $dir = "files/";
    $outputScanedFiles = "";
    $scanedFiles = scandir($dir);

    foreach ($scanedFiles as $value) {
        if($value == "." || $value == ".." ){
            continue;
        }
        $outputScanedFiles = $outputScanedFiles . "<a href='files/" . $value . "'  target='_blank'>" . $value . "</a></br>";
    }

    $outputExistingFiles = <<<HTML
        {$outputScanedFiles}
    HTML;

    return $outputExistingFiles;
}

if(isset($_POST['fileName']) && $_POST['fileName'] != ""){
    $shortFileName = $_POST['fileName'];
    $FileName = $_POST['fileName'] . ".txt";
    $pathAndFileName = "files/" . $FileName;
    $fileContents = $_POST['fileContents'];
    
    if(file_exists($pathAndFileName)){
        $errorMessage = "ERROR MESSAGE: The file &#171;$FileName&#187; already exists. Input other File Name.";
    }else {
        file_put_contents($pathAndFileName, $fileContents);
        $outputNewFile = <<<HTML
            New file &#171;{$FileName}&#187; was created.
        HTML;
    }

    scanExistingFiles();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment #5</title>

    <style>
        body {
            margin: 25px;
            min-width: 500px;
        }

        input[type="submit"] {
            cursor: pointer;
        }

        .error_message {
            color: red;
            font-weight: bold;
        }

        .output_new_file {
            color: green;
        }
    </style>

</head>

<body>

    Enter file name and file contents.<br>
    File names should contain alpha-numeric characters only. (No spaces)<br><br>

    <form action="index.php" method="post">
        File Name<br>
        <input type="text" size="60" name="fileName" value="<?php echo $shortFileName; ?>"> .txt<br><br>
        File Content<br>
        <textarea name="fileContents" rows="6" cols="60"><?php echo $fileContents; ?></textarea><br><br>
        <input type="submit" name="button" value="Submit"><br><br>
    </form>

    <span class="error_message">
        <?php echo $errorMessage; ?>
    </span>

    <span class="output_new_file">
        <?php echo $outputNewFile; ?>
    </span>
    <br>
    <hr>

    <strong>Existing Files</strong><br>

    <div>
        <?php echo scanExistingFiles(); ?></br>
    </div>

</body>

</html>