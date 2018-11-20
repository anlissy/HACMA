<?php 
session_start();
$_SESSION["hassession"] = true;
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="mainstyle.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>HACMA Log in</title>
    </head>
    <body>
       
        <div class="login-page">
        <div class="form">
          
          <form action="userlogin.php" method="POST" class="login-form">
            <h3 style="color: #462AA6; font-family: Verdana, sans-serif" >HACMA User Cabinet</h3>
            <p align="left"  style="font-family: Verdana, sans-serif; color: #474d56; padding: 0px 0px 0px 17px"  >Phone number:</p>
            <input name="phone" type="text" placeholder="045XXXXXXX"/>
            
            <input type="submit" value="Send code by SMS" name="submit">
             
        
        <?php
        // connecting to the database
        //$watestdb = new PDO('mysql:host=127.0.0.1:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');
        
        function checkuser() {
           
        $watestdb = new PDO('mysql:host=127.0.0.1:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');
       
        $sql = "SELECT user_id FROM user WHERE user_phone='".$_POST['phone']."';";
      
        $phone = $watestdb->query($sql);
    
         
        
            for ($i = 0; $i < $phone->rowCount(); $i++) 
            { 
          
            $row = $phone->fetch(); 
            $check = $row["user_id"]; 
            return $check;
            }
           
            //$check->closeCursor();
            
        }
     
     
 
      
        $buttonclick = $_POST['submit'];
        
        if(isset($buttonclick)) {
            
            $userid = checkuser(); 
            
        
                
            if ($userid != NULL ){
               
                $userphone = $_POST['phone'];
              
            session_start();
                   if (!isset($_SESSION["hassession"]))
            {
                print "Invalid session, you have no business here!";
            }
            else 
            {
                 $watestdb = new PDO('mysql:host=127.0.0.1:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');
                 $deletion = $watestdb->prepare("DELETE FROM availablesessions WHERE id=:sessid");
                 $deletion->bindValue(":sessid", session_id());
                 $deletion->execute();
                 $deletion = NULL;
                 $insert = $watestdb->prepare("INSERT into availablesessions (id, session_phone, flag) VALUES (:sessid, :phone, '1')");
                 $insert->bindValue(":sessid", session_id());
                 $insert->bindValue(":phone", $_POST["phone"]);
                 $insert->execute();
                 $insert = NULL;
                 //print ("Hello ".htmlspecialchars($_POST["phone"])." and welcome to this little chat!");
            }

                
     
                //session_start();
                //$_SESSION['phone'] = $userphone;
                //session_abort();
               
                header('Location: smscode.php');
                }
             else {
              
                ?>
                <br><label name= "errorlabel1">Incorrect phone number. Try again</label>
            
          </form>
        </div>
        </div>
                <?php
                
            }
   
        }
        
        ?>

        
    </body>
</html>
