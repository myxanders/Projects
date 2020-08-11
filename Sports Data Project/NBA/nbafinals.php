<?php
include("../../session.php");
include("../../nestedsidenav.php");

//Grab everything from the superbowls table where a Super Bowl has been played
$sql = mysqli_query($db, "SELECT * FROM nba_finals_history WHERE winner != '' ORDER BY year DESC");
$nums = mysqli_num_rows($sql);
?>


<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<title>NBA Finals History</title>
	<link rel='stylesheet' type='text/css' href='nbastyle.css' />
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>

<body>

	<h1 align="center"><a href='../NBA' style="text-decoration: none; color:white;">NBA</a></h1>
	<div class="history" align="center" style="margin-top: 10px">
		<p>NBA Finals History</p>
		<table align="center" id="bowls">
			<tr>
				<th style="width: 100px; text-align: center;">Year</th>
				<th style="width: 200px; text-align: center;">Winners</th>
				<th style="width: 100px; text-align: center;">Series</th>
				<th style="width: 200px; text-align: center;">Losers</th>
			</tr>
			<?php
			$i = 1;
			while ($i <= $nums && $r = mysqli_fetch_array($sql)) {
				$champ = $r['winnerid'];
				$second = $r['loserid'];
				$series = $r['games'];
				$games = $series - 4;
				$year = $r['year'] + 1;
				$yr = substr($year, -2);
				$beep = $r['winner'];
				$boop = $r['loser'];
				$query = mysqli_query($db, "SELECT * FROM nbateams WHERE tid = '$champ'");
				$row = mysqli_fetch_array($query);
				$winningteam = $row['team'];
				$query = mysqli_query($db, "SELECT * FROM nbateams WHERE tid = '$second'");
				$row = mysqli_fetch_array($query);
				$losingteam = $row['team'];
				if ($beep == "SYR") {
					$winningteam = "Nationals";
				}
				if ($beep == "BAL") {
					$winningteam = "Bullets";
				}
				if ($beep == "SEA") {
					$winningteam = "SuperSonics";
				}
				if ($beep == "ROC") {
					$winningteam = "Royals";
				}
				if ($beep == "WSH") {
					$winningteam = "Bullets";
				}
				if ($boop == "WSH") {
					$losingteam = "Bullets";
				}
				if ($boop == "SEA") {
					$losingteam = "SuperSonics";
				}
				if ($boop == "SYR") {
					$losingteam = "Nationals";
				}
				if ($boop == "STG") {
					$losingteam = "Stags";
				}
				if ($boop == "ROC") {
					$losingteam = "Royals";
				}
				if ($boop == "CAP") {
					$losingteam = "Capitols";
				}
				//Spit out a table in a nice, readable format
				?>
			<tr>
				<td style="background-color: white;"><?php echo $r['year'] . "-" . $yr; ?></td>
				<td id="<?php echo $r['winner'] ?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $r['winner']; ?>"><img src="../../Assets/NBA/<?php echo $r['winner'] ?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $winningteam ?></span></td>
				<td style="background-color: white;">4-<?php echo $games; ?></td>
				<td id="<?php echo $r['loser'] ?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $r['loser']; ?>"><img src="../../Assets/NBA/<?php echo $r['loser'] ?>.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;"><?php echo $losingteam ?></span></td>
			</tr>
			<?php
				$i++;
			}
			?>
		</table>
	</div>
</body>

</html>
<style>
	html {
		height: 100%;
	}

	body {
		background-image: linear-gradient(firebrick, black);
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px darkblue;
		margin: 15px;
	}

	p {
		font-size: 30px;
		color: white;
		text-shadow: 1px 1px black;
		margin: 15px;
	}

	button {
		background-color: #cc0000;
		border: 1px solid #3c1063;
		border-radius: 4px;
		cursor: pointer;
		padding: 6px;
		color: white;
	}

	button:hover {
		background-color: white;
		border: 1px solid #3c1063;
		border-radius: 4px;
		cursor: pointer;
		padding: 6px;
		color: black;
		transition-duration: 0.4s;
	}

	#whatif {
		margin-bottom: 5%;
		font-size: 16px;
		border-radius: 8px;
		border: 2px solid white;
		box-shadow: 2px 2px black;
	}

	#whatif:hover {
		background-color: white;
		font-size: 16px;
		border-radius: 8px;
		border: 2px solid black;
		color: black;
	}

	.history {
		margin-top: 100px;
		margin-left: -8%;
		margin-right: -8%;
		width: auto;
		margin-bottom: 2%;
		display: block;
	}

	#bowls {
		border-collapse: collapse;
		border-radius: 30px;
		font-size: 18px;
	}

	#bowls td {
		border: 1px solid grey;
		padding: 1%;
		text-align: center;
	}

	#bowls th {
		background-color: tan;
		color: white;
		text-align: center;
		border: 1px solid black;
		padding: 1%;
	}

	td a {
		display: block;
		text-decoration: none;
		width: 100%;
		color: black;
	}

	#HWK {
		background-color: #ca0628;
		color: white;
	}

	#HST {
		background-color: #dc022c;
		color: #f4c23c;
	}

	#CLV {
		background-color: #9f1f32;
		color: #876d49;
	}

	#JAZ {
		background-color: #644a9c;
		color: #19aae3;
	}

	#MAG {
		background-color: black;
		color: #007dc6;
	}

	#KNI,
	#NYX {
		background-color: #106cb6;
		color: #ec702e;
	}

	#MLW {
		background-color: #009933;
		color: white;
	}

	#MPL {
		background-color: #004B87;
		color: white;
	}

	#NJ {
		background-color: #041E42;
		color: #8D9093;
	}

	#PAC {
		background-color: #041E42;
		color: #FFCD00;
	}

	#PHO {
		background-color: #5F259F;
		color: #FE5000;
	}

	#PIS {
		background-color: #003DA5;
		color: #D50032;
	}

	#PRT {
		background-color: black;
		color: #BA0C2F;
	}

	#ROC {
		background-color: #003DA5;
		color: white;
	}

	#SA,
	#SPU {
		background-color: black;
		color: #8D9093;
	}

	#SEA {
		background-color: #00843D;
		color: #FFCD00;
	}

	#STG {
		background-color: #D50032;
		color: #002F6C;
	}

	#SYR {
		background-color: #002F6C;
		color: #D50032;
	}

	#WSH {
		background-color: #BA0C2F;
		color: #002F6C;
	}

	#GS {
		background-color: #FFD100;
		color: #002F6C;
	}

	#CAP {
		background-color: #046A38;
		color: white;
	}

	#PHL {
		background-color: black;
		color: #D50032;
	}

	#BAL {
		background-color: #003DA5;
		color: white;
	}
</style>