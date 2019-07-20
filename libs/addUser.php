<?php
// This script adds new user (and company) to the database

require_once 'db.php';
require_once 'addCompany.php';

function addUser() {
	global $db;

	$name = htmlspecialchars($_POST['firstname'].' '.$_POST['lastname']);
	$email = htmlspecialchars(strtolower($_POST['email']));
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$company = htmlspecialchars((isset($_POST['company'])) ? $_POST['company'] : "");
	$street = htmlspecialchars($_POST['street']);
	$city = htmlspecialchars($_POST['city']);
	$areacode = $_POST['areacode'];

	if (!empty($_POST['cName'])) {
		$company = $_POST['cName'];
		if (!addCompany()) {
			//throw new Exception("Couldn't add new company to database!");
			header("location: ".$_SERVER['HTTP_REFERER']."&e=Adding+new+company+failed");
		}
		else print("New company created succesfully!<br>");
	}

	if ($password == $password2) {
		$salt = time();
		$hashed_passwd = hash('SHA512', $password.$salt);
		//$query = "INSERT INTO `users` (`email`, `password`, `salt`, `name`, `company`, `street`, `city`, `postarea`) SELECT ?, ?, ?, ?, (SELECT `id` FROM `companies` WHERE `name` LIKE ?), ?, ?, ? WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `email` = ?)";
		$query = "INSERT INTO `users` (`email`, `password`, `salt`, `name`, `company`, `street`, `city`, `postarea`) VALUES (?, ?, ?, ?, (SELECT `id` FROM `companies` WHERE `name` LIKE ?), ?, ?, ?)";
		$stmt = $db->prepare($query);
		foreach ($db->error_list as $error){
			print($error);
		}
		$stmt->bind_param("sssssssi", $email, $hashed_passwd, $salt, $name, $company, $street, $city, $areacode);
		if ($stmt->execute()) {
			header("location: /");
		}
	}
	else {
		//echo 'Passwords do not match!';
		header("location: ".$_SERVER['HTTP_REFERER']."&e=Passwords+do+not+match");
	}
}

?>
