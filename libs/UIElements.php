<?php

function getLogoutButton() {
    $js = "window.location.href='logout.php'";
    echo '<button id="logoutButton" onclick="'.$js.'">Logout</button>';
}

?>