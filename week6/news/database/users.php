<?php 
    function userLogin($db, $username, $password) {
        $password = sha1($password);
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
    }

    function userExists($db, $username) {
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
    }

    // register a user
    function registerUser($db, $username, $email, $password) {
        $password = sha1($password);
        $stmt = $db->prepare('INSERT INTO users (username, password, name) VALUES (:username, :password, :name)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name', $email);
        $stmt->execute();
    }
?>