<?php

use Blog\Comment;
use Blog\Post;

require_once '../vendor/autoload.php';
session_start();
if ( isset( $_SESSION['login_email'] ) ) {
    $now = time(); // Checking the time now when home page starts.
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Your session has expired! <a href='../login.php'>Login here</a>";
    }
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <meta name="theme-color" content="#563d7c">
    <script src="js/Admin.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        h5 {
            font-size: 1.15em;
        }
        #botonNuevoPost {
            margin-right: 5%;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Blog admin</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="src/logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="generarPosts()">
                            <span data-feather="layers"></span>
                            Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="generarComments()">
                            <span data-feather="file-text"></span>
                            Comments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="generarUsers()">
                            <span data-feather="users"></span>
                            Users
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <h1 class="h2" id="titleSection"><br>Dashboard</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-sm"">
                        <thead>
                        <tr id="head">
                        </tr>
                        </thead>
                        <tbody id="tBody">
                        </tbody>
                    </table>
            </div>
            </div>
        </main>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/https://getbootstrap.com/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
<script src="js/dashboard.js"></script>
<?php
require_once 'src/script.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idComment'])) {
        $comment = new Comment();
        $comment->approveComment($_POST['idComment']);
        echo "<script>
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
    generarComments();
    window.history.pushState(\"\", document.title, window.location.pathname);
}

</script>";
    }
    if (isset($_POST['comprobarNewPost'])){
        if ($_POST['inputeliminar'] == 0) {
    $posts = new Post();
    $posts = $posts->editPost($_POST['idpost'], $_POST['inputtitulo'], $_POST['inputimagen'], $_POST['inputresumen'], $_POST['inputcontenido'], $_POST['inputautor'], $_POST['inputdestacado'] , $_POST['inputcategoria'], $_POST['inputlinkpost'] , $_POST['inputfecha']);
        } else if ($_POST['inputeliminar'] == 1){
            $posts = new Post();
            $posts = $posts->deletePost($_POST['idpost']);
        }
    echo "<script>
// Reload despues de query
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
    generarPosts();
    // Remove hash for next change
    window.history.pushState(\"\", document.title, window.location.pathname);
}
</script>";
    }
    if (isset($_POST['crearPost'])){
        $posts = new Post();
        $posts = $posts->newPost($_POST['inputtitulo'], $_POST['inputimagen'], $_POST['inputresumen'], $_POST['inputcontenido'], $_POST['inputautor'], $_POST['inputdestacado'] , $_POST['inputcategoria'], $_POST['inputlinkpost'] , $_POST['inputfecha']);
        echo "<script>
// Reload despues de query
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
    generarPosts();
    // Remove hash for next change
    window.history.pushState(\"\", document.title, window.location.pathname);
}
</script>";
    }
}
?>

</body>
</html>
