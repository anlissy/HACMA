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
        
        <title>LOGIN CODE</title>
    </head>
    <body>
       
        
        <div class="login-page">
        <div class="form">
          
          <form action="smscode.php" method="POST" class="login-form">
            <h3 style="color: #462AA6; font-family: Verdana, sans-serif;  ">HACMA User Cabinet</h3>
            <p align="left" style="font-family: Verdana, sans-serif; color:#474d56; padding: 0px 0px 0px 17px" >Code:</p>
            <input name="password" type="text" placeholder="XXXXX"/>
            
            <input type="submit" value="Log in" name="submit1">
            
        
        
        <?php
        // 
        
        $watestdb = new PDO('mysql:host=127.0.0.1:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');
        
        
        function checkpassword() {
            
        $watestdb = new PDO('mysql:host=127.0.0.1:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');
        //session_start();
        
        $sql = "SELECT session_phone FROM availablesessions WHERE flag='1'";
        $phone = $watestdb->query($sql);
        
         for ($i = 0; $i < $phone->rowCount(); $i++) 
            { 
          
            $row = $phone->fetch(); 
            $userphone = $row["session_phone"]; 
            }
           
           
            //$userphone = $_SESSION['phone'];
        
        $sql = "SELECT user_password FROM user WHERE user_phone='".$userphone."';";
        //print ("phone:".$userphone);
        $check = $watestdb->query($sql);
        
            for ($i = 0; $i < $check->rowCount(); $i++) 
        { 
            $row = $check->fetch(); 
            $password = $row["user_password"]; 
            return $password;
        } 
            //$password->closeCursor(); 
        }
        
        $buttonclick2 = $_POST['submit1'];
        
        
        
        if(isset($buttonclick2))
            {
            $userpassword = checkpassword();
            $entered_password = $_POST['password']; 
            //print ("entered:".$entered_password);
            //print ("user:".$userpassword);
            
            if ($userpassword == $entered_password){
           
                session_start();
                $_SESSION['password'] = $userpass;
                session_abort();
                
                header('Location: cabinet.php');
                }
            
            else{ 
                
                ?>
                <br><label name= "errorlabel2">Incorrect code. Try again</label>
            
          </form>
        </div>
        </div>
                <?php
                
             }
            }
        
       
        
        ?>
    </body>
</html>
