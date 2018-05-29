<?php
include('session.php');
include('nav_check.php');
include('manager_check.php');
?>
<html>

    <title>ACME Application Requests</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/Manager.css">    
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
        <script type="text/javascript" src="../js/Script.js"></script>
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
            
            <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white; font-size: 40px;">Application Access Requests</h1>
            <h3 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .25px; color:white; font-size: 20px;">You have the following requests awaiting approval:</h3>
            
        </div>
        <div class="table">
            <?php
            $db=mysqli_connect("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
            //-select  the database to use
            $mydb=mysqli_select_db($db,"corporate_directory");
            $sql = "SELECT * FROM application_request";
            $result = mysqli_query($db,$sql);
            if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="requests" id="myTable">
                <tr>
                    <th onclick="sortTable(0)" style="width: 5%;">Req.</th>                    
                    <th onclick="sortTable(1)" style="width: 15%;">Name</th>
                    <th onclick="sortTable(2)" style="width: 15%;">Application Requested</th>
                    <th onclick="sortTable(3)" style="width: 30%; min-width:200px;">Reason for Request</th>
                    <th onclick="sortTable(4)" style="width: 15%;">Requested</th>
                    <th style="text-align: center; width: 20%; min-width: 200px;">Actions</th>
                </tr>
            <?php
                $i=1;
                while ($row=mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td style="text-align: right"><?php echo $row['reqid'];?></td>                    
                    <td>                                    
                        <?php 
                            $sql="SELECT firstname, lastname FROM employee WHERE employee.eid = ". $row['e_id'];
                            $res=mysqli_query($db,$sql);
                            $r=mysqli_fetch_array($res);
                            echo $r['firstname'] . '&nbsp' . $r['lastname'];
                        ?>
                    </td>
                    <td>                                    
                        <?php 
                            $sql="SELECT description FROM application WHERE application.appid = ". $row['app_id'];
                            $res=mysqli_query($db,$sql);
                            $r=mysqli_fetch_array($res);
                            echo $r['description'];
                        ?>
                    </td>
                    <td style="text-transform: none;"><?php echo $row['description'];?></td>
                    <td><?php 
                            $time = strtotime($row['rd']);
                            echo date("M j Y  g:m:s",$time);
                        ?>
                    </td> 
                    <td><?php 
                            print '<a href="requestAccepted.php?id='.$row['reqid'].'" class="accDecBtn">Accept</a>' . '&nbsp' .
                                  '<a href="requestDeclined.php?id='.$row['reqid'].'" class="accDecBtn">Decline</a>';?> 
                            <!--input type="submit" class="accDecBtn" name="Accept" value="Accept"-->      
                            <!--input type="submit" class="accDecBtn" name="Decline" value="Decline"-->                          
                    </td> 
                </tr>
            <?php
                    $i++;            
                }    
            }else {
                echo "<br>" . "<p style='text-align:center; font-size:22px; -webkit-text-stroke-color: black; -webkit-text-stroke-width: .25px; color: #f44336;'><br><br>You have no outstanding requests to process.</p>";
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
        margin-left: 5%;
        margin-right: 5%;
        margin-bottom: 10%;
        overflow-x: scroll;
        width: 90%;
    }

    #pendingRequests {
        margin-top: 3%;
        text-align: center;
    }

    button {
        padding:5px;
        margin:4px;
        width:45%;
    }

    .requests th {
        text-align: center;
    }

    #accDec {
       text-align:center;
       margin-bottom: 3px;
    }

    .accDecBtn {
        background-color: #f44336;
        color: white;
        border: 2px solid #f44336;
        border-radius: 8px;
        padding: 3px;
        width: 100%;
        transition-duration: 0.4s;  
        text-decoration: none;
        margin: 9%;      
    }

    .accDecBtn:hover {
        cursor:pointer;
    }
	
	.footer {
		position: relative;
	}
</style>
