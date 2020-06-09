<?php

namespace Blog;

class Post
{
    function getPosts()
    {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("SELECT * FROM posts")->fetchAll();
    }
}