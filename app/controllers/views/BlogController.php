<?php

namespace app\controllers\views;


use app\controllers;
use Psr\Http\Message\RequestInterface as ReqInterface;
use Psr\Http\Message\ResponseInterface as ResInterface;

class BlogController
{
    /**
     * @var $slimApp
     */
    private $slimApp;

    /**
     * ControlPanelController constructor.
     * @param $app
     */
    public function __construct($app)
    {
        // Create a reference to Slim App to work with its methods.
        $this->slimApp = $app;
    }

    /**
     * @param ReqInterface $request
     * @param ResInterface $response
     * @param $arguments
     * @return mixed
     */
    public function renderBlog(ReqInterface $request, ResInterface $response, $arguments)
    {
        return $this->slimApp->view->render($response, 'blog/bloghome.php', array(
            'posts' => controllers\BlogController::getPosts("./uploads/blog")
        ));
    }

    public function renderPost(ReqInterface $request, ResInterface $response, $arguments)
    {
        if (substr($arguments['post_name'], -strlen('.md')) === '.md') {
            return controllers\BlogController::getRawPost("./uploads/blog", $arguments['post_name']);
        }

        $post = $arguments['post_name'] . ".md";

        $showPost = controllers\BlogController::getPosts("./uploads/blog", $post);

        $markdown = new \Parsedown();
        $showPost->setPostBody($markdown->text($showPost->getPostBody()));

        return $this->slimApp->view->render($response, 'blog/post.php', array(
            'post' => $showPost
        ));
    }
}