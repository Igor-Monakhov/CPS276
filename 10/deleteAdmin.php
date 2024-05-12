<?php

require_once('../shared/db.php');

$errorMsg = '';
$successfulMsg = '';

if (!empty($_REQUEST['delete'])) {

    if (!empty($_REQUEST['idsToDelete'])) {
        $questionMarks = [];
        $keys = [];
        foreach ($_REQUEST['idsToDelete'] as $key => $value) {
            $questionMarks[] = '?';
            $keys[] = $key;
        }
        $sql = 'DELETE FROM admin WHERE admin_id IN (' . implode(',', $questionMarks) . ')';
        execute($sql, $keys);
        $successfulMsg = 'Selected Contact Information has been deleted';
    } else {
        $errorMsg = 'No Сontact Information selected';
    }
}

$results = execute('SELECT * FROM admin');

require_once('menu.php');

?>




<html>

<head>
    <title>Final Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .error {
            color: red;
            margin-left: 5px;
        }

        .space {
            margin-right: 30px;
            float: left;
        }

        nav ul li {
            list-style: none;
        }
    </style>
</head>

<body class="container pt-3">
    <br><br>
    <h1>Delete Admin(s)</h1>
    <div class="successfulMsg mb-2 text-success"><?php echo ($successfulMsg); ?>&nbsp;<span class="error"><?php echo ($errorMsg) ?></span></div>

    <form method="post">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <? foreach ($results as $result) { ?>

                    <tr>
                        <td><?= $result['name'] ?></td>
                        <td><?= $result['email'] ?></td>
                        <td><?= $result['password'] ?></td>
                        <td><?= $result['status'] ?></td>
                        <td><input type="checkbox" name="idsToDelete[<?= $result['admin_id'] ?>]"></td>
                    </tr>

                <? } ?>

            </tbody>
        </table>

        <input onclick="return confirm('Are you sure you want to delete?');" type="submit" name="delete" value="Delete" class="btn btn-danger">

    </form>

</body>

</html>