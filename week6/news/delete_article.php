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
    <title>Delete Article</title>
</head>
<body>
    <form action="database/action_delete_article.php" method="post">
        <label for="id">Id</label>
        <input type="text" name="id" id="id">

        <input type="submit" value="Submit">
    </form>
</body>
</html>