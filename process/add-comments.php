<?php
session_start();
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // log in user
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

    // info from form
    $commentText = $_POST['comment_text'];
    $photoId = $_POST['photos_id'];

    // ID user
    $userId = $_SESSION['user']['users_id'];

    // add coment
    $sql = "INSERT INTO comments (comment_text, photos_id) VALUES (:comment_text, :photos_id)";
    $request = $db->prepare($sql);
    $request->execute(['comment_text' => $commentText, 'photos_id' => $photoId]);

    
    header('Location: photo-details.php?photo_id=' . $photoId);
    exit();
}
?>

<!-- Форма для добавления комментария -->
<h2>Add Comment</h2>
<form action="add-comment.php" method="post">
    <input type="hidden" name="photos_id" value="<?php echo $_GET['photos_id']; ?>">

    <label for="comment_text">Comment:</label>
    <input type="text" id="comment_text" name="comment_text" required><br>

    <input type="submit" value="Add Comment">
</form>