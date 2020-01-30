<?php

/*
	Prior to August 2019, I used a basic two-factor system where a 5-digit number would be randomly generated once the login credentials
	were correct. From there, a text message would be sent to my phone via Twilio, and entered that 5-digit number would verify login.
	I made the switch to DuoMobile because it was more straightforward and secure than simply setting up a text message system.
	When login credentials are confirmed correct, DuoMobile sends a request to my mobile phone that times out after 60 seconds. Through
	the DuoMobile mobile app I can accept or decline the verification request. Confirmation sends me to the Web application home 
	page in the Web browser.
*/
include("session.php");
include("duo_variables.php");
require_once("duo_php-master/src/Web.php");
//Assign the user attempting to login to a variable
$active = $_SESSION['activeUser'];
$sig_request = Duo\Web::signRequest(IKEY, SKEY, AKEY, $active);

if (isset($_POST['sig_response'])) {
    /*
     * Verify sig response and log in user. Make sure that verifyResponse
     * returns the username we logged in with. You can then set any
     * cookies/session data for that username and complete the login process.
     */
    $resp = Duo\Web::verifyResponse(IKEY, SKEY, AKEY, $_POST['sig_response']);
    if ($resp === $active) {
        // Password protected content would go here.
        header("location:Hub/");
    }
}
?>

<html>

<title>MitchellSync Verify Login</title>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon.ico">
</head>

<body>
	<h1 align="center">Please verify your login.</h1>
	<div align="center">
		<script type="text/javascript" src="duo_php-master/js/Duo-Web-v2.js"></script>
		<link rel="stylesheet" type="text/css" href="Duo-Frame.css">
		<iframe id="duo_iframe" data-host="<?php echo HOST; ?>" data-sig-request="<?php echo $sig_request; ?>"></iframe>
	</div>

</body>

</html>
<style>

	iframe {
		height: 500px;
		margin-top: 20px;
		border-radius: 5px;
		border: 3px solid black;
	}
	.enter {
		font-family: 'Cambo', Times, serif;
		color: white;
		background-color: black;
		border: 1.5px solid white;
		border-radius: 8px;
		padding: 8px;
		width: 80px;
	}

	.enter:hover {
		color: black;
		background-color: white;
		border: 1.5px solid black;
		transition-duration: 0.3s;
		cursor: pointer;
	}

	.enter:hover .fa.fa-lock:before {
		content: "\f13e";
	}

	h1 {
		font-size: 34px;
		margin-top: 50px;
	}

	p {
		font-size: 22px;
	}