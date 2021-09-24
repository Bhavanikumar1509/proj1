<?php
session_start();
$servername = "localhost";
$username = "id15825802_twist";
$password = "UYP!8zxVqo@+ZxRJ";
$database = "id15825802_users_register";
$link=mysqli_connect($servername,$username,$password,$database);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_select_db($link,$database);
if(isset($_GET['image_id']))
{
   $sql = "SELECT pic FROM users WHERE phonenumber=".$_SESSION['phonenumber']." ";
	    $result = mysqli_query($link, $sql);
	    $row = mysqli_fetch_array($result);
        echo $row["pic"];
}

	mysqli_close($link);
?>