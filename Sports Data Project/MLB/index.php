<?php
include("../../session.php");
include("../../nestedsidenav.php");

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>MLB Baseball</title>
		<link rel="stylesheet" type="text/css" href="MXFL.css">
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center">MLB</h1>
		<!-- Current options include showing each team's page, the season's schedule, the season's standings, and World Series history -->
		<div class="app-container" align="center" style="margin-top: 10px; padding-top:20px; padding-bottom: 20px;">
					<button class="app" id="teams"  onclick="window.location.href='teams.php'">Teams</button>
					<button class="app" id="standings" onclick="window.location.href='standings.php'">Standings</button><br>
					<button class="app" id="playoffs" onclick="window.location.href='playoffs.php'">Playoff Bracket</button>
					<button class="app" id="worldseries" onclick="window.location.href='worldseries.php'">World Series</button>
		</div>
	</body>
</html>
<style>

	body {
		background-image: url("../../Assets/MLB/diamondbg.jpg");
		background-size: 100%, 80%;
	}

	h1 {
		font-size: 120px;
		color: midnightblue;
		text-shadow: 5px 5px white;
		margin:15px;
	}
	.app {
		font-family: 'Cambo', Times, serif;
		font-size: 20px;
        width: 185px;
        height: 185px;
		background-image: url("../../Assets/MLB/buttonbg.jpg");
		background-size: 300px;
		background-position: -75px -6px;
        color: red;
        border: 2px solid black;
        padding: 2%;
        transition-duration: 0.3s;
        margin: 5px;
        cursor: pointer;
        box-shadow: 5px 5px 3px black;
    }

    .app:hover {
    	color: black;
		background-color: black;
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