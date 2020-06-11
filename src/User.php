<?php

namespace Blog;

class User
{
    function checkUser($email, $password)
    {
        try {
            $inicializacion = new Database();
            $inicializacion = $inicializacion->connect();
            $pass = sha1($password);
            return $inicializacion->query("SELECT idUser FROM users WHERE email = '$email' and password = '$pass'")->fetchAll();
        } catch (\PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
    function userPost() {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("SELECT idUser, name FROM users")->fetchAll();
    }
    function  newUser($name, $email, $password) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        $comprobarEmail = $inicializacion->query("SELECT idUser FROM users WHERE email = '$email'")->fetchAll();
        if (count($comprobarEmail) > 0) {
            return "<script>alert('El usuario ya existe')</script>";
        } else {
        return $inicializacion->query("INSERT INTO users (name, password, email, permisos) VALUES ('$name', '$password', '$email', 1)");
        }
        }
}