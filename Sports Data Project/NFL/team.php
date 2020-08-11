<?php
//What id was clicked on
$id = $_GET['id'];

include("../../session.php");
//The Oakland Raiders moved to Los Angeles then moved back to Oakland and then to Las Vegas
if ($id == 'RAI' || $id == 'OAK') {
	header("location:team.php?id=LV");
}
//The San Diego Chargers moved to Los Angeles
if ($id == 'SD' || $id == 'SDG') {
	header("location:team.php?id=LAC");
}
//The Baltimore Colts moved to Indianapolis
if ($id == 'BLT') {
	header("location:team.php?id=IND");
}
//The Los Angeles Rams moved to St. Louis before moving back to LA
if ($id == 'RAM' || $id == 'STL' || $id == 'REF') {
	header("location:team.php?id=LAR");
}
//The Dolphins Old Logo
if ($id == 'DOL') {
	header("location:team.php?id=MIA");
}
// The Browns Old Logo
if ($id == 'BRN') {
	header("location:team.php?id=CLE");
}
// The Broncos Old Logo
if ($id == 'DNV') {
	header("location:team.php?id=DEN");
}
// The Lions Old Logo
if ($id == 'LEO') {
	header("location:team.php?id=DET");
}
// The Jets Old Logo
if ($id == 'JET') {
	header("location:team.php?id=NYJ");
}
// The Jaguars Old Logo
if ($id == 'JAG') {
	header("location:team.php?id=JAX");
}
// The Buccaneers Old Logo
if ($id == 'TAM' || $id == 'TMP') {
	header("location:team.php?id=TB");
}
// The Falcons Old Logo
if ($id == 'FAL') {
	header("location:team.php?id=ATL");
}
// The Giants Old Logo
if ($id == 'GIA') {
	header("location:team.php?id=NYG");
}
// The Panthers Old Logo
if ($id == 'PAN') {
	header("location:team.php?id=CAR");
}
// The Patriots Old Logo
if ($id == 'PAT') {
	header("location:team.php?id=NE");
}
// The Eagles Old Logo
if ($id == 'PHL') {
	header("location:team.php?id=PHI");
}
// The Seahawks Old Logos
if ($id == 'SHK' || $id == 'SWK') {
	header("location:team.php?id=SEA");
}
// The Vikings Old Logo
if ($id == 'VIK') {
	header("location:team.php?id=MIN");
}
// The Oilers Relocated to Tennessee
if ($id == 'HST') {
	header("location:team.php?id=TEN");
}

//Team page is now the corresponding id
$_SESSION['id'] = $id;
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";
$teamcheck = mysqli_query($db, "SELECT * FROM nflteams WHERE teamShort = '" . $id . "'");
$r = mysqli_fetch_array($teamcheck);
$tid = $r['tid'];
$team = $r['team'];
$teamLoc = $r['location'];
$est = $r['est'];
$sbwins = $r['sbwins'];
$confwins = $r['confwins'];
$divwins = $r['divtitles'];
$playoffs = $r['playoffs'];
//Washington currently follows a different naming convention
if ($team == "Washington"){
	$team = "Football Team";
}
$sbs = "";
$sbapps = "";
//Grammar checks
if ($sbwins != 1) {
	$sbs = $sbwins . " Super Bowls";
} else {
	$sbs = $sbwins . " Super Bowl";
}
if ($confwins != 1) {
	$sbapps = $confwins . " appearances";
} else {
	$sbapps = $confwins . " appearance";
}
//Math and grammar checks
$numszns = 2019 - $est;
$lastdigit = substr($numszns, -1);
$szns = "";
if ($lastdigit == 1 && $numszns != 11) {
	$szns = $numszns . "st";
} else if ($lastdigit == 2 && $numszns != 12) {
	$szns = $numszns . "nd";
} else if ($lastdigit == 3 && $numszns != 13) {
	$szns = $numszns . "rd";
} else {
	$szns = $numszns . "th";
}

//Create an array of Super Bowls the team has won.
$sbswon = [];
$sql = mysqli_query($db, "SELECT roman FROM superbowls WHERE winnerid = '$tid'");
$i=0;
while($i < mysqli_num_rows($sql) && $r = mysqli_fetch_array($sql)){
	$roman = $r['roman'];
	array_push($sbswon,$roman);
	$i++;
}

?>

<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<title><?php echo $teamLoc . " " . $team; ?></title>
	<link rel='stylesheet' type='text/css' href='teamStyle.php' />
	<link rel='stylesheet' type='text/css' href='schedulestyle.css' />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>

<body>
	<div class="trophies">
		<?php
		$w = 1;
		//Iterate a Lombardi trophy for every Super Bowl win
		while ($w <= $sbwins + 1) {
			$needle = $w - 1;
			if ($w == $sbwins + 1) { ?>
					<img src="../../Assets/NFL/lombardi.png" id="<?php echo "trophy" . $w; ?>" height=75 width=44 />
					<a href="superbowl.php?sb=<?php echo $sbswon[$needle]; ?>">
						<span class="superbowls" id="sb0"><?php echo $sbswon[$needle]; ?></span>
					</a>
				<?php
					} else { ?>
					<img src="../../Assets/NFL/lombardi.png" style="margin-right:12px;" id="<?php echo "trophy" . $w; ?>" height=75 width=44 />
					<a href="superbowl.php?sb=<?php echo $sbswon[$needle]; ?>">
						<span class="superbowls" id="<?php echo "sb" . $w; ?>" style="min-width: 35px; text-align: center;"><?php echo $sbswon[$needle]; ?></span>
					</a>
			<?php
				}
				$w++;
			}
			?>
	</div>


	<img class="pic" src="../../Assets/NFL/<?php echo $id; ?>.png" style="border: 5px solid <?php echo $priColor; ?>">

	<div class="team-container" align="center">
		<h1><?php echo $teamLoc . " " . $team; ?></h1>
		<div class="bio" style="width: 30%; margin-left: .5%; display: inline-block;">
			<p>The <?php echo $teamLoc . " " . $team ?> are in their <?php echo $szns ?> season in the National Football League. To date, they have won <?php echo $sbs . " in " . $sbapps ?>. They have also won <?php echo $divwins ?> Division Titles, and have made <?php echo $playoffs ?> Playoff Appearances.
			</p>
		</div>
		<?php
		$rivals = $team . "_rivals";
		if ($teamLoc == "Washington"){
			$rivals = $teamLoc . "_rivals";
		}
		$history = mysqli_query($db, "SELECT * FROM $rivals");
		$numrows = mysqli_num_rows($history);
		if ($numrows > 0) {
			?>
			<div class="table" id="rivals" style="vertical-align: top; width: 30%;">
				<table class="records">
					<caption style="font-weight: bold; padding-bottom: 5px;"><?php echo $team . "' Biggest Rivals" ?></caption>
					<tr>
						<th>Team</th>
						<th>Record</th>
						<th>Pct</th>
					</tr>
					<?php
						$i = 1;
						while ($i < $numrows + 1 && $r = mysqli_fetch_array($history)) {
							$opp = $r['team'];
							$w = $r['wins'];
							$l = $r['losses'];
							$t = $r['ties'];
							$rec = $w . "-" . $l;
							if ($t > 0) {
								$rec = $rec . "-" . $t;
							}
							$pct = round(($w / ($w + $l + $t)), 3);
							?>
						<tr>
							<td id="<?php echo $opp; ?>"><?php echo $opp; ?></td>
							<td style="text-align: center;"><?php echo $rec; ?></td>
							<td><?php echo $pct; ?></td>
						</tr>
				<?php
						$i++;
					}
				} else {
					echo "oopsie";
				}
				?>
				</table>
			</div>
			<?php
			//find the team's schedule and print it out neatly
			$schedname = $team . "_schedule";
			if ($teamLoc == "Washington"){
				$schedname = $teamLoc . "_schedule";
			}
			$teamschedule = mysqli_query($db, "SELECT * FROM $schedname");
			$number = mysqli_num_rows($teamschedule);
			if ($number > 0) {
				?>
				<div class="table" id="year" style="margin-bottom: 10px; width: 30%; margin-right: .5%">
					<table class="tester" style="display: inline-block;">
						<caption style="padding-bottom: 5px;"><?php echo $team; ?> 2019 Schedule</caption>
						<tr>
							<th>Week</th>
							<th>Opponent</th>
							<th>Result</th>
						</tr>
						<?php
							$i = 1;
							while ($i < $number + 1 && $rho = mysqli_fetch_array($teamschedule)) {
								?>
							<tr style="background-color: <?php
																	$w_l = $rho['result'];
																	$resColor = "";
																	//change the color of the game depending on the result
																	if ($w_l == "W") {
																		$resColor = "#94d869";
																	} else if ($w_l == "L") {
																		$resColor = "#de3f52";
																	} else if ($w_l == "T") {
																		$resColor = "#a3ccff";
																	} else if ($rho['home_away'] == "B") {
																		$resColor = "#dddddd";
																	} else {
																		$resColor = "white";
																	}
																	echo $resColor;?>">
								<td><?php echo $rho['week']; ?></td>
								<td><?php
											//distinguish home and away games
											if ($rho['home_away'] == "A") {
												echo "@" . $rho['opponent'];
											} else {
												echo $rho['opponent'];
											} ?>
								</td>
								<td><?php
											// bye week
											if ($rho['home_away'] != "B") {
												if ($w_l != NULL) {
													echo $w_l . $sp . $rho['score'] . "-" . $rho['oppscore'];
												} else {
													echo "TBD";
												}
											} else {
												echo "~~~";
											}
											?>
								</td>
							</tr>
					<?php
							$i++;
						}
					} else {
						echo "oopsie";
					}
					?>
					</table>
				</div>
	</div>

</body>

</html>
<style>
	body {
		font-family: 'Cambo', Times, serif;
	}

	button {
		font-family: 'Cambo', Times, serif;
		color: white;
		background-color: black;
		border-color: white;
		border-style: solid;
		cursor: pointer;
	}

	button:hover {
		font-family: 'Cambo', Times, serif;
		color: black;
		background-color: white;
		border-color: black;
		transition-duration: 0.3s;
	}

	#main {
		display: block;
	}

	.table {
		display: inline-block;
		margin-bottom: 15px;
	}

	.bio {
		height: fit-content;
		vertical-align: top;
	}

	#year {
		margin-right: 2.5%;
	}

	.tester {
		border-collapse: collapse;
	}

	.tester td,
	.tester th {
		border: 2px solid black;
		padding: 8px;
	}

	.tester th {
		background-color: darkgrey;
		color: black;
		text-align: center;
	}

	.trophies {
		position: absolute;
		top: 43%;
		left: 60%;
	}

	.superbowls {
		font-size: 12px;
		font-weight: bold;
		position: absolute;
		top: 33%;
		padding: 7px;
		color: black;
		background-color: white;
		opacity: 0;
		transition-duration: .3s;
		border-radius: 4px;
	}

	a:hover .superbowls {
		opacity: .7;
	}

	a {
		text-decoration: none;
	}

	#trophy1 {
		display: none;
	}

	#sb0 {
		display: none;
	}
</style>