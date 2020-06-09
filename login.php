<?php
session_start();
if ( isset( $_SESSION['login_email'] ) ) {
    header("Location: admin/index.php");
}

use Blog\ConnectDatabase;
use Blog\User;

require_once 'vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['correoElectronico'];
    $password = $_POST['password'];
    $userClass = new User();
    $usuario = $userClass->checkUser($email, $password);
    if (count($usuario) == 1) {
    // Store Session Data
        $_SESSION['login_email']=$email;
        $_SESSION['expire'] = time() + (30 * 60);
        header('Location: admin/index.php');
    } else {
        echo '<script>alert("Contraseña o Usuario Incorrecto")</script>';
    }
}
require_once 'resources/header.php';
?>
<link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" action="" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72"
         height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="correoElectronico" placeholder="Email address"
           required
           autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>
