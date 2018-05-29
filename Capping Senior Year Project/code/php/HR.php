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
        <script type="text/javascript" src="../js/ProfilePage.js"></script> 
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
            
            <h1 style="-webkit-text-stroke-color: black; -webkit-text-stroke-width: .75px; text-shadow: 2px 2px black; color: white; font-size: 40px;">Add an Employee</h1>
            
            
        </div>
        
        <div class="employeeForms">
            <div id="employeeFormAdd">
                <h1 style="text-align: center; font-size: 25px; margin-top: 15px">Enter information to add a new Employee to add to ACME</h1>
                <hr style="border-top:1px solid darkred;">

                <form method="post" action="HR_processing.php" id="addEmployee" enctype="multipart/form-data">

                    <div class="inputAlign">
                        <h4 style="margin-top: 30px;">Employee Information*</h4>
                        <input type="text" pattern="[A-Za-z]{1,15}" name="firstname" placeholder="Enter First Name" required>
                        <input type="text" pattern="[A-Za-z]{1,15}" name="lastname" placeholder="Enter Last Name" required>
                        <input style="margin-top: 10px; width: 20%" type="date" name="dob" required>
                        <input style="margin-top: 10px; width: 35%;" type="text" pattern="\d*" maxlength="12" name="phone" placeholder="e.g. 7173457575" required>
                        <input style="width: 7%;" type="text" pattern="\d*" maxlength="3" name="ext" placeholder="Ext" required>   
                        <select style="height: 40px; width: 26.5%">
                            <option value="" disabled selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                            <option value="Private">Prefer Not To Say</option>
                        </select>
                        <h6 style="margin:0;">Date of Birth</h6> 
						<h6 style="margin-left: 21%;margin-top: -24px;">Phone Number</h6> 
						<h6 style="margin-left: 57%;margin-top: -34px;">Ext</h6>
						
                        <select style="height:40px; width: 22%" name="location">
                            <option value = "" disabled selected>Location</option>
                            <option value = "1">New York</option>
                            <option value = "2">Chicago</option>
                            <option value = "3">Los Angeles</option>
                            <option value = "4">Tokyo</option>
                            <option value = "5">Paris</option>
                            <option value = "6">London</option>
                        </select>
                        <select style="height:40px; width: 22%" name="title">
                            <option value = "" disabled selected>Position</option>
                            <option value = "1">CEO/Board</option>
                            <option value = "2">Administrator</option>
                            <option value = "3">HR</option>
                            <option value = "4">Manager</option>
                            <option value = "5">Employee</option>
                        </select>
                        <select style="height:40px; width: 22%"" name="department">
                            <option value = "" disabled selected>Department</option>
                            <option value = "1">Marketing</option>
                            <option value = "2">Sales</option>
                            <option value = "3">Plant and Infrastructure</option>
                            <option value = "4">Information Technology</option>
                            <option value = "5">Product Development</option>
                            <option value = "6">Human Resources</option>
                        </select>
						
						<select style="height:40px; width: 22%; text-transform: capitalize;" name="reportsTo">
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
                        <h4 style="margin-top: 22px;">Home Address*</h4>
                        <input style="width: 90.9%;" type="text" name="address" placeholder="Enter Home Address" required>
                        <input style="margin-top: 10px; width: 25%;" type="text" pattern="[A-Za-z ]{1,15}" name="country" placeholder="Enter Country" required>
                        <select style="height: 40px; width: 25%; margin-top: 10px;" name="state">
                            <option value = "" selected></option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option> 
                        </select>
                        <input style="margin-top: 10px; width: 20%;" type="text" pattern="[A-Za-z ]{1,15}" name="city" placeholder="Enter City" required>
                        <input style="margin-top: 10px; width: 19.3%;"" type="text" pattern="\d*" name="zip" placeholder="Enter Zip Code" required>
                        <h6 style="margin:0;">Country</h6> 
                        <h6 style="margin-left: 25.5%;margin-top: -24px;">State</h6>
						<h6 style="margin-left: 51%;margin-top: -34px;">City</h6> 
						<h6 style="margin-left: 72%;margin-top: -34px;">Zip</h6>
						
                        <h4 style="margin-top: 22px;">Login Information*</h4>
                        <input type="text" name="username" pattern="[a-zA-Z_0-9@\!#\$\^%&*()+=-.]{6,}" placeholder="Enter New Username" required>
                        <input type="password" name="password" pattern="[a-zA-Z_0-9@\!#\$\^%&*()+=-.].{6,}" placeholder="Enter New Password" required>
                        <input type="password" name="verifypw" pattern="[a-zA-Z_0-9@\!#\$\^%&*()+=-.].{6,}" style="margin-left: 0px; margin-top: 5px" placeholder="Re-enter Password" required>
                        <!-- profile pic code -->
						<input type="file" class="button" name="photo" style="margin-left: 50px; margin-top: 5px" placeholder="Select image to upload:"> 
						<input style="width: 70%; margin-top: 10px;" type="text" name="email" placeholder="Enter Email Address" required>
                        <input style="width: 20%;" type="date" name="hiredate" required>
                        <h6 style="margin:0;">Email Address</h6> <h6 style="margin-top: -24px;margin-left: 71%;">Hire Date</h6> 
                        
                        <br><br> <button class="employeeAdd" type="submit" name="submit" style="cursor: pointer;">Create</button>
                    </div>
                </form>
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
<style>

    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>




