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
$_SESSION['phonenumber']=$_POST['phonenumber'];
$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$sql="select * from users where phonenumber='".$_SESSION['phonenumber']."' limit 1";
$result=mysqli_query($link,$sql);
if(mysqli_num_rows($result)==1)
{
    $link=mysqli_query($link,"UPDATE users set pic='$file' where phonenumber='".$_SESSION['phonenumber']."'");
    header('location:https://soppy-alternate.000webhostapp.com/Main_Frame/index.php');
}
else 
{
    echo "ERROR: Could not able to execute . " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>
<html>
    <body>
        <form action="changeprofile.php" method="POST" enctype="multimedia/form-data">
            <input type="file" name="image">
            <input type="submit" name="submit">
        </form>
    </body>
</html>