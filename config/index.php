<?php

use Blog\Database;
use Blog\User;

require_once '../vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$ip = $_POST['ip'];
$user = $_POST['user'];
$password = $_POST['password'];
$database = $_POST['database'];
$nameAdmin = $_POST['nameAdmin'];
$emailAdmin = $_POST['emailAdmin'];
$passAdmin = $_POST['passAdmin'];
$hashHT = base64_encode(sha1($passAdmin, true));
$passAdmin = sha1($passAdmin);
$contenidoFinal = '
       $dbhost = DB_SERVER;
       $dbuser = DB_USERNAME;
       $dbpass = DB_PASSWORD;
       $dbname = DB_DATABASE;
       try {
            $dbConnection = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $dbConnection->exec("set names utf8");
            $dbConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}';

$fp=fopen('../src/Database.php','w');
    fwrite($fp, '<?php namespace Blog; class Database { function connect() { /* DATABASE CONFIGURATION */');
    fclose($fp);
    $fp2=fopen('../src/Database.php', 'a');
    fwrite($fp2, "define('DB_SERVER', '$ip');");
    fwrite($fp2, "define('DB_USERNAME', '$user');");
    fwrite($fp2, "define('DB_PASSWORD', '$password');");
    fwrite($fp2, "define('DB_DATABASE', '$database');");

    fwrite($fp2, $contenidoFinal);
    fclose($fp2);

    $fp3=fopen('.htpasswd','w');
    fwrite($fp3, $emailAdmin . ':' . '{SHA}'.$hashHT);
    fclose($fp3);
    $fp4=fopen('.htaccess', 'w');
    fwrite($fp4, 'AuthUserFile .htpasswd
AuthType Basic
Require valid-user
<Files "config/index.php">
  Require valid-user
</Files>
');
    fclose($fp4);
    $inicializacion = new Database();
    $inicializacion = $inicializacion->connect();
    $inicializacion->query("
create table users (
    idUser   int auto_increment,
    name     varchar(40) not null,
    password varchar(45) null,
    email    varchar(45) null,
    permisos tinyint(1)  not null,
    constraint idusers_UNIQUE
        unique (idUser)
);");
    $inicializacion->query("alter table users
    add primary key (idUser);");
    $inicializacion->query("create table posts
(
    id               int auto_increment,
    titulo           varchar(45)  null,
    imagenPequeña    varchar(150)  null,
    resumen          varchar(150) null,
    contenido        text         null,
    autor            varchar(40)  null,
    destacado        tinyint      null,
    categoria        varchar(45)  null,
    linkPost         varchar(45)  null,
    fecha            varchar(45)  null,
    idUsuarioCreador int          null,
    constraint id_UNIQUE
        unique (id),
    constraint idUsuarioCreador
        foreign key (idUsuarioCreador) references users (idUser)
);");
    $inicializacion->query("alter table posts
    add primary key (id);");
    $inicializacion->query("create table comments
(
    idComment int auto_increment,
    title     varchar(45) null,
    author    varchar(45) not null,
    content   text        not null,
    approved  tinyint(1)  not null,
    idPost    int         not null,
    constraint comments_idComment_uindex
        unique (idComment),
    constraint id
        foreign key (idPost) references posts (id)
);");
    $inicializacion->query("create index id_idx
    on comments (idPost);");
    try {
    $newUser = new User();
    $newUser->newUser($nameAdmin, $emailAdmin, $passAdmin);
    echo "<script>alert('Recuerda borrar la carpeta config una vez terminada la instalación')</script>";
    } catch (Error $e) {
        echo "<script>alert('Has introducido los datos incorrectos de MYSQL')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Blog Installer</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div><br>
                <h1>Instalador de Blog</h1>
                <div class="card-body">
                    <h2 class="title">MYSQL Installation</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="IP del Servidor MySQL" name="ip" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Usuario base de datos" name="user" required>
                        </div>
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Contraseña base de datos" name="password" required>
                            </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Base de datos" name="database" required>
                        </div>
                        <h2 class="title">Admin Info</h2>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nombre" name="nameAdmin" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="emailAdmin" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Contraseña" name="passAdmin" required>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
