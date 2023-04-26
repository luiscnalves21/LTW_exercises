<?php 
    $id = $_POST['id'];
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];

    //update article in the database
    require_once('connection.php');
    require_once('news.php');
    $db = getDatabaseConnection();
    updateArticle($db, $id, $title, $introduction, $fulltext);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0;url=../article.php?id=<?=$id?>">
    <title>Redirecting...</title>
</head>
<body>
    <h1>Redirecting...</h1>
</body>
</html>