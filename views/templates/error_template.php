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
                <li class="elements_menu__list_item">
                    <a class="elements_menu__list_item_link" href="/login">Login</a>
                </li>
                <li class="elements_menu__list_item">
                    <a class="elements_menu__list_item_link" href="/logout">Logout</a>
                </li>
                <li class="elements_menu__list_item">
                    <a class="elements_menu__list_item_link" href="/register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="container">
<?= $content ?>
</div>

</body>
</html>