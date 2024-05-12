<?php
//* Database Connection Function

// Put your own database user name and password here.
// Your database user name is the same as your wcc user name.
// Your database password can be obtained my executing this linux command:
// cat ~/.my.cnf
$dbUserName = 'imonakhov';  // please use your db user name
$dbPassword = 'r4vQyQxaRej5';    // please use your db password


// Leave this var alone
$db = null;

function getPDO() {
    global $db;
    global $dbUserName;
    global $dbPassword;
    if ($db != null) {
        return $db;
    }
    try {
        $db = new PDO("mysql:host=localhost;port=3306;dbname=$dbUserName","$dbUserName","$dbPassword");
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false); 
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 
        return $db;
    }
    catch (Exception $e2) {
        echo('DB Connection Error - ' . $e2->getMessage());
        exit();
    }
}

function execute($sql,$bindingValues=null) {
    $db = getPDO();
    try {
        $statement = $db->prepare($sql);
        if (!$statement) {
            echo('DB Prepare Error - ' . $sql);
            echo('<br>');
            print_r($bindingValues);
            exit();
        }
        if ($statement===false) {
            echo('DB Prepare Error - ' . $sql);
            echo('<br>');
            print_r($bindingValues);
            exit();
        }
        if ($bindingValues != null) {
            for ($counter=0; $counter < sizeof($bindingValues); $counter++) {
                $statement->bindParam($counter + 1, $bindingValues[$counter]);
            }
        }
        $statement->execute();
        $results = array();
        if (stripos($sql,'select') === 0) {
            $results = $statement->fetchAll();
        }
        $statement->closeCursor();
        return $results;
    }
    catch (Throwable $e2) {
        echo('DB Error - ' . $sql);
        echo('<br>' . $e2->getMessage());
        echo('<br>');
        print_r($bindingValues);
        exit();
    }
}