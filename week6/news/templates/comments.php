<?php function output_comments($number, $comments) { ?>
    <section id='comments'><h1><?=$number['number']?> Comments</h1>
    <?php foreach ($comments as $comment) { ?>
        <article class='comment'><span class='user'><?=$comment['username']?></span><span class='date'>1m</span>
        <p><?=$comment['text']?></p></article>
    <?php } ?>
<?php } ?>

<?php function output_forms() {?>
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
<?php } ?>