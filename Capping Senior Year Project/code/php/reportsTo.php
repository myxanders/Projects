<?php
//Ensure db connection and begin session. Make sure the user has rights to see this page
include('session.php');
include('nav_check.php');
include('manager_check.php');
?>
<html>

    <title>Your ACME Team</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/Manager.css">  
        <link rel="stylesheet" type="text/css" href="../CSS/SearchResult.css">            
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
        <script type="text/javascript" src="../js/SearchResults.js"></script>        
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
            
            <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white; font-size: 40px;">Your Team</h1>
            <h3 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .25px; color:white; font-size: 20px;">Below is a list of employees who report to you.</h3>
            
        </div>
        <div class="table">
            <?php
            //Run a query to get the eid of the current user                        
            $query = "SELECT eid FROM employee WHERE username = '" . $login_session . "'";
            $res = mysqli_query($db, $query);
            $rows = mysqli_fetch_array($res);
            //Store our result as a variable for later use
            $managerID = $rows['eid'];
            //Run a query to find info of employees who reportTo the logged-in user
            $sql = "SELECT firstname, lastname, workExt FROM employee WHERE reportsTo = '" . $managerID . "'";
            $result = mysqli_query($db,$sql);
            if (mysqli_num_rows($result) > 0) {
            ?>
            <!-- Start displaying our result table-->
            <table class="employee" id="myTable">
                <tr>
                    <th onclick="sortTable(0)" style="width: 10%;">Name</th>                    
                    <th onclick="sortTable(1)" style="width: 5%">Ext.</th>
                </tr>
            <?php
                //Set a counter for number of rows
                $i=1;
                while ($row=mysqli_fetch_array($result)) {
            ?>
                <tr><!-- 'Name' column should display the first and last name of the employee -->
                    <td style="text-align: center; text-transform:capitalize;"><?php echo $row['firstname'] . '&nbsp' . $row['lastname'];?></td>                    
                    <td style = "text-align: right;">  
                    <!-- 'Ext.' column should display the work extension of the employee -->                                  
                        <?php echo $row['workExt'];?>
                    </td>

                </tr>
            <?php
                    //Move on to the next row
                    $i++;            
                }    
            }else {
                //If no one reports to the manager/admin
                echo "<br>" . "<p style='text-align:center; font-size:16px; -webkit-text-stroke-color: black; -webkit-text-stroke-width: .1px; color: #F44336; font-weight: bold;'><br><br>You have no employees who report to you.</p>";
            }
            ?>
            </table>
        </div> 
        <!-- Footer -->
        <div class="footer"">
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
    .table {
        margin-left: 35%;
        margin-right: 5%;
        overflow-x: hidden;
        width: 30%;
    }

    #myTable {
        margin-top: 3%;
        text-align: center;
    }

    button {
        padding:5px;
        margin:4px;
        width:30%;
    }

    .employee th {
        text-align: center;
    }

	.footer {
		position: relative;
	}
	
</style>
