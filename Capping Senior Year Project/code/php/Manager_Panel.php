<?php
include('session.php');
include('nav_check.php');
include('manager_check.php');
?>

<html>

    <title>ACME Manager Duties</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/Admin.css">
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
        <script type="text/javascript" src="../js/Script.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes Page Responsive -->
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">        
    </head>
    
    
    <body>

    
        <div class="adminHead" align=center style="font-size: 45px; margin-top:150px; color:white;">Manager Control Panel</div>
        <div class="containerApps" align=center>
            <h1> Choose an Action to Perform </h1>
            <hr style="border-top:1px solid darkred;">
                 
               <button class="app" onclick="window.location.href='Manager.php'">
					<img padding="10px" src="../../assets/key.png"><br><br>Manage Access Requests</img>
				</button>

				<button class="app" onclick="window.location.href='reportsTo.php'">
					<img padding="10px" src="../../assets/team.png"><br><br>Your ACME Team</img>
				</button>

                <div class="clear"></div>

        </div>
		
		<div style="position:fixed; bottom:0; right: 0; width: 100px; float:right;">
            
            <a href="https://icons8.com"><font color=grey size="1">All Icons credited to icons8.com.</font></a>
        
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-contact">
                <h4>Contact</h4>
                <a href="">contact@acme.com</a>
            </div>
            <div class="footer-apps">
                <h4>Applications</h4>
                <a href="AccessDenied.php">Salesforce.com</a><br>
                <a href="AccessDenied.php">Artifactory</a><br>
                <a href="AccessDenied.php">Teamcity</a><br>
                <a href="AccessDenied.php">Outlook</a><br>
                <a href="AccessDenied.php">Skype for Business</a><br>
                <a href="AccessDenied.php">Assest Management</a>
            </div>
        </div>
    </body>

</html>

<style>
    .appHead {
        -webkit-text-stroke-color: black;
        -webkit-text-stroke-width: 1px;
        margin-bottom: -7.5%
    }

    .app {
        width: 300px;
        height: 185px;
        background-color: #f44336;
        color: white;
        border: 2px solid #f44336;
        border-radius: 8px;
        padding: 50px;
        transition-duration: 0.4s;
        margin: 5px;
        cursor: pointer;
        box-shadow: 5px 5px 3px black;
    }
    
    .appcontainer {
        max-width: 50%;
        margin-left: 25%;
        margin-bottom: 5%;
    }
</style>
