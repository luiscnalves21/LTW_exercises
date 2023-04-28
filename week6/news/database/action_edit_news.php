<?php 
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];

    //update article in the database
    require_once('connection.php');
    require_once('news.php');
    $db = getDatabaseConnection();
    updateArticle($db, $id, $title, $introduction, $fulltext);

    header('Location: ../index.php');
?>