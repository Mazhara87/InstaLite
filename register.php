<?php
require_once('connexion.php');

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
        echo "Username already exists.";
    } else {
        // Добавляем нового пользователя
        $data = [
            'username' => $username,
            'password' => $password,
            'name' => $name,
        ];

        $sql = "INSERT INTO users (username, password, name, avatar_url) VALUES (:username, :password, :name, :avatar_url)";
        $request = $db->prepare($sql);

        // Генерируем уникальное имя файла аватара
        $avatarName = uniqid() . '_' . $_FILES['avatar']['name'];

        // Путь для сохранения файла на сервере
        $avatarPath = '../avatars/' . $avatarName;

        // Сохраняем путь к файлу аватара в базе данных
        $data['avatar_url'] = $avatarPath;

        // Загружаем файл аватара на сервер
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath);

        $request->execute($data);

        header('Location: index.php');
        exit();
    }
}
?>

<?php
include_once('partials/header.php');
?>

<h2>Register</h2>
<form action="register.php" method="post" enctype="multipart/form-data">
    <label for="username">User name:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="avatar">Avatar:</label>
    <input type="file" id="avatar" name="avatar"><br>

    <input type="submit" value="Register">
</form>

<?php
include_once('partials/footer.php');
?>