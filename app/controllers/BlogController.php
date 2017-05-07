<?php

namespace app\controllers;


use app\config\Constants;
use app\models\Post;

class BlogController
{
    /**
     * Devuelve posts que hay en una carpeta
     * @param string $mainDirectory Directorio principal donde buscar archivos
     * @param string $searchedPost El post a buscar
     * @param int $numberOfPosts La cantidad de posts que devuelve
     * @param bool $newToOld Devolver de nuevo a viejo (true) o viceversa (false)
     * @param Post[] $posts Array que contiene los posts leídos
     * @return Post|Post[] Devuelve un post si se le pasa $searchedPost o un array con todos los posts si no se le pasa $searchedPost
     */
    public static function getPosts($mainDirectory, $searchedPost = "", $numberOfPosts = -1, $newToOld = true, $posts = array())
    {
        $folders = self::removeParentFolder(scandir($mainDirectory)); //eliminar las carpetas . y ..

        foreach ($folders as $folder) {
            $actualFolder = $mainDirectory . '/' . $folder;

            //si lo que lee es una carpeta que se llame a sí misma
            if (is_dir($actualFolder))
                $posts = self::getPosts($actualFolder, $searchedPost, $numberOfPosts, $newToOld, $posts);

            if (is_file($actualFolder)) {

                $post = file($actualFolder);
                $postBody = $post;

                $postBody = implode("", array_splice($postBody, 3));

                //crear el excerpt
                if (strlen($postBody) > Constants::BLOG_EXCERPT_LENGTH)
                    $exceprt = substr($postBody, 0, Constants::BLOG_EXCERPT_LENGTH) . Constants::BLOG_EXCERPT_ENDING;
                else
                    $exceprt = substr($postBody, 0, Constants::BLOG_EXCERPT_LENGTH);

                if ($searchedPost === $folder)
                    return new Post(
                        $post[1],
                        $post[2],
                        $post[0],
                        $exceprt,
                        $postBody,
                        $actualFolder,
                        $folder,
                        preg_replace('/\.[^.\s]+$/', '', $folder)
                    );

                array_push($posts, new Post(
                    $post[1],
                    $post[2],
                    $post[0],
                    $exceprt,
                    $postBody,
                    $actualFolder,
                    $folder,
                    preg_replace('/\.[^.\s]+$/', '', $folder)
                ));
            }
        }

        //ordenar por fecha de publicación de más nuevo a más viejo
        usort($posts, function ($a, $b) {
            $aDate = strtotime($a->getDate());
            $bDate = strtotime($b->getDate());
            if ($aDate == $bDate) return 0;
            return ($aDate < $bDate) ? -1 : 1;
        });

        //si se quieren devolver solo un número determinado de posts
        if ($numberOfPosts > 0)
            array_splice($posts, $numberOfPosts);

        //si se quiere del más viejo al más nuevo
        if (!$newToOld)
            array_reverse($posts);

        return $posts;
    }

    public static function getRawPost($mainDirectory, $searchedPost, $post = "")
    {
        $folders = self::removeParentFolder(scandir($mainDirectory)); //eliminar las carpetas . y ..

        foreach ($folders as $folder) {
            $actualFolder = $mainDirectory . '/' . $folder;

            //si lo que lee es una carpeta que se llame a sí misma
            if (is_dir($actualFolder))
                $post = self::getRawPost($actualFolder, $searchedPost);

            if (is_file($actualFolder)) {
                if ($searchedPost === $folder)
                    return file_get_contents($actualFolder);
            }
        }

        return $post;
    }

    private static function removeParentFolder($array)
    {
        return array_splice($array, 2);
    }
}