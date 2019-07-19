<?php

require_once 'db.php';
require_once 'userData.php';

function addPool() {
    global $db;
    global $userData;


    foreach ($_POST as $name => $param) {
        if (is_array($_)) {
            print($name.':<br>');
            foreach ($param as $p) {
                print($p.'<br>');
            }
        }
        else print($name.' : '.$param.'<br>');
    }
}

?>