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

		$query = "INSERT INTO `users` (`email`, `password`, `salt`, `name`, `company`, `street`, `city`, `postarea`) VALUES (?, ?, ?, ?, ?`, ?, ?, ?)";
		$stmt = $db->prepare($query);
		$stmt->bind_param("ssssissi", $email, $hashed_passwd, $salt, $name, $company, $street, $city, $areacode);
		$stmt->execute();
		$result = $stmt->get_result();
		echo $result;
	}
	else {
		echo 'Passwords do not match!';
	}
}

?>
