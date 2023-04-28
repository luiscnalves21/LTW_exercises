<?php 
    function getAllNews($db) {
        $stmt = $db->prepare("SELECT news.*, users.*, COUNT(comments.id) AS comments FROM news JOIN users USING (username) LEFT JOIN comments ON comments.news_id = news.id GROUP BY news.id, users.username ORDER BY published DESC");
        $stmt->execute();
        $articles = $stmt->fetchAll();
        
        return $articles;
    }

    function getOneNew($db) {
        $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $article = $stmt->fetch();

        return $article;
    }

    function updateArticle($db, $id, $title, $introduction, $fulltext) {
        $stmt = $db->prepare('UPDATE news SET title = :title, introduction = :introduction, fulltext = :fulltext WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':introduction', $introduction);
        $stmt->bindParam(':fulltext', $fulltext);
        $stmt->execute();

        
    }
?>
