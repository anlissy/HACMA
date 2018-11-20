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
  height: 200px;
  margin-top: 125px;
  padding: 5px;
  text-align: left;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22), 5px 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 10px;
  float: left;
  margin-left: 24%;
 
   }  
   
   .simpletext{
    font-family: Verdana, sans-serif; 
    color: #1a1919; 
    padding: 0px 0px 0px 15px;
}

  .simpleplustext{
    font-family: Verdana, sans-serif; 
    font-size: 30px;
    color: #1a1919; 
    padding: 0px 0px 0px 15px;
}

  .greytext{
    font-family: Verdana, sans-serif;
    font-size: 12px;
    color: #808080; 
    padding: 0px 0px 0px 15px;
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
                    <a href="#"><i class="square" ></i>Usage</a>
                    <a href="topup-number.php"><i class="square" ></i>Top-up</a>
                    <a href="#"><i class="square" ></i>FAQ</a>
                    <a href="#"><i class="square" ></i>Chat with us</a>
                    <a href="locations.php"><i class="square" ></i>Find stores</a>
                    <a href="#"><i class="square" ></i>Log out</a>
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
            
           $sql = "SELECT package_name FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check = $watestdb->query($sql);
           for ($i = 0; $i < $check->rowCount(); $i++) 
           { 
               $row = $check->fetch(); 
               $package_name = $row["package_name"]; 
            } 
            
           $sql = "SELECT package_call FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check2 = $watestdb->query($sql);
           for ($i = 0; $i < $check2->rowCount(); $i++) 
           { 
               $row = $check2->fetch(); 
               $package_call = $row["package_call"]; 
            } 
            
          
            
            $sql = "SELECT package_sms FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check3 = $watestdb->query($sql);
           for ($i = 0; $i < $check3->rowCount(); $i++) 
           { 
               $row = $check3 ->fetch(); 
               $package_sms = $row["package_sms"]; 
            }
            
           $sql = "SELECT package_mgb FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check4 = $watestdb->query($sql);
           for ($i = 0; $i < $check4->rowCount(); $i++) 
           { 
               $row = $check4->fetch(); 
               $package_mgb = $row["package_mgb"]; 
            }
            
           $sql = "SELECT package_price FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check5 = $watestdb->query($sql);
           for ($i = 0; $i < $check5->rowCount(); $i++) 
           { 
               $row = $check5->fetch(); 
               $package_price = $row["package_price"]; 
            }
            
           $sql = "SELECT package_internet_type FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check6 = $watestdb->query($sql);
           for ($i = 0; $i < $check6->rowCount(); $i++) 
           { 
               $row = $check6->fetch(); 
               $package_internet_type = $row["package_internet_type"]; 
            }
            
           $sql = "SELECT package_date FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check7 = $watestdb->query($sql);
           for ($i = 0; $i < $check7->rowCount(); $i++) 
           { 
               $row = $check7->fetch(); 
               $package_date = $row["package_date"]; 
            }
            
           $sql = "SELECT package_duration FROM user, Package WHERE (user.user_phone='".$userphone."' AND user.user_package = Package.package_name);";
           $check8 = $watestdb->query($sql);
           for ($i = 0; $i < $check8->rowCount(); $i++) 
           { 
               $row = $check8->fetch(); 
               $package_duration = $row["package_duration"]; 
            }
            ?>
            
              
              <!-- PACKAGE CONTAINER-->
              <div class="package_container">
                <p style="font-size: 20px;font-family: Verdana, sans-serif; color: #1a1919; padding: 0px 0px 0px 15px; "  >
                    Your package:</p> 
                    <table style="width:100%">
                    <tr>
                        <td><p class="purpletext"><?php echo $package_name; ?></p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_call; ?></b></span> MIN</p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_mgb; ?></b></span>  GB</p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_sms; ?></b></span>  SMS</p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_duration; ?></b></span></p></td>
                        <td><p class="simpletext"><span class="simpleplustext"<b><?php echo $package_price; ?></b></span>  € </p></td>
                    </tr>
                    <tr style="vertical-align: top;">
                    <td></td>
                    <td></td>
                    <td style="text-align: center; vertical-align: top;" ><p class="greytext"><?php echo $package_internet_type; ?></p></td>
                    <td></td>
                    <td style="text-align: center; vertical-align: top;" ><p class="greytext"><?php echo $package_date; ?></p></td>
                     <td></td>
                    </tr>
                    </table> 
              </div> 
              
              
            
             
                   
             
            
             </form>
          
             </div>
    </body>
</html>
