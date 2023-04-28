<?php function output_article_list($articles) { ?>
    <section id='news'>

    <?php
        foreach ($articles as $article) { 
            $date = date('F j', $article['published']);
            $tags = explode(',', $article['tags']);
    ?>
    <article><header><h1><a href='article.php?id=<?=$article['id']?>'><?=$article['title']?></a></h1></header>
    <img src='https://picsum.photos/600/300?"<?=$tags[0]?>' alt=''>
    <p><?=$article['introduction']?></p>
    <p><?=$article['fulltext']?></p>
    <footer><span class='author'><?=$article['name']?></span>
    <span class='tags'><a href='index.php'>#<?=$tags[0]?></a> <a href='index.php'>#<?=$tags[1]?></a></span>
    <span class='date'><?=$date?></span>
    <a class='comments' href='article.php?id=<?=$article['id']?>#comments'><?=$article['comments']?></a>
    </footer></article>
    <?php } ?>
    </section>
<?php } ?>

<?php 
    function output_article($article) {
        $tags = explode(',', $article['tags']);
?>
    <section id='news'><article><header><h1><a href='article.php?id=<?=$article['id']?>'><?=$article['title']?></a></h1></header>
    <img src='https://picsum.photos/600/300?"<?=$tags[0]?>' alt=''>
    <p><?=$article['introduction']?></p>
    <p><?=$article['fulltext']?></p></article>
<?php } ?>

<?php function output_article_footer($article, $number) { 
    $date = date('F j', $article['published']);
    $tags = explode(',', $article['tags']);    
    if (isset($_SESSION['username'])) {
        ?>
        <h4><a href="edit_article.php?id=<?=$article['id']?>">Edit Article</a></h4>
<?php } ?>
    
    </section><footer><span class='author'><?=$article['name']?></span>
    <span class='tags'><a href='index.php'>#<?=$tags[0]?></a> <a href='index.php'>#<?=$tags[1]?></a></span>
    <span class='date'><?=$date?></span>
    <a class='comments' href='article.php?id=<?=$article['id']?>#comments'><?=$number['number']?></a>
    </footer></article></section>
<?php } ?>
