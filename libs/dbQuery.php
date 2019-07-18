<?php

require_once 'db.php';
require_once 'json.php';

function queryCompanies($query) {
	global $db;
	$query = '%'.$query.'%';
	$stmt = $db->prepare("SELECT * FROM `companies` WHERE `name` LIKE ?");
	$stmt->bind_param("s", $query);
	$stmt->execute();

	return generateJSON($stmt->get_result());
}

function getAllCompanies() {
	global $db;
	$data = $db->query("SELECT `name` FROM `companies`");
	return generateJSON($data);
}

?>
