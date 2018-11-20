<?php
    
$watestdb = new PDO('mysql:host=localhost:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');

$packageChosen = $_POST["choosePackage"]; 

$packageNameSelect = "SELECT package_name FROM Package WHERE package_id=". $packageChosen . "";
$packageRecord = $watestdb->query($packageNameSelect);

while($row = $packageRecord->fetch()) {  
 $packageName = $row[0];}

$packagePriceSelect = "SELECT package_price FROM Package WHERE package_id=". $packageChosen . "";
$packagePriceRecord = $watestdb->query($packagePriceSelect);

while($row = $packagePriceRecord->fetch()) {  
 $packagePrice = $row[0];}
 

$userphone = $_POST["phone"];
$userSelect = "SELECT user_phone FROM User WHERE user_phone='".$userphone."';";
$userRecord =$watestdb->query($userSelect);


//var_dump($price);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Basket</title>
        <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>

                table {
                 border: 10px solid #F0EEF1;
                 width: 100%;
                 background-color: #FFFFFF;
                 text-align: center;
                 border-collapse: collapse;


               }
               table td, th {
                border: 15px solid #F0EEF1;
                padding: 5px 5px 5px 5px;
                text-align: center;
    }
               
               table thead th {
                 font-size: 16px;
                 font-weight: bold;
                 color: #393035;
                 background-color: #F0EEF1;
                 text-align: left;
               }
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
                     background-color: #4A26AE;
                 }
                 .wrapper {
                   text-align: center;
               }

               body {
                 background-color: #fffff;
                font-family: "Roboto", sans-serif;
               }

               #regForm {
                   
                 position: relative;
                 float: right;
                 display: inline;
                 z-index:1;
                 background: #F0EEF1;
                 max-width: 100%;
                 margin: 5% 10% 25% 35%;
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
                align: center;
               }
               input {
                 padding: 10px;
                 width: 90%;
                 font-size: 17px;
                 font-family: "Roboto", sans-serif;
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
                 font-family: "Roboto", sans-serif;
                 cursor: pointer;
                 border-radius: 5px;
               }

               button:hover {
                 opacity: 0.8;
               }

        </style>

    </head>
    <body>
        <div class="welcome_container">
        <h3 style="color: #ffffff; padding: 20px 0px 0px 20px; margin: 0px 0px 0px 0px; font-family: Verdana, sans-serif" >Top-up: Your basket</h3>
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
        
        <form id="regForm" action="topup-payment.php" method="post">
            <div class="container">
                <ul class="progressbar">
                <a href="topup-number.php"><li>number</li></a>
                    <a href="topup-package.php"><li>package</li></a>
                    <a href="topup-basket.php"><li  class="active">basket</li></a>
                    <li>payment</li>
                </ul>
            </div>
            <div class="tab" style="text-align: center;">
            <table>
                <thead>
                    <tr>
                        <th colspan="4">Selected package in basket</th>
                    </tr>
                </thead>
                    <tr>
                        <td>
                            <div style="text-align:center; font-weight: 700;padding-left:2px;"> Your phone number: 
                        </td>
                        <td>
                           <?php echo "<div  class=\"textstyle\">" .$userphone. "</div>" ; ?> 
                        </td>
                        <td>
                            <div style="text-align:center; font-weight: 700;padding-left:2px;"> Price without VAT </div> 
                        </td>
                        <td>
<!--                            <div  class="textstyle"> 50$ </div>-->
                            <?php 
//                                
                                    echo "<div  class=\"textstyle\">" . $packagePrice ."€ </div>";
//                                
//                          ?>
                        </td>
                    </tr>
                <tbody>
                    <tr>
                        <td>
                            <div style="text-align:center; font-weight: 700;padding-left:2px;"> Package </div> 
                        </td>
                        <td>
                            <?php 
                            
//                                foreach($packageRecord as $package) {
//                                    
//                                            echo "<div  class=\"textstyle\">" . $package["package_name"] . "</div>";
//
//                                        
//                                    
//                                }
                            echo "<div  class=\"textstyle\">" . $packageName . "</div>";

                            ?>
                        </td>

                        <td>
                            <div style="text-align:center; font-weight: 700;padding-left:2px;"> VAT amount  </div> 
                        </td>
                        <td>
                            <div  class="textstyle"> 
                            <?php
                                $vat = $packagePrice * 10/100;
                                echo $vat;
                            ?>
                            </div>
                        </td>

                    </tr>
                </tbody>
</table>

<table>
    <tr> 
        <td><div style="text-align:center; font-weight: 700;padding-left:2px;"> Total  </div> </td>
        <td colspan="3"> 
            <div  class="textstyle"> 
                <?php echo $packagePrice + $vat;?> 
            </div>
        </td>
    </tr>
</table>

<button type="submit" name="submit" value="Submit">Go to payment</button>         

</div>

</form>

    </body>
</html>

