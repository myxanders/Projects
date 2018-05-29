<html>
    
<title>ACME Search</title>

<?php
//    $db_connection = pg_connect("host=10.10.7.169 dbname='Corporate_Directory' user=postgres password=password");
//    
//if (!$db_connection) {
//    die("Connection failed: ");
//
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
    <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
    <link rel="stylesheet" type="text/css" href="../CSS/AboutPage.css">
    <script type="text/javascript" src="../js/ProfilePage.js"></script> 
    <script type="text/javascript" src="../js/Script.js"></script> <!--Links Script.js to this page-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Makes Page Responsive -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    
    <!-- Open Hamburger Menu -->
    <header class="topnav" role="banner">
        
        <nav class="topnav container" role="navigation">
             
             
             <!-- Open Hamburger Menu -->
            <div id="main">
        	    <!--<span style="font-size:30px;cursor:pointer;" align=left onclick="openNav()">&#9776;</span>-->
        	    <img src="../../assets/ACMElogo.png" alt="ACMElogo" style="width:100px;height:83px"></img>
            </div>
            
            
            <div id="myTopnav" class="topnav-list">
                <a href="guestSearch.php">Home
                    <span class="fa fa-address-card"></span>
                </a>
                <a href="AboutPage.php">About
                    <span class="fa fa-question-circle"></span>
                </a>
                <a href="SSO.php">Login
                    <span class="fa fa-unlock-alt"></span>
                </a>
                <!--<form class="topnav-list-search">
                    <input type="text" id="search" name="search" placeholder="Search...">
                </form>-->
            
            </div>
            <hr id="topHR" noshade>
            <hr id="topHR" noshade>
            
            
        </nav>

    </header>
    
    <!-- Search form -->
    <div id="main" class="main" align="center" style="margin-top:150px;">
        
        <strong><h1 style="margin-top: 5%; color: white;">Welcome to the ACME employee database!</h1></strong><br>
        <h3 style="margin-top: -1%;color: white; font-size: 15px;">Search the directory to find ACME Employees!</h3><br>
        <form method="post" action="guestSearchResults.php?go" id="searchform" style="margin-top: 2%;">
                <input name="name" class="search" type="text" placeholder="&#128269; Search employees by name or location">
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
            <div class="footer-contact" style="text-decoration: none;">
                <h4>Contact</h4>
                <a href="">contact@acme.com</a>
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