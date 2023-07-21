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
        $target_dir = "uploads/pictures/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["avatar"]["size"] > 500000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
                $avatar=$target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        // Добавляем нового пользователя
        $data = [
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'avatar' => $avatar,
        ];

        $sql = "INSERT INTO users (username, password, name, avatar_url) VALUES (:username, :password, :name, :avatar)";
        $request = $db->prepare($sql);



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

    <input type="submit" name="submit" value="Register">
</form>

<?php
include_once('partials/footer.php');
?>