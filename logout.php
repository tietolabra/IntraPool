<?php
    require 'libs/db.php';
    require 'libs/phpErrors.php';

    if (isset($_COOKIE['session'])) {
        if ($db->query("DELETE FROM `sessions` WHERE sessions.cookie = '".$_COOKIE['session']."'")) {
            setcookie('session', '', 0, '/');
            unset($_COOKIE['session']);
            header("location: /");
        }
        else {
            throw new Exception("Couldn't remove session information from database!");
        }
    }

    
?>