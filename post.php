<?php

use Blog\Comment;
use Blog\Post;

require_once 'vendor/autoload.php';

$idPost = $_GET['id'];

$post = new Post();
$post = $post->getPost($idPost);
$post = $post[0];
$comments = new Comment();
$comments = $comments->getCommentsID($idPost);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = new Comment();
    $comment->newComment($_POST['titulo'], $_POST['autor'], $_POST['contenido'], $idPost);
    echo "<script>alert('Tu comentario ha sido enviado y está pendiente de aprobacion')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mi CMS Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Mi Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4"><?php echo $post[1] ?></h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#"><?php echo $post[5] ?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on <?php echo $post[9] ?></p>
            

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $post[4] ?></p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Deja un Comentario:</h5>
                <div class="card-body">
                    <form method="post" >
                        <div class="form-group">
                            <input name="titulo" type="text" class="form-control" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <textarea name="contenido" class="form-control" rows="3" placeholder="Comentario"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="autor" type="text" class="form-control" placeholder="Autor">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            <?php
            for ($i = 0; $i < count($comments); $i++) {
                echo '
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="Profile Image">
          <div class="media-body">
            <h5 class="mt-0">' . $comments[$i][2] . '</h5>
            ' . $comments[$i][3] . '
          </div>
        </div>
 ';
            }
            ?>
            </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>