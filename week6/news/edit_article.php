<?php 
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }

    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
</head>
<body>
    <h1>Edit Article <?=$id?></h1>
    <form action="database/action_edit_news.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="introduction">Introduction</label>
        <textarea name="introduction" id="introduction" cols="30" rows="10"></textarea>

        <label for="fulltext">Full Text</label>
        <textarea name="fulltext" id="fulltext" cols="30" rows="10"></textarea>

        <input type="submit" value="Submit">
</body>
</html>