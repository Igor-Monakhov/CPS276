<?php

require_once('../shared/db.php');

/* Display sql result set as table */
function selectTable()
{
    $sql = "SELECT  a7id, file_name, contents FROM a7 ORDER BY file_name";
    $results = execute($sql);
    return $results;
}

/* Checking and Execute */
$errorMsg = "";
if (!empty($_FILES['myfile']['name'])) {

    $contents = file_get_contents($_FILES['myfile']['tmp_name']);
    $fileType = $_FILES['myfile']['type'];
    $fileName = $_FILES['myfile']['name'];

    $sql = 'INSERT INTO a7 (file_name,contents) VALUES (?,?)';
    $ar=[];
    $ar[] = $fileName;
    $ar[] = $contents;
    
    /* Checking if the file name uploaded already exists in the database */
    $checkFileName =  "SELECT file_name FROM a7 WHERE file_name = '$fileName'";
    if ($fileType != 'text/plain') {
        $errorMsg = "ERROR: not a text file";
    }else if (execute($checkFileName)){
        $errorMsg = "ERROR: the file name &#171;" . $fileName . "&#187; already uploaded";
    }else{
        execute($sql,$ar);
    }

}
    
/* Checking for No uploaded file error */
if(!empty($_FILES['myfile']['error']) and $_FILES['myfile']['error'] == UPLOAD_ERR_NO_FILE){
    $errorMsg = "No uploaded file";
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment 7</title>
    <link rel="stylesheet" href="main.css" />
</head>

<body>
    <div style="color:red;"><? echo($errorMsg); ?>&nbsp;</div>
    <div>
        <form enctype="multipart/form-data" method="post">
            <input type="submit" value="Upload File" name="upload" />&nbsp;
            <input type="file" name="myfile" accept=".txt" />
            <br>
        </form>
    </div>
    <br>
    
    <div>
        <b>Existing Files</b>
        <table border="1" cellspacing="0" cellpadding="2"> 

            <tr>
                <th>File name</th>
                <th>File content</th>
            </tr>

            <? 
            foreach (selectTable() as $result) { ?>
                <tr valign="top">
                    <td><? echo($result['file_name']);  ?></td>
                    <td><? echo(str_replace("\n", "<br>",  $result['contents']));  ?></td>
                </tr>
            <? } ?>

        </table>

    </div>

</body>
</html>
