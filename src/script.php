<?php

namespace Blog;

$post = new Post();
$arrayPosts = $post->getPosts();
$comments = new Comment();
$comments = $comments->getComments();
$users = new User();
$users = $users->userPost();
for ($i = 0; $i < count($arrayPosts); $i++) {
    array_push($arrayPosts[$i], []);
    for ($j = 0 ; $j < count($comments); $j++) {
        if($arrayPosts[$i][0] == $comments[$j][5] && $comments[$j][4] == 1) {
            array_push($arrayPosts[$i][11], $comments[$j]);
        }
    }
}
?>
<script type="text/javascript">
    let posts = <?php echo json_encode($arrayPosts) ?>;
    let users = <?php echo json_encode($users) ?>;
    let autor;
    for (let i = 0; i < users.length ; i++) {
        for (let j = 0; j < posts.length; j++) {
            if (users[i].idUser == posts[j].idUsuarioCreador) {
                autor = users[i].name;
            }
        }
    }
    for (let i = 0; i < posts.length; i++) {
        new createDOM(posts[i].id, posts[i].titulo, posts[i].imagenPequeña, posts[i].resumen, posts[i].contenido, autor, posts[i].destacado, posts[i].categoria, posts[i].linkPost, posts[i].fecha, posts[i][11]);
    }
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

