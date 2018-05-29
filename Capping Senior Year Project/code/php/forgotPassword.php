<?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_DATABASE', 'corporate_directory');
 session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") { 
     $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if (!$link) {
        dir('There was a problem when trying to connect to the host. Please contact Tech Support. Error: ' . mysql_error());    
    }

    $db_selected = mysqli_select_db($link, "corporate_directory");

    if (!$link) {
        dir('There was a problem when trying to connect to the database. Please contact Tech Support. Error: ' . mysql_error());    
    }

    $username = mysqli_real_escape_string($link, $_POST['forgot-username']);
    $email = mysqli_real_escape_string($link, $_POST['forgot-email']);
    $eid = mysqli_real_escape_string($link, $_POST['forgot-eid']);
    $_SESSION['userPWchange'] = $username;
    

    $sql = "SELECT * FROM employee WHERE username = '$username' AND email = '$email' AND eid = '$eid'";

    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($result);

    if(mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_array($result);
        header("location: resetPassword.php");
        //echo $_SESSION['userPWchange'];
    }
    else {
        ?>
        <div class="reset_err" style=center>
        <span class="fa fa-warning">
          <?php  
             //$error = "Your Login Name or Password is invalid";

             echo 'Invalid entry. Please try again.
            </span>
            <span class="fa fa-warning"></span>';

    }
}
?>
        </div>

<html>
    <title>ACME Forgot Password</title>
 
    
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
                    <a href="AboutPage.php">About
                        <span class="fa fa-question-circle"></span>
                    </a>                    
                    <a href="SSO.php">Login
                        <span class="fa fa-unlock-alt"></span>
                    </a>
                </div>
                <hr id="topHR" noshade>
                <hr id="topHR" noshade>
                
                
            </nav>
    
        </header>

        <br>

        <div class="sendReset" style=center>
            <form name="frmForgot" id="frmForgot" method="post" action="forgotPassword.php">
                <h1 style="text-align: center;">Forgot Password?</h1>
                    <div class="field-group">
                        <div style="margin-left: 23%">Username</div>
                        <div style="margin-left: 23%"><input type="text" name="forgot-username" id="forgot-username" class="input-field" placeholder="Enter your username" required></div>
                        <div style="margin-left: 23%">Email</div>
                        <div style="margin-left: 23%"><input type="text" name="forgot-email" id="forgot-email" class="input-field" placeholder="Enter your email" required></div>
                        <div style="margin-left: 23%">Employee ID*</div>
                        <div style="margin-left: 23%"><input type="text" name="forgot-eid" id="forgot-eid" class="input-field" placeholder="Enter your EID number" required></div>
                        <div class="eidhelp" style="font-size: 10px; margin-left: 23%; width: 50%;">*Please contact an Administrator if you do not know your Employee ID.</div>
                        </div>                                                
                    
                    <div class="field-group">
                        <div><button type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button">Submit</div>
                    </div>  
                </form>
            </div>
    </body>
</html>

<style>

    .sendReset {
        margin-top: 15%;
        margin-left: 33%;
        background-color: white;
        padding: 3%;
        border-radius: 8px;
        width: 33%;
        position: relative;
        top: 30%;
        border: 1px solid #f44336;
    }


    #forgot-password {
        width: 25%;
        margin-top: 15px;
        margin-bottom: -15px;
        padding: 5px;
        margin-left: 36%;
    }

    .reset_err {
        position: relative;
        color: white;
        background-color: #f44336;
        width: 315px;
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        font-size: 20px;
        border: 2px solid white;
        border-radius: 8px;
        margin-left: 560px
    }
</style>