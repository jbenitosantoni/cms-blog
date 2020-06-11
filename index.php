<?php

use Blog\Comment;

require_once 'vendor/autoload.php';

require_once 'resources/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = new Comment();
    $comment->newComment($_POST['forminputCommentTitle'], $_POST['forminputCommentAuthor'], $_POST['forminputCommentContent'], $_POST['forminputID']);
}

?>
</head>
<body>

<div class="container" id="modalContainer">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Mi Proyecto de Blog</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="mx-3">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg>
                </a>
                <a class="btn btn-sm btn-outline-secondary" href="login.php">Log in</a>
            </div>
        </div>
    </header>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Mi Proyecto De Blog</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what's most interesting in this post's contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2" id="destacados">

    </div>
    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row" id="posts">
                </div>
            </div>
    </main>
    <?php require_once 'resources/footer.php' ?>
    <?php require_once 'src/script.php' ?>