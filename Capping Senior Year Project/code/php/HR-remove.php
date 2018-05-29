<?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_DATABASE', 'corporate_directory');
 
 $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$link) {
    dir('There was a problem when trying to connect to the host. Please contact Tech Support. Error: ' . mysql_error());    
}

$db_selected = mysqli_select_db($link, "corporate_directory");

if (!$link) {
    dir('There was a problem when trying to connect to the database. Please contact Tech Support. Error: ' . mysql_error());    
}

$user = mysqli_real_escape_string($link, $_POST['delUsername']);

$sql = "DELETE FROM login WHERE username = '$user'";

if (!mysqli_query($link, $sql)) {
    die('Error: ' . mysqli_error($link)); 
}

$query = "DELETE FROM employee WHERE username = '$user'";

if (!mysqli_query($link, $query)) {
    die('Error: ' . mysqli_error($link)); 
}

mysqli_close($link);
?>
<html>
    <title>Human Resources</title>
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

        
        <div id="mainContent" align="center" style="margin-top:10%;">
            
            <h1>Employee successfully removed.</h1>
            <h3>You will be redirected back to the Add/Remove Employee Form.</h3>
            <p><span id="counter">3</span></p>
            <script type="text/javascript">
            	function countdown () {
            		var i = document.getElementById("counter");
            		if (parseInt(i.innerHTML)<=1) {
            			location.href = 'HR-panel.php';
					}
					i.innerHTML = parseInt(i.innerHTML)-1;
            	}
            	setInterval(function() {countdown(); }, 1000);
            </script>          
        </div>
    </body>
</html>

<style>

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
        color: #c00000;
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