<h1>All News</h1>

<?php
while ($news = $news_array->fetchArray(SQLITE3_ASSOC)) {
    ?>
    <div class='news'>
        <div class='row'>
            <h2><?= $news['title'] ?></h2>
        </div>
        <div class='row'>
            <p>Posted by <?= $news['username'] ?> at <?= $news['created'] ?></p>
        </div>
        <div class='row'>
            <p><?= substr($news['main_text'], 0, 130) ?>...</p>
        </div>
        <div class='row'>
            <p>
                <a class='btn btn-secondary' href='/news?id=<?= $news['id'] ?>'>
                    News Page
                </a>
            </p>
        </div>
    </div>
    <?php
}
?>
