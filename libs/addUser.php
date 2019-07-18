<?php

require 'db.php';

function addUser() {
	global $db;

	$name = $_POST['firstname'].' '.$_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$company = $_POST['company'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$areacode = $_POST['areacode'];


	if ($password == $password2) {
		$salt = time();
		$hashed_passwd = hash('SHA512', $password.$salt);
		print("Password hashed!");
		$query = "INSERT INTO `users` (`email`, `password`, `salt`, `name`, `company`, `street`, `city`, `postarea`) VALUES (?, ?, ?, ?, (SELECT `id` FROM `companies` WHERE `name` LIKE ?), ?, ?, ?)";
		$stmt = $db->prepare($query);
		if (!$stmt) print("FALSE!");
		foreach ($db->error_list as $error){
			print($error);
		}
		$stmt->bind_param("sssssssi", $email, $hashed_passwd, $salt, $name, $company, $street, $city, $areacode);
		$stmt->execute();
	}
	else {
		echo 'Passwords do not match!';
	}
}

?>
