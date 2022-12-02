<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link type="text/css" href="/assets/css/styles.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="/assets/images/favicon.ico"/>
    <script src="/assets/js/jquery.min.js"></script>
</head>
<body>

<header>
    <div class="elements container">
        <div class="elements__logo">
            <a href="/">
                NEWS PROJECT
            </a>
        </div>
        <div class="elements_menu">
            <ul class="elements_menu__list">
                <li class="elements_menu__list_item">
                    <a class="elements_menu__list_item_link" href="/">Home</a>
                </li>
<?php if ($_SESSION['user']): ?>
                <li class="elements_menu__list_item">
                    <a class="elements_menu__list_item_link" href="/news/create">Create News</a>
                </li>
<?php endif; ?>
            </ul>
        </div>
        <div class="elements__button">
<?php if (!$_SESSION['user']): ?>
            <a class="elements__button_link" href="/login">Login</a>
            |
            <a class="elements__button_link" href="/register">Register</a>
<?php else: ?>
            <?= htmlspecialchars($_SESSION['user']['username']) ?> |
            <a class="elements__button_link" href="/logout">Logout</a>
<?php endif; ?>
        </div>
    </div>
</header>

<div id="pop-up-messages">
<?php if ($_SESSION['messages']): ?>
<?php foreach($_SESSION['messages'] as $message): ?>
    <div class="pop-up-message <?= $message['category'] ?>">
        <div class="close"></div>
        <p class="pop-up-message__text"><?= $message['text'] ?></p>
    </div>
<?php endforeach; ?>
<?php endif; ?>
<?php unset($_SESSION['messages']); ?>
</div>


<div class="container">
<?php include 'views/templates/' . $content_template ?>
</div>


<script src="/assets/js/main.js"></script>
</body>
</html>