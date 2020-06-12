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
    function allUsers() {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("SELECT idUser, name, email, permisos FROM users")->fetchAll();
    }
    function comprobarEmail($email) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $comprobarEmail = $inicializacion->query("SELECT idUser FROM users WHERE email = '$email'")->fetchAll();
    }
    function  newUser($name, $email, $password) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        if (count($this->comprobarEmail($email)) > 0) {
            return trigger_error("El email ya existe en la base de datos, prueba con uno distinto", E_USER_ERROR);
        } else {
        return $inicializacion->query("INSERT INTO users (name, password, email, permisos) VALUES ('$name', '$password', '$email', 1)");
        }
    }
    function editUser($id, $name, $email, $permisos, $password) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        if (count($this->comprobarEmail($email)) > 1) {
            return "<script>alert('El Email ya existe!')</script>";
        } else {
            return $inicializacion->query("UPDATE users SET name='$name', password='$password', email='$email', permisos='$permisos' WHERE idUser='$id'");
        }
    }
    function deleteUser($id) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("DELETE FROM users WHERE idUser='$id'");
    }
    function comprobarPermisos($email) {
        $inicializacion = new Database();
        $inicializacion = $inicializacion->connect();
        return $inicializacion->query("SELECT permisos FROM users WHERE email = '$email'")->fetchAll();
    }
}