<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nulltilus, desarrolladores de Appmatic">
    <meta name="robots" content="index,follow,noodp">
    <meta name="googlebot" content="index,follow">
    <meta name="google" content="notranslate">
    <meta name="url" content="https://nulltilus.com/">
    <meta name="rating" content="General">
    <meta name="referrer" content="no-referrer">

    <link href="<?php \app\utils\Utils::getServerUri(); ?>/style/css/style.css" rel="stylesheet" type="text/css">
    <link rel="author" href="humans.txt">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">

    <title>Nulltilus</title>

    <script src='https://www.google.com/recaptcha/api.js?onload=recaptchaLoad&render=explicit' async defer></script>
    <script src="https://use.fontawesome.com/e890a6e437.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="<?php \app\utils\Utils::getServerUri() ?>/scripts/home.js"></script>
</head>

<body class="home" id="home">

<div id="home" class="home-header">
    <header class="header">
        <div class="header-logo">
            <img src="<?php \app\utils\Utils::getServerUri() ?>/images/nulltilus_logo.png" alt="Logo Nulltilus">
        </div>
        <div class="header-name">
            <h1><span>Null</span>tilus</h1>
            <p>Desarrolladores de <span><a href="https://appmatic.nulltilus.com">Appmatic</a></span></p>
        </div>
    </header>

    <div class="home-header-bottom">
        <a href="#about"><span class="fa fa-angle-down fa-5x"></span></a>
    </div>
</div>

<a href="#" id="mobile-menu-open" class="mobile-menu fa fa-bars"></a>

<div class="mobile-menu-background hidden"></div>
<nav class="mobile-menu-tab hidden" id="mobile-menu">

    <a id="mobile-menu-close" class="close-menu fa fa-times" href="#"></a>

    <ul id="mobile-menu-ul">
        <li><a href="#home" class="selected mobile-menu-link-home"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#about" class="mobile-menu-link-about"><i class="fa fa-user"></i> Nosotros</a></li>
        <li><a href="#projects" class="mobile-menu-link-projects"><i class="fa fa-folder"></i> Proyectos</a></li>
        <li><a href="#blog" class="mobile-menu-link-blog"><i class="fa fa-comment"></i> Blog</a></li>
        <li><a href="#contact" class="mobile-menu-link-contact"><i class="fa fa-envelope"></i> Contacto</a></li>
    </ul>
</nav>

<div id="content">
    <nav class="top-menu" id="top-menu">
        <ul>
            <li><a href="#home">Inicio</a></li>
            <li><a href="#about">Nosotros</a></li>
            <li><a href="#projects">Proyectos</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="#contact">Contacto</a></li>
        </ul>
    </nav>

    <section id="about" class="section-about">
        <h1>Nosotros</h1>

        <div class="wrapper">
            <p>Nulltilus nace como idea de dos jóvenes entusiastas que juntaron su amistad y su pasión por las nuevas
                tecnologías. Desde la más temprana infancia la programación y el desarrollo web siempre estuvieron
                presentes en sus vidas, aprendiendo de manera autodidacta y alimentando sus inquietudes día a día.</p>

            <div class="employees-container">
                <div class="employee">
                    <div class="employee-image">
                        <img src="<?= \app\utils\Utils::returnServerUri() ?>/images/employees/dani.png">
                    </div>

                    <div class="employee-description">
                        <span class="employee-name">Daniel Morales</span>
                        <p>Desarrollador Android, reflexivo, autoexigente, defensor del Sofware Libre y amante de la
                            cerveza.</p>

                        <div class="employee-links">
                            <a target="_blank" href="https://twitter.com/grenderg" class="twitter"><i
                                        class="fa fa-twitter fa-2x"></i></a>
                            <a target="_blank" href="https://github.com/grenderg" class="github"><i
                                        class="fa fa-github fa-2x"></i></a>
                            <a target="_blank" href="http://dmoral.es" class="website"><i class="fa fa-globe fa-2x"></i></a>
                        </div>
                    </div>
                </div>

                <div class="employee">
                    <div class="employee-image">
                        <img src="<?= \app\utils\Utils::returnServerUri() ?>/images/employees/cris.jpg">
                    </div>

                    <div class="employee-description">
                        <span class="employee-name">Cristian Molina</span>
                        <p>Desarrollador web interesado por la arquitectura, lógico, racional e inconformista.</p>

                        <div class="employee-links">
                            <a target="_blank" href="https://twitter.com/legomolina" class="twitter"><i
                                        class="fa fa-twitter fa-2x"></i></a>
                            <a target="_blank" href="https://github.com/legomolina" class="github"><i
                                        class="fa fa-github fa-2x"></i></a>
                            <a target="_blank" href="http://legomolina.github.io" class="website"><i
                                        class="fa fa-globe fa-2x"></i></a>
                        </div>
                    </div>
                </div>

                <div class="employee">
                    <div class="employee-image">
                        <img src="<?= \app\utils\Utils::returnServerUri() ?>/images/employees/moka.png">
                    </div>

                    <div class="employee-description">
                        <span class="employee-name">Mónica Martínez</span>
                        <p>Trabajadora Social y redactora en Nulltilus, la cara más humana y emocional, siempre
                            dispuesta a colaborar con el proyecto.</p>

                        <div class="employee-links">
                            <a target="_blank" href="https://twitter.com/monimarlo3" class="twitter"><i
                                        class="fa fa-twitter fa-2x"></i></a>
                            <a target="_blank" href="https://github.com/monimarlo" class="github"><i
                                        class="fa fa-github fa-2x"></i></a>
                            <a target="_blank" href="http://monimarlo.ml" class="website"><i
                                        class="fa fa-globe fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <p style="padding-top: 40px;">Comprometidos con un objetivo común, buscamos trabajar de una manera eficiente
                con los servicios que
                ofrecemos.
                Centrando nuestra misión en dar respuesta a las necesidades tecnológicas que la sociedad plantea
                actualmente. Llevando a cabo proyectos innovadores, con la mirada puesta en el futuro para superar
                nuevos
                retos, con mucha ilusión, confianza y motivación.</p>
        </div>
    </section>

    <section id="projects" class="section-projects">
        <h1>Proyectos</h1>

        <ul class="project-selector">
            <li>
                <a href="#all">Todos</a>
            </li>

            <li>
                <a href="#web">Web</a>
            </li>

            <li>
                <a href="#app">App</a>
            </li>
        </ul>

        <div class="wrapper projects-container">

            <!-- PROYECTO APPMATIC -->
            <div class="project project-appmatic project-web project-app">
                <h3>Appmatic</h3>
                <span class="tags">Web | App</span>

                <p class="project-description">
                    Appmatic es una herramienta que te permite crear tus propias aplicaciones móviles rápida y
                    fácilmente.
                </p>

                <div class="project-links">
                    <a href="https://appmatic.nulltilus.com" class="fa fa-external-link-square fa-2x"></a>
                </div>
            </div>
            <!-- /PROYECTO APPMATIC -->

        </div>

    </section>

    <section id="blog" class="section-blog">
        <h1>Blog</h1>

        <div class="wrapper blog-container">
            <div class="no-flex">
                <h4>Últimas entradas</h4>
                <a href="/blog"><sub>Ver todas</sub></a>
            </div>

            <?php

            if (isset($posts)) :

                if ($posts !== null) :
                    $markdown = new Parsedown();
                    foreach ($posts as $post) :

                        ?>

                        <article class="blog-post">
                            <a href="/blog/<?= $post->getUrl() ?>">
                                <h5 class="post-title"><?= $post->getTitle() ?></h5>
                            </a>

                            <span class="post-date"><?= $post->getDate() ?></span>

                            <p class="post-excerpt">
                                <?= strip_tags($markdown->text($post->getExcerpt())) ?>
                            </p>
                            <a class="post-read-more" href="/blog/<?= $post->getUrl() ?>">Leer más</a>
                        </article>

                        <?php

                    endforeach;
                endif;
            endif;

            ?>
        </div>
    </section>

    <section id="contact" class="section-contact">

        <div class="email-sent-container <?= ($mailError !== null) ? 'show' : '' ?>">
            <div class="email-sent-black-background"></div>

            <div class="email-sent-content">
                <div class="email-sent-close-button" id="email-sent-close-button"><i class="material-icons">&#xE5CD;</i>
                </div>

                <div class="email-sent-content-text">
                    <?php if ($mailError == "true") : ?>
                        <h3>Ha ocurrido un <span>error</span></h3>
                        <p class="email-sent-info">
                            Inténtalo de nuevo y si el problema persiste ponte en contacto directamente a través del
                            siguiente email: <a href="mailto://info@nulltilus.com">info@nulltilus.com</a>.
                        </p>
                    <?php else : ?>
                        <h3>El email se ha envíado <span>correctamente</span></h3>
                        <p class="email-sent-info">
                            Pronto recibirás una copia del email envíado en tu cuenta de correo. Comprueba la carpeta de
                            <i>no deseados</i> si no te llega en menos de 10 minutos.
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <h1>Contacto</h1>

        <div class="wrapper contact-container">
            <form action="/contact" method="post" name="contact-form" id="contact-form"
                  onsubmit="return validateForm()">
                <div class="form-control">
                    <label for="contact-name">Nombre</label>
                    <input type="text" name="name" id="contact-name" class="contact-input" placeholder="Nombre">
                </div>

                <div class="form-control">
                    <label for="contact-email">Email</label>
                    <input type="email" name="email" id="contact-email" class="contact-input" placeholder="Email"
                           required>
                </div>

                <div class="form-control">
                    <label for="contact-subject">Asunto</label>
                    <input type="text" name="subject" id="contact-subject" class="contact-input" placeholder="Asunto"
                           required>
                </div>

                <div class="form-control">
                    <label for="contact-message">Mensaje</label>
                    <textarea name="message" id="contact-message" class="contact-input" placeholder="Mensaje" rows="4"
                              required></textarea>
                </div>

                <div class="g-recaptcha" id="recaptcha-contact"></div>

                <div>
                    <input type="submit" name="submit" id="contact-submit" value="Enviar" class="contact-submit">
                </div>
            </form>
        </div>

    </section>

    <footer>
        Nulltilus © <?= date('Y') ?>. <a target="_blank" href="https://twitter.com/nulltilus">Twitter</a>
    </footer>

</div>

</body>
</html>