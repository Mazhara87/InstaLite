<?php
session_start();
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // Проверка наличия пользователя в базе данных
    $sql = "SELECT * FROM users WHERE username = :username";
    $request = $db->prepare($sql);
    $request->execute(['username' => $username]);
    $user = $request->fetch();

    if ($user) {
        // Пользователь уже существует, выводим сообщение об ошибке
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['name'] = $user['name'];

    header('Location: ../profil-user.php');
    exit();
    } else {
        // Добавляем нового пользователя
        $data = [
            'username' => $username,
            'password' => $password,
            'name' => $name,
        ];

        $sql = "INSERT INTO users (username, password, name) VALUES (:username, :password, :name)";
        $request = $db->prepare($sql);
        $request->execute($data);

        $_SESSION['user']['id'] = $db->lastInsertId();
        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['password'] = $password;
        $_SESSION['user']['name'] = $name;

        header('Location: ../profil-user.php');
        exit();
    }
}
?>