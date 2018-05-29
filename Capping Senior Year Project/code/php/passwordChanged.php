<html>
    <title>ACME Password Change Successful</title>
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
        <div id="main" class="main" align="center" style="margin-top:10%;">
            
            <h1>Password change complete.</h1>
            <br>
            <h2>You will be redirected to the sign-in page.</h2>
                <i  style="text-shadow:none; color:#f44336; -webkit-text-stroke-width: 0px;" class="fa fa-spinner fa-spin fa-3x fa-fw"></i> 
                <!-- Bring the user back to the sign-in page to log in with their new password -->   
                <?php header("Refresh: 3; url=SSO.php")?>

        </div>
    </body>
</html>
<style>
    #main {
        color:white;
        -webkit-text-stroke-color:black;
        -webkit-text-stroke-width:.75px;
        text-shadow: 1px 1px black;
    }
</style>