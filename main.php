<?php
session_start();
require_once('connexion.php');
?>
<?php
include_once('partials/header.php');
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
    <?php if (isset($_SESSION['user']['avatar_url'])){    ?>
        <img src=<?php echo $_SESSION['user']['avatar_url'];?> alt="avatar">
      <?php } ?>

    <h2>New Photos</h2>
    <?php
    $sql = "SELECT * FROM photos ORDER BY photos_id DESC";
    $request = $db->query($sql);

    while ($photo = $request->fetch()) {
        $imageURL = $photo['image_url'];

        echo "<img src='$imageURL' alt='Photo'><br>";
    }
    ?>

    <a href="profil-user.php">Back to Profile</a>

<?php
include_once('partials/menu.php');
?>

<?php
include_once('partials/footer.php');
?>