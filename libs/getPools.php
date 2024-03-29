<?php
require_once 'phpErrors.php';
require_once 'db.php';
require_once 'userData.php';

function getCompanyPools()
{
    global $userData;
    global $db;
    if (!empty($userData)) {
        $pools = $db->query("SELECT pools.seats, pools.startTime, pools.endTime, users.email, companies.name AS companyName, users.name AS userName, users.city AS userLocation FROM `pools` INNER JOIN `companies` ON pools.company=companies.id INNER JOIN `users` ON users.id=pools.driver WHERE pools.company = ".$userData['companyID']." AND pools.startTime >= CURRENT_DATE() ORDER BY pools.startTime");
        return generateJSON($pools);
    } else {
        throw new Exception("It seems there isn't user logged in.");
    }
}

function getUserPools() {
    global $userData;
    global $db;
    if (!empty($userData)) {
        $pools = $db->query("SELECT * FROM `pools` WHERE pools.driver = ".$userData['id']);
        return generateJSON($pools);
    } else {
        throw new Exception("It seems there isn't user logged in.");
    }
}