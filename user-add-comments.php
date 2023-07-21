<!-- Форма для добавления комментария -->
<?php include_once('partials/header.php'); ?>

<h2>Add Comment</h2>
<form action="process/add-comment.php" method="post">
    <input type="hidden" name="photos_id" value="<?php echo $_GET['photos_id']; ?>">

    <label for="comment_text">Comment:</label>
    <input type="text" id="comment_text" name="comment_text" required><br>

    <input type="submit" value="Add Comment">
</form>

<?php include_once('partials/menu.php'); ?>
<?php include_once('partials/footer.php'); ?>