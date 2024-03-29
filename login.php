<?php

    require 'libs/phpErrors.php';
    require 'libs/db.php';

    // Check that there actually is input in both username and password
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $user = strtolower($_POST['username']);
        $passwd = $_POST['password'];

        // Let's query the database to see that user exists and password is OK
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $stmt->bind_param("s", $user);
        if ($stmt->execute()) {
            // Query successfull, so we continue
            $result = $stmt->get_result();
            $userdata = $result->fetch_assoc();

            // We hash the users password with salt fetched from the database
            $passwd_hash = hash('sha512', $passwd.$userdata['salt']);

            // Hashes should now match
            if ($passwd_hash == $userdata['password']) {
                // Password was correct
                $ip = $_SERVER['REMOTE_ADDR'];
                $time = time();
                $cookiehash = md5($userdata['id'].$time);
                $stmt = $db->prepare("INSERT INTO `sessions` (`uid`, `login`,`lastActive`, `ip`, `cookie`) SELECT ?,?,?,?,?");
                $stmt->bind_param("iiiss", $userdata['id'], $time, $time, $ip, $cookiehash);
                if ($stmt->execute()) {
                    // Success. Now let's verify our sessions was created
                    $sessiondata = $db->query("SELECT * FROM `sessions` WHERE `login` = ".$time." AND `uid` = ".$userdata['id']);
                    $sessiondata = $sessiondata->fetch_assoc();
                    if ($sessiondata['cookie'] == $cookiehash) {
                        setcookie("session", $cookiehash, time()+86400*30, "/");
                        header("location: /");
                    }
                    else {
                        // Cookiehashes do not match!
                        //throw new Exception("Cookies hash do not match to database!");
                        header("location: ".$_SERVER['HTTP_REFERER']."?e=Login+error");
                    }
                }
                else {
                    // Adding session to database failed
                    //throw new Exception("Adding session to database failed!");
                    header("location: ".$_SERVER['HTTP_REFERER']."?e=Could+not+create+new+session");
                }
            }
            else {
                // Password was incorrect
                //throw new Exception("Password does not match!");
                header("location: ".$_SERVER['HTTP_REFERER']."?e=Passwords+do+not+match");
            }
        }
        else {
            // User not found or other database problem
            //throw new Exception("User not found!");
            header("location: ".$_SERVER['HTTP_REFERER']."?e=User+not+found");
        }
    }
    else {
        // User didn't give username and/or password
        //throw new Exception("Username and/or password missing!");
        header("location: ".$_SERVER['HTTP_REFERER']."?e=No+username+or+password+given");
    }

?>