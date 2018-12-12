<?php
session_start();

$watestdb = new PDO('mysql:host=localhost:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');
                            
$phone = $_POST["phone"];
$packageName= $_POST["packagename"];
$packagePrice = $_POST["packageprice"];
$totalprice = $_POST["totalprice"];


$userSelect="SELECT user_id FROM user WHERE user_phone='". $phone . "';";
$userRecord=$watestdb->query($userSelect);
foreach($userRecord as $user) {
    $userid= $user["user_id"];
}

$userCardSelect = "SELECT card_number FROM payment WHERE user_id=". $userid . ";";
$userCardRecord = $watestdb->query($userCardSelect);
foreach($userCardRecord as $cardRecord) {
    $userCard= $cardRecord["card_number"]; 
}

$userCardcvcSelect = "SELECT card_cvc FROM payment WHERE user_id=". $userid . ";";
$userCardcvcRecord = $watestdb->query($userCardcvcSelect);
foreach($userCardcvcRecord as $cardcvcRecord) {
    $userCardcvc= $cardcvcRecord["card_cvc"];
}

$_SESSION["rightcard"] = $userCard;
$_SESSION["cvc"] = $POST["cvc"];
$_SESSION["packagename"] = $packageName;
$_SESSION["totalprice"] = $totalprice;
$_SESSION["userid"] = $userid;
$_SESSION["phone"] = $phone;

//current valid date vs given date to timestamp

$currentdate = date("Y-m-d");
$currentdatetotimestamp = strtotime($currentdate);
$month = $_POST["month"];
$year = $_POST["year"];
$defaultday = "30";
$fullgivendate = $year."-".$month."-".$defaultday;
$fullgivendatetotimestamp = strtotime($fullgivendate);
    
?> 

<?php
if (isset($_POST['submit2'])) 
{
    $errormessage= '';
    if ($_POST["card"] != null AND $_POST["cvc"] != null AND $_POST["month"] != null AND $_POST["year"] != null) //if all require fields are filled
    { 
        if ($_POST["card"] == $userCard AND $_POST["cvc"] == $userCardcvc) // if card is valid -> check date
        { 
            if (checkdate($month, $defaultday, $year) == true && $fullgivendatetotimestamp >= $currentdatetotimestamp) // if given date is valid and bigger or equal to current date
            { 
                header('Location: topup-thank.php'); 
                exit();
            }
            else  
            {
                $errormessage = "<h5 style=\"color:red;\">*Invalid date</h5>";
            }
        } else {  //if the card is not valid

            $errormessage = "<h5 style=\"color:red;\">*Card information is incorrect</h5>";
        }
    } else {
        $errormessage= "<h5 style=\"color:red;\">*Please fill in all required fields</h5>";
    }
} else if (isset($_POST["cancel"])) {
    //echo "<script type=\"text/javascript\">document.location = 'topup-number';</script>";
    header('Location: topup-number.php');
    exit();
}
?>                   


<!DOCTYPE html>
<html>
    <head>
        <title>Choose Package </title>
        <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <style>
        table {
            border: 10px solid #f2f2f2;
            width: 100%;
/*            background-color: #FFFFFF;*/
            text-align: center;
            border-collapse: collapse;
            
            }
    
    table td, th {
     border: 0px solid whitesmoke;
     padding: 5px 5px;
     
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
    font-family: "Verdana", sans-serif;
   }

 
    #regForm {
                   
                 position: relative;
                 float: right;
                 display: inline;
                 z-index:1;
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
     width: 40%;  
   border-radius: 5px;
     background-color:#E3DFEE;
    text-align: center;		
   }
   input {
     padding: 10px;
     width: 50%;
     font-size: 17px;
     font-family: Raleway;
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

    </style>
    
    <body>
        
        <div class="welcome_container">
        <h3 style="color: #ffffff; padding: 20px 0px 0px 20px; margin: 0px 0px 0px 0px; font-family: Verdana, sans-serif" >Top-up: Payment</h3>
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
        
        <form action="topup-payment.php" method="POST" id="regForm">
            <div class="container" style="padding-bottom: 10px">
                <ul class="progressbar">
                    <li >select</li>
                    <li >products</li>
                    <li >basket</li>
                    <li class="active">payment</li>
                </ul>
            </div>
            <br><br><br>
            <img src="img/card.png" alt="card" width="50%" align="middle" style="margin-top: 30px;">
            <div class="tab"style="margin:20px">
                
                <table>
                    
                    <tr>
                        <td colspan="2">
                            
                            <div style="text-align:left; font-weight: 700;padding-left:10px;"> Card number <span style="color:red;">*</span></div>
                            <input style="width:200px;" name="card" placeholder="5555 5555 5555 5555"/>
                        </td>
                        <td colspan="2">
                            <div style="text-align:left; font-weight: 700;padding-left:10px;">Name on card </div>
                            <input name="name"  placeholder="Hola Hola"/> 
                        </td>
                    </tr>

                    <tr>
                        
                        <td colspan="2">
                            <div style="text-align:left; font-weight: 700;padding-left:10px;"> CVC <span style="color:red;">*</span> </div>
                            <input style="width:50px;" name="cvc" placeholder="150"/> 
                            <input type="hidden" name="phone" value="<?php echo $phone;?>">
                            <input type="hidden" name="packagename" value="<?php echo $packageName;?>">
                            <input type="hidden" name="packageprice" value="<?php echo $packagePrice;?>">
                            <input type="hidden" name="totalprice" value="<?php echo $totalprice;?>">
                        </td>
                        <td>
                            <div style="text-align:left; font-weight: 700;padding-left:10px;"> Expiration Date <span style="color:red;">*</span> </div>
                            <input name="month" placeholder="01" style="width:50px;"> / 
                            <input name="year" placeholder="2019" style="width:70px;">
                            
                        </td>
                    </tr>
                </table>
                <br/>
                <div style="align-content: center">
                    <button type="submit" name="cancel" style="background-color: #ffffff; color: #393035; border: 1px solid #393035; padding: 10px 20px; font-size: 17px; cursor: pointer; border-radius: 5px;"> Cancel </button> 
                    <button type="submit" name="submit2" style="width:100px"> Pay </button>
                </div>      
                <?php
                    echo $errormessage;
                ?>
                    
                
            </div>
            
        </form>
    </body>

</html>

