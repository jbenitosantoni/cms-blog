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
    function editPost($id, $titulo, $imagenPequeña, $resumen, $contenido, $autor, $destacado, $categoria, $linkPost, $fecha) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("UPDATE posts SET titulo='$titulo', imagenPequeña='$imagenPequeña', resumen='$resumen', contenido='$contenido', autor='$autor', destacado='$destacado', categoria='$categoria', linkPost='$linkPost', fecha='$fecha' WHERE id = '$id'");
    }
}