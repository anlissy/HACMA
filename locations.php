<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Find our stores</title>
          <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <style>
           .location1{
  position: relative;
  z-index: 1;
  background: #f2f2f2;
  width: 265px;
  height: 320px;
  margin-left: 300px;
  margin-top: 100px;
  float:left;
  display: inline-block;
  padding-top: 15px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22),  5px 5px 5px 0 rgba(0, 0, 0, 0.24);;
  border-radius: 10px 0 0 10px;
  display: inline-block;
  
   }
   .location2{
  position: relative;
  z-index: 1;
  background: #f2f2f2;
  width: 265px;
  height: 320px;
  margin-top: 100px;
  float:left;
  display: inline-block;
  padding-top: 15px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22),  5px 5px 5px 0 rgba(0, 0, 0, 0.24);;
  
  display: inline-block;
   }
   .location3{
  position: relative;
  z-index: 1;
  background: #f2f2f2;
  width: 265px;
  height: 320px;
  margin-top: 100px;
  float:left;
  display: inline-block;
  padding-top: 15px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22),  5px 5px 5px 0 rgba(0, 0, 0, 0.24);;
  
  display: inline-block;
   }
   
   .location4{
   position: relative;
  z-index: 1;
  background: #f2f2f2;
  width: 255px;
  height: 320px;
  margin-top: 100px;
  float:left;
  display: inline-block;
  padding-top: 15px;
  align-items: center;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22),  5px 5px 5px 0 rgba(0, 0, 0, 0.24);;
  border-radius: 0 10px 10px 0;
  display: inline-block;
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

.purpletext {
  font-size: 25px;
  font-family: Verdana, sans-serif; 
  color: #482ea7; 
  padding: 0px 0px 0px 15px;  
    
}

.balance_text {
   color:#482ea7; 
   align: center;
   
   
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
                
              <div class="location1">
                  <img src="img/helsinki_icon.png">
                  <div class="purpletext">Helsinki</div>
                  <div class="greyplustext"><br>Kaivokatu 8 <br> 00101 Helsinki <br> <br>Opening hours:<br> MON-SAT 10am - 8pm<br><br> +358 46 123 45 67</div><br>
                  <a class="balance_text" href="https://goo.gl/maps/G3jUqxj8kQN2" target="_blank">See on the map</a>
              </div>
              <div class="location2">
             <img src="img/lahti_icon.png">
                  <div class="purpletext">Lahti</div>
                  <div class="greyplustext"><br>Aleksanterinkatu 18 <br> 15140 Lahti<br> <br>Opening hours:<br> MON-SAT 9am - 7pm<br><br> +358 46 123 45 66</div><br>
                  <a class="balance_text" href="https://goo.gl/maps/R9bGsnEerQn" target="_blank">See on the map</a>
              </div>
       <div class="location3">
              <img src="img/tampere_icon.png">
                  <div class="purpletext">Tampere</div>
                  <div class="greyplustext"><br>Vuolteenkatu 1 <br> 33100 Tampere<br> <br>Opening hours:<br> MON-FRI 10am - 9pm<br><br> +358 46 123 45 64</div><br>
                  <a class="balance_text" href="https://goo.gl/maps/NeidTbvjGvE2" target="_blank">See on the map</a>
              </div>
       <div class="location4">
              <img src="img/rov_icon.png">
                  <div class="purpletext">Rovaniemi</div>
                  <div class="greyplustext"><br>Suomi, Koskikatu 25 <br> 96200 Rovaniemi<br> <br>Opening hours:<br> MON-FRI 11am - 9pm<br><br> +358 46 123 45 69</div><br>
                  <a class="balance_text" href="https://goo.gl/maps/NN8SbheMjaE2" target="_blank">See on the map</a>
              </div>
              
             </form>
          
             </div>   
              
    </body>
</html>
