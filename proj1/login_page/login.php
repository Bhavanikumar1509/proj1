<?php
session_start();
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
mysqli_select_db($link,$database);

if(isset($_POST['phonenumber']))
{
	$pno=$_POST['phonenumber'];
	$_SESSION['phonenumber']=$_POST['phonenumber'];
	$pswd=$_POST['password'];
    $sql="select * from users where phonenumber='".$pno."' AND password='".$pswd."' limit 1";
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)==1){
	    $row=mysqli_fetch_array($result);
        $uname =$row['username'];
	    $_SESSION['username']=$uname;
		header('location:https://soppy-alternate.000webhostapp.com/login_page/two.html');
	}
	else
	{
		echo "You have entered incorrect details";
		exit();
	}
}
?>
<html>
<head>
<title>Login</title>
<link rel ="stylesheet" href="style.css"/>
<script>
function validateform()
{
	var pno=document.login.phonenumber;
	var numbers=/^[0-9]+$/;
	if(pno.value.length<10||pno.value.length>10)
	{
		alert("Phone number must be 10 digits only");
		pno.focus();
		return false;
	}
	else
	{
		if(pno.value.match(numbers))
			return true;
		else
		{
			alert("Phone number must contain numbers only");
			pno.focus();
			return false;
		}
	}
}
</script>
</head>
<body>
	<div class="container">
		<img src="login_user.png"/>
		<form action="login.php" onsubmit="return validateform()" name="login" method="POST">
		<div class="form-input">
			<input type="tel" name="phonenumber" placeholder="Enter phone number" pattern="[6-9]{1}[0-9]{9}"
			min="10"  maxlength="10" id="search1" onchange="hideIcon(this);"/>
		</div>
		<div class="form-input">
			<input type="password" name="password" placeholder="Password" min="8" maxlength="12" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" id="search2" onchange="hideIcon(this);" required />
		</div>
		<input name="submit" type="submit" value="LOGIN" class="btn-login"/>
		<p><a href="https://soppy-alternate.000webhostapp.com/forgot_page/forgotpassword.html">Forgot Password?</a></p>
		<p style="color:white;">Not an existing user? <a href="https://soppy-alternate.000webhostapp.com/reg_page/registration.html">Sign Up</a></p>
	</form>
</div>
</body>
</html>