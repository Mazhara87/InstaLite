<?php
session_start();
require_once('../connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // add user?
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
        exit();
    }

    // ID user
    $userId = $_SESSION['user']['users_id'];
    $photoId = $_POST['photo_id'];
    $commentText = $_POST['comment_text'];

    // save comment at db
    $sql = "INSERT INTO comments (photos_id, users_id, comment_text) VALUES (:photos_id, :users_id, :comment_text)";
    $request = $db->prepare($sql);
    $request->execute(['photos_id' => $photoId, 'users_id' => $userId, 'comment_text' => $commentText]);

    header('Location: ../profil-user.php');
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

<?php
include_once('partials/menu.php');
?>
