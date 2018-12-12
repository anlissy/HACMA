<?php

session_start();

$watestdb = new PDO('mysql:host=localhost:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');

$packagesSelect = "SELECT package_name FROM Package";
$packageRecord = $watestdb->query($packagesSelect);


//mysqli_close($con);

$userphone =$_SESSION["phone"];
$userSelect = "SELECT user_phone FROM User WHERE user_phone='".$userphone."';";
$userRecord =$watestdb->query($userSelect);


$userBalanceSelect = "SELECT user_balance FROM User WHERE user_phone='".$userphone."';";
$userBalanceRecord = $watestdb->query($userBalanceSelect);

for($i = 0; $i < $userBalanceRecord->rowCount(); $i++) {
    $row = $userBalanceRecord->fetch();
    $balance = $row["user_balance"];
}

//var_dump($package);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Choose Package </title>
        <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table {
                 
                 width: 100%;
                 background-color: #f2f2f2;
                 text-align: center;
                 border-collapse: collapse;


               }
               table td, th {
                
                padding: 5px 5px 5px 5px;
                text-align: left;
                width: 400px;
                }
               
               
                .container {
                     width: 100%;   
                     padding-bottom: 10px;
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
                     background-color: #4A26AE;
                 }
                 .wrapper {
                   text-align: center;
               }

               body {
                 background-color: #fffff;
                font-family: "Verdana", sans-serif;
               }

               #regForm {
                   
                 position: relative;
                 float: right;
                 display: inline-block;
                 z-index: 0;
                 background: #f2f2f2;
                 max-width: 100%;
                 margin: 10% 15% 20% 29%;
                 padding: 20px;
                 text-align: center;
                 box-shadow: 0 15px 25px 0 rgba(0, 0, 0, 0.22), 5px 5px 5px 0 rgba(0, 0, 0, 0.24);
                 border-radius: 25px;    
               }

               h1 {
                 text-align: center;  
               }
                .textstyle
               { padding: 10px;
                 width: 70%;  
                border-radius: 5px;
                 background-color:#E3DFEE;
                text-align: center;
                
                
               }
               input {
                 padding: 10px;
                 width: 90%;
                 font-size: 17px;
                 font-family: "Vernada", sans-serif;
                 border-radius: 5px;
                 background-color:#E3DFEE;
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
                 font-family: "Vernada", sans-serif;
                 cursor: pointer;
                 border-radius: 5px;
               }

               button:hover {
                 opacity: 0.8;
               }
               
               .square {
                    width: 16px;
                    height: 16px;
                    background: #4A26AE;
                    border-radius: 5px 5px 5px 5px;
                    margin-top: 10px;
                    margin-left: 10px;
                    margin-right: 10px;
                    padding-left: 15px;
                    padding-right: 15px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                }
                
/*                select:hover {
                    background-color: #4A26AE;
                }
                */
                option:hover {
                    background-color: #E3DFEE;
                }
                 option:active {
                    background-color: #F0EEF1;
                }


        </style>
    
    </head>
    
    
    <body>
        
        <div class="welcome_container">
            <h3 style="color: #ffffff; padding: 20px 0px 0px 20px; margin: 0px 0px 0px 0px; font-family: Verdana, sans-serif" >Top-up: Select your package</h3>
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
        
        
        
        <form id="regForm" action="topup-basket.php" method="post" >
            <div class="container">
            <ul class="progressbar">
                <li >number</li>
                <li class="active" >package</li>
                <li>basket</li>
                <li>payment</li>
            </ul>
                
            </div>
            
            <div class="table" style="text-align: center;">
                <table>
                    <tr>
                        <td colspan="2">

                            <div style="text-align:center; font-weight: 700;padding-left:2px; margin-top: 30px;"> Your phone number: </div>  
                            <div align="center"> <p class="textstyle" > 
                                <?php
                                
                                    foreach($userRecord as $user) {
                                        $sendUserPhone= $user["user_phone"];
                                        echo  $user["user_phone"] ;
                                        
                                    }
                                    echo "<input type=\"hidden\" name=\"phone\" value=".$sendUserPhone.">";  
                                ?>
                            </p></div>
                            
                        </td>
                            
                       
                        
                        <td colspan="2">
                            <div style="text-align:center; font-weight: 700;padding-left:2px; margin-top: 30px;"> Your balance: </div>  
                             
                             <?php
                                    echo "<div align=\"center\"><p class=\"textstyle\">" . $balance . "</p></div>";
                                
                            ?>
                            
                          
                        </td>
                    </tr>
                     
                </table>
                
                 <br/>
                            <select  multiple name="choosePackage" style="font-size: 15px; font-family: Verdana; width: 25%; border: double #4A26AE ;">
                            <?php
                                $i=1;
                                
                                while ($package = $packageRecord->fetch()) {
                                    
                                        echo  "<option style=\"padding:5px; \" value=".$i++.">"  . $package[0] . "</option>";

                                }
                            ?>
                            </select>
                        
                            <button type="submit" name="submit" value="submit">Choose</button> 
                        

            </div>
        </form> 
        
        
        
       

    
    </body>
</html>