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
    <title>My Insta</title>
</head>
<body>
    <h1>My Insta</h1>
    <p><strong>Name:</strong> <?php echo $_SESSION['user']['name']; ?></p>
    


</body>
</html>