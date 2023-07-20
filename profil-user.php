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
    </div>
    <div class="container container-header">

        <div>
            <!-- avatar -->
            <?php if (isset($_SESSION['user']['avatar_url'])) {    ?>
                <img src=<?php echo $_SESSION['user']['avatar_url']; ?> alt="avatar">
            <?php } ?>
            <p class="name"><?php echo $_SESSION['user']['name']; ?></p>
        </div>

        <div>
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="process/deconnexion.php">Sign out</a>
            <?php endif; ?>

            <!-- <form action="../process/deconnexion.php" method="post">
                        <button type="submit">Sign out</button>
                    </form> -->
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


<div class="menu">
    <form action="./main.php" method="post">
        <button class="main-button" type="submit"><img src="./assets/image/home.png" height="50px"></Main></button>
    </form>

    <form>
        <button class="search-button" type="submit"><img src="./assets/image/search.png" height="50px"></Search></button>
    </form>

    <form>
        <button class="addpost-button" type="submit"><img src="./assets/image/add.png" height="50px"></AddPost></button>
    </form>

    <form>
        <button class="messages-button" type="submit"><img src="./assets/image/chat.png" height="50px"></Messages></button>
    </form>

    <form action="./profil-user.php" method="post">
        <button class="profile-button" type="submit"><img src="./assets/image/profile.png" height="50px"></Profile></button>
    </form>
</div>
</body>

</html>