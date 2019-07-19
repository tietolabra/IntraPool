<?php

function getLogoutButton() {
    $js = "() => {window.location.href='logout.php'}";
    echo '<button click="'.$js.'">Logout</button>';
}

?>