<?php
include("config.php");
//Get the reqID of the request processed
$id = $_GET['id'];

//Grab the data from the request able
$sql = "SELECT * FROM application_request WHERE reqid = '" . $id . "'";

$result = mysqli_query($db,$sql);

while ($row = mysqli_fetch_array($result)) {
    //Create a variable for the eid of the user given access
	$eid = $row['e_id'];
    //Create a variable for the appid of the app the user now has access to
	$appid = $row['app_id'];
    //Add these to the access log
	$query = "INSERT INTO application_access_log (appid, eid) VALUES ('" . $appid . "', '" . $eid . "')";
	if(!mysqli_query($db,$query)) {
		echo "Oh no!: " . mysqli_error($db);
	}
    //Remove the entry from the request table
	$clean = "DELETE FROM application_request WHERE reqid = '" . $id . "'";
	if(!mysqli_query($db, $clean)) {
		echo "Oh no!: " . mysqli_error($db);
	}
}
?>
<html>
    <title>ACME Request Accepted</title>
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
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes Page Responsive -->
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">        
    </head>
    <body>
    <!-- Navbar -->
        
        <br>
        
        <div id="mainContent" align="center" style="margin-top:10%;">
            
            <h1>Request Accepted.</h1>
            <h3>You have accepted the employee's access request.</h3>
            <p id="counter-container">Redirecting in: <span id="counter">3</span></p>
            <script type="text/javascript">
                //Create a function that redirects the manager back to managing app requests when the counter reaches 0
            	function countdown () {
            		var i = document.getElementById("counter");
            		if (parseInt(i.innerHTML)<=1) {
            			location.href = 'Manager.php';
					}
					i.innerHTML = parseInt(i.innerHTML)-1;
            	}
                //Count down the counter every second
            	setInterval(function() {countdown(); }, 1000);
            </script>          
        </div>
    </body>
</html>

<style>
	#mainContent {
		color: white;
	}
	#counter-container {
		font-size:50px;
		color: #ffffff;
	}
	#counter {
		font-size: 50px;
		color: #ffffff;
        text-shadow: 2px 2px black;
	}

	h1 {
		font-weight: bold;
		color: #00c000;
        -webkit-text-stroke-color:black;
        -webkit-text-stroke-width:.5px;        
	}
	h3 {
		color: #ffffff;
        -webkit-text-stroke-color:black;
        -webkit-text-stroke-width:.5px;
	}
    p {
        -webkit-text-stroke-color:black;
        -webkit-text-stroke-width:1px;
    }
</style>