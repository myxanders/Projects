<?php
include("session.php");
include("nav_check.php");
?>

<html>

    <title>ACME Search</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <link rel="stylesheet" type="text/css" href="../CSS/SearchResult.css">
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
   
        <!-- Search form -->    
        <div id="main" class="main" align="center" style="margin-top:10%; margin-bottom:5%; font-family: 'Montserrat', sans-serif;">
          
        <form method="post" action="SearchResults.php?go" id="searchform" style="margin-top: 2%;">
                <input name="name" class="search" type="text" placeholder="&#128269; Search employees by name, position, or location">
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
            <br>
            <?php
            // Set the search message to adapt to the criteria/term searched.
            $term = "";
            if ($_POST['searchby'] == "by_name") {
                $term = "Displaying employees with names containing '" . htmlspecialchars($_POST['name']) . "'.";
            }
            else if ($_POST['searchby'] == "by_dept") {
                $term = "Displaying employees that work in departments containing '" . htmlspecialchars($_POST['name']) . "'.";
            }
            else if ($_POST['searchby'] == "by_position") {
                $term = "Displaying employees that work in positions containing '" . htmlspecialchars($_POST['name']) . "'.";
            }            
            else if ($_POST['searchby'] == "by_location") {
                $term = "Displaying employees from locations containing '" . htmlspecialchars($_POST['name']) . "'.";
            }
            ?>
            <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; float:left;color:white; margin-left:10%;"><?php echo $term;?></h1><br>
           
           
        </div>
        <div class="table">
            
            <?php
                //If the search term is not empty
                if(isset($_POST['name'])){
                    if(isset($_GET['go'])){
                        //Just make sure that the characters in the search are letters only.
                        if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
                            //Set a variable equal to the term submitted
                            $name=$_POST['name'];
                            //Set a variable equal to the criteria submitted
                            $opt=$_POST['searchby'];
                            //connect  to the database
                            $db=mysqli_connect("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
                            //-select  the database to use
                            $mydb=mysqli_select_db($db,"corporate_directory");
                            //Query the database with the appropriate statement depending on the criteria.
                            if ($opt == "by_name"){
                                $sql="(SELECT * FROM employee WHERE firstname LIKE '%" . $name ."%' OR lastname LIKE '%" . $name . "%')";
                            }
                            
                            else if ($opt == "by_location"){
                                $sql="(SELECT * FROM employee WHERE employee.oid IN (SELECT oid FROM organization WHERE organization.location LIKE '%" . $name ."%'))";
                            }
                            else if ($opt == "by_position") {
                                $sql="(SELECT * FROM employee WHERE employee.tid IN (SELECT tid FROM title WHERE title.posname LIKE '%" . $name ."%'))";
                            }                            
                            else if ($opt == "by_dept") {
                                $sql="(SELECT * FROM employee WHERE employee.did IN (SELECT did FROM department WHERE department.description LIKE '%" . $name ."%'))";
                            }

                            //-run  the query against the mysql query function
                            $result=mysqli_query($db,$sql);
                            //-create  while loop and loop through result set
                            if(mysqli_num_rows($result) > 0) {
                            ?>
                            <!-- Create the headers for our result table -->
                            <table class="employee" id="myTable">
                              <tr>
                                <th onclick="sortTable(0)">Name</th>
                                <th onclick="sortTable(1)">Title</th>
                                <th onclick="sortTable(2)">Dept.</th>
                                <th onclick="sortTable(3)">Location</th>
                                <th onclick="sortTable(4)">Ext.</th>
                                <th onclick="sortTable(5)">Email</th>
                                <th style="text-align:center;">Profile</th>
                              </tr>
                            <?php
                            //Set a counter for how many rows are in the result set
                            $i=1;
                            //Enter a while loop to begin printing out result rows
                            while($row=mysqli_fetch_array($result)) {

                            ?>
                              <tr><!--Print out a clickable result for names that meet the criteria. The profile leads to the approapriate user profile. -->
                                <td><?php echo $row['firstname'] . '&nbsp' . $row['lastname']?></td>
                                <td>
                                    <?php 
                                        //Peform a query to display the title as a word and not its ID
                                        $sql="SELECT posname FROM title WHERE title.tid = ". $row['tid'];
                                        $res=mysqli_query($db,$sql);
                                        $r=mysqli_fetch_array($res);
                                        //Print out a clickable result for positions that meet the criteria. The profile leads to the approapriate user profile.
                                        //print '<a href="viewProfile.php?user='.$row['username'].'" class="profileLink">' .  $r['posname'] . '</a>'
                                        echo $r['posname'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        //Perform a query to display the department as a word and not its ID
                                        $sql="SELECT description FROM department WHERE department.did = ". $row['did'];
                                        $res=mysqli_query($db,$sql);
                                        $r=mysqli_fetch_array($res);
                                        //Print out a clickable result for departments that meet the criteria. The profile leads to the approapriate user profile.
                                        //print '<a href="viewProfile.php?user='.$row['username'].'" class="profileLink">' .  $r['description'] . '</a>'
                                        echo $r['description'];
                                    ?>
                                </td>                                
                                <td>
                                    <?php 
                                        //Perform a query to display the locaiton as a word and not its ID
                                        $sql="SELECT location FROM organization WHERE organization.oid = ". $row['oid'];
                                        $res=mysqli_query($db,$sql);
                                        $r=mysqli_fetch_array($res);
                                        //Print out a clickable result for organizations that meet the criteria. The profile leads to the approapriate user profile.
                                        //print '<a href="viewProfile.php?user='.$row['username'].'" class="profileLink">' . $r['location'] . '</a>'
                                        echo $r['location'];
                                    ?>
                                </td>
                                <td><!--Print out a clickable result for work extension that meet the criteria. The profile leads to the approapriate user profile.-->
                                    <?php echo $row['workExt'];
                                    //print '<a href="viewProfile.php?user='.$row['username'].'" class="profileLink">' . $row['workExt'] . '</a>'?></td>
                                <td style="text-transform: lowercase;"><?php echo $row['email'];
                                //print '<a href="viewProfile.php?user='.$row['username'].'" class="profileLink">'. $row['email'] . '</a>'?></td>
                                <td style="align-content: center; width:100px;">
                                    <?php 
                                        print '<a href="viewProfile.php?user='.$row['username'].'" class="viewProfileBtn" style="white-space: nowrap"><span class="fa fa-user"></span> View</a>';?> 
                                </td>
                              </tr>
                            <?php           //Move onto the next row of results
                                            $i++;
                                            }
                            }else {
                                //If the result set has no matches
                                echo '<p style="color:white;">No entries matched your search.</p>';
                            }

                        } else{
                            // If the searched term is empty
                            echo  '<p style="color:white;">Please enter a search query.</p>';
                        }
                    }
                }
                            ?>
                            </table>
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
    @import url('https://fonts.googleapis.com/css?family=Montserrat');
    .search {
        padding: 7px;
        width: 40%;
    }
    
    .short {
        padding: .5%;
        width: 12%;
        cursor: pointer;
    }
    
    #searchby {
        width: 12%;
        /*padding: 7px;*/
        border-radius: 7px;
        font-size: 18px;
        border-width: 2px;
        border-color: #555555;
        cursor:pointer;
        height: 37px;
    }

    .profileLink {
        text-decoration: none;
    }
    .main {
        margin-bottom: 13%;
    }

    .viewProfileBtn {
        background-color: #f44336;
        color: white;
        border: 2px solid #f44336;
        border-radius: 8px;
        padding: 4px;
        padding-left: : 9px;
        padding-right: 9px;
        width: 50%;
        transition-duration: 0.4s;  
        text-decoration: none;
        margin: 9%;      
    }

    .viewProfileBtn:hover {
        cursor:pointer;
    }

    .table {
        margin-left: 10%;
        margin-right: 10%;
        overflow-x: scroll;
        width: 80%;
    }

    .table::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: transparent;
    }

    .table::-webkit-scrollbar
    {
        width: 12px;
        background-color: transparent;
    }

    .table::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #f44336;
    }
</style>