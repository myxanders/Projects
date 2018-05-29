<?php
   //Ensure db connection and begin session
   include('session.php');
   include('nav_check.php');

   //Create a variable for the user profile we clicked on in the SearchResults table
   $user = $_GET['user'];

   //Run a query for the firstname of that user
   $sqlFirst = "select firstname from employee where username = '" . $user . "'";
   $first_name = mysqli_query($db,$sqlFirst);
   $rowFirst = mysqli_fetch_assoc($first_name);
   $login_first = $rowFirst['firstname'];
   //Run a query for the lastname of that user
   $sqlLast = "select lastname from employee where username = '" . $user . "'";   
   $last_name = mysqli_query($db,$sqlLast);   
   $rowLast = mysqli_fetch_assoc($last_name);
   $login_last = $rowLast['lastname'];
   //Run a query for the profile pic of that user
   $sqlPicture = "select picture from employee where username = '" . $user . "'";   
   $picture = mysqli_query($db,$sqlPicture);   
   $rowPicture = mysqli_fetch_assoc($picture);
   $login_picture = $rowPicture['picture'];
   //Run a query for the titleID of that user
   $sqlPosition = "select tid from employee where username = '" . $user . "'";
   $position = mysqli_query($db, $sqlPosition);
   $rowPos = mysqli_fetch_assoc($position);
   $login_pos = $rowPos['tid'];
   //Run a query for the title name of that user, utilizing the titleID we just queried
   $sqlTitle = "select posname from title where tid = '" . $login_pos . "'";
   $title = mysqli_query($db, $sqlTitle);
   $rowTitle = mysqli_fetch_assoc($title);
   $login_title = $rowTitle['posname'];  
   //Run a query for the organizationID of that user
   $sqlLocation = "select oid from employee where username = '" . $user . "'";
   $location = mysqli_query($db, $sqlLocation);
   $rowLocation = mysqli_fetch_assoc($location);
   $login_location = $rowLocation['oid'];
   //Run a query for the location name of that user, utilizing the organizationID we just queried
   $sqlOrg = "select location from organization where oid = '" . $login_location . "'";
   $org = mysqli_query($db, $sqlOrg);
   $rowOrg = mysqli_fetch_assoc($org);
   $login_org = $rowOrg['location'];
   //Run a query for the email address of that user
   $sqlEmail = "select email from employee where username = '" . $user . "'";
   $email = mysqli_query($db,$sqlEmail);
   $rowEmail = mysqli_fetch_assoc($email);
   $login_email = $rowEmail['email'];
   //Run a query for the phone number of that user
   $sqlPhone = "select homePhone from employee where username = '" . $user . "'";
   $phone = mysqli_query($db,$sqlPhone);
   $rowPhone = mysqli_fetch_assoc($phone);
   $login_phone = $rowPhone['homePhone'];
   //Run a query for the address of that user
   $sqlAddress = "select streetAddress from employee where username = '" . $user . "'";
   $address = mysqli_query($db,$sqlAddress);
   $rowAddress = mysqli_fetch_assoc($address);
   $login_address = $rowAddress['streetAddress'];
   //Run a query for the city/town of that user
   $sqlCity = "select city_town from employee where username = '" . $user . "'";
   $city = mysqli_query($db,$sqlCity);
   $rowCity = mysqli_fetch_assoc($city);
   $login_city = $rowCity['city_town']; 
   //Run a query for the home state of that user, if applicable
   $sqlState = "select state from employee where username = '" . $user . "'";
   $state = mysqli_query($db,$sqlState);
   $rowState = mysqli_fetch_assoc($state);
   $login_state = $rowState['state'];
   //If they don't live in the US, they won't display a state
   if ($login_state == NULL) {
      $login_state == "";
   }
   //Run a query for the home country of that user
   $sqlCountry = "select country from employee where username = '" . $user . "'";
   $country = mysqli_query($db,$sqlCountry);
   $rowCountry = mysqli_fetch_assoc($country);
   $login_country = $rowCountry['country'];
   //Run a query for the hire date of that user
   $sqlHired = "select hireDate from employee where username = '" . $user . "'";
   $hired = mysqli_query($db, $sqlHired);
   $rowHired = mysqli_fetch_assoc($hired);
   $login_hired = $rowHired['hireDate'];
   //Make the hire date show up as a string
   $cleanHired = strtotime($login_hired);
   
?>
<html>
    <!-- The title of the page will display the user's name -->
    <title><?php echo ucwords($login_first) . '&nbsp' . ucwords($login_last)?>'s Profile Page</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
        <script type="text/javascript" src="../js/Script.js"></script>
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
   
      <button class="return" onclick="window.location.href='Search.php'">
          <span class="fa fa-chevron-left"></span> &nbsp Return to Search
      </button>       
      
      <div class="container-profile-style">
  
        <h1 id="userName"><?php echo '' . ucwords($login_first) . ' ' . ucwords($login_last);?></h1> 

        <h6 class="locationInfo"><?php echo '' . $login_org . ', ';
                                   //Statement to display the appropriate location for whichever branch the user is located
                                   if ($login_location == 1) {
                                    echo "NY, ";
                                   }
                                   else if ($login_location == 2) {
                                    echo "IL, ";
                                   }
                                   else if ($login_location == 3) {
                                    echo "CA, ";
                                   } 
                                   else if ($login_location == 4) {
                                    echo "Japan";
                                   }    
                                   else if ($login_location == 5) {
                                    echo "France";
                                   }              
                                   else if ($login_location == 3) {
                                    echo "England";
                                   }       
                                   //Additionally, any branch location with an id < 4 needs to have the USA added to properly display the location fully            
                                   if ($login_location < 4) {
                                    echo "USA";
                                   }?></h6>

        <h6 class="departmentInfo"><?php echo '' . $login_title;?></h6>

        <img class="picInfo" src="uploads/<?php echo $login_picture;?>">
                
        <hr id="underEdit">
             
        <div class="underWork">

          <hr id="workHr">            
            
          <h4 style="color: gray;">Work Information</h4>
            
          <h3>Address:</h3> <br>
            
          <h5 id="response"><?php echo '' . $login_address . "<br>" . $login_city . ', ' .$login_state . '&nbsp' . $login_country;?></h5>
            
          <h3>Employee since:</h3>
            
          <h5><!-- Print out the hire date in a more readable format--><?php echo date ("F j, Y", $cleanHired);?></h5>
          
        </div> 
             
        <div class="contact-content">
            
          <h4 style="color: gray;">Contact Information</h4>
            
          <h3>Email Address:</h3> <br>
                
          <h5 id="response"><?php echo '' . $login_email;?></h5>
            
          <h3>Phone Number:</h3> <br>
            
          <h5 id="response"><?php 
                  //Properly format phone numbers on display
                  echo '('.substr($login_phone, 0, 3).') '.substr($login_phone, 3, 3). '-' . substr($login_phone,6);?></h5>
        </div>    
      
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

<style>



  .return {
    width: 20%;
    margin-top: 130px;
    margin-bottom: -100px;
    margin-left: 40%;
    display:block;
  }

  .return:hover {
    cursor: pointer;
  }
</style>
</html>
