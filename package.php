<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <meta charset="UTF-8">
        <title>Package</title>
        
        <style>
            .package_container{
  position: relative;
  z-index: 1;
  background: #f2f2f2;
  width: 1000px;
  height: 260px;
  margin-top: 4%;
  margin-left: 22%;
  padding: 10px 45px 15px 10px;
  text-align: left;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22), 5px 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 10px;
  float: left;
  margin-left: 24%;
  display: inline-block;
   }  
   

   
   .simpletext{
    font-family: Verdana, sans-serif; 
    color: #1a1919; 
    padding: 0px 0px 0px 0px;
}

  .simpleplustext{
    font-family: Verdana, sans-serif; 
    font-size: 30px;
    color: #1a1919; 
    padding: 0px 0px 0px 0px;
}

 .simpleplustextpurple{
    font-family: Verdana, sans-serif; 
    font-size: 30px;
    color: #4a26ae; 
    padding: 0px 0px 0px 0px;
}


  .greytext{
    font-family: Verdana, sans-serif;
    font-size: 12px;
    color: #808080; 
    padding: 0px 0px 0px 0px;
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
     

#package {
                
                 margin: 50px 0px 0px 0px;
                 padding: 0px 30px 0px 0px;
                 width: 100%;
                 height: 100px;
                 text-align: center;
                 border-collapse: collapse;


               }
               #package table td, th {
                
                margin-right: 15px;
                text-align: center;
    }
               
        </style>
    </head>
    <body>
        <div class="cabinet-page">
        
            <form class="cabinet-form">
                
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
                
            <?php
            
           $sql = "SELECT package_name FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check = $watestdb->query($sql);
           for ($i = 0; $i < $check->rowCount(); $i++) 
           { 
               $row = $check->fetch(); 
               $package_name = $row["package_name"]; 
            } 
            
           $sql = "SELECT package_call FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check2 = $watestdb->query($sql);
           for ($i = 0; $i < $check2->rowCount(); $i++) 
           { 
               $row = $check2->fetch(); 
               $package_call = $row["package_call"]; 
            } 
            
          
            
            $sql = "SELECT package_sms FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check3 = $watestdb->query($sql);
           for ($i = 0; $i < $check3->rowCount(); $i++) 
           { 
               $row = $check3 ->fetch(); 
               $package_sms = $row["package_sms"]; 
            }
            
           $sql = "SELECT package_mgb FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check4 = $watestdb->query($sql);
           for ($i = 0; $i < $check4->rowCount(); $i++) 
           { 
               $row = $check4->fetch(); 
               $package_mgb = $row["package_mgb"]; 
            }
            
           $sql = "SELECT package_price FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check5 = $watestdb->query($sql);
           for ($i = 0; $i < $check5->rowCount(); $i++) 
           { 
               $row = $check5->fetch(); 
               $package_price = $row["package_price"]; 
            }
            
           $sql = "SELECT package_internet_type FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check6 = $watestdb->query($sql);
           for ($i = 0; $i < $check6->rowCount(); $i++) 
           { 
               $row = $check6->fetch(); 
               $package_internet_type = $row["package_internet_type"]; 
            }
            
           $sql = "SELECT package_date FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check7 = $watestdb->query($sql);
           for ($i = 0; $i < $check7->rowCount(); $i++) 
           { 
               $row = $check7->fetch(); 
               $package_date = $row["package_date"]; 
            }
            
           $sql = "SELECT package_duration FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_id);";
           $check8 = $watestdb->query($sql);
           for ($i = 0; $i < $check8->rowCount(); $i++) 
           { 
               $row = $check8->fetch(); 
               $package_duration = $row["package_duration"]; 
            }
            ?>
            
              
              <!-- PACKAGE CONTAINER-->
             
              <p class="heading" style="text-align: center;">Your package</p>
              <hr>
              <div class="package_container">
                
                    <table id="package">
                        <tr>
                            <td></td>
                            <td><img src="img/call.png"></td>
                            <td><img src="img/worldwide.png"></td>
                            <td><img src="img/sms.png"></td>
                            
                            <td><img src="img/calendar.png"></td>
                            <td><img src="img/euro.png"></td>
                            
                            
                        </tr>
                    <tr>
                        <td><p class="purpletext"><?php echo $package_name; ?></p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_call; ?></b></span> MIN</p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_mgb; ?></b></span>  GB</p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_sms; ?></b></span>  SMS</p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_duration; ?></b></span></p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_price; ?></b></span>  € </p></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td><p class="greytext"><?php echo $package_internet_type; ?></p></td>
                    <td></td>
                    <td><p class="greytext"><?php echo $package_date; ?></p></td>
                     <td></td>
                    </tr>
                    </table> 
              </div> 
              
              
            
             
                   
             
            
             </form>
          
             </div>
    </body>
</html>
