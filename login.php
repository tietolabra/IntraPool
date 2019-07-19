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
            $data = $result->fetch_assoc();

            // We hash the users password with salt fetched from the database
            $passwd_hash = hash('sha512', $passwd.$data['salt']);

            // Hashes should now match
            if ($passwd_hash == $data['password']) {
            // Password was correct
            }
            else {
             // Password was incorrect
            }
        }
        else {
            // User not found or other database problem
        }
    }
    else {
        // User didn't give username and/or password
    }

?>