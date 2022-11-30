<p>
<?php if ($news_owner || $_SESSION['user']['is_admin']): ?>
    <!-- Delete news form -->
    <form action="/news/delete" method="POST">
        <input type="hidden" value="<?= $news['id'] ?>" name="news_id">
        <input type="submit" value="Delete This News">
    </form>
<?php endif; ?>
</p>

<h1 class="news__title">
    <?= htmlspecialchars($news['title']) ?>
<?php if ($news_owner || $_SESSION['user']['is_admin']): ?>
    <button class="openForm m-0 ms-1" data-form-class="change_title_form">Change title</button>
<?php endif; ?>
</h1>

<!-- Change title form -->
<form class="form change_title_form" action="/news/change" method="POST" style="display: none;">
    <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
    <input type="text" name="title" placeholder="Title" value="<?= $news['title'] ?>" required>
    <input type="submit" value="Change title">
</form>


<p class="news__created">
    Posted by <?= htmlspecialchars($news['username']) ?> at <?= $news['created'] ?>
</p>
<p class="news__main_text">
    <?= htmlspecialchars($news['main_text']) ?>
<?php if ($news_owner || $_SESSION['user']['is_admin']): ?>
    <br>
    <button class="openForm m-0 ms-1" data-form-class="change_main_text_form">
        Change text
    </button>
<?php endif; ?>
</p>

<!-- Change main text form -->
<form class="form change_main_text_form" action="/news/change" method="POST" style="display: none;">
    <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
    <textarea name="main_text" placeholder="Main Text" required><?= $news['main_text'] ?></textarea>
    <input type="submit" value="Change main text">
</form>

<!-- Comments -->
<br><hr><br>
<h1>Comments</h1>
<ul>
<?php if ($comments): ?>
<?php while ($comment = $comments->fetchArray(SQLITE3_ASSOC)): ?>
    <li class='news__comment'>
        <span class="news__comment_text">
            <?= htmlspecialchars($comment['username']) ?>: <?= htmlspecialchars($comment['main_text']) ?>
        </span>
<?php if ($_SESSION['user']['id'] == $comment['user_id'] || $_SESSION['user']['is_admin']): ?>
        <a href="#" class="openForm" data-form-class="change_comment<?= $comment['id'] ?>_form">Change</a>
        |
        <form action="/comment/delete" method="POST">
            <input type="hidden" value="<?= $comment['id'] ?>" name="comment_id">
            <input type="hidden" value="<?= $news['id'] ?>" name="news_id">
            <a href="#" onclick="this.closest('form').submit();return false;">Delete</a>
        </form>
    </li>
    <form class="form change_comment<?= $comment['id'] ?>_form" action="/comment/change" method="POST" style="display: none;">
        <input type="hidden" value="<?= $comment['id'] ?>" name="comment_id">
        <input type="hidden" value="<?= $news['id'] ?>" name="news_id">
        <input type="text" name="main_text" value="<?= $comment['main_text'] ?>" required>
        <input type="submit" value="Change comment">
    </form>
<?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
    No comments yet 
<?php endif; ?>
</ul>
<br><hr><br>

<!-- Add comment form -->
<?php if ($_SESSION['user']): ?>
<p>
    <form method='POST' action='/comment/create'>
        <input type='hidden' name='user_id' value=<?= $_SESSION['user']['id']?>>
        <input type='hidden' name='news_id' value=<?= $news['id']?>>
        <div class='form-floating'>
            <textarea name='main_text' placeholder='Leave a comment here' required></textarea>
        </div>

        <input type='submit' class='btn btn-secondary' value='Add comment'>
    </form>
</p>
<?php endif; ?>
