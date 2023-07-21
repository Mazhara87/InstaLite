<?php
session_start();
require_once('connexion.php');
?>

<?php
include_once('partials/header.php');
?>


<div id="profile">
    <div>
        <h2 class="My Insta">My Insta</h2>
        <?php if (isset($_SESSION['user']['avatar_url'])) {    ?>
            <div class="avatar">
                <img src=<?php echo $_SESSION['user']['avatar_url']; ?> alt="avatar">
            </div>
        <?php } ?>
        <p class="name"><?php echo $_SESSION['user']['name']; ?></p>

        <div class="sign-out">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="process/deconnexion.php">Sign out</a>
            <?php endif; ?>

            <!-- <form action="../process/deconnexion.php" method="post">
                        <button type="submit">Sign out</button>
                    </form> -->
        </div>

        <!-- Вывод фотографий пользователя -->
        <div class="user-photos">
            <h2>Your Photos</h2>
            <?php
            $user_id = $_SESSION['user']['id'];
            $sql = "SELECT * FROM photos WHERE users_id = :user_id ORDER BY photos_id DESC";
            $request = $db->prepare($sql);
            $request->execute(['user_id' => $user_id]);

            while ($photo = $request->fetch()) {
                $imageURL = $photo['image_url'];

                echo "<img src='$imageURL' alt='Photo'><br>";
            }
            ?>
        </div>
    </div>
</div>


<div class="gallery">
    <div class="grid-container">
        <div class="grid-container_item">
            <img class="image" src=https://images.unsplash.com/photo-1516519700326-137a56a20cb7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="image" />
        </div>
        <div class="grid-container_item">
            <img class="image" src=https://images.unsplash.com/photo-1689020562921-ba28a34c881d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=908&q=80" alt="image" />
        </div>
        <div class="grid-container_item">
            <img class="image" src=https://images.unsplash.com/photo-1688499693696-9c754d94a56e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" alt="image" />
        </div>
        <div class="grid-container_item">
            <img class="image" src=https://images.unsplash.com/photo-1688504278800-fcbd88b2ea82?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=776&q=80" alt="image" />
        </div>
    </div>
</div>



</body>

</html>
<?php
include_once('partials/menu.php');
?>