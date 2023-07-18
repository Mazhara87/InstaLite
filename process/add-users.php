<?php


require_once('../connexion.php');

// var_dump($_POST);

if(
    isset($_POST['username']) && !empty($_POST['username'])
    &&isset($_POST['password']) && !empty($_POST['password'])
    &&isset($_POST['name']) && !empty($_POST['name'])
// ){
//     $data = [
//         'username' => $_POST['username'],
//         'password' => $_POST['password'],
//         'name' => $_POST['name'],

//     ];
//     $sql = "INSERT INTO users (username, password, name) VALUES (:username, :password, :name)";
//     $request= $db->prepare($sql);
//     $request->execute($data);
// }
// header('Location: ../profil-user.php')


) {
    $username = $_POST['username'];

    // Проверяем, существует ли пользователь с таким именем в базе данных
    $sql = "SELECT * FROM users WHERE username = :username";
    $request = $db->prepare($sql);
    $request->bindParam(':username', $username);
    $request->execute();
    $user = $request->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Если пользователь существует, перенаправляем на его профиль
        header('Location: ../profil-user.php');
        exit();
    } else {
        // Создаем нового пользователя
        $password = $_POST['password'];
        $name = $_POST['name'];

        $sql = "INSERT INTO users (username, password, name) VALUES (:username, :password, :name)";
        $request = $db->prepare($sql);
        $request->bindParam(':username', $username);
        $request->bindParam(':password', $password);
        $request->bindParam(':name', $name);
        $request->execute();

        // Перенаправляем на страницу профиля нового пользователя
        header('Location: ../profil-user.php');
        exit();
    }
}
?>
