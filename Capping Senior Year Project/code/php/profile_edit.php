<?php
   include('session.php');
   include('nav_check.php');
   
   $sqlPicture = "select picture from employee where username = '" . $login_session . "'";   
   $picture = mysqli_query($db,$sqlPicture);   
   $rowPicture = mysqli_fetch_assoc($picture);
   $login_picture = $rowPicture['picture'];
?>
<html>

    <title>My ACME Profile Page</title>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/StyleSheet.css">
        <link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css">
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes Page Responsive -->
    </head>
    
    
    <body>
	<form method="post" action="profile_edit_processing.php" id="update" enctype="multipart/form-data">
        <div class="container-profile-style">
			<br>
			<h4 class="personalInfo" style="color: gray;">Personal Information</h4>
				
			<h3 class="personalInfo">Username: <a style="font-size: 10px; color: #f44336;">Must be at least 6 characters in length.</a></h3>
			<h5 class="personalInfo"><input style="width: 70%;" type="text" pattern="[a-zA-Z_0-9@\!#\$\^%&*()+=-.]{6,}" name="username" placeholder="Enter Username"></h5> 
			  
			<img class="picInfo" style="margin-top: -100px; margin-bottom: -150px;" src="uploads/<?php echo $login_picture;?>">
			  
			<h3 class="personalInfo">Profile Picture:</h3>
			<input class="personalInfo" type="file" name="photo" placeholder="Select image to upload:">
			  
			<hr id="underEdit" style="margin-top: 50px;">
             
			<div class="underWork">

				<hr id="workHr">            
				
				<h4 style="color: gray;">Work Information</h4>
				
				<h3>Address:</h3> <br>
				
				<h5 id="response"><input style=" margin-top: 10px; width: 35%;" type="text" name="address" placeholder="Enter Home Address" >
							<br><input style="margin-top: 10px; width: 35%;" type="text" pattern="[A-Za-z ]{1,2}" maxlength="2" name="state" placeholder="Enter State (if applicable)">
							<br><input style="margin-top: 10px; width: 35%;" type="text" pattern="[A-Za-z ]{1,15}" name="city" placeholder="Enter City" >
							<br><input style="margin-top: 10px; width: 35%;"" type="text" pattern="\d*" name="zip" placeholder="Enter Zip Code" ></h5>
						 
			  </div> 
             
			  <div class="contact-content">
				
				<h4 style="color: gray;">Contact Information</h4>
				
				<h3>Email Address:</h3> <br>
					
				<h5 id="response"><input style="width: 70%; margin-top: 10px;" type="text" name="email" placeholder="Enter Email Address" ></h5>
				
				<h3>Phone Number:</h3> <br>
				
				<h5 id="response"><input style="width: 70%; margin-top: 10px;" type="text" pattern="\d*" maxlength="12" name="phone" placeholder="e.g. 7173457575" >
			  </div>    
		
			<!-- Submit the new updates -->
			<button class="updateProfile" type="submit" name="submit" onclick="location.href='profile_edit_processing.php'" style="cursor: pointer;">Update</button>
			
        </div>      
		</form>
        
         <!-- Footer -->
        <div class="footer">
            <div class="footer-contact">
                <h4>Contact</h4>
                <a href="">contact@acme.com</a>
            </div>
            <div class="footer-apps">
                <h4>Applications</h4>
                <a href="AccessDenied.php">Salesforce.com</a><br>
                <a href="AccessDenied.php">Artifactory</a><br>
                <a href="AccessDenied.php">Teamcity</a><br>
                <a href="AccessDenied.php">Outlook</a><br>
                <a href="AccessDenied.php">Skype for Business</a><br>
                <a href="AccessDenied.php">Assest Management</a>
            </div>
        </div>
        
    
    </body>
    
</html>
