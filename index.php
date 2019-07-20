<?php require_once 'libs/UIElements.php';
require_once 'libs/userData.php';
require 'libs/phpErrors.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">

    <title>IntraPool</title>

    <style>


        </style>

</head>

<body>


                    <?php if (!empty($userData)) {
                        echo '<div class="container-fluid text-right fixed-top" style="background:rgba(255,255,255,0.2);"><div class="mt-md-2"><p class="align-middle">';
                        echo 'Logged in as ' . $userData['name'];
                        getLogoutButton();
                        echo '</p></div></div>';
                    } ?>
                    

    <main class="container text-center">
        <div class="row justify-content-md-center">
        <div class="col col-lg-8 border bg-light mt-10">
            <div class="col-md m-md-3">

            <?php
            if (isset($_GET['e'])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_GET['e'];
            echo '</div>';
            }
            ?>


                <?php
                if (isset($_GET['p'])) {
                    include $_GET['p'] . '.php';
                } else if (!empty($userData)) {
                    include 'userMenu.php';
                } else {
                    include 'landingPage.php';
                }
                ?>
            </div>
            </div>
        </div>
        </div>
    </main>

</body>

</html>