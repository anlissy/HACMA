<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="cabinet_style.css">
<style>


input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
  background-color: #4A26AE;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Roboto, sans-serif;
  cursor: pointer;
  border-radius: 5px;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  
}

input[type=submit]:hover {
    opacity: 0.8;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
    font-family: Roboto, sans-serif;
    margin-top: 3%;
    margin-left: 32%;
    width: 46%;
}

.heading{
    font-family: Verdana, sans-serif; 
    font-size: 30px;
    color: #1a1919; 
    padding: 0px 0px 0px 0px;
    margin: 6% 0px 0px 15%;
    text-align: center;
   
}

hr {
    background-color: #4A26AE;
    height: 2px;
    width: 10%;
    align-content: center;
    margin: 1% 0% 0% 52.4%;
}
</style>
</head>
<body>



  <?php
            
            // CURRENT SESSION PHONE RETRIEVAL
            $watestdb = new PDO('mysql:host=127.0.0.1:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');
            session_start();
            $sql = "SELECT session_phone FROM availablesessions WHERE flag='1'";
            $phone = $watestdb->query($sql);
            for ($i = 0; $i < $phone->rowCount(); $i++) 
            { 
                $row = $phone->fetch(); 
                $userphone = $row["session_phone"]; 
            }
           
           // USER NAME RETRIEVAL
           $sql = "SELECT user_name FROM user WHERE user_phone='".$userphone."';";
           $check = $watestdb->query($sql);
           for ($i = 0; $i < $check->rowCount(); $i++) 
           { 
               $row = $check->fetch(); 
               $name = $row["user_name"]; 
            } 
            ?>
        
        <div class="cabinet-page">
        
            <form class="cabinet-form">
          
                <!-- WELCOME CONTAINER-->
                <div class="welcome_container">
                    <h3 style="color: #ffffff; padding: 20px 0px 0px 20px; margin: 0px 0px 0px 0px; font-family: Verdana, sans-serif" >
                    <label id="name"><?php print $name; ?></label>, welcome to your HACMA User Cabinet!</h3>
                </div>
                
                <!-- PAGE NAVIGATION MENU-->
                <div class="sidenav">
                    <a href="cabinet.php"><i class="square" ></i>Main Page</a>
                    <a href="package.php"><i class="square" ></i>Package</a>
                    <a href="usage.php"><i class="square" ></i>Usage</a>
                    <a href="topup-number.php"><i class="square" ></i>Top-up</a>
                    <a href="faq.php"><i class="square" ></i>FAQ</a>
                    <a href="chatmain.php"><i class="square" ></i>Contact us</a>
                    <a href="locations.php"><i class="square" ></i>Find stores</a>
                    <a href="userlogin.php"><i class="square" ></i>Log out</a>
                    <br><br><br><br>
                    
                    <!-- LOGO IN TABLE-->
                    <table style="width:100%">
                    <tr>
                    <td style="width:30%"><img src="img/hacmalogopurple.png" style="border-radius: 50%; margin: 15px;"></td>
                    <td style="width:70%"><b style="text-align: left; font-size:20px;">HACMA</b></td>
                    </tr>
                    </table>
                    
                 </div>
                
<p class="heading">Contact us</p>
             <hr>

<div class="container">
  <form action="send_email.php" method="post">
      <label for="fname">First Name</label><br>
      <input type="text" id="fname" name="firstname" placeholder="Your name.."><br>

      <label for="lname">Last Name</label><br>
      <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>

      <label for="email">Email</label><br>
      <input type="text" id="mail" name="mail" placeholder="Your email"><br>


      <label for="subject">Subject</label><br>
      <textarea id="subject" name="subject" placeholder="Write us if you have problems or FAQ didn't help you. We will reply as soon as will see your message!" style="height:150px"></textarea><br>

    <input  align="center" type="submit"  name="submit" value="Submit">
  </form>
</div>
           
              </form>
          
             </div> 

</body>
</html>
