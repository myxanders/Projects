<?php
//Ensure database connection and make sure the navbar only displays what the user should see given their TID
include("session.php");
include("nav_check.php");
//Grab the username of the user logged in
$user = $_SESSION['login_user'];


    //Make sure user selected an app
    if(isset($_POST['desiredApp'])) {
            //Create a variable for the app desired
            $app = mysqli_real_escape_string($db, $_POST['desiredApp']);
            //Create a variable for the description inserted
            $desc = mysqli_real_escape_string($db, $_POST['descAcc']);

            //Run a query to grab the eid of the username inserted
            $queryUser = "SELECT eid from employee WHERE username = '" . $user . "'";
            //echo $queryUser;
            $result = mysqli_query($db,$queryUser);
            if (!mysqli_query($db,$queryUser)) {
                echo "User query error: " . mysqli_error($db) . "<br>";
            }
            //Create a variable for the result of the query
            $row = mysqli_fetch_row($result);

            //Run a query to grab the appid of the app desired
            $queryApp = "SELECT appid from application WHERE description = '" . $app . "'";

            $res = mysqli_query($db,$queryApp);
            if (!mysqli_query($db,$queryApp)) {
                echo "App query error: " . mysqli_error($db) . "<br>";
            }        
            //Create a variable for the result of the query    
            $r = mysqli_fetch_row($res);

            //Update the table to include the new request, utilizing the result variables we got from the previous queries
            $sql = "INSERT INTO application_request (reqid, app_id, e_id, rd, description) VALUES (NULL, '" . $r[0] . "', '" . $row[0] . "', NULL, '" . $desc . "')";

            //Make sure the query can run
            if (!mysqli_query($db, $sql)) {
                echo "something is wrong..." . mysqli_error($db);

            }
    }
//}
?>
<html>

    <title>ACME Access Request Confirmation</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
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
   
        
        <div id="mainContent" align="center" style="margin-top:150px;">
            
            <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white;">Request sent!</h1>
            <h3 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .5px; text-shadow: 1px 1px black; color: white; margin-bottom: 25%">We will notify you when access has been processed.</h3>
            
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
.footer {
		position: inherit;
	}
</style>
