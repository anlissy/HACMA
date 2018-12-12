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
        <title>Usage</title>
        <style>
            .usage_container{
  position: relative;
  z-index: 0;
  background: #f2f2f2;
  width: 1040px;
  height: 610px;
  margin-top: 25px;
  padding: 15px;
  text-align: left;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22), 5px 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 10px;
  float: left;
  margin-left: 22%;
  display: inline-block;
  
 
   }  
   .square {
    width: 16px;
    height: 16px;
    background: #4A26AE;
    border-radius: 5px 5px 5px 5px;
    margin: 10px;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 5px;
    padding-bottom: 5px;
}
    .simpletext{
    font-family: Verdana, sans-serif; 
    color: #1a1919; 
    padding: 0px 0px 0px 15px;
    text-align: left;
    font-size: 13px;
}
 .simpleplustext{
    font-family: Verdana, sans-serif; 
    font-size: 15px;
    color: #1a1919; 
    padding: 0px 0px 0px 15px;
    text-align: center;
     
 }
 .darkgreytext{
    font-family: Verdana, sans-serif;
    font-size: 20px;
    margin-left: 55%;
    color: #1a1919; 
    padding: 0px 0px 0px 15px;
 }
 .purpletext {
  font-size: 20px;
  font-family: Verdana, sans-serif; 
  color: #482ea7; 
  padding: 0px 0px 0px 15px;
  text-align: center;  
    
}
.usage_table{
   
    text-align: left;
    border: 1px;
    border-color: #1a1919;
    border-style: solid;
    border-collapse: collapse;   
    table-layout: auto;
}

tr.usage_table:hover {
    background-color: #e6e6e6;
      
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
            
           $sql = "SELECT user_id FROM user WHERE user_phone='".$userphone."';";
           $check = $watestdb->query($sql);
           for ($i = 0; $i < $check->rowCount(); $i++) 
           { 
               $row = $check->fetch(); 
               $id = $row["user_id"]; 
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
                <!--FINDING USAGE INFO FROM DB-->
                
                <!-- USAGE CONTAINER-->
                <p class="heading" style="text-align: center;">Usage</p>
              <hr>
                
              <div class="usage_container">
                  <!-- CALLS USAGE-->
                  <p class="purpletext"> Calls </p>
                  <table style= "border-collapse: collapse; width: 100%; table-layout: auto">  
                    <tr class="usage_table" style="background-color: #ddd;" >
                        <td class="usage_table" style=" width: 20%;"><p class="simpleplustext">ID</p></td>
                        <td class="usage_table" style=" width: 20%;"><p class="simpleplustext">Duration</p></td>
                        <td class="usage_table" style=" width: 30%;"><p class="simpleplustext">Time and date</p></td>
                        <td class="usage_table" style=" width: 30%;"><p class="simpleplustext">Recipient's number</p></td>
                    </tr>
                    
                    <?php
                    $sql = "SELECT * FROM HACMA.Call WHERE user_id=".$id.";";
                    $check = $watestdb->query($sql);
                    $call_id = array();
                    for ($i = 0; $i < $check->rowCount(); $i++) 
                    { 
                    $row = $check->fetch(); 
                    $call_id[] = $row["Call_id"]; 
                    $call_duration[] = $row["Call_duration"]; 
                    $call_time[] = $row["Call_time"]; 
                    $call_number[] = $row["Call_number"]; 
                    }
                    ?>
                    
                    
                    
                    <?php
                    for ($i = 0; $i < count($call_id); $i++) 
                    { ?>
                    <tr class="usage_table"  >
                        <td class="usage_table" style=" width: 20%;"><p class="simpletext"> <?php echo $call_id[$i]; ?> </p></td>
                        <td class="usage_table" style=" width: 20%;"> <p class="simpletext"> <?php echo $call_duration[$i]; ?> </p></td>
                        <td class="usage_table" style=" width: 30%;"> <p class="simpletext"> <?php echo $call_time[$i]; ?>  </p></td>
                        <td class="usage_table" style=" width: 30%;"> <p class="simpletext"> <?php echo $call_number[$i]; ?>  </p></td>
                    </tr>
                    <?php }?>
                    
                    
                    
                  </table>
                  
                  <!-- SMS USAGE-->
                  <p class="purpletext"> SMS </p>
                   <table style= "border-collapse: collapse; width: 100%; table-layout: auto">  
                    <tr class="usage_table" style="background-color: #ddd;">
                        <td class="usage_table" style=" width: 20%;"><p class="simpleplustext">ID</p></td>
                        <td class="usage_table" style=" width: 40%;"><p class="simpleplustext">Time and date</p></td>
                        <td class="usage_table"  style=" width: 40%;"><p class="simpleplustext">Recipient's number</p></td>
                    </tr>
                    
                    <?php
                    $sql = "SELECT * FROM SMS WHERE user_id=".$id.";";
                    $check = $watestdb->query($sql);
                    $call_id = array();
                    for ($i = 0; $i < $check->rowCount(); $i++) 
                    { 
                    $row = $check->fetch(); 
                    $sms_id[] = $row["SMS_id"]; 
                    $sms_time[] = $row["SMS_time"]; 
                    $sms_r_number[] = $row["SMS_receiver_number"];
                    }
                    
                    for ($i = 0; $i < count($sms_id); $i++) 
                    { ?>
                    <tr class="usage_table">
                        <td class="usage_table" style=" width: 20%;"><p class="simpletext"><?php echo $sms_id[$i]; ?></p></td>
                        <td class="usage_table" style=" width: 40%;"><p class="simpletext"><?php echo $sms_time[$i]; ?></p></td>
                        <td class="usage_table" style=" width: 40%;"><p class="simpletext"><?php echo  $sms_r_number[$i]; ?></p></td>
                    
                    </tr>
                     <?php }?>
                  </table>
                  
                  <!-- INTERNET USAGE-->
                  <p class="purpletext"> Internet </p>
                   <table style= "border-collapse: collapse; width: 100%; table-layout: auto">  
                    <tr class="usage_table" style="background-color: #ddd;">
                        <td class="usage_table"  style=" width: 20%;"><p class="simpleplustext">ID</p></td>
                        <td class="usage_table"  style=" width: 40%;"><p class="simpleplustext">Date</p></td>
                        <td class="usage_table"  style=" width: 40%;"><p class="simpleplustext">Data</p></td>
                    </tr>
                    
                    <?php
                    $sql = "SELECT * FROM Internet WHERE user_id=".$id.";";
                    $check = $watestdb->query($sql);
                    $call_id = array();
                    for ($i = 0; $i < $check->rowCount(); $i++) 
                    { 
                    $row = $check->fetch(); 
                    $internet_id[] = $row["internet_id"]; 
                    $internet_data[] = $row["internet_data"]; 
                    $internet_date[] = $row["internet_date"];
                    }
                    
                    for ($i = 0; $i < count($internet_id); $i++) 
                    { ?>
                    <tr class="usage_table">
                        <td class="usage_table" style=" width: 20%;"><p class="simpletext"><?php echo $internet_id[$i]; ?></p></td>
                        <td class="usage_table" style=" width: 40%;"><p class="simpletext"><?php echo $internet_data[$i]; ?></p></td>
                        <td class="usage_table" style=" width: 40%;"><p class="simpletext"><?php echo $internet_date[$i]; ?></p></td>
                    
                    </tr>
                    <?php }?>
                  </table>
                
                  
    </body>
</html>
