<?php 
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }

    $username = $_POST['username'];
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];
    $tags = $_POST['tags'];

    //create article in the database
    require_once('connection.php');
    require_once('news.php');
    $db = getDatabaseConnection();
    createArticle($db, $title, $introduction, $fulltext, $username, $tags);

    header('Location: ../index.php');
?>