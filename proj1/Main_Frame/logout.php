<?php
    session_start();
if(isset($_GET['logout'])){ 
     
    //Simple exit message
    $logout_message = "<div class='msgln'><span class='left-info'><b class='user-name-left'>". $_SESSION['username'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
     
    session_destroy();
    header('location:https://soppy-alternate.000webhostapp.com/login_page/login.php'); //Redirect the user
}
?>
