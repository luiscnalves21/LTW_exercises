<?php 
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    if (empty($username) || empty($password)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        require_once('connection.php');
        require_once('users.php');

        $db = getDatabaseConnection();

        if (userLogin($db, $username, $password)) {
            $_SESSION['username'] = $username;
            header('location: ../index.php');
        }
        else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>