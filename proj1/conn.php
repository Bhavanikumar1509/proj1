<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost";
$username = "id15825802_twist";
$password = "UYP!8zxVqo@+ZxRJ";
$database = "id15825802_users_register";
$link =  mysqli_connect($servername,$username,$password,$database);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>