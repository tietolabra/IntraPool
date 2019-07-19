<?php

function getLogoutButton() {
    $js = "window.location.href='logout.php'";
    echo '<button style="background-color: lightblue;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;" onclick="'.$js.'">Logout</button>';
}

?>