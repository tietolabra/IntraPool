<?php

function getLogoutButton() {
    $js = "window.location.href='logout.php'";
    echo '<button class="btn btn-primary btn-md ml-md-2 align-middle" onclick="'.$js.'">Logout</button>';
}

?>