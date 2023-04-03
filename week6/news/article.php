<?php
  require_once('database/connection.php');
  require_once('database/news.php');
  require_once('database/comments.php');

  require_once('templates/common.php');
  require_once('templates/news.php');
  require_once('templates/comments.php');

  $db = getDatabaseConnection();
  $article = getOneNew($db);
  $comments = getComments($db);
  $number = getNumberOfComments($db);
  
  output_header();
  output_article($article);;
  output_comments($number, $comments);
  output_forms();
  output_article_footer($article, $number);
  output_footer()
?>
