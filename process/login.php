<?php
session_start();
require_once('../connexion.php');

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
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['name'] = $user['name'];

        header('Location: ../profil-user.php');
        exit();
    } else {
        // Пользователь не найден или пароль неверен, выводим сообщение об ошибке
        echo "Invalid username or password.";
    }
}

include_once('partials/header.php');
?>

<form action="login.php" method="post">
    <label for="username">User name:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Login">
</form>

<?php
include_once('partials/footer.php');
?>
