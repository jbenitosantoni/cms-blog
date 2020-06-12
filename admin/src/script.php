<?php
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

use Blog\Comment;
use Blog\Post;
use Blog\User;

$posts = new Post();
$posts = $posts->getPosts();
$comments = new Comment();
$comments = $comments->getAllComments();
$users = new User();
$todosUsers = new User();
$todosUsers = $todosUsers->allUsers();
for ($i = 0; $i < count($comments); $i++){
    for ($j = 0; $j < count($posts); $j++) {
        if ($posts[$j][0] == $comments[$i][5]) {
            array_push($comments[$i], $posts[$j][1]);
        }
    }
}
$comments = json_encode($comments);
$posts = json_encode($posts);
$todosUsers = json_encode($todosUsers);
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
        let postsDB = <? echo $posts ?>;
        let dom = new DomPost();
        $delete.domDelete();
        dom.domPostsHead();
        dom.domNewPost();
        for (let i = 0; i < postsDB.length; i++) {
            dom.domPosts(postsDB[i].id, postsDB[i].titulo, postsDB[i].imagenPequeña, postsDB[i].resumen, postsDB[i].contenido, postsDB[i].autor, postsDB[i].destacado, postsDB[i].categoria, postsDB[i].linkPost, postsDB[i].fecha, postsDB[i].idUsuarioCreador);
        }
    }
    function generarUsers() {
        let users = <?php
            echo $todosUsers;?>;
        let dom = new DomUsers();
        $delete.domDelete();
        dom.domUsersHead();
        for (let i = 0; i < users.length; i++) {
            dom.domUsersDraw(users[i][0], users[i].name, users[i].email, users[i].permisos);
        }
    }
    function newPostModal() {
        let dom = new Post();
    }
</script>
