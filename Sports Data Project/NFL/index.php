<?php
include("../../session.php");
include("../../nestedsidenav.php");
$n = "<br>";
$sql = mysqli_query($db, "SELECT * FROM superbowls");
$i=0;
while ($i < mysqli_num_rows($sql) && $r = mysqli_fetch_array($sql)){
	$roman = $r['roman'];
	$winner = $r['winningteam'];
	$loser = $r['losingteam'];
	$query = mysqli_query($db, "SELECT tid FROM nflteams WHERE team = '$winner'");
	$q = mysqli_fetch_array($query);
	$winid = $q['tid'];
	$boop = mysqli_query($db, "SELECT tid FROM nflteams WHERE team = '$loser'");
	$b = mysqli_fetch_array($boop);
	$loseid = $q['tid'];
	mysqli_query($db, "UPDATE superbowls SET winnerid = $winid, loserid = $loseid WHERE roman = '$roman'");
	$i++;
}

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>NFL Football</title>
		<link rel="stylesheet" type="text/css" href="schedulestyle.css">
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center">NFL</h1>
		<!-- Current options include showing each team's page, the season's schedule, the season's standings, playoff bracket, and super bowl history -->
		<div class="app-container" align="center" style="margin-top: 10px; padding-top:20px; padding-bottom: 20px;">
					<button class="app" id="teams"  onclick="window.location.href='teams.php'">Teams</button>
					<button class="app" id="schedule"  onclick="window.location.href='schedule.php'">Schedule</button>
					<button class="app" id="standings" onclick="window.location.href='standings.php'">Standings</button><br>
					<button class="app" id="playoffs" onclick="window.location.href='playoffs.php'">Playoff Bracket</button>
					<button class="app" id="superbowls" onclick="window.location.href='superbowls.php'">Super Bowls</button>
		</div>
	</body>
</html>
<style>

	body {
		background-image: url("../../Assets/NFL/fieldbg.jpg");
		background-size: 100%, 80%;
	}

	h1 {
		font-size: 120px;
		color: #ca0913;
		text-shadow: 5px 5px white;
		margin:15px;
		-webkit-text-stroke: 2px black;
	}
	.app {
		font-family: 'Cambo', Times, serif;
		font-size: 20px;
        width: 185px;
        height: 185px;
		background-image: url("../../Assets/NFL/buttonbg.jpg");
        color: white;
        border: 2px solid white;
        padding: 2%;
        transition-duration: 0.3s;
        margin: 5px;
        cursor: pointer;
        box-shadow: 5px 5px 3px black;
    }

    .app:hover {
    	color: black;
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
		background-color: rgba(0,53,110,.75);
        padding-top:20px;
        padding-bottom: 20px;
        border: solid white 5px;
    }
</style> 