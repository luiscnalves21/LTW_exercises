<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
</head>
<body>
    <form action="database/action_create_article.php" method="post">
        <input type="hidden" name="username" value="<?=$_SESSION['username']?>">    

        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="introduction">Introduction</label>
        <textarea name="introduction" id="introduction" cols="30" rows="10"></textarea>

        <label for="fulltext">Full Text</label>
        <textarea name="fulltext" id="fulltext" cols="30" rows="10"></textarea>

        <label for="tags">Tags</label>
        <input type="text" name="tags" id="tags">

        <input type="submit" value="Submit">
    </form>
</body>
</html>