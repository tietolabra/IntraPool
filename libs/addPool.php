<?php

require_once 'db.php';
require_once 'userData.php';

function addPool() {
    global $db;
    global $userData;

    foreach ($_POST as $name => $param) {
        print($name.' : '.$param.'<br>');
    }
}

?>