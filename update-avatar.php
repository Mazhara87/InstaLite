<?php
session_start();
require_once('connexion.php');

// Function to get the user's avatar URL from the database
function getUserAvatar($username, $db) {
    $sql = "SELECT avatar_url FROM users WHERE username = :username";
    $request = $db->prepare($sql);
    $request->execute(['username' => $username]);
    $user = $request->fetch();
    
    if ($user && $user['avatar_url']) {
        return $user['avatar_url'];
    } else {
        // Return the URL of the default avatar image if the user doesn't have one
        return 'path_to_default_avatar.png'; // Replace 'path_to_default_avatar.png' with the path to your default avatar image.
    }
}
?>

<?php
include_once('partials/header.php');
?>