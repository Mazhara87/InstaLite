<?php
session_start();
require_once('connexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    <h1>Main Page</h1>
    <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>

    <h2>New Photos</h2>
    <?php
    // Получение новых фотографий из базы данных
    $sql = "SELECT * FROM photos ORDER BY photos_id DESC";
    $request = $db->query($sql);

    while ($photo = $request->fetch()) {
        $imageURL = $photo['image_url'];

        echo "<img src='$imageURL' alt='Photo'><br>";
    }
    ?>

    <a href="profil-user.php">Back to Profile</a>
</body>
</html>