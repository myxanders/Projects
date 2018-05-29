<?php
//Ensure database connection and make sure the navbar only displays what the user should see given their TID
include("session.php");
include("nav_check.php");
?>
<html>

    <title>ACME Access Denied</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/AccessDenied.css">
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
        <div id="allContent" style="margin-top: 130px;">
            <div id="main" class="main" align="center" style="margin-top:7%;">
                <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white;">ACCESS DENIED</h1>
                <h2 style="color:white;-webkit-text-stroke-color: black; -webkit-text-stroke-width: .5px;">It appears you do not have access to this application...</h2>
            </div>

            <div id="message" align="center">
                <h2 id="applyAccess">Apply for access down below.</h2>
                <form method="post" action="AccessRequest.php?go" id="accessForm">
                    
                    <div class="styled-select blue semi-square">
                        <select name="desiredApp" id="desiredApp" required="">
                            <option value="" color="white;" disabled selected>Pick an application</option>
                            <option value='Skype'>Skype</option>
                            <option value='Salesforce'>Salesforce</option>
                            <option value='Assets'>Assets Management</option>
                            <option value='Outlook'>Outlook</option>
                            <option value='Teamcity'>Teamcity</option>
                            <option value='Artifactory'>Artifactory</option>
                        </select>
                    </div>
                    
                    <div class="inputAndButton">
                        <!-- USE $_SESSION['login_user'] INSTEAD OF HAVING THE USER INPUT MANUALLY -->
                        <textarea class="inputDescription" type="text" placeholder="Enter why you would like access to this application..." name="descAcc"></textarea>
                        <button class="buttonAccess" type="submit" name="submitAcc">Submit</button> <br> <br>
                    </div>
                </form>
            </div>
        </div>
    
        <!-- Footer -->
        <div class="footer">
            <div class="footer-contact">
                <h4>Contact</h4>
                <a href="">contact@acme.com</a>
            </div>
            <div class="footer-apps">
                <h4>Applications</h4>
                <a href="app_check.php?id=1">Skype for Business</a><br>
                <a href="app_check.php?id=2">Salesforce.com</a><br>
                <a href="app_check.php?id=3">Assets Management</a><br>
                <a href="app_check.php?id=4">Outlook</a><br>
                <a href="app_check.php?id=5">Teamcity</a><br>
                <a href="app_check.php?id=6">Artifactory</a>
            </div>
        </div>
        
    </body>

</html>

<style>
    .inputAccess {
        padding: 2%;
        margin-right: 2%;
        width: 67%;
        
    }
    
    .buttonAccess {
        margin-top: 2%;
        padding: 2%;
        width: 17%;
        cursor: pointer;
    }

    .inputAndButton {
        margin-bottom: -8%;
    }
	
	.footer {
		position: relative;
	}
</style>
