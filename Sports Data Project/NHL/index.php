<?php
include("../../session.php");
include("../../nestedsidenav.php");
$n = "<br>";

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>NHL Hockey</title>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center">NHL</h1>
		<!-- Current options include showing each team's page, the season's schedule, the season's standings, playoff bracket, and stanley cup history -->
		<div class="app-container" align="center" style="margin-top: 10px; padding-top:20px; padding-bottom: 20px;">
					<button class="app" id="teams"  onclick="window.location.href='teams.php'">Teams</button>
					<button class="app" id="standings" onclick="window.location.href='standings.php'">Standings</button><br>
					<button class="app" id="playoffs" onclick="window.location.href='playoffs.php'">Playoff Bracket</button>
					<button class="app" id="superbowls" onclick="window.location.href='stanleycups.php'">Stanley Cup</button>
		</div>
	</body>
</html>
<style>

	body {
		background-image: url("../../Assets/NHL/rinkbg.jpg");
		background-size: 100%, 80%;
	}

	h1 {
		font-size: 120px;
		color: black;
		text-shadow: 5px 5px white;
		margin:15px;
	}
	.app {
		font-family: 'Cambo', Times, serif;
		font-size: 20px;
        width: 185px;
        height: 185px;
		background-image: url("../../Assets/NHL/buttonbg.jpg");
		background-size: 500px;
		background-position: -125px -60px;
        color: white;
        border: 2px solid red;
        padding: 2%;
        transition-duration: 0.3s;
        margin: 5px;
        cursor: pointer;
        box-shadow: 5px 5px 3px black;
    }

    .app:hover {
    	color: yellow;
		background-color: white;
		border: 2px solid yellow;
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
        border: solid red 5px;
    }
</style> 