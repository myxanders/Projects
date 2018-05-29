<?php
 //Ensure db connection and begin session
include("session.php");
include("nav_check.php");
?>

<html>
    
<title>ACME Search</title>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
    <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
    <script type="text/javascript" src="../js/ProfilePage.js"></script> 
    <script type="text/javascript" src="../js/Script.js"></script> <!--Links Script.js to this page-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    

    
	
    <!-- Search form -->
	
    <div id="main" class="main" align="center" style="margin-top:130px;">
        
        <strong><h1 style="margin-top: 5%; -webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white;">Welcome to the ACME employee database!</h1></strong><br>
        <h3 style="margin-top: -1%; -webkit-text-stroke-color: black; -webkit-text-stroke-width: .25px; color:white; font-size: 15px;">Search the directory to find ACME Employees!</h3><br>
        <form method="post" action="SearchResults.php?go" id="searchform" style="margin-top: 2%;">
                <input name="name" class="search" type="text" placeholder="&#128269; Search employees by name, position, or location">
                <select name="searchby" id="searchby">
                    <option value="by_name">Name</option>
                    <option value="by_position">Position</option>                    
                    <option value="by_dept">Department</option>
                    <option value="by_location">Location</option>
                </select>
                <button class="short" type="submit" name="submit">
                    <span class="fa fa-search"></span> Search
                </button>
        </form>

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

    h1 {
        -webkit-text-stroke-color:black;
        -webkit-text-stroke-width:0.5px;
    }
    .search {
        padding: 20px;
        width: 40%;
    }

    #searchby {
        width: 12%;
        /*padding: 17px;*/
        border-radius: 7px;
        font-size: 18px;
        border-width: 2px;
        border-color: #555555;
        cursor:pointer;
        height: 66px;
    }
    
    .short {
        padding: 20px;
        width: 140px;
        cursor: pointer;
    }

    
    .main {
        margin-bottom: 13%;
    }
</style>
