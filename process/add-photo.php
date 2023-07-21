<?php
session_start();
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // check user log in
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

    // Получаем данные из формы
    $imageURL = $_POST['image_url'];

    // ID user
    $userId = $_SESSION['user']['users_id'];

    // add pfoto in db
    $sql = "INSERT INTO photos (image_url, users_id) VALUES (:image_url, :users_id)";
    $request = $db->prepare($sql);
    $request->execute(['image_url' => $imageURL, 'users_id' => $userId]);

    
    header('Location: profil-user.php');
    exit();
}
?>


<h2>Add Photo</h2>
<form action="add-photo.php" method="post">
    <label for="image_url">Image URL:</label>
    <input type="text" id="image_url" name="image_url" required><br>

    <input type="submit" value="Add Photo">
</form>