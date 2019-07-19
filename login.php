<?php

    require 'libs/db.php';

    // Check that there actually is input in both username and password
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $user = $_POST['username'];
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
                $ip = $_SERVER['remote_addr'];
                $time = time();
                $cookiehash = md5($userdata['id'].$time);
                $stmt = $db->prepare("INSERT INTO `sessions` (`uid`, `login`,`lastActive`, `ip`, `cookie`) SELECT ?,?,?,?,? WHERE NOT EXISTS (SELECT 1 FROM `sessions` WHERE `uid` = ?)")
                $stmt->bind_param("iiissi", $userdata['id'], time(), time(), $ip, $cookiehash, $userdata['id']);
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
                        throw new Exception("Cookies hash do not match to database!");
                    }
                }
                else {
                    // Adding session to database failed
                    throw new Exception("Adding session to database failed!");
                }
            }
            else {
                // Password was incorrect
                throw new Exception("Password does not match!");
            }
        }
        else {
            // User not found or other database problem
            throw new Exception("User not found!");
        }
    }
    else {
        // User didn't give username and/or password
        throw new Exception("Username and/or password missing!");
    }

?>