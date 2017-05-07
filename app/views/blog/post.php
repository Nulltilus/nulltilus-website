<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php \app\utils\Utils::getServerUri(); ?>/style/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php \app\utils\Utils::getServerUri(); ?>/style/css/libs/markdown_css.css" rel="stylesheet" type="text/css">
    <link rel="author" href="humans.txt">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">

    <title><?= $post->getTitle() ?> | Nulltilus</title>

    <script src="https://use.fontawesome.com/e890a6e437.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="<?php \app\utils\Utils::getServerUri() ?>/scripts/blog_post.js"></script>
</head>

<body class="post">

<a href="#" id="mobile-menu-open" class="mobile-menu fa fa-bars"></a>

<div class="mobile-menu-background hidden"></div>
<nav class="mobile-menu-tab hidden" id="mobile-menu">

    <a id="mobile-menu-close" class="close-menu fa fa-times" href="#"></a>

    <ul id="mobile-menu-ul">
        <li><a href="/#home" class="mobile-menu-link-home"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="/#about" class="mobile-menu-link-about"><i class="fa fa-user"></i> Nosotros</a></li>
        <li><a href="/#projects" class="mobile-menu-link-projects"><i class="fa fa-folder"></i> Proyectos</a></li>
        <li><a href="/#blog" class="mobile-menu-link-blog"><i class="fa fa-comment"></i> Blog</a></li>
        <li><a href="/#contact" class="mobile-menu-link-contact"><i class="fa fa-envelope"></i> Contacto</a></li>
    </ul>
</nav>

<header class="header">
    <nav class="top-menu" id="top-menu">
        <ul>
            <li><a href="/#home">Inicio</a></li>
            <li><a href="/#about">Nosotros</a></li>
            <li><a href="/#projects">Proyectos</a></li>
            <li><a href="/#blog">Blog</a></li>
            <li><a href="/#contact">Contacto</a></li>
        </ul>
    </nav>

    <div class="post-title">
        <h1><?= $post->getTitle() ?></h1>
    </div>

    <div class="post-info">
        <span class="post-author">
            <?= $post->getAuthor() ?>
        </span>

        <span class="post-date">
            <?= $post->getDate() ?>
        </span>
    </div>
</header>

<div class="post-content wrapper markdown-body">
    <?= $post->getPostBody() ?>
</div>

</body>
</html>