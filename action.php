<?php

require_once 'libs/phpErrors.php';
require_once 'libs/addUser.php';
require_once 'libs/addCompany.php';
require_once 'libs/addPool.php';
require_once 'libs/getPools.php';
require_once 'libs/dbQuery.php';

$action = $_GET['a'];

if ($action == 'register') {
	addUser();
}

if ($action == 'companyRegister') {
	addCompany();
}

if ($action == 'qCompany' && isset($_GET['q'])) {
	echo queryCompanies($_GET['q']);
}

if ($action == "getAllComs") {
	echo getAllCompanies();
}

if ($action == "getCompanyPools") {
	echo getCompanyPools();
}


?>

