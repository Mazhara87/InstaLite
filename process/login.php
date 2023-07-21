<?php
session_start();
require_once('../connexion.php');
include_once('../partials/header.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка наличия пользователя в базе данных
    $sql = "SELECT * FROM users WHERE username = :username";
    $request = $db->prepare($sql);
    $request->execute(['username' => $username]);
    $user = $request->fetch();

    if ($user && $user['password'] === $password) {
        // Пользователь найден и пароль совпадает, сохраняем данные в сессии
        $_SESSION['user']['id'] = $user['users_id'];
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['name'] = $user['name'];
        $_SESSION['user']['avatar_url'] = $user['avatar_url'];
        header('Location: ../profil-user.php');
        exit();
    } else {
        // Пользователь не найден или пароль неверен, выводим сообщение об ошибке
        echo "Invalid username or password.";
        header('Location: ../index.php');
        include_once('../partials/footer.php');
        exit();
    }
}



?>

<h2>Login</h2>
<form action="login.php" method="post">
    <label for="username">User name:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="name">Name:</label>
    <input type="name" id="name" name="name" required><br>

    <input type="submit" value="Login">
</form>

<?php
include_once('../partials/footer.php');
?>
