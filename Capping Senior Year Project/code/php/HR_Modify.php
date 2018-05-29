<?php
include('session.php');
include('nav_check.php');
include('HR_check.php');
?>

<html>

    <title>ACME Human Resources</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/HR.css">
        <link rel="stylesheet" type="text/css" href="../CSS/HR_Modify.css">
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
            
            <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white; font-size: 40px;">Modify Employee</h1>
            
            
        </div>
        
        <!-- title,location, reports to, department, -->
        <div id="employeeModify">   
            <h1 style="text-align: center; font-size: 25px;">Change Employee Information</h1> 
            <hr style="border-top:1px solid darkred;">        
            <form style="margin-left: 130px;" method="post" action="HR_Update.php" id="modifyEmployee">
                <center style="margin-left:-140px;">    
                    <h4 style="margin-top: 30px;">Employee Information*</h3>
                    
                     <select style="height:40px; width: 50%;" name="username">
                        <option value = "" disabled selected>Username</option>
                         <?php 
                            $result = mysqli_query($db, "SELECT eid, username FROM employee");
                            while ($row = $result->fetch_assoc()) {

                                unset($eid, $username);
                                $eid = $row['eid'];
                                $username = $row['username']; 
                                echo '<option value="'.$eid.'">'.$username.'</option>';
                            }
                        ?>
                    </select>
                    <br><br>
                    <select style="height:40px; width: 50%" name="location">
                        <option value = "" disabled selected>Location</option>
                        <option value = "1">New York</option>
                        <option value = "2">Chicago</option>
                        <option value = "3">Los Angeles</option>
                        <option value = "4">Tokyo</option>
                        <option value = "5">Paris</option>
                        <option value = "6">London</option>
                    </select>
                    <br><br>
                    <select style="height:40px; width: 50%" name="title">
                        <option value = "" disabled selected>Position</option>
                        <option value = "1">CEO/Board</option>
                        <option value = "2">Administrator</option>
                        <option value = "3">HR</option>
                        <option value = "4">Manager</option>
                        <option value = "5">Employee</option>
                    </select>
                    <br><br>
                     <select style="height:40px; width: 50%"" name="department">
                        <option value = "" disabled selected>Department</option>
                        <option value = "1">Marketing</option>
                        <option value = "2">Sales</option>
                        <option value = "3">Plant and Infrastructure</option>
                        <option value = "4">Information Technology</option>
                        <option value = "5">Product Development</option>
                        <option value = "6">Human Resources</option>
                    </select> <br> <br>                            
                    <select style="height:40px; width: 50%; text-transform: capitalize;" name="reportsTo">
                        <option value = "" disabled selected>Reports To</option>                        
                        <?php 
                            $result = mysqli_query($db, "SELECT eid, firstname, lastname FROM employee");
                            while ($row = $result->fetch_assoc()) {

                                unset($eid, $firstname, $lastname);
                                $eid = $row['eid'];
                                $firstname = $row['firstname']; 
                                $lastname = $row['lastname'];
                                echo '<option style ="text-transform:capitalize;" value="'.$eid.'">'.$firstname." ".$lastname.'</option>';
                            }
                        ?>
                    </select>
                </center>
               
                <br> <br> <button class="employeeModify" type="submit" name="modify" style="cursor:pointer;">Modify</button>
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

    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>




