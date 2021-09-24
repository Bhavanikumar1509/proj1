<?php
    session_start();
?>
<html lang="en">
    <head>
        <link rel="stylesheet" href="mainframe.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta charset="utf-8" />
 
        <title>Chatroom</title>
        <style><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "ajaxupload.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});</style>
        
    </head>
    <body>
        <div id="wrapper">
            
            <div id="menu">
                <img style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;" src="ViewProfilePic.php?image_id=<?php echo $row["pic"]; ?>" />
                <p class="welcome">Welcome,<?php session_start(); echo $_SESSION['username'];?><b></b></p>
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-bars"></i> Menu</button>
                     <div class="dropdown-content">
                        <a href="https://soppy-alternate.000webhostapp.com/index.html">Home Page</a>
                        <a href="https://soppy-alternate.000webhostapp.com/forgot_page/newpassword.html">Change Password</a>
                        <a href="https://soppy-alternate.000webhostapp.com/Main_Frame/changeprofile.php">Change Profile Picture</a>
                        <a  id="exit" href="#">Logout</a>
                        
            </div>
            
    
                      </div>
                    </div>
                

 
            <div id="chatbox"></div>
 
            <form name="message" action="post.php">
                <input name="usermsg" type="text" id="usermsg" placeholder="Type your message..." />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
                </form>
                
                
                <div>
                    <form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>

<?php
session_start();
$files = scandir("uploads");
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <p>
        <?php echo $files[$a]; ?>

        <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>

        <a href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;">
            Delete
        </a>
    </p>
    <?php
}

?>

<style>
    .fixed-bottom {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: lightseagreen;
        color: white;
        text-align: center;
        padding: 25px;
        font-size: 20px;
    }
</style>        
</div>




<style>

    .fixed-bottom {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: lightseagreen;
        color: white;
        text-align: center;
        padding: 25px;
        font-size: 20px;
    }
</style>

        </div>
        <div>
            
<!DOCTYPE html>
<html>
 <head>
  
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
<?php
if($_SESSION["type"] == "user")
{
?>
function update_user_activity()
{
 var action = 'update_time';
 $.ajax({
  url:"action.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {

  }
 });
}
setInterval(function(){ 
 update_user_activity();
}, 3000);


<?php
}
else
{
?>
fetch_user_login_data();
setInterval(function(){
 fetch_user_login_data();
}, 3000);
function fetch_user_login_data()
{
 var action = "fetch_data";
 $.ajax({
  url:"action.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {
   $('#user_login_status').html(data);
  }
 });
}
<?php
}
?>

});
</script>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {});
        </script>
        <script type="text/javascript">
// jQuery Document
$(document).ready(function(){
    //If user wants to end session
    $("#exit").click(function(){
        var exit = confirm("Are you sure you want to end the session?");
        if(exit==true){window.location = 'logout.php?logout=true';} 
        else
        {return 0;}
       
    });
});
//If user submits the form
$("#submitmsg").click(function () {
    var clientmsg = $("#usermsg").val();
    if (clientmsg.length == 0) return false ;
    $.post("post.php", { text: clientmsg });
    $("#usermsg").val("");
    return false;
    
});

//Load the file containing the chat log
function loadLog(){     
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){        
            $("#chatbox").html(html); //Insert chat log into the #chatbox div               
        },
    });
}

//Load the file containing the chat log
function loadLog(){     
    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){        
            $("#chatbox").html(html); //Insert chat log into the #chatbox div   
             
            //Auto-scroll           
            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            }               
        },
    });
}
setInterval (loadLog, 2500);    //Reload file every 2500 ms or x ms if you wish to change the second parameter

</script>




<?php
session_start();

if(!isset($_SESSION["type"]))
{
 header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Onlineusers</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Online users</h2>
   <br />

   <?php
   if($_SESSION["type"] =="user")
   {
    echo '<div align="center"><h2>Hi... Welcome User</h2></div>';
   }
   else
   {
   ?>
   <div class="panel panel-default">
    <div class="panel-heading">Online User Details</div>
    <div id="user_login_status" class="panel-body">

    </div>
   </div>
   <?php
   }
   ?>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
<?php
if($_SESSION["type"] == "user")
{
?>
function update_user_activity()
{
 var action = 'update_time';
 $.ajax({
  url:"action.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {

  }
 });
}
setInterval(function(){ 
 update_user_activity();
}, 3000);


<?php
}
else
{
?>
fetch_user_login_data();
setInterval(function(){
 fetch_user_login_data();
}, 3000);
function fetch_user_login_data()
{
 var action = "fetch_data";
 $.ajax({
  url:"action.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {
   $('#user_login_status').html(data);
  }
 });
}
<?php
}
?>

});
</script>



    </body>
</html>