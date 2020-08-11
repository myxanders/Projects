<?php
include("../../session.php");
include("../../nestedsidenav.php");

$sql = mysqli_query($db, "SELECT * FROM stanleycups WHERE winner != '' ORDER BY year DESC");
$nums = mysqli_num_rows($sql);
?>


<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<title>Stanley Cup Finals History</title>
	<link rel='stylesheet' type='text/css' href='nhlstyle.css' />
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>

<body>

	<h1 align="center"><a href='../NHL' style="text-decoration: none; color:white;">NHL</a></h1>
	<div class="history" align="center" style="margin-top: 10px">
		<p>Stanley Cup Finals History</p>
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
				$year = $r['year'] - 1;
				$yr = substr($r['year'], -2);
				$beep = $r['winner'];
				$boop = $r['loser'];
				$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE tid = '$champ'");
				$row = mysqli_fetch_array($query);
				$winningteam = $row['team'];
				$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE tid = '$second'");
				$row = mysqli_fetch_array($query);
				$losingteam = $row['team'];
				$blammo = "4-";
				//The 1938 Finals were best-of-5
				if ($year < 1938) {
					$blammo = "3-";
					$games = $series - 3;
				}
				?>
			<tr>
				<td style="background-color: white;"><?php echo $year . "-" . $yr; ?></td>
				<td id="<?php echo $r['winner'] ?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $r['winner']; ?>"><img src="../../Assets/NHL/<?php echo $r['winner'] ?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;">
						<?php
						//1918 and 2004 Finals were cancelled
							if ($year == 2004) {
								echo "NHL Lockout";
							} elseif ($year == 1918) {
								echo "Cancelled Due to";
							} else {
								echo $winningteam;
							}
						//Account for team names not accounted for by current team ids
							if ($beep == "MM") {
								echo "Maroons";
							}
							if ($beep == "OWA") {
								echo "Senators";
							}
							if ($beep == "VIC") {
								echo "Cougars";
							}
							if ($beep == "TSP") {
								echo "St. Pats";
							}
							if ($beep == "TAR") {
								echo "Arenas";
							}
							if ($beep == "SM") {
								echo "Metropolitans";
							}
							if ($beep == "VM") {
								echo "Millionaires";
							}
							?>
					</span></td>
				<td style="background-color: white;">
					<?php
					//There were some other weird series results
						if ($year == 1922 || $year == 1923 || $year == 1928 || $year == 1929) {
							echo "2-0";
						} elseif ($year == 1926) {
							echo "2-0-2";
						} elseif ($year == 1918 || $year == 2004) {
							echo " ";
						} else {
							echo $blammo . $games;
						}
						?>
				</td>
				<td id="<?php echo $r['loser'] ?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $r['loser']; ?>"><img src="../../Assets/NHL/<?php echo $r['loser'] ?>.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;">
						<?php
						//1918 and 2004 Finals were cancelled
							if ($year == 2004) {
								echo "Season Cancelled";
							} elseif ($year == 1918) {
								echo "Flu Epidemic";
							} else {
								echo $losingteam;
							}
						//Some team names are not accounted for by current team ids
							if ($boop == "MNS") {
								echo "North Stars";
							}
							if ($boop == "MM") {
								echo "Maroons";
							}
							if ($boop == "VIC") {
								echo "Cougars";
							}
							if ($boop == "CT") {
								echo "Tigers";
							}
							if ($boop == "EE") {
								echo "Eskimos";
							}
							if ($boop == "VM") {
								echo "Millionaires";
							}
							if ($boop == "SM") {
								echo "Metropolitans";
							}
							if ($boop == "POR") {
								echo "Rosebuds";
							}
							if ($boop == "OWA") {
								echo "Senators";
							}
							?>
					</span></td>
			</tr>
			<?php
				$i++;
			}
			?>
		</table>
	</div>
	<div align="center">
		<button id="whatif" align="center" onclick="window.location.href='whatif.php'">What if the other conference finalists won their respective trophies?</button>
		<div>
</body>

</html>
<style>
	html {
		height: 100%;
	}

	body {
		background-image: linear-gradient(silver, lightskyblue);
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 120px;
		color: black;
		text-shadow: 5px 5px lightskyblue;
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
		background-color: lightskyblue;
		color: black;
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
/* The following styles are for defunct teams and old branding of current teams*/
	#ANH {
		background-color: black;
		color: #89734C;
	}

	#AMD {
		background-color: #512A44;
		color: #00685E;
	}

	#BFO {
		background-color: #003087;
		color: #F3D03E;
	}

	#BST {
		background-color: black;
		color: #FFD100;
	}

	#CT {
		background-color: #ff4c01;
		color: black;
	}

	#DLS {
		background-color: black;
		color: #154734;
	}

	#EE {
		background-color: white;
		color: #005016;
	}

	#LAK {
		background-color: black;
		color: #8D9093;
	}

	#MM {
		background-color: #672146;
		color: white;
	}

	#MNS {
		background-color: #009639;
		color: #FFD100;
	}

	#MON {
		background-color: #C8102E;
		color: #003087;
	}

	#OWA {
		background-color: black;
		color: #DA291C;
	}

	#PAN {
		background-color: #DA291C;
		color: #001E60;
	}

	#PEN {
		background-color: black;
		color: #CFC493;
	}

	#POR {
		background-color: #010a39;
		color: #9c160c;
	}

	#RAG {
		background-color: #00205B;
		color: #C8102E;
	}

	#SAB {
		background-color: black;
		color: #C8102E;
	}

	#SEN {
		background-color: #e4173e;
		color: black;
	}

	#SM {
		background-color: #004e0a;
		color: #9e1b20;
	}

	#TAR {
		background-color: #003087;
		color: white;
	}

	#TBL {
		background-color: black;
		color: white;
	}

	#TSP {
		background-color: #046A38;
		color: white;
	}

	#VCV {
		background-color: black;
		color: #FFD100;
	}

	#VIC {
		background-color: #2b71be;
		color: #ffea00;
	}

	#VM {
		background-color: #4d1112;
		color: white;
	}

	#WAS {
		background-color: black;
		color: #236192;
	}
</style>