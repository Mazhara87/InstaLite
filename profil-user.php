<?php
require_once('connexion.php');
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

    <?php

    try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        
        $db = new PDO( $dns, $user, $password);

        
        $query = "SELECT * FROM users WHERE id = :id";
        $request = $db->prepare($query);
        $request->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $request->execute();

        if ($request->rowCount() > 0) {
            $user = $request->fetch(PDO::FETCH_ASSOC);
            echo "<p><strong>Username :</strong> " . $user['username'] . "</p>";
            echo "<p><strong>Password :</strong> " . $user['password'] . "</p>";
            echo "<p><strong>Name :</strong> " . $user['name'] . "</p>";

            //   // Add the link to the update page
            //   echo "<a href='update-patient.php?id=" . $user['id'] . "'>Modifier le patient</a>";
            
        } else {
            echo "User not found.";
        }
    } else {
        echo "Invalid user ID.";
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
</html>