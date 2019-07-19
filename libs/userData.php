<?php
require_once 'db.php';
$userData = "";

if (isset($_COOKIE['session'])) {
    $stmt = $db->prepare("SELECT users.id, users.name, users.email, users.street, users.city, users.postarea, companies.id AS companyID, companies.name AS companyName, companies.street AS companyStreet, companies.city AS companyCity, companies.postarea AS companyPostarea FROM `users`, `companies` WHERE users.id = (SELECT `uid` from `sessions` WHERE `cookie` = ?) AND companies.id = users.company");
    $stmt->bind_param("s", $_COOKIE['session']);
    if ($stmt->execute()) {
        $data = $stmt->get_result();
        $userData = $data->fetch_assoc();
        $db->query("UPDATE `sessions` SET sessions.lastActive = ".time()." WHERE cookie = '".$_COOKIE['session']."'");
    }
    else {
        setcookie('session', '', 0, '/');
        unset($_COOKIE['session']);
    }
}

function getCompanyName() {
    global $userData;
    echo $userData['companyName'];
}

?>