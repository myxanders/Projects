<?php
include("config.php");
session_start();   
//print_r($_POST);

$user_check = $_SESSION['login_user'];   
$ses_sql = mysqli_query($db,"select username from login where username = '$user_check' ");   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
$login_session = $row['username'];


$target_file = "uploads/" . basename($_FILES['photo']['name']);
$uploadOk = 1;

$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$state = mysqli_real_escape_string($db, $_POST['state']);
$city = mysqli_real_escape_string($db, $_POST['city']);
$zip = mysqli_real_escape_string($db, $_POST['zip']);
$username = mysqli_real_escape_string($db, $_POST['username']);

//profile picture
$pic = mysqli_real_escape_string($db,($_FILES['photo']['name']));

$sqlEID = "select eid from employee where username = '" . $login_session . "'";   
$eid = mysqli_query($db,$sqlEID);   
$rowEID = mysqli_fetch_assoc($eid);
$eid = $rowEID['eid'];

// Check all input boxes to change those parts of the profile
if($username || $phone || $email || $address || $city || $state || $zip){
	$sql = "UPDATE employee SET ";
	if($username != ""){
		$sql .= "username = '$username', ";
	}
	if($phone != ""){
		$sql .= "homePhone = '$phone', ";
	}
	if($email != ""){
		$sql .= "email = '$email', ";
	}
	if($address != ""){
		$sql .= "streetAddress = '$address', ";
	}
	if($city != ""){
		$sql .= "city_town = '$city', ";
	}
	if($state != ""){
		$sql .= "state = '$state', ";
	}
	if($zip != ""){
		$sql .= "zip = '$zip', ";
	}

	$sql = substr($sql, 0, -2);

	$sql .= " WHERE eid = '" . $eid . "'";


	if (!mysqli_query($db, $sql)) {
		die('Error: ' . mysqli_error($db)); 
	} 

}

if ($pic) {
	$picInsert = "UPDATE employee SET picture = '$pic' WHERE eid = '" . $eid . "'";

	if (!mysqli_query($db, $picInsert)) {
		die('Error: ' . mysqli_error($db));
	}
}


$check = getimagesize($_FILES['photo']['tmp_name']);
if($check !== false) {
	//echo "File is an image - " . $check["mime"] . ".";
	$uploadOk = 1;
} else {
	//echo "File is not an image.";
	$uploadOk = 0;
}

//echo $uploadOk;
//echo "<br>" . $target_file . "<br>";
//echo "<br>" . $_FILES['photo']['tmp_name'];

if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
} else if ($uploadOk == 1){
	if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
		//echo "The file ". basename( $_FILES['photo']['name']). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}


mysqli_close($db);


?>
<html>
    <title>Edit Profile</title>
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

        
        <div id="mainContent" align="center" style="margin-top:10%;">
            
            <h1>Successful update!</h1>
            <h3>You will be redirected back to your profile in...</h3>
            <p><span id="counter">3</span></p>
            <script type="text/javascript">
            	function countdown () {
            		var i = document.getElementById("counter");
            		if (parseInt(i.innerHTML)<=1) {
            			location.href = 'profile.php';
					}
					i.innerHTML = parseInt(i.innerHTML)-1;
            	}
            	setInterval(function() {countdown(); }, 1000);
            </script>          
        </div>
    </body>
</html>

<style>
	#mainContent {
		color: white;
	}

	#counter {
		font-size: 50px;
	}

	h1 {
		font-weight: bold;
		color: #00c000;
	}
</style>