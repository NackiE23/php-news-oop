<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link type="text/css" href="assets/css/styles.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.ico"/>
</head>
<body>

<header>
    <div class="elements">
        <div class="elements_menu">
            <ul class="elements_menu__list">
                <li class="elements_menu__list_item">
                    <a class="elements_menu__list_item_link" href="/">Home</a>
                </li>
                <?php 
                if (!$_SESSION['user']) {
                    ?>
                    <li class="elements_menu__list_item">
                        <a class="elements_menu__list_item_link" href="/login">Login</a>
                    </li>
                    <li class="elements_menu__list_item">
                        <a class="elements_menu__list_item_link" href="/register">Register</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="elements_menu__list_item">
                        <a class="elements_menu__list_item_link" href="/logout">Logout</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</header>

<?php if ($_SESSION['message']) { ?>
<div id="pop-up-messages">
    <div class="pop-up-message <?= $_SESSION['message']['category'] ?>">
        <div class="close"></div>
        <p class="pop-up-message__text"><?= $_SESSION['message']['text'] ?></p>
    </div>
</div>
<?php } unset($_SESSION['message']);?>

<div class="container">
<?php include 'views/templates/' . $content_template ?>
</div>

</body>
</html>