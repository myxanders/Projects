<?php
include("../../../session.php");
include("../../../eflsidenav.php");

$n = "<br>";
?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>EFL Championship</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

	<h1 align="center"><a href='../' style="text-decoration: none; color: navy;">EFL Championship</a></h1>
		<!-- Current options include showing each team's page, the season's schedule, the season's standings, and super bowl history -->
		<div class="app-container" align="center" style="margin-top: 10px; padding-top:20px; padding-bottom: 20px; border-radius: 12px;">
					<button class="app" id="premier"  onclick="window.location.href='schedule.php'">Fixtures</button>
					<button class="app" id="championship"  onclick="window.location.href='table.php'">Table</button>
					<button class="app" id="league1" onclick="window.location.href='playoffs.php'">Playoffs</button>
					<button class="app" id="league1" onclick="window.location.href='history.php'">History</button>
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
		color: navy;
		text-shadow: 5px 5px red;
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

    .app#proreg, .app#clubs {
    	width: 384px;
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
        border: solid navy 8px;
    }
</style> 