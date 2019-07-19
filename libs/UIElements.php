<?php

function getLogoutButton() {
    $js = "window.location.href='logout.php'";
    echo '<button class="btn btn-primary btn-md m-md-3" onclick="'.$js.'">Logout</button>';
}

?>