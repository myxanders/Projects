<?php
include("../../../session.php");
include("../../../eflsidenav.php");

$n = "<br>";
?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>English Football League</title>
		<link rel="stylesheet" type="text/css" href="../../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>
		<br><br>
		<h1 align="center"><a href='../' style="text-decoration: none; color: black;">EFL Cups & Competitions</a></h1>
		<!-- Current options include showing each team's page, the season's schedule, the season's standings, and super bowl history -->
		<div class="app-container" align="center" style="margin-top: 10px; padding-top:20px; padding-bottom: 20px; border-radius: 12px;">
					<button class="app" id="facup" onclick="window.location.href='facup.php'">FA Cup</button>
					<button class="app" id="eflcup" onclick="window.location.href='eflcup.php'">Carabao Cup</button>
					<button class="app" id="shield" onclick="window.location.href='comphistory.php'">All Comps/Cups</button>
		</div>
	</body>
</html>
<style>

	body {
		background-image: url("../../../Assets/EFL/eflpitchbg.jpg");
		background-size: 100%, 80%;
	}

	h1 {
		font-size: 120px;
		color: black;
		text-shadow: 5px 5px darkred;
		margin:15px;
	}
	.app {
		font-family: 'Cambo', Times, serif;
		font-size: 20px;
        width: 220px;
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
        border: solid black 8px;
    }
</style> 