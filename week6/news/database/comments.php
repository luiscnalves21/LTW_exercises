<?php 
    function getComments($db) {
        $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
        $stmt->execute(array($_GET['id']));
        $comments = $stmt->fetchAll();

        return $comments;
    }

    function getNumberOfComments($db) {
        $stmt = $db->prepare('SELECT COUNT() AS number FROM comments WHERE news_id = ?');
        $stmt->execute(array($_GET['id']));
        $number = $stmt->fetch();

        return $number;
    }
?>