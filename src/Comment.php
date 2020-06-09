<?php


namespace Blog;


class Comment
{
    function getComments() {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("SELECT * FROM comments")->fetchAll();
    }
    function newComment($title, $author, $content, $idPost) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        $query = "INSERT INTO comments (title, author, content, idPost, approved) VALUES (?, ?, ?, ?, 0)";
        $stmt = $inicializacion->prepare($query);
        return $stmt->execute([$title, $author, $content, $idPost]);
    }
}