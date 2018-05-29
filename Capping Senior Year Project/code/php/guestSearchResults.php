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
    <!-- Navbar -->
        
        <header class="topnav" role="banner">
            
            <nav class="topnav container" role="navigation">
    
                
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
        <div id="main" class="main" align="center" style="margin-top:10%; margin-bottom:5%; font-family: 'Montserrat', sans-serif;">
          
        <form method="post" action="guestSearchResults.php?go" id="searchform" style="margin-top: 2%;">
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
            <h1 style="float:left;color:white; margin-left:10%;"><?php echo $term;?></h1><br>
           
           
        </div>
        <div class="table">
            
            <?php
                if(isset($_POST['name'])){
                    if(isset($_GET['go'])){
                        if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
                            $name=$_POST['name'];
                            $opt=$_POST['searchby'];
                            //connect  to the database
                            $db=mysqli_connect("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
                            //-select  the database to use
                            $mydb=mysqli_select_db($db,"corporate_directory");
                            //-query  the database table
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
                            <table class="employee" id="myTable">
                              <tr>
                                <th onclick="sortTable(0)">Name</th>
                                <th onclick="sortTable(1)">Title</th>
                                <th onclick="sortTable(2)">Dept.</th>
                                <th onclick="sortTable(3)">Location</th>
                                <th onclick="sortTable(4)">Ext.</th>
                                <th onclick="sortTable(5)">Email</th>
                              </tr>
                            <?php
                                            $i=1;
                                            while($row=mysqli_fetch_array($result)) {

                            ?>
                              <tr>
                                <td><?php echo $row['firstname'] . '&nbsp' . $row['lastname'];?></td>
                                <td>
                                    <?php 
                                        $sql="SELECT posname FROM title WHERE title.tid = ". $row['tid'];
                                        $res=mysqli_query($db,$sql);
                                        $r=mysqli_fetch_array($res);
                                        echo $r['posname'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $sql="SELECT description FROM department WHERE department.did = ". $row['did'];
                                        $res=mysqli_query($db,$sql);
                                        $r=mysqli_fetch_array($res);
                                        echo $r['description'];
                                    ?>
                                </td>                                 
                                <td>
                                    <?php 
                                        $sql="SELECT location FROM organization WHERE organization.oid = ". $row['oid'];
                                        $res=mysqli_query($db,$sql);
                                        $r=mysqli_fetch_array($res);
                                        echo $r['location'];
                                    ?>
                                </td>
                                <td><?php echo $row['workExt'];?></td>
                                <td style="text-transform: lowercase;"><?php echo $row['email'];?></td>
                              </tr>
                            <?php
                                            $i++;
                                            }
                            }else {
                                echo "<p>No entries matched your search.</p>";
                            }

                        } else{
                            echo  "<p>Please enter a search query</p>";
                        }
                    }
                }
                            ?>
                            </table>
        </div>

    <!-- Footer -->
        <div class="footer">
            <div class="footer-contact" style="text-decoration: none;">
                <h4>Contact</h4>
                <a href="">contact@acme.com</a>
            </div>
        </div>
        
    </body>
<script>
function hideHR() {
	document.getElementById("HR").style.display = "none";
}
</script>
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
</style>