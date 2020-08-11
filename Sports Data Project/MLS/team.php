<?php
//What id was clicked on
$id = $_GET['id'];

if ($id == "ROC" || $id == "TB" || $id == "MF") {
	header("location: mlscups.php");
}
//LA Galaxy rebrand
if ($id == "GAL") {
	header("location:team.php?id=LAG");
}
//KC Wizards became Sporting KC
if ($id == "KCW") {
	header("location:team.php?id=SKC");
}
//Dallas Burn became Dallas FC
if ($id == "DB") {
	header("location:team.php?id=DAL");
}

include("../../session.php");

//Team page is now the corresponding id
$_SESSION['id'] = $id;
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";

$teamcheck = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '" . $id . "'");
$r = mysqli_fetch_array($teamcheck);
$team = $r['team'];
$teamLoc = $r['location'];
$teamid = $r['tid'];
$cups = $r['cups'];
$apps = $r['conf_titles'];
$usoc = $r['usopen'];
$ss = $r['shields'];
$est = $r['est'];
$wins = $r['wins'];
$losses = $r['losses'];
$draws = $r['draws'];
$pts = $r['points'];
$conf = $r['conference'];
$third = $r['terColor'];
$teamname = "";

/*Different teams have different naming conventions*/
//Ex: Fire ==> Chicago Fire
$useLocation = array("CHI", "COL", "CLB", "HOU", "LAG", "MTL", "NE", "NY", "PHI", "POR", "SJ", "SEA", "VAN");
//Ex: Atlanta Utd ==> Atlanta United
$utdExpand = array("ATL", "MIN");
//Ex: Cincinnati FC ==> Cincinnati FC
$noChange = array("CIN", "DC", "DAL", "NSH", "OSC", "RSL", "TOR");
//Ex: LA FC ==> Los Angeles FC
$locFC = array("LFC", "NYC");
//Inter Miami ==> Inter Miami CF
$locCF = array("MIA");

if (in_array($id, $useLocation)) {
	$teamname = $teamLoc . " " . $team;
} elseif (in_array($id, $utdExpand)) {
	$utd = trim($team, "Utd");
	$teamname = $utd . "United";
} elseif (in_array($id, $noChange)) {
	$teamname = $team;
} elseif (in_array($id, $locFC)) {
	$teamname = $teamLoc . " FC";
} elseif (in_array($id, $locCF)) {
	$teamname = $team . " CF";
}
//Sporting KC ==> Sporting Kansas City
elseif ($id == "SKC") {
	$spo = trim($team, "KC");
	$teamname = $spo . $teamLoc;
}

//Grammar checks
//Math and Grammar Checks
$numszns = date("Y") + 1 - $est;

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

$season_string = $teamname . " are in their " . $szns . " season in MLS. ";

if (in_array($id, $useLocation)) {
	$season_string = "The " . $season_string;
}

if ($numszns < 1) {
	$season_string = $teamname . " are set to begin MLS play in " . $est . ". ";
}
$bio_string = $season_string;
$titles = "";
$appearances = "";
$cup_string = "";
$app_string = "";

if ($apps > 0) {
	if ($apps == 1) {
		$appearances = $apps . " appearance";
	} else {
		$appearances = $apps . " appearances";
	}

	if ($cups > 0) {
		if ($cups == 1) {
			$titles = $cups . " MLS Cup";
		} else {
			$titles = $cups . " MLS Cups";
		}

		$cup_string = "They have won " . $titles;
		$bio_string = $bio_string . $cup_string;
	} else {
		$cup_string = "They have yet to win an MLS Cup";
		$bio_string = $bio_string . $cup_string;
	}

	$app_string = " in " . $appearances . ". ";
	$bio_string = $bio_string . $app_string;
} else {
	if ($numszns > 0) {
		$app_string = "They have yet to appear in an MLS Cup. ";
		$bio_string = $bio_string . $app_string;
	}
}
$opens = "";
$open_string = "";
$sups = "";
$ss_string = "";


if ($usoc > 0) {
	if ($usoc == 1) {
		$opens = $usoc . " U.S. Open Cup";
	} else {
		$opens = $usoc . " U.S. Open Cups";
	}

	$open_string = "They have won " . $opens;
	$bio_string = $bio_string . $open_string;

	if ($ss > 0) {
		if ($ss == 1) {
			$sups = $ss . " Supporters' Shield";
		} else {
			$sups = $ss . " Supporters' Shield";
		}

		$ss_string = " and " . $sups . ".";
		$bio_string = $bio_string . $ss_string;
	}
} else {
	if ($ss > 0) {
		if ($ss == 1) {
			$sups = $ss . " Supporters' Shield";
		} else {
			$sups = $ss . " Supporters' Shields";
		}

		$ss_string = "They have won " . $sups . ". ";
		$bio_string = $bio_string . $ss_string;
	}
}

$num_awards = 0;
$awards = [];
$year = date("Y");
$trophy_check = mysqli_query($db, "SELECT * FROM mlscup WHERE year = $year");
$r = mysqli_fetch_array($trophy_check);
if ($id == $r['supportersshield']) {
	array_push($awards, "Supporters' Shield");
}
if ($id == $r['usopenwinner']) {
	array_push($awards, "U.S. Open Cup");
}
if ($id == $r['winner']) {
	array_push($awards, "MLS Cup");
}
if ($id == $r['loser']) {
	if ($conf == "East") {
		array_push($awards, "Eastern Conference Champs");
	} elseif ($conf == "West") {
		array_push($awards, "Western Conference Champs");
	}
}
$spoon = mysqli_query($db, "SELECT teamShort FROM mlsteams WHERE points > 0 ORDER BY points ASC, wins ASC");
$row = mysqli_fetch_array($spoon);
$woodenspoon = $row['teamShort'];

if ($id == $woodenspoon) {
	array_push($awards, "Wooden Spoon");
}

$wc_check = mysqli_query($db, "SELECT team FROM mls_wildcard WHERE team = '$id'");
$wc_rows = mysqli_num_rows($wc_check);
$cs_check = mysqli_query($db, "SELECT team FROM mls_conf_semis WHERE team = '$id'");
$cs_rows = mysqli_num_rows($cs_check);
$cf_check = mysqli_query($db, "SELECT team FROM mls_conf_finals WHERE team = '$id'");
$cf_rows = mysqli_num_rows($cf_check);
$mlsc_check = mysqli_query($db, "SELECT team FROM mls_cup_finals WHERE team = '$id'");
$mlsc_rows = mysqli_num_rows($mlsc_check);
$finish = "";
$sched = $id . "_schedule";
$teamsched = mysqli_query($db, "SELECT * FROM $sched");
$schedrows = mysqli_num_rows($teamsched);
if ($schedrows == 34) {
	if ($cs_rows != 0) {
		if ($cf_rows != 0) {
			if ($mlsc_rows != 0) {
				$finish = "MLS Cup Final";
			} else {
				$finish = "Conference Finals";
			}
		} else {
			$finish = "Conference Semifinals";
		}
	} elseif ($wc_rows != 0) {
		$finish = "First Round";
	} else {
		if ($numszns > 0) {
			$finish = "Missed Playoffs";
		}
	}
}

?>

<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<title><?php echo $teamname; ?></title>
	<link rel='stylesheet' type='text/css' href='teamStyle.php' />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>

<body>
	<!-- Display trophies won -->
	<div class="trophies">
		<?php
		if ($cups > 0) {
		?>
			<img src="../../Assets/MLS/trophy.png" id="<?php echo "trophy"; ?>" height=75 width=75 />
			<span style="position:relative; color: <?php echo $third; ?>; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $cups; ?></span>
		<?php
		}
		echo $sp;
		if ($usoc > 0) {
		?>
			<img src="../../Assets/MLS/hunt.png" id="<?php echo "trophy"; ?>" height=75 width=75 />
			<span style="position:relative; color: <?php echo $third; ?>; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $usoc; ?></span>
		<?php
		}
		if ($ss > 0) {
		?>
			<img src="../../Assets/MLS/shield.png" id="<?php echo "trophy"; ?>" height=75 width=75 />
			<span style="position:relative; color: <?php echo $third; ?>; font-size: 22px; bottom: 25px; left: -10px;"><?php echo $sp . "x " . $ss; ?></span>
		<?php
		}
		?>
	</div>
	<img class="pic" src="../../Assets/MLS/<?php echo $id; ?>.png" style="border: 5px solid <?php echo $priColor; ?>">

	<div class="team-container" align="center" style="min-height: 400px;">
		<h1><?php echo $teamname; ?></h1>
		<div class="team-items">
			<div class="bio" style="width: 30%; margin-left: .5%; display: inline-block;">
				<p><?php echo $bio_string; ?></p>
			</div>
			<?php
			$sched = $id . "_schedule";
			$sql = mysqli_query($db, "SELECT * FROM $sched ORDER BY week DESC, game DESC");
			?>
			<div class="table" id="schedule" style="vertical-align: top; width: 400px;">
				<table class="tester" style="display:inline-block;">
					<caption style="padding-bottom: 5px;"><?php echo $team; ?> Recent Results</caption>
					<tr>
						<th>Opponent</th>
						<th>Score</th>
						<th>Result</th>
					</tr>
					<?php
					$i = 1;
					while ($i <= 5 && $r = mysqli_fetch_array($sql)) {
					?>
						<tr style="background-color: <?php
														$w_l = $r['result'];
														$resColor = "";
														//change the color of the game depending on the result
														if ($w_l == "W") {
															$resColor = "#94d869";
														} else if ($w_l == "L") {
															$resColor = "#de3f52";
														} else if ($w_l == "D") {
															$resColor = "#a3ccff";
														}
														echo $resColor; ?>">
							<td><?php echo $r['opponent']; ?></td>
							<td><?php echo $r['gf']	. "-" . $r['ga']; ?></td>
							<td><?php echo $r['result']; ?></td>
						</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div class="table" id="rivals" style="vertical-align: top; width: 550px;">
				<table class="records">
					<caption style="font-weight: bold; padding-bottom: 5px;"><?php echo $team . " " . $year . " Season" ?></caption>
					<tr>
						<th>Wins</th>
						<th>Losses</th>
						<th>Draws</th>
						<th>Points</th>
						<th>MLS Playoffs</th>
						<th>Accolades</th>
					</tr>
					<tr>
						<td><?php echo $wins; ?></td>
						<td><?php echo $losses; ?></td>
						<td><?php echo $draws; ?></td>
						<td><?php echo $pts; ?></td>
						<td><?php echo $finish; ?></td>
						<td>
							<?php
							$length = count($awards);
							for ($j = 0; $j < $length; $j++) {
								if ($j == 0) {
									echo $awards[$j];
								} else {
									echo ", " . $awards[$j];
								}
							}
							?>

						</td>
					</tr>
				</table>
			</div>
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

	.team-items {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}
</style>