
<?php
   include('session.php');
   include('nav_check.php');

   $sqlFirst = "select firstname from employee where username = '" . $login_session . "'";
   $first_name = mysqli_query($db,$sqlFirst);
   $rowFirst = mysqli_fetch_assoc($first_name);
   $login_first = ucwords($rowFirst['firstname']);
   
   $sqlLast = "select lastname from employee where username = '" . $login_session . "'";   
   $last_name = mysqli_query($db,$sqlLast);   
   $rowLast = mysqli_fetch_assoc($last_name);
   $login_last = ucwords($rowLast['lastname']);
   
   $sqlPicture = "select picture from employee where username = '" . $login_session . "'";   
   $picture = mysqli_query($db,$sqlPicture);   
   $rowPicture = mysqli_fetch_assoc($picture);
   $login_picture = $rowPicture['picture'];
   
   $sqlPosition = "select tid from employee where username = '" . $login_session . "'";
   $position = mysqli_query($db, $sqlPosition);
   $rowPos = mysqli_fetch_assoc($position);
   $login_pos = $rowPos['tid'];

   $sqlTitle = "select posname from title where tid = '" . $login_pos . "'";
   $title = mysqli_query($db, $sqlTitle);
   $rowTitle = mysqli_fetch_assoc($title);
   $login_title = $rowTitle['posname'];

   $sqlLocation = "select oid from employee where username = '" . $login_session . "'";
   $location = mysqli_query($db, $sqlLocation);
   $rowLocation = mysqli_fetch_assoc($location);
   $login_location = $rowLocation['oid'];

   $sqlOrg = "select location from organization where oid = '" . $login_location . "'";
   $org = mysqli_query($db, $sqlOrg);
   $rowOrg = mysqli_fetch_assoc($org);
   $login_org = $rowOrg['location'];

   $sqlEmail = "select email from employee where username = '" . $login_session . "'";
   $email = mysqli_query($db,$sqlEmail);
   $rowEmail = mysqli_fetch_assoc($email);
   $login_email = $rowEmail['email'];
   
   $sqlPhone = "select homePhone from employee where username = '" . $login_session . "'";
   $phone = mysqli_query($db,$sqlPhone);
   $rowPhone = mysqli_fetch_assoc($phone);
   $login_phone = $rowPhone['homePhone'];
   
   $sqlAddress = "select streetAddress from employee where username = '" . $login_session . "'";
   $address = mysqli_query($db,$sqlAddress);
   $rowAddress = mysqli_fetch_assoc($address);
   $login_address = ucwords($rowAddress['streetAddress']);
   
   $sqlCity = "select city_town from employee where username = '" . $login_session . "'";
   $city = mysqli_query($db,$sqlCity);
   $rowCity = mysqli_fetch_assoc($city);
   $login_city = ucwords($rowCity['city_town']); 

   $sqlState = "select state from employee where username = '" . $login_session . "'";
   $state = mysqli_query($db,$sqlState);
   $rowState = mysqli_fetch_assoc($state);
   $login_state = strtoupper($rowState['state']);
   if ($login_state == NULL) {
      $login_state == "";
   }

   $sqlCountry = "select country from employee where username = '" . $login_session . "'";
   $country = mysqli_query($db,$sqlCountry);
   $rowCountry = mysqli_fetch_assoc($country);
   $login_country = ucwords($rowCountry['country']); 

   $sqlHired = "select hireDate from employee where username = '" . $login_session . "'";
   $hired = mysqli_query($db, $sqlHired);
   $rowHired = mysqli_fetch_assoc($hired);
   $login_hired = $rowHired['hireDate'];
   $cleanHired = strtotime($login_hired);
?>
<html>

    <title>My ACME Profile Page</title>
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
	      
        <div class="container-profile-style">
	
          <h1 id="userName"><?php echo '' . ucwords($login_first) . ' ' . ucwords($login_last);?></h1> 


        <h6 class="locationInfo"><?php echo '' . $login_org . ', ';
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
                                   if ($login_location < 4) {
                                    echo "USA";
                                   }?></h6>

          <img class="picInfo" src="uploads/<?php echo $login_picture;?>">
			
          <button id="edit" onclick="location.href='profile_edit.php'">Edit</button>
          
          <hr id="underEdit">
             
          <div class="underWork">

            <hr id="workHr">            
            
            <h4 style="color: gray;">Work Information</h4>
            
            <h3>Address:</h3> <br>
            
            <h5 id="response"><?php echo '' . $login_address . "<br>" . $login_city . ', ' .$login_state . '&nbsp' . $login_country;?></h5>
            
            <h3>Employee since:</h3>
            
            <h5><?php echo date ("F j, Y", $cleanHired);?></h5>
          
          </div> 
             
          <div class="contact-content">
            
            <h4 style="color: gray;">Contact Information</h4>
            
            <h3>Email Address:</h3> <br>
                
            <h5 id="response"><?php echo '' . $login_email;?></h5>
            
            <h3>Phone Number:</h3> <br>
            
            <h5 id="response"><?php 
                  echo '('.substr($login_phone, 0, 3).') '.substr($login_phone, 3, 3). '-' . substr($login_phone,6);//echo '' . $login_phone;?></h5>
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
    
</html>
