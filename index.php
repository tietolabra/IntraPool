
<?php require_once 'libs/UIElements.php'; require_once 'libs/userData.php'; require 'libs/phpErrors.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>IntraPool</title>

</head>

<body>

    

    <main>

        <?php if (!empty($userData)) { getLogoutButton(); echo '<h2 style="text-align: center">Logged in as '.$userData['name'].'</h2>'; } ?>

        <?php
            if (isset($_GET['p'])) {
                include $_GET['p'].'.php';
            }
            else if (isset($_COOKIE['session'])) {
                include 'userMenu.php';
            }
            else {
                include 'landingPage.php';
            }
        ?>
    </main>

</body>

</html>