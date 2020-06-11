<?php


namespace Blog;


class Comment
{
    function getComments() {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("SELECT * FROM comments WHERE approved = 1")->fetchAll();
    }
    function getAllComments() {
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
    function approveComment($id) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("UPDATE comments SET approved = 1 WHERE idComment = '$id'");
    }
}