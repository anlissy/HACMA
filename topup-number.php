<!DOCTYPE html>
<html>

<?php

function checkuser() {

$watestdb = new PDO('mysql:host=localhost:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');

$sql = "SELECT * FROM User WHERE user_phone='".$_POST['phone']."';";
      
        $phone = $watestdb->query($sql);
        
            for ($i = 0; $i < $phone->rowCount(); $i++) 
            { 
          
            $row = $phone->fetch(); 
            $check = $row["user_balance"]; 
            return $check;
            }
           
            //$check->closeCursor();
            
}
?>


    <head>
        <title>Your number </title>
        <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <style>

                .container {
                      width: 100%; 

                 }
                 .progressbar {
                     counter-reset: step;
                 }
                 .progressbar li {
                     list-style-type: none;
                     width: 25%;
                     float: left;
                     font-size: 12px;
                     position: relative;
                     text-align: center;
                     text-transform: uppercase;
                     color: #7d7d7d;
                 }
                 .progressbar li:before {
                     width: 30px;
                     height: 30px;
                     content: counter(step);
                     counter-increment: step;
                     line-height: 30px;
                     border: 2px solid #7d7d7d;
                     display: block;
                     text-align: center;
                     margin: 0 auto 10px auto;
                     border-radius: 50%;
                     background-color: white;
                 }
                 .progressbar li:after {
                     width: 100%;
                     height: 2px;
                     content: '';
                     position: absolute;
                     background-color: #7d7d7d;
                     top: 15px;
                     left: -50%;
                     z-index: -1;
                 }
                 .progressbar li:first-child:after {
                     content: none;
                 }
                 .progressbar li.active {
                     color: #4A26AE;
                 }
                 .progressbar li.active:before {
                     border-color: #4A26AE;
                 }
                 .progressbar li.active + li:after {
                     background-color:  #4A26AE;
                 }
                 .wrapper {
                   text-align: center;
               }

               body {
                 background-color: #fffff;
                font-family: "Roboto", sans-serif;
               }

               #regForm {
/*                 position: relative;
                 float: right;
                 display: inline-block;
                 z-index:1;
                 background: #F0EEF1;
                 width: 250px;
                 content: inherit;
                
                 margin-right: 15%;
                 margin-left: 20%;
                 margin-top: 5%; 
                 margin-bottom: 25%;
                 padding: 5%;
                 text-align: center;
                 box-shadow: 0 15px 25px 0 rgba(0, 0, 0, 0.22), 5px 5px 5px 0 rgba(0, 0, 0, 0.24);
                 border-radius: 25px;               */
                    position: relative;
                     z-index: 1;
                     background: #F0EEF1;
                     max-width: 70%;
                     margin: 5% 10% 25% 35%;
                     padding-left: 20px;
                     padding-right: 20px;
                     padding-bottom: 20px;
                     padding-top: 5px;
                     text-align: center;
                     box-shadow: 0 15px 25px 0 rgba(0, 0, 0, 0.22), 5px 5px 5px 0 rgba(0, 0, 0, 0.24);
                     border-radius: 25px;
               }
               
               

               h1 {
                 text-align: center;  
               }

               input {
                 padding: 10px;
                 width: 50%;
                 font-size: 17px;
                font-family: "Roboto", sans-serif;
                 border: 1px solid #aaaaaa;
                 background-color:#E3DFEE;
                text-align: center;
                border-radius: 5px;
               }

               /* Mark input boxes that gets an error on validation: */
               input.invalid {
                 background-color: #ffdddd;
               }
               button {
                 background-color: #4A26AE;
                 color: #ffffff;
                 border: none;
                 padding: 10px 20px;
                 font-size: 17px;
                font-family: "Roboto", sans-serif;
                 cursor: pointer;
                 border-radius: 5px;
                text-align: center;
               }

               button:hover {
                 opacity: 0.8;
               }
        </style>
    
</head>

<body>

    <div class="welcome_container">
        <h3 style="color: #ffffff; padding: 20px 0px 0px 20px; margin: 0px 0px 0px 0px; font-family: Verdana, sans-serif" >Top-up: Your number</h3>
    </div>
                
    <div class="sidenav">
        <a href="cabinet.php"><i class="square" ></i>Main Page</a>
                    <a href="package.php"><i class="square" ></i>Package</a>
                    <a href="#"><i class="square" ></i>Usage</a>
                    <a href="topup-number.php"><i class="square" ></i>Top-up</a>
                    <a href="#"><i class="square" ></i>FAQ</a>
                    <a href="#"><i class="square" ></i>Chat with us</a>
                    <a href="locations.php"><i class="square" ></i>Find stores</a>
                    <a href="#"><i class="square" ></i>Log out</a>

    </div>
    
    <form id="regForm" action="topup-package.php" method="post">
            <div class="container">
                <ul class="progressbar">
                    <a href="topup-number.php"><li class="active">number</li></a>
                    <li>package</li>
                    <li >basket</li>
                    <li>payment</li>
                </ul>
                </div>
                
            <div class="table" style="text-align: center;">
                <h4 style="text-align: center; color: #393035;">Your phone number:</h4>
                <p><input name="phone" type="text" placeholder="+358 XX XXX XX-XX" /></p>
                
                <?php 
//                    $buttonclick = $_POST["submit"];
        
                    if(isset($buttonclick)) {
            
                        $user = checkuser(); 
                        
                        if ($user != NULL ){
                            $userphone = $_POST["phone"];
            //                session_start();
            //                $_SESSION['phone'] = $userphone;
            //                session_abort();
            //               
            //                header('Location: topup-package');
                        } else { ?>
                        
                <br><h4>Incorrect number. Try again</h4>
                
                <?php
                        }
                    }
                ?>
                
            </div>
                
            <div class="wrapper">
            <div><button type="submit" name="submit">Select</button></div>
            </div>
        </form>
    
</body>

</html>