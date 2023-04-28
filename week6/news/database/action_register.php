<?php
    session_start();

    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (empty($username) || empty($name) || empty($password)) {
        header('Location:' . $_SERVER['HTTP_REFERER']);
    } else {
        require_once('connection.php');
        require_once('users.php');
        
        $db = getDatabaseConnection();

        if (userExists($db, $username)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else {
            registerUser($db, $username, $name, $password);
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
        }
    }
?>