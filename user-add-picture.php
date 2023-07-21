<?php include_once('partials/header.php'); ?>

<h2>Add Photo</h2>
<form action="process/add-photo.php" method="post" enctype="multipart/form-data">
    <label for="image">Choose a photo:</label>
    <input type="file" id="image" name="image" required><br>
    <input type="submit" value="Upload" name="upload_image">


</form>

<?php include_once('partials/menu.php'); ?>
<?php include_once('partials/footer.php'); ?>