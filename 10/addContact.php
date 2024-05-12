<?php

require_once('../shared/db.php');

date_default_timezone_set('America/Detroit');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$name = '';
$address = '';
$city = '';
$state = '';
$phone = '';
$email = '';
$dob = '';
$cb1Text = '';
$cb2Text = '';
$cb3Text = '';
$contact = '';
$nameErrMsg = '';
$addressErrMsg = '';
$cityErrMsg = '';
$phoneErrMsg = '';
$emailErrMsg = '';
$dobErrMsg = '';
$successfulMsg = '';
$cb = [];

if (!empty($_REQUEST['button'])) {

	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$hasErr = false;

	// Name
	$pattern = '/^([a-z]|-|\'|\s)+$/i';
	$nameErr = preg_match($pattern, $name);
	if ($nameErr === 0) {
		$nameErrMsg = 'Name cannot be blank and must be a valid name';
		$hasErr = true;
	}

	// Address
	$pattern = '/^\d+\s([a-z]|\s)+$/i';
	$addressErr = preg_match($pattern, $address);
	if ($addressErr === 0) {
		$addressErrMsg = 'Address cannot be blank and must be a valid address (number and then street)';
		$hasErr = true;
	}

	// City
	$pattern = '/^[a-z\s]+$/i';
	$cityErr = preg_match($pattern, $city);
	if ($cityErr === 0) {
		$cityErrMsg = 'City cannot be blank and must be a valid сity';
		$hasErr = true;
	}

	// Phone
	$pattern = '/^\d{3}\.\d{3}\.\d{4}$/';
	$phoneErr = preg_match($pattern, $phone);
	if ($phoneErr === 0) {
		$phoneErrMsg = 'Phone cannot be blank and must be a valid format 999.999.9999';
		$hasErr = true;
	}

	// Email
	$pattern = '/^[a-z0-9^@]+@[a-z0-9][a-z0-9\.]+\..+$/i';
	$emailErr = preg_match($pattern, $email);
	if ($emailErr === 0) {
		$emailErrMsg = 'Email cannot be blank and must be a valid email';
		$hasErr = true;
	}

	// DOB
	$pattern = '/^\d{4}-\d{2}-\d{2}$/';
	$dobErr = preg_match($pattern, $dob);
	if ($dobErr === 0) {
		$dobErrMsg = 'Date cannot be blank';
		$hasErr = true;
	}

	// Checkboxes
	if (isset($_POST['cb1'])) {
		$cb1Text = 'Newsletter';
		$cb[] = $cb1Text;
	}
	if (isset($_POST['cb2'])) {
		$cb2Text = 'Email Updates';
		$cb[] = $cb2Text;
	}
	if (isset($_POST['cb3'])) {
		$cb3Text = 'Text Updates';
		$cb[] = $cb3Text;
	}
	if ($cb1Text != '' || $cb2Text != '' || $cb3Text != '') {
		$contact = implode(', ', $cb);
	}
	if (
		$hasErr === false
	) {
		$ar = [];
		$ar[] = $name;
		$ar[] = $address;
		$ar[] = $city;
		$ar[] = $phone;
		$ar[] = $state;
		$ar[] = $dob;
		$ar[] = $email;
		$ar[] = $contact;

		$sql = 'INSERT INTO contact (name,address,city,phone,state,dob,email,contact) VALUES (?,?,?,?,?,?,?,?)';
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
	<h1>Add Contact</h1>
	<div class="successfulMsg text-success"><?php echo ($successfulMsg); ?>&nbsp;</div>

	<form method="post">

		<div class="form-group">
			<label for="name" class="space">Name (letters only) <span class="error"><?php echo ($nameErrMsg); ?></span></label>
			<div class="error"></div>
			<input type="text" class="form-control" name="name" id="name" value="<?php echo ($name); ?>">
		</div>
		<div class="form-group">
			<label for="address" class="space">Address (just number and street) <span class="error"><?php echo ($addressErrMsg); ?></span></label>
			<div class="error"></div>
			<input type="text" class="form-control" name="address" id="address" value="<?php echo ($address); ?>">
		</div>
		<div class="form-group">
			<label for="city" class="space">City <span class="error"><?php echo ($cityErrMsg); ?></span></label>
			<div class="error"></div>
			<input value="<?php echo ($city); ?>" type="text" class="form-control" name="city" id="city">
		</div>
		<div class="form-group">
			<label for="state" class="space">State</label>
			<select class="form-control" name="state" id="state">
				<option value="Michigan" <? echo ($state == 'Michigan' ? 'selected' : ''); ?>>Michigan</option>
				<option value="Wisconsin" <? echo ($state == 'Wisconsin' ? 'selected' : ''); ?>>Wisconsin</option>
				<option value="Illinois" <? echo ($state == 'Illinois' ? 'selected' : ''); ?>>Illinois</option>
				<option value="Indiana" <? echo ($state == 'Indiana' ? 'selected' : ''); ?>>Indiana</option>
				<option value="Minnesota" <? echo ($state == 'Minnesota' ? 'selected' : ''); ?>>Minnesota</option>
			</select>
		</div>
		<div class="form-group">
			<label for="phone" class="space">Phone (format 999.999.9999)<span class="error"><?php echo ($phoneErrMsg); ?></span></label>
			<div class="error"></div>
			<input value="<?php echo ($phone); ?>" type="text" class="form-control" name="phone" id="phone">
		</div>
		<div class="form-group">
			<label for="email" class="space">Email <span class="error"><?php echo ($emailErrMsg); ?></span></label>
			<div class="error"></div>
			<input value="<?php echo ($email); ?>" type="text" class="form-control" name="email" id="email">
		</div>
		<div class="form-group">
			<label for="dob" class="space">Date of birth <span class="error"><?php echo ($dobErrMsg); ?></span></label>
			<div class="error"></div>
			<input value="<?php echo ($dob); ?>" type="date" class="form-control" name="dob" id="dob">
		</div>
		<div class="form-group">
			Please check all contact types you would like (optional):<br>
			<input type="checkbox" id="cb1" name="cb1" value="cb1" <? echo ($cb1Text !== '' ? 'checked' : ''); ?>>
			<label for="cb1"> Newsletter</label>&nbsp;&nbsp;
			<input type="checkbox" id="cb2" name="cb2" value="cb2" <? echo ($cb2Text !== '' ? 'checked' : ''); ?>>
			<label for="cb2"> Email Updates</label>&nbsp;&nbsp;
			<input type="checkbox" id="cb3" name="cb3" value="cb3" <? echo ($cb3Text !== '' ? 'checked' : ''); ?>>
			<label for="cb3"> Text Updates</label>&nbsp;&nbsp;
		</div>

		<button type="submit" name="button" value="Submit" class="btn btn-primary">Submit</button>
		<br><br><br><br>

	</form>

</body>

</html>