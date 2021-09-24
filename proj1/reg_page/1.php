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
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$phonenumber = mysqli_real_escape_string($link, $_REQUEST['phonenumber']);
$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$_SESSION['username']=$_POST['username'];
$_SESSION['phonenumber']=$_POST['phonenumber'];
 
// Attempt insert query execution

$sql = "INSERT INTO users (username,password,phonenumber,pic) VALUES ('$username', '$password', '$phonenumber','$file')";
if(mysqli_query($link, $sql)){
    header('location:https://soppy-alternate.000webhostapp.com/Main_Frame/index.php');
}
else {
         echo "Username already exists";
}


// Close connection
mysqli_close($link);
?>




