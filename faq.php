<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>FAQ</title>
          <link rel="stylesheet" type="text/css" href="cabinet_style.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <style>
             body{
  margin: 0;
} 
.wrapper{
  min-height: 100vh;
  background: white;
  display: flex;
  flex-direction: column;
  border-radius:10px;
}
.header{
  height: 50px;
  background: #482ea7;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  font-family:Arial Black;
  font-size:18px; 
  text-align: start;
  padding-left: 50px ;
  padding-top: 15px;
  color:white;
}
.content {
  flex: 1;
  background: white;
  display: flex;
  color: black;
}
#FAQ{
   text-align:center;
   padding:20px;
   font-size: 30px;
  font-family: "Verdana", sans-serif;
   color:#4A26AE;
   
   margin: 10px;
}
.Content-header {
   text-align: center;
   padding-top: 25 px;
   font-family: "Verdana", sans-serif;
   color:#4A26AE;
   font-size: 20px;
   margin: 20px;
   
}
.columns{
  display: flex;
  flex: 1;
}
.main{
  flex: 1;
  background: white;
  margin-left: 17.5%;
}
.main section { 
   box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.22),  5px 5px 5px 0 rgba(0, 0, 0, 0.24);;
  border-radius: 10px;
   background: #f2f2f2;
}



aside.sidebar {
   padding-top: 40px;
   border-radius:10px;
   width: 20%;
   background: #E4E7E9;
   weight:40px;
   display:block;
   position:fixed;
}


.sidebar a {
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  font-size: 17px;
  font-weight: bold; 
  
}
/* Change color on hover */
.sidebar a:hover {
  background-color: #ddd;
  color:#482ea7;
  text-decoration: underline;
}

.square {
  width: 16px;
  height: 16px;
  background: #482ea7;
  border-radius: 5px 5px 5px 5px;
  margin: 10px;
  padding-left: 15px;
  padding-right: 15px;
  padding-top: 5px;
  padding-bottom: 5px;
}
li.button-dropdown::before {content: "\25AA"; color: #482ea7;
  display: inline-block; width: 1em;
  margin-left: -1em;
  font-size: 140%;
}

#Other-services{
   padding: 10px 20px 30px 20px;
   margin:  20px 20px 5px 20px;
   
}
#User-Access{
   margin : 30px 20px 0px 20px;
   padding: 10px 20px 30px 20px;
}
.b li {
    display: block;
    list-style: none;
    
}
.b .button-dropdown {
    position: relative;
}

.b li a{
   background-color: #f2f2f2;
   color: #1a1919; 
}
.b li a li.dropdown-toggle {
   background-color: #f2f2f2;
   color: #482ea7; 
}
.b li .dropdown-menu {
    display: none;
    position: relative;
    left: 0;
    padding: 0;
    margin: 0;
    margin-top: 3px;
    text-align: justify;
}
.answer{
   text-decoration:none;
}

.heading{
    font-family: Verdana, sans-serif; 
    font-size: 30px;
    color: #1a1919; 
    padding: 0px 0px 0px 0px;
    margin: 7% 0px 0px 0%;
    text-align: center;
   
}

hr {
    background-color: #4A26AE;
    height: 2px;
    width: 4.5%;
    align-content: center;
    margin-top: 1%;
}

.logo {
  align-items: baseline;
}
 
              
          </style>
    </head>
    <body>
        <script type="text/javascript" src="faqjs.js"></script>
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
                    <a href="usage.php"><i class="square" ></i>Usage</a>
                    <a href="topup-number.php"><i class="square" ></i>Top-up</a>
                    <a href="faq.php"><i class="square" ></i>FAQ</a>
                    <a href="chatmain.php"><i class="square" ></i>Contact us</a>
                    <a href="locations.php"><i class="square" ></i>Find stores</a>
                    <a href="userlogin.php"><i class="square" ></i>Log out</a>
                    <br><br><br><br>
                    
                    <!-- LOGO IN TABLE-->
                    <table class="logo" style="width:100%">
                    <tr>
                    <td style="width:30%"><img src="img/hacmalogopurple.png" style="border-radius: 50%; margin: 15px;"></td>
                    <td style="width:70%"><b style="text-align: left; font-size:20px;">HACMA</b></td>
                    </tr>
                    </table>
                    
                 </div>
                
                
                <!-- FAQ CONTENT-->
                 <!-- FAG-PAGE-->
         
         <main class="main">
             <p class="heading">FAQ</p>
             <hr>
            <section id="User-Access">
               <div class="Content-header">User Access</div>
         <ul class ="b">
             <li class="button-dropdown">
                <a href="#" class="dropdown-toggle">
                      <strong> How can I gain access to my phone information?</strong>
                </a>
                  <ul class="dropdown-menu">
                     <li>
                        <a>
                        You have to enter your number at the login page and wait for a confirmation code sent to your phone number then enter the code to start looking up your phone information.            
                        </a>
                    </li>
                 </ul>
            </li>
            <li class="button-dropdown">
                <a href="#" class="dropdown-toggle">
                        <strong>Is it safe to enter my phone number ?</strong>
                </a>
                  <ul class="dropdown-menu">
                     <li>
                        <a>
                            Absolutely ! Your phone number data is securely stored on our server with high security protection. No one, even us has the right to exploit the information. It is only be acquired by us in some emergency cases or it is related to laws.
                        </a>
                    </li>
                 </ul>
            </li>
            <li class="button-dropdown">
                <a href="#" class="dropdown-toggle">
                        <strong>Cannot receive confirmation code ?</strong>
                </a>
                  <ul class="dropdown-menu">
                     <li>
                        <a>
                         A: Please following below procedures kindly :<br>
                            + Double check your phone number again.<br>
                            + Check you connection, there might be a loss in internet connection.<br>
                            + If above-mentioned steps did not help you, please kindly email our support via this email: <i>support.HACMA@gmail.com</i> or you can contact customer service center via <i>+358403720334</i>.
                        </a>
                    </li>
                 </ul>
            </li>
            <li class="button-dropdown">
                <a href="#" class="dropdown-toggle">
                        <strong>Supported SMS Countries ?</strong>
                </a>
                  <ul class="dropdown-menu">
                    <li>
                        <a>
                         Right now we only support phone number come from Finland carriers which have the intial numbers is<i>+358</i>. Other countries SMS support will come in the future. We will inform you as soon as possible but you need to register for our newsletter in the website of our company.
                        </a>
                    </li>
                 </ul>
            </li>
             <li class="button-dropdown">
                <a href="#" class="dropdown-toggle">
                        <strong>The information the app gives does not match with the information of my phone number? </strong> 
                </a>
                  <ul class="dropdown-menu">
                     <li>
                        <a>
                         Make sure you the information you compared to what us gives is an reliable source. We retrieve these data directly from the carrier database. There is little chance that they are incorrect. In case it is truly incorrect, the problem might come from your carrier databas, then you have to contact them for more information.    
                        </a>
                    </li>
                 </ul>
            </li>
      </ul>
          <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    </section>
        <section id="Other-services">
               <div class="Content-header">Other services</div>
                  <ul class ="b">
                     <li class="button-dropdown">
                        <a href="#" class="dropdown-toggle">
                            <strong> I use the top-up service from your application but I am scared that my bank information will be stolen ? </strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                        <a>
                            A: Dont worry ! Your bank credentials is safely stored on your local client, all we do is to connect your infor with payment system providers such as Visa or Mastercard using their API. After the payment, please kindly delete the cookies in your devices or simply do not allow our application or browser to save the cookie.
                        </a>
                     </li>
                  </ul>
              </li>
                     <li class="button-dropdown">
                <a href="#" class="dropdown-toggle">
    <strong> How long does it take for my topped-up amount to be verifed and transfered to my account ? </strong></a>
                  <ul class="dropdown-menu">
                     <li>
                        <a href >
                       It is going to take a few business days if you using bank transfer depends on which day you do it, but for card payment it only takes a few minutes. 
                        </a>
                    </li>
                 </ul>
           </li>
                  </ul>
               <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            </section>
         </main>
      </div>
   </section>
</div>
                
              
                
                
                
             </form>
          
             </div>   
              
    </body>
</html>

