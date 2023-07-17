<?php


require_once('../connexion.php');

// var_dump($_POST);

if(
    isset($_POST['username']) && !empty($_POST['username'])
    &&isset($_POST['password']) && !empty($_POST['password'])
    &&isset($_POST['name']) && !empty($_POST['name'])
){
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'name' => $_POST['name'],

    ];
    $sql = "INSERT INTO users (username, password, name) VALUES (:username, :password, :name)";
    $request= $db->prepare($sql);
    $request->execute($data);
}
header('Location: profil-user.php')
?>
