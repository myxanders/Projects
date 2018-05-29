<?php
include("session.php");
include("nav_check.php");
?>

<html>
    
<title>Error Redirect</title>

<?php
//    $db_connection = pg_connect("host=10.10.7.168 dbname='Corporate_Directory' user=postgres password=password");
//    
//if (!$db_connection) {
//    die("Connection failed: ");
//
?>

<head>
     <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
    <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
    <script type="text/javascript" src="../js/ProfilePage.js"></script> 
    <script type="text/javascript" src="../js/Script.js"></script> <!--Links Script.js to this page-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">    
</head>

<body>
    

    
	
    <!-- Search form -->
	
    <div id="main" class="main" align="center" style="margin-top:10%; -webkit-text-stroke-color:black; -webkit-text-stroke-width:1px;">
        
        <h1 style="color:#f44336;">Error!</h1>
		<br>
		<h2 style="color:white;">You do not have access to this page. Try something else.</h2>

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
    .search {
        padding: 20px;
        width: 40%;
    }

    #searchby {
        width: 12%;
        padding: 17px;
        border-radius: 7px;
        font-size: 18px;
        border-width: 2px;
        border-color: #555555;
        cursor:pointer;
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
