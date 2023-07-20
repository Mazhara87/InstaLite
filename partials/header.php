<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaLite</title>
</head>

<body>
    <header id="header">
        <div class="container container-header">
            <div>
                <h1 class="title"><img src="assets/image/Logo.jpeg" height="100px"></h1>
            </div>
            <div>
            <?php if (isset($_SESSION['user'])): ?>
            <a href="process/deconnexion.php">Sign out</a>
        <?php endif; ?>

                    <!-- <form action="../process/deconnexion.php" method="post">
                        <button type="submit">Sign out</button>
                    </form> -->

               
            </div>
        </div>

    </header>