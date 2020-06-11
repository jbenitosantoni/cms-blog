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
    function newPost($titulo, $imagenPequeña, $resumen, $contenido, $autor, $destacado, $categoria, $linkPost, $fecha) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("INSERT INTO posts(titulo, imagenPequeña, resumen, contenido, autor, destacado, categoria, linkPost, fecha, idUsuarioCreador) VALUES ('$titulo', '$imagenPequeña', '$resumen', '$contenido', '$autor', '$destacado', '$categoria', '$linkPost', '$fecha', '1')");
    }
    function deletePost($id) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("DELETE from posts WHERE id='$id'");
    }
}