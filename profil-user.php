<?php
require_once('./connexion.php');
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

  
   
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        

        
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
            //   echo "<a href='update-avatar.php?id=" . $user['id'] . "'>Change avatar</a>";
            
        } else {
            echo "User not found.";
        }
    } else {
        echo "Invalid user ID.";
    }

    ?>
</body>
</html>