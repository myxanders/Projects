<?php
include("../../session.php");
include("../../nestedsidenav.php");

$n = "<br>";
?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>English Football League</title>\
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center">EFL Levels</h1>
		<!-- Each level of EFL competiton as well as domestic cups and promotion/relegation -->
		<div class="app-container" align="center" style="margin-top: 10px; padding-top:20px; padding-bottom: 20px; border-radius: 12px;">
					<button class="app" id="premier"  onclick="window.location.href='Premier/'">Premier League</button>
					<button class="app" id="championship"  onclick="window.location.href='Championship/'">Championship</button>
					<button class="app" id="league1" onclick="window.location.href='League_One/'">League One</button>
					<button class="app" id="league2" onclick="window.location.href='League_Two/'">League Two</button>
					<button class="app" id="clubs" onclick="window.location.href='teams.php'">Clubs</button>
					<button class="app" id="cups" onclick="window.location.href='cups/'">Competitions</button>
					<button class="app" id="proreg" onclick="window.location.href='prorel.php'">Promotion/Relegation</button>
		</div>
	</body>
</html>
<style>

	body {
		background-image: url("../../Assets/EFL/eflpitchbg.jpg");
		background-size: 100%, 80%;
	}

	h1 {
		font-size: 120px;
		color: purple;
		text-shadow: 5px 5px white;
		margin:15px;
	}
	.app {
		font-family: 'Cambo', Times, serif;
		font-size: 20px;
        width: 185px;
        height: 185px;
        background-color: green;
        color: white;
        border: 2px solid white;
        border-radius: 8px;
        padding: 2%;
        transition-duration: 0.3s;
        margin: 5px;
        cursor: pointer;
        box-shadow: 5px 5px 3px black;
        overflow-x: wrap;
    }

    .app#proreg, .app#clubs, .app#cups {
    	width: 252px;
    	height: 150px;
    }

    .app:hover {
    	color: white;
		background-color: black;
		border: 2px solid white;
		transition-duration: 0.3s;
		cursor: pointer;
    }

    .app-container {
    	margin-top: 100px;
        max-width: 60%;
        margin-left: 20%;
        margin-bottom: 5%;
        display: block;
        margin-top: 10px;
		background-color: rgba(255,255,255,.75);
        padding-top:20px;
        padding-bottom: 20px;
        border-radius: 12px;
        border: solid purple 8px;
    }
</style> 