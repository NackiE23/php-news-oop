<h1><?= $news['title'] ?></h1>

<p><?= $news['created'] ?></p>
<p><?= $news['username'] ?></p>
<p><?= $news['main_text'] ?></p>
<br><hr><br>
<h1>Comments</h1>
<ul>
<?php
    if ($comments) {
        while ($comment = $comments->fetchArray(SQLITE3_ASSOC)) {
            ?>
            <li class='list-group-item bg-secondary mb-1'>
                <?= $comment['username'] ?>: <?= $comment['main_text'] ?>
            </li>
            <?php
            }
        } else {
            echo "No comments yet";
    }
?>
</ul>
<br><hr><br>
<p>
    <form method='POST' action='/comment/create'>
        <input type='hidden' name='user_id' value=<?= $_SESSION['user']['id']?>>
        <input type='hidden' name='news_id' value=<?= $news['id']?>>
        <div class='form-floating'>
            <textarea class='form-control bg-secondary mb-2 text-light' name='main_text' placeholder='Leave a comment here' id='floatingTextarea2'></textarea>
        </div>

        <input type='submit' class='btn btn-secondary' value='Add comment'>
    </form>
</p>


