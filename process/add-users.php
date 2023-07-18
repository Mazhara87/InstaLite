<?php

session_start();
require_once('../connexion.php');

// var_dump($_POST);

if (
    !empty($_POST['username'])
    && !empty($_POST['password'])
    && !empty($_POST['name'])
) {
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'name' => $_POST['name'],

    ];
    $sql = "INSERT INTO users (username, password, name) VALUES (:username, :password, :name)";
    $request = $db->prepare($sql);
    $request->execute($data);

    $_SESSION['user']['id'] = $db->lastInsertId();
    $_SESSION['user']['username'] = $_POST['username'];
    $_SESSION['user']['password'] =  $_POST['password'];
    $_SESSION['user']['name'] =  $_POST['name'];
}
header('Location: ../profil-user.php');
