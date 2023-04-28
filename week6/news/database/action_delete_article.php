<?php 
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }

    $id = $_POST['id'];

    require_once('connection.php');
    require_once('news.php');

    $db = getDatabaseConnection();
    deleteArticle($db, $id);

    header('Location: ../index.php');
?>