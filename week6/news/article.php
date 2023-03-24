
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Super Legit News</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="layout.css" rel="stylesheet">
    <link href="responsive.css" rel="stylesheet">
    <link href="comments.css" rel="stylesheet">
    <link href="forms.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1><a href="index.php">Super Legit News</a></h1>
      <h2><a href="index.php">Where fake news are born!</a></h2>
      <div id="signup">
        <a href="register.html">Register</a>
        <a href="login.html">Login</a>
      </div>
    </header>
    <nav id="menu">
      <!-- just for the hamburguer menu in responsive layout -->
      <input type="checkbox" id="hamburger"> 
      <label class="hamburger" for="hamburger"></label>

      <ul>
        <li><a href="index.php">Local</a></li>
        <li><a href="index.php">World</a></li>
        <li><a href="index.php">Politics</a></li>
        <li><a href="index.php">Sports</a></li>
        <li><a href="index.php">Science</a></li>
        <li><a href="index.php">Weather</a></li>
      </ul>
    </nav>
    <aside id="related">
      <article>
        <h1><a href="#">Duis arcu purus</a></h1>
        <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut id sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam a, suscipit finibus dui. Phasellus a.</p>
      </article>        
      <article>
        <h1><a href="#">Sed efficitur interdum</a></h1>
        <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus turpis tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
      </article>
      <article>
        <h1><a href="#">Vestibulum congue blandit</a></h1>
        <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed tincidunt interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
      </article>
    </aside>
          <?php 
        $id = $_GET['id'];

        $db = new PDO('sqlite:news.db');

        $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $article = $stmt->fetch();

        $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
        $stmt->execute(array($_GET['id']));
        $comments = $stmt->fetchAll();

        $stmt = $db->prepare('SELECT COUNT() AS number FROM comments WHERE news_id = ?');
        $stmt->execute(array($_GET['id']));
        $number = $stmt->fetch();

        $date = date('F j', $article['published']);
        $tags = explode(',', $article['tags']);
        echo "<section id='news'><article><header><h1><a href='article.php?id=". $article['id'] ."'>" . $article['title'] . "</a></h1></header>";
        echo "<img src='https://picsum.photos/600/300?" . $tags[0] . "' alt=''>";
        echo "<p>" . $article['introduction'] . "</p>";
        echo "<p>" . $article['fulltext'] . "</p></article>";

        //* COMMENTS
      
        echo "<section id='comments'><h1>". $number['number'] ." Comments</h1>";

      foreach ($comments as $comment) {
        echo "<article class='comment'><span class='user'>" . $comment['username'] . "</span><span class='date'>1m</span>";
        echo "<p>" . $comment['text'] . "</p></article>";
      }
      ?>
      <form>
        <h2>Add your voice...</h2>
        <label>Username 
          <input type="text" name="username">
        </label>
        <label>E-mail
          <input type="email" name="email">
        </label>
        <label>Comment
          <textarea name="comment"></textarea>            
        </label>
        <button formaction="#" formmethod="post">Reply</button>
      </form>
      </section>
      <?php 
        //* FOOTER
        echo "<footer><span class='author'>" . $article['name'] . "</span>";
        echo "<span class='tags'><a href='index.php'>#" . $tags[0] . "</a> <a href='index.php'>#" . $tags[1] . "</a></span>";
        echo "<span class='date'>" . $date . "</span>";
        echo "<a class='comments' href='article.php#comments'>" . $number['number'] . "</a>";
        echo "</footer></article></section>";
      ?>
    <footer>
      <p>&copy; Fake News, 2022</p>
    </footer>
  </body>
</html>