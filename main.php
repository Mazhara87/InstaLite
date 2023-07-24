<?php
session_start();
require_once('connexion.php');
?>

<?php
include_once('partials/header.php');
?>


<div id="profile">
    <div>
        <h2 class="Main Page">For you</h2>
        <?php if (isset($_SESSION['user']['avatar_url'])) {    ?>
            <div class="avatar">
                <img src=<?php echo $_SESSION['user']['avatar_url']; ?> alt="avatar">
            </div>
        <?php } ?>
        <p class="name"><?php echo $_SESSION['user']['name']; ?></p>

    </div>
</div>

<div class="posts">

    <div class="grid-container">
        <div>
            <h2>New Photos</h2>
        </div>

        <?php
        $sql = "SELECT * FROM photos ORDER BY photos_id DESC";
        $request = $db->query($sql);

        while ($photo = $request->fetch()) {
            $imageURL = $photo['image_url']; ?>
            <div class="grid-container_item">
                <?php

                echo "<img src='$imageURL' alt='Photo'><br>"; ?>
            </div>
        <?php }
        ?>
    </div>
</div>

<?php
include_once('partials/menu.php');
?>

<?php
include_once('partials/footer.php');
?>