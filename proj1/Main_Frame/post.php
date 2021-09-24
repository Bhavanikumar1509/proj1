<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="mainframe.css"/>
    </head>
    <body>
      <img style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;" src="ViewProfilePic.php?image_id=<?php echo $row["pic"]; ?>" />

     <?php
        if(isset($_SESSION['username'])){
            $text = $_POST['text'];
            $text_message = "<div class=msgln>
            <span class=chat-time> ".date_default_timezone_set("Asia/kolkata")."
             ".date('d-m-y | g:i A')."</span>
            <b class='user-name'>".$_SESSION['username']."</b><span class=text-msg>".stripslashes(htmlspecialchars($text))."</span><br>
  
             </div>";
        file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
        }
    ?>
    </body>
    </html>
   





 
 
   
  
   
  
   

  
