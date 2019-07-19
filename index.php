<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="libs/jquery-1.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>IntraPool</title>

</head>

<body>

    

    <main>
        <?php
            if (isset($_GET['p'])) {
                include $_GET['p'].'.html';
            }
            else if (isset($_COOKIE['session'])) {
                include 'poolList.html';
            }
            else {
                include 'login.php';
            }
        ?>
    </main>

</body>

</html>