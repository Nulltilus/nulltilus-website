<?php

$app->get('/', 'HomeController:renderHome');

$app->post('/contact', 'HomeController:sendEmail');

$app->get('/blog', 'BlogController:renderBlog');
$app->get('/blog/{post_name}', 'BlogController:renderPost');
