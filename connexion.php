<?php
$dns = 'mysql:host=localhost;dbname=instalite';
$user = 'root';
$password = '';

try{
    $db = new PDO( $dns, $user, $password);
 

}
catch(Exception $message){
    echo "ya un blem <br>" . "<pre>$message</pre>" ;
}
?>