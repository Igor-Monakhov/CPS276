<?php
//* Final Homework - Retrieve primary key of record to be deleted

/*
For your delete page, you will need to know which records to delete.
The easiest way to do this to have the name attribute of the check box html element include the primary key.

The checkboxes do NOT have to be sticky.
This is because the whole row will disappear after you press the delete button.  

Please do not display the primary key as I have done in this example.

This code also has an example of the 'are you sure' confirmation dialog.  (This is optional)
*/

require_once('../../shared/db.php');
print_r($_REQUEST);
if (!empty($_REQUEST['idsToDelete'])) {
    $questionMarks = [];
    $keys = [];
    foreach ($_REQUEST['idsToDelete'] as $key=>$value) {
        $questionMarks[] = '?';
        $keys[] = $key;
    }
    $sql = 'delete from teacher where teacherid IN (' . implode(',',$questionMarks) . ')';
    echo($sql . '<br>');
    print_r($keys);
    execute($sql,$keys);    
}
$results = execute('select * from teacher');

?>

<html>
    <form method="post">
        <table border=1>
            <tr>
                <td><b>NAME</b></td>
                <td><b>PRIMARY KEY</b></td>
                <td></td>
            </tr>
            <? foreach ($results as $result) { ?>

                <tr>
                    <td><?=$result['teachername']?></td>
                    <td><?=$result['teacherid']?></td>
                    <td><input type="checkbox" name="idsToDelete[<?=$result['teacherid']?>]"></td>
                </tr>

            <? } ?>

        </table>
        <br>
        <input onclick="return confirm('Are you sure you want to delete?')" type="submit" value="Delete checked items" name="b">
    </form>
</html>


