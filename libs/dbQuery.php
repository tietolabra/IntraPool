<?php

require_once 'db.php';
require_once 'json.php';

function queryCompanies($query) {
	$stmt = $db->prepare("SELECT * FROM `companies` WHERE `name` = ?");
	$stmt->bind_param("s", $query);
	$stmt->execute();

	return generateJSON($stmt->get_result());
}

?>
