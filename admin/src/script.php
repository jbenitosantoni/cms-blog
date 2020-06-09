<?php
use \Blog\Database;
?>
<script type="text/javascript">
    $delete = new AdminFunctions();
    function generarComments() {
        $dom = new DomComment();
        $delete.domDelete();
        $dom.domCommentsHead();
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
