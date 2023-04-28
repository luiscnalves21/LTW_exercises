<?php 
  session_start();

  require_once('database/connection.php');
  require_once('database/news.php');

  require_once('templates/common.php');
  require_once('templates/news.php');

  $db = getDatabaseConnection();
  $articles = getAllNews($db);

  if (isset($_SESSION['username'])) {
    output_header_logout();
  } else {
    output_header_login();
  }
  output_article_list($articles);
  output_footer();
?>
