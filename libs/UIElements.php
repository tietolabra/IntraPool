<?php

function getLogoutButton() {
    $js = "window.location.href='logout.php'";
    echo '<button onclick="'.$js.'">Logout</button>';
}

?>