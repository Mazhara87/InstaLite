<?php
require_once('connexion.php');
?>

<?php
include_once('partials/header.php');
?>


<ul>
    <form action="./process/add-users.php" method="post">
        <label for="username">User name:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>



        <input type="submit" value="Submit">
    </form>
</ul>

<?php
include_once('partials/footer.php');
?>