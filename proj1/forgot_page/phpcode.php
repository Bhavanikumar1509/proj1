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


	if(isset($_POST['btn']))
	{
	     $pno=$_POST['phonenumber'];
		    $_SESSION['phonenumber']=stripslashes(htmlspecialchars($_POST['phonenumber']));
	    	$sqll="select * from users where phonenumber=".$_POST['phonenumber']."";
	    	if(mysqli_query($link,$sqll))
	        	{
	    	    	header('location:otp.php');
	    	    }
	   	    else
	   	    {
	   	    	echo "Not a registered user";
	    	}
	}

	if(isset($_POST['rstbtn']))
	{
		$newpswrd=$_POST['npassword'];
		$sql="select * from users where phonenumber='".$_SESSION['phonenumber']."' limit 1";
		$result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)==1)
		{
			$link=mysqli_query($link,"UPDATE users set password='$newpswrd' where phonenumber='".$_SESSION['phonenumber']."'");
			echo "Password Changed Successfully !!";
		}
		else
		{
			echo "Not updated.";
			exit();
		}
	}
?>