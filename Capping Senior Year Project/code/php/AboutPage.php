<?php
session_start();
?>

<html>
    <title>ACME About</title>
 
    
    <header>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/AboutPage.css">
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
        <script type="text/javascript" src="../js/Script.js"></script> <!--Links Script.js to this page-->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes Page Responsive -->
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">        
    </header>
    
    <body>
        
        <header class="topnav" role="banner">
            
            <nav class="topnav container" role="navigation">
                
                <div id="main">
                    <!--<span style="font-size:30px;cursor:pointer;" align=left onclick="openNav()">&#9776;</span>-->
                    <img src="../../assets/ACMElogo.png" alt="ACMElogo" style="width:100px;height:83px"></img>
                </div>
                
                
                <div id="myTopnav" class="topnav-list">
                    <a href="guestSearch.php">Home
                        <span class="fa fa-home"></span>
                    </a>
                    <a href="SSO.php">Login
                        <span class="fa fa-unlock-alt"></span>
                    </a>
                </div>
                <hr id="topHR" noshade>
                <hr id="topHR" noshade>
                
                
            </nav>
    
        </header>
            <div class="aboutInfo">
                <div class="body1" style="border: 1px solid #f44336">
                    <h2>About ACME</h2><br>
                    ACME is a company for the purpose of our capping project.
                    <br><br>
                    <h4>Contact Us:</h4>
                    contact@acme.com
                    <br><br>
                    <button class="media" id="mail" onclick="location.href='mailto:webmaster@example.com';"><span class="fa fa-envelope-o" style="font-size: 20px;"></span></button>
                    <button class="media" id="fb" onclick="location.href='https://www.facebook.com/ACMECapping/';"><span class="fa fa-facebook-square" style="font-size: 20px;"></span></button>
                    <button class="media" id="tweet" onclick="location.href='https://twitter.com/ACMECapping/';"><span class="fa fa-twitter" style="font-size: 20px;"></span></button>
                </div>
                <div class ="body2">
                    <img src="../../assets/ACMElogo.png"></img>
                </div>
            </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-contact">
                <h4>Contact</h4>
                <a href="">contact@acme.com</a>
            </div>
        </div>
        
    </body>
    
        
</html>
<style>

    .media {
        cursor: pointer;
    }

</style>
