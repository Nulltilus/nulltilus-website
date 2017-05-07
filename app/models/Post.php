<?php

namespace app\models;

class Post
{
    private $author;
    private $date;
    private $title;
    private $excerpt;
    private $postBody;
    private $file;
    private $fileName;
    private $friendlyUrl;

    /**
     * Post constructor.
     * @param $author
     * @param $date
     * @param $title
     * @param $excerpt
     * @param $postBody
     * @param $file
     * @param $fileName
     * @param $friendlyUrl
     */
    public function __construct($author, $date, $title, $excerpt, $postBody, $file, $fileName, $friendlyUrl)
    {
        $this->author = $author;
        $this->date = $date;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->postBody = $postBody;
        $this->file = $file;
        $this->fileName = $fileName;
        $this->friendlyUrl = $friendlyUrl;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * @param mixed $excerpt
     */
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;
    }

    /**
     * @return mixed
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * @param mixed $postBody
     */
    public function setPostBody($postBody)
    {
        $this->postBody = $postBody;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->friendlyUrl;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->friendlyUrl = $url;
    }
}