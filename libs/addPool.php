<?php

require_once 'db.php';
require_once 'userData.php';

function addPool() {
    global $db;
    global $userData;

    var_dump($_POST);
    var_dump($_POST['weekDays[]']);

    foreach ($_POST as $name => $param) {
        if (is_array($param)) {
            print($name.':<br>');
            foreach ($param as $p) {
                print($p.'<br>');
            }
        }
        else print($name.' : '.$param.'<br>');
    }
}

?>