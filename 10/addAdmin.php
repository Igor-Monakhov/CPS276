<?php

require_once('../shared/db.php');

date_default_timezone_set('America/Detroit');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$name = '';
$email = '';
$password = '';
$status = '';
$nameErrMsg = '';
$emailErrMsg = '';
$passwordErrMsg = '';
$successfulMsg = '';

if (!empty($_REQUEST['button'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	$hasErr = false;

	// Name
	$pattern = '/^([a-z]|-|\'|\s)+$/i';
	$nameErr = preg_match($pattern, $name);
	if ($nameErr === 0) {
		$nameErrMsg = 'Name cannot be blank and must be a valid name';
		$hasErr = true;
	}

	// Email
	$pattern = '/^[a-z0-9^@]+@[a-z0-9][a-z0-9\.]+\..+$/i';
	$emailErr = preg_match($pattern, $email);
	if ($emailErr === 0) {
		$emailErrMsg = 'Email cannot be blank and must be a valid email';
		$hasErr = true;
	}

	// PASSWORD
	$pattern = '/^\S+$/';
	$passwordErr = preg_match($pattern, $password);
	if ($passwordErr === 0) {
		$passwordErrMsg = 'Password cannot be blank and must be a valid password';
		$hasErr = true;
	}


	if (
		$hasErr === false
	) {
		$ar = [];
		$ar[] = $name;
		$ar[] = $email;
		$ar[] = $password;
		$ar[] = $status;
		$sql = 'INSERT INTO admin (name,email,password,status) VALUES (?,?,?,?)';
		execute($sql, $ar);
		$successfulMsg = 'Contact Information Added';
	}
}
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
	<h1>Add Admin</h1>
	<div class="successfulMsg mb-1 text-success"><?php echo ($successfulMsg); ?>&nbsp;</div>
	<form method="post">

		<div class="form-group">
			<label for="name" class="space">Name (letters only) <span class="error"><?php echo ($nameErrMsg); ?></span></label>
			<div class="error"></div>
			<input type="text" class="form-control" name="name" id="name" value="<?php echo ($name); ?>">
		</div>

		<div class="form-group">
			<label for="email" class="space">Email <span class="error"><?php echo ($emailErrMsg); ?></span></label>
			<div class="error"></div>
			<input value="<?php echo ($email); ?>" type="text" class="form-control" name="email" id="email">
		</div>

		<div class="form-group">
			<label for="password" class="space">Password <span class="error"><?php echo ($passwordErrMsg); ?></span></label>
			<input type="password" class="form-control" name="password" id="password" value="<?php echo ($password); ?>">
		</div>

		<div class="form-group">
			<label for="status" class="space">Status</label>
			<select class="form-control" name="status" id="status">
				<option value="Staff" <? echo ($status == 'Staff' ? 'selected' : ''); ?>>Staff</option>
				<option value="Admin" <? echo ($status == 'Admin' ? 'selected' : ''); ?>>Admin</option>
			</select>
		</div>

		<button type="submit" name="button" value="Submit" class="btn btn-primary">Submit</button>
		<br><br><br><br>

	</form>

</body>

</html>