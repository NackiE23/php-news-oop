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
                <!-- <img class="elements__logo_img" src="#" alt="NEWS"> -->
            </a>
        </div>
        <div class="elements_menu">
            <ul class="elements_menu__list">
                <li class="elements_menu__list_item">
                    <a class="elements_menu__list_item_link" href="/">Home</a>
                </li>
                <?php 
                    if ($_SESSION['user']) {
                        ?>
                        <li class="elements_menu__list_item">
                            <a class="elements_menu__list_item_link" href="/news/create">Create News</a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
        <div class="elements__button">
        <?php 
            if (!$_SESSION['user']) {
                ?>
                <a class="elements__button_link" href="/login">Login</a>
                |
                <a class="elements__button_link" href="/register">Register</a>
                <?php
            } else {
                ?>
                <?= $_SESSION['user']['username'] ?> |
                <a class="elements__button_link" href="/logout">Logout</a>
                <?php
            }
        ?>
        </div>
    </div>
</header>


<div id="pop-up-messages">
    <?php if ($_SESSION['message']) { ?>
    <div class="pop-up-message <?= $_SESSION['message']['category'] ?>">
        <div class="close"></div>
        <p class="pop-up-message__text"><?= $_SESSION['message']['text'] ?></p>
    </div>
    <?php } unset($_SESSION['message']);?>
</div>

<div class="container">
<?php include 'views/templates/' . $content_template ?>
</div>

<script src="/assets/js/main.js"></script>
</body>
</html>