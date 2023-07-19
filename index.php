<?php
require_once('connexion.php');
session_start();
?>

<?php
include_once('partials/header.php');
?>

<?php if (! isset($_SESSION['user'])):
?>
<h2>Login</h2>
    <form action="./process/login.php" method="post">
        <label for="username">User name:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>



        <input type="submit" value="Login">
    </form>
    <p>New user? <button><a href="register.php">Register</a></button></p>
<?php else: ?>
    <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
    <img src="<?php echo $_SESSION['user']['avatar_url'];
    ?>"
    alt="Avatar">
   
<?php endif; ?>




    <?php 
include_once('partials/footer.php');
?>
