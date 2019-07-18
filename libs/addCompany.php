<?php

require_once 'db.php';

function addCompany() {
    global $db;

    $cName = $_POST['cName'];
    $cStreet = $_POST['cStreet'];
    $cCity = $_POST['cCity'];
    $cAreaCode = $_POST['cAreacode'];

    $stmt = $db->prepare("INSERT INTO `companies` (`name`, `street`, `city`, `postarea`) SELECT ?,?,?,? WHERE NOT EXISTS (SELECT 1 FROM `companies` WHERE `name` = ?)");
    $stmt->bind_param("sssss", $cName, $cStreet, $cCity, $cAreaCode, $cName);
    return $stmt->execute();
}

?>