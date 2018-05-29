<?php
 //Ensure db connection and begin session
 session_start();
 include("config.php");
 

// 
if($_SERVER["REQUEST_METHOD"] == "POST") { 
    //Make sure the password didn't do anything tricky to bypass requirements
    $password = mysqli_real_escape_string($db, $_POST['newPW']);
    //Set the encryption
    $options = [
        'cost' => 11
        //'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    //Hash the password
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
    //Make sure the verified password didn't do anything tricky to bypass requirements
    $verify = mysqli_real_escape_string($db, $_POST['verifyPW']);  

    //If the new password matches the verified password entry
    if ($password == $verify)  {
        //Update the table with the new password
        $sql = "UPDATE login SET pwd = '$hashedpassword' WHERE username = '" . $_SESSION['userPWchange'] . "'";
        $res = mysqli_query($db, $sql);
        if ($res) {
           //If the query runs successfully forward user to redirect back to login
           header("location:passwordChanged.php");
        }
        else {
            //The query is broken and the user shouldn't see this
            echo "u dun goofed";
        }

    }
    else {
        ?>
        <div class="pwd_match_err" style=center>
        <span class="fa fa-warning">
          <?php 
            //If the new password doesn't match the verify entry, let the user know. 
             echo 'Passwords do not match. Please try again.
            </span>
            <span class="fa fa-warning"></span>';
    }
}
?>
        </div>
<html>
    <title>ACME Password Reset</title>
 
    
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
        <!-- Navbar -->
        <header class="topnav" role="banner">
            
            <nav class="topnav container" role="navigation">
                
                <div id="main">
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
            <div id="main" class="main" align="center" style="margin-top:10%; -webkit-text-stroke-color:black; -webkit-text-stroke-width:1px;">
        
                <h1 style="color:#white;">Your password is out of date!</h1>
                <br>
                <h2 style="color:white;">Please enter a new password before you login.</h2>

            </div>

            <div class="resetPW" style=center>
            <form name="frmReset" id="frmReset" method="post" action="expiredPassword.php">
                <h1 style="text-align: center;">Enter your new password:</h1>
                    <div class="field-group">                        
                        <div style="margin-left: 24%">Password</div>
                        <div style="margin-left: 24%; width: 80%"><input type="password" name="newPW" id="newPW" pattern=".{6,}" class="input-field" required></div>
                        <div style="margin-left: 24%">Re-type Password</div>
                        <div style="margin-left: 24%; width: 80%"><input type="password" name="verifyPW" id="verifyPW" pattern=".{6,}" class="input-field" required></div>
                    </div>                                                
                    
                    <div class="field-group">
                        <div><button type="submit" name="change-password" id="change-password" value="Submit" class="form-submit-button">Submit</div>
                    </div>  
                </form>
            </div>
    </body>
</html>
<style>

    .resetPW {
        margin-top: 2%;
        margin-bottom: 5%;
        background-color: white;
        padding: 2%;
        border-radius: 8px;
        margin-left: 33%;
        width: 33%;
        position: relative;
        top: 30%;
        border: 1px solid #f44336;
    }


    #change-password {
        width: fit-content;
        margin-top: 5%;
        margin-bottom: -5%;
        padding: 3px;
        margin-left: 41%;
    }

    .pwd_match_err {
        position: relative;
        color: white;
        background-color: #f44336;
        width: 33%;
        text-align: center;
        margin-top: 80px;
        margin-bottom: -200px;
        font-size: 20px;
        border: 2px solid white;
        border-radius: 8px;
        margin-left: 560px
    }
</style>