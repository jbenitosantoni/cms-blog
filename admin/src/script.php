<?php

use Blog\Comment;
use Blog\Post;

$posts = new Post();
$posts = $posts->getPosts();
$comments = new Comment();
$comments = $comments->getComments();
$posts = new Post();
$posts = $posts->getPosts();
for ($i = 0; $i < count($comments); $i++){
    for ($j = 0; $j < count($posts); $j++) {
        if ($posts[$j][0] == $comments[$i][5]) {
            array_push($comments[$i], $posts[$j][1]);
        }
    }
}
$comments = json_encode($comments);
?>
<script type="text/javascript">
    $delete = new AdminFunctions();
    function generarComments() {
        let commentsDB = <?php echo  $comments ?>;
        let dom = new DomComment();
        $delete.domDelete();
        dom.domCommentsHead();
        for (let i = 0; i < commentsDB.length; i++) {
            dom.domCommentDraw(commentsDB[i].idComment, commentsDB[i].title, commentsDB[i].content, commentsDB[i].author, commentsDB[i][6], commentsDB[i].idPost, commentsDB[i].approved);
        }
    }
    function generarPosts() {
        $dom = new DomPost();
        $delete.domDelete();
        $dom.domPostsHead();
    }
    function generarUsers() {
        $dom = new DomUsers();
        $delete.domDelete();
        $dom.domUsersHead();
    }
</script>
