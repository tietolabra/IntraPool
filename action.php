<?php

include 'libs/addUser.php';
include 'libs/addCompany.php';
include 'libs/addPool.php';
include 'libs/getPools.php';

$action = $_GET['a'];

if ($action == 'register') {
	addUser();
}

if ($action == 'companyRegister') {
	addCompany();
}
?>

