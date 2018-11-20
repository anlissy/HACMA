<?php

$watestdb = new PDO('mysql:host=localhost:8889;dbname=HACMA', 'WATestUser1', 'WATestPwd1');

$packagesSelect = "SELECT package_name FROM Package";
$packageRecord = $watestdb->query($packagesSelect);


//mysqli_close($con);

$userphone = $_POST["phone"];
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
    </head>
    
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
    .inputGroup {
    background-color: #fff;
    display: block;
    margin: 10px 0;
    position: relative;

    label {
      padding: 12px 30px;
      width: 100%;
      display: block;
      text-align: left;
      color: #3C454C;
      cursor: pointer;
      position: relative;
      z-index: 2;
      transition: color 200ms ease-in;
      overflow: hidden;

      &:before {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        content: '';
        background-color: #5562eb;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%) scale3d(1, 1, 1);
        transition: all 300ms cubic-bezier(0.4, 0.0, 0.2, 1);
        opacity: 0;
        z-index: -1;
      }

      &:after {
        width: 32px;
        height: 32px;
        content: '';
        border: 2px solid #D1D7DC;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
        background-repeat: no-repeat;
        background-position: 2px 3px;
        border-radius: 50%;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        transition: all 200ms ease-in;
      }
    }

    input:checked ~ label {
      color: #fff;

      &:before {
        transform: translate(-50%, -50%) scale3d(56, 56, 1);
        opacity: 1;
      }

      &:after {
        background-color: #54E0C7;
        border-color: #54E0C7;
      }
    }

    input {
      width: 32px;
      height: 32px;
      order: 1;
      z-index: 2;
      position: absolute;
      right: 30px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      visibility: hidden;
    }
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
       
        z-index:1;
        background: #F0EEF1;
        max-width: 100%;
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
    .textstyle
   { 
     padding: 10px;
     width: 50%;  
    border-radius: 5px;
     background-color:#E3DFEE;
    text-align: center;	
    align-items: center;
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

        
    </style>
    
    <body>
        
        <div class="welcome_container">
            <h3 style="color: #ffffff; padding: 20px 0px 0px 20px; margin: 0px 0px 0px 0px; font-family: Verdana, sans-serif" >Top-up: Select your package</h3>
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
        
        
        <form id="regForm" action="topup-basket.php" method="post">
            <div class="container">
            <ul class="progressbar">
                 <a href="topup-number.php"><li >number</li></a>
                    <a href="topup-package.php"><li  class="active" >package</li></a>
                    <li >basket</li>
                    <li>payment</li></a>
            </ul>
                
            </div>
            
            <div class="table" style="text-align: center;">
                <table>
                    <tr>
                        <td colspan="2">

                            <div style="text-align:center; font-weight: 700;padding-left:2px;"> Your phone number: </div>  
                            <div align="center"> <p class="textstyle" > 
                                <?php
                                
                                    foreach($userRecord as $user) {
                                        $sendUser= $user["user_phone"];
                                        echo  $user["user_phone"] ;
                                        
                                    }
                                    echo "<input type=\"hidden\" name=\"phone\" value=".$sendUser.">";  
                                ?>
                            </p></div>
                            
                            </td>
                            
                       
                        
                        <td colspan="3">
                            <div class="wrapper" style="text-align:center; font-weight: 700; padding-left:2px;"> Your balance:  </div> 
                             <?php
                                    echo "<div align=\"center\"><p class=\"textstyle\">" . $balance . "</p></div>";
                                
                            ?>
                            
                          
                        </td>
                    </tr>
                <tbody>
                    
<!--                        <td>
                            <h4> Deposit money</h4>
                            <div class="wrapper">
                            <p> Write below specified amount of value to your number account</p>
                            <p> <input placeholder="35,90$"> </input> </p>
                            <button type="button">Choose</button></div>
                       </td>-->
                <tr>    
                <td colspan="3">
                           
                            <?php
//                            while($package = $packageRecord->fetch()) {
//                                echo $package[0];
//                            }
                                $i=1;
                                echo    "<select multiple name=\"choosePackage\">";
                                while ($package = $packageRecord->fetch()) {
////                                    
                                    
                                        echo  "<option value=".$i++.">"  . $package[0] . "</option>";
//                                    
//                                    
                                }
//                                
                                echo    "</select>";
                            
                            ?>
                    
                    <button type="submit" name="submit" value="Submit">Choose</button>         
                    </td>
                    </tr>
                </tbody>
                </table>
               
            </div>
            
        </form>
        
       

    
    </body>
</html>