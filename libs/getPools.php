<?php
require_once 'phpErrors.php';
require_once 'db.php';
require_once 'userData.php';

function getCompanyPools()
{
    global $userData;
    global $db;
    if (!empty($userData)) {
        $pools = $db->query("SELECT * FROM `pools` WHERE pools.fromWork = ".$userData['companyID']." OR pools.toWork = ".$userData['companyID']);
        return generateJSON($pools);
    } else {
        throw new Exception("It seems there isn't user logged in.");
    }
}
