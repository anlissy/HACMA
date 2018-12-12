<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Top-up completed</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="cabinet_style.css">
        <style>
        table {
            
            width: 100%;
            background: #f2f2f2;
            text-align: center;
            border-collapse: collapse;

            }
    
    table td, table.PackageTable th {
     border: 0px solid #F0EEF1;
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
/*                 align-content: center;*/
                 display: inline;
                 z-index:1;
                 background: #f2f2f2;
                 max-width: 100%;
                 margin: 15% 32% 25% 17%;
                 padding: 20px 20px 20px 20px;
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
     font-family: Raleway;
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
        
        <div id="regForm">
        
        
            
        <h3 style="color:#4A26AE; text-align:center; padding-top: 10px;">Thank you!</h3>
        <h5>Here is the details of your purchase:</h5>
        
    
        
        
<?php
$watestdb = new PDO('mysql:host=localhost:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');


$card = $_SESSION["rightcard"];
$cvc = $_SESSION["cvc"];
$phone = $_SESSION["phone"];
$userID = $_SESSION["userid"];
$packageNameName = $_SESSION["packagename"];
$checkoutPrice = $_SESSION["totalprice"];


$cardAmountSelect = "SELECT card_amount FROM payment WHERE card_number='" . $card . "';";
$cardRecord = $watestdb->query($cardAmountSelect);


foreach ($cardRecord as $value) {
    $cardAmount = $value["card_amount"];
}

echo "Your number: ". $phone . "<br>";


$currentCardAmount = $cardAmount - $checkoutPrice;

try {
    $currentCardAmountUpdate = "UPDATE payment SET card_amount=" . $currentCardAmount . " WHERE user_id=" . $userID . "";

    // Prepare statement
    $updateCard = $watestdb->prepare($currentCardAmountUpdate);

    // execute the query
    $updateCard->execute();

    // echo a message to say the UPDATE succeeded
    echo "<br>You have completed " .  $updateCard->rowCount() . " purchase: ";
    
} 
catch (PDOException $e) {
    echo $currentCardAmountUpdate . "<br>" . $e->getMessage();
}



try {
    $currentPackageUpdate = "UPDATE user SET user_package='" . $packageNameName . "' WHERE user_id=" . $userID . ";";

    // Prepare statement
    $updatePkg = $watestdb->prepare($currentPackageUpdate);

    // execute the query
    $updatePkg->execute();

    // echo a message to say the UPDATE succeeded
    echo $updatePkg->rowCount() . ". " . $packageNameName. "<br>";
    
} catch (PDOException $e) {
    echo $currentPackageUpdate . "<br>" . $e->getMessage();
}

?>
        </div>
    </body>
</html>