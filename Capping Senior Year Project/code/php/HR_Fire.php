<?php
include('session.php');
include('nav_check.php');
include('HR_check.php');
 
 $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$link) {
    dir('There was a problem when trying to connect to the host. Please contact Tech Support. Error: ' . mysql_error());    
}

$db_selected = mysqli_select_db($link, "corporate_directory");

if (!$link) {
    dir('There was a problem when trying to connect to the database. Please contact Tech Support. Error: ' . mysql_error());    
}
?>

<html>

    <title>ACME Human Resources</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/HR.css">
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
        <script type="text/javascript" src="../js/Script.js"></script>
        <script type="text/javascript" src="../js/HR.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes Page Responsive -->
    </head>
    
    
    <body>

        
        <div class="title">
            
            <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white; font-size: 40px;">Remove an Employee</h1>
            
            
        </div>
            
       
            <div id="employeeFormRemove"> 
                 
                <h1 style="text-align: center; font-size: 25px;">Enter the Employee you would like to remove from ACME</h1> 
                <hr style="border-top:1px solid darkred;">       
                <center style="margin-left:-150px;">      
                <form style="margin-left: 130px;" method="post" action="HR-remove.php" id="removeEmployee">
                    <h4 style="margin-top: 30px; margin-left: -200px;">Employee Information*</h3>
                    <input type="text" name="delUsername" placeholder="Enter Employee Username">
                    <input style="width: 120px;" type="text" name="todaysdate" placeholder="(MM/DD/YY)">
                    <h6 style="margin:0;">Username</h6> <h6 style="margin-top: -24px;margin-left: 46%;">Today's Date</h6>
                    </center>    
                    <br> <br> <button class="employeeRemove" type="submit" name="remove" style="cursor: pointer;">Remove</button>
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

    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>




