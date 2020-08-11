<?php
//$_SESSION['id'] = "";
//What id was clicked on
$id = $_GET['id'];
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once("../../session.php");
include("titleUpdate.php");
//Knicks
if ($id == 'NYX' || $id == 'KNI'){
	header("location:team.php?id=NYK");
}
//Hawks
if ($id == 'HWK'){
	header("location:team.php?id=ATL");
}
//Original Bullets
if ($id == 'BAL'){
	header("location:nbafinals.php");
}
//Bullets -> Wizards
if ($id == 'WSH'){
	header("location:team.php?id=WAS");
}
//Cavs
if ($id == 'CLV'){
	header("location:team.php?id=CLE");
}
//Magic
if ($id == 'MAG'){
	header("location:team.php?id=ORL");
}
//Jazz
if ($id == 'JAZ'){
	header("location:team.php?id=UTA");
}
//Bucks
if ($id == 'MLW'){
	header("location:team.php?id=MIL");
}
//Lakers
if ($id == 'MPL'){
	header("location:team.php?id=LAL");
}
//Nets
if ($id == 'NJ'){
	header("location:team.php?id=BKN");
}
//Rockets
if ($id == 'HST'){
	header("location:team.php?id=HOU");
}
//Pacers
if ($id == 'PAC'){
	header("location:team.php?id=IND");
}
//Suns
if ($id == 'PHO'){
	header("location:team.php?id=PHX");
}
//Pistons
if ($id == 'PIS'){
	header("location:team.php?id=DET");
}
//Trail Blazers
if ($id == 'PRT'){
	header("location:team.php?id=POR");
}
//Royals -> Kings
if ($id == 'ROC'){
	header("location:team.php?id=SAC");
}
//Spurs
if ($id == 'SA' || $id == 'SPU'){
	header("location:team.php?id=SAS");
}
//Nationals -> 76ers
if ($id == 'SYR' || $id == 'PHL'){
	header("location:team.php?id=PHI");
}
//Rockets
if ($id == 'HST'){
	header("location:team.php?id=HOU");
}
//Warriors
if ($id == 'GS'){
	header("location:team.php?id=GSW");
}
//Rockets
if ($id == 'CAP' || $id == 'STG'){
	header("location:nbafinals.php");
}
//Team page is now the corresponding id
$_SESSION['id'] = $id;
include("../../nestedsidenav.php");
updateTitles($id);
$sp = "&nbsp";
$n = "<br>";
$teamcheck = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '" . $id . "'");
$r = mysqli_fetch_array($teamcheck);
$team = $r['team'];
$teamLoc = $r['location'];
$div = $r['division'];
$est = $r['est'];
$teamid = $r['tid'];
$apps = $r['apps'];
$finals = $r['finals'];
$third = $r['terColor'];
$win_check = mysqli_query($db, "SELECT year FROM nba_finals_history WHERE winnerid = '$teamid' ORDER BY year DESC");
$a = mysqli_fetch_array($win_check);
$lastwin = $a['year']+1;
$app_check = mysqli_query($db, "SELECT year FROM nba_finals_history WHERE loserid = '$teamid' ORDER BY year DESC");
$b = mysqli_fetch_array($app_check);
$lastloss = $b['year']+1;


if ($lastwin > $lastloss){
	$recent = $lastwin;

}
elseif ($lastloss > $lastwin){
	$recent = $lastloss;
}

$grammar = "";
$win_string = "";
$app_string = "";
if ($finals > 0){
	if ($finals == 1){
		$grammar = " NBA title. ";
		$app_string = "That title came in " . $lastwin . ".";
	}
	else{
		$grammar = " NBA titles. ";
		$app_string = "Their last title came in " . $lastwin . ".";
	}

	$win_string = "They have won " . $finals . $grammar;	
}
elseif ($finals == 0){
	$win_string = "They have yet to win an NBA title. ";
	if ($apps > 0){
		$app_string = "Their last Finals appearance came in " . $recent . ".";
	}
	else {
		$app_string = "They have yet to reach an NBA Finals. ";
	}
}



//Grammar checks
if ($apps == 1){
	$beeps = $apps . " appearance";
}
else {
	$beeps = $apps . " appearances";
}
//Math and Grammar Checks
$numszns = 2019 - $est;
$lastdigit = substr($numszns, -1);
$szns = "";
if ($id == 'SEA'){
	$numszns = 2008 - $est;
}
if ($lastdigit == 1 && $numszns != 11){
	$szns = $numszns . "st";
} else if ($lastdigit == 2 && $numszns != 12){
	$szns = $numszns . "nd";
} else if ($lastdigit == 3 && $numszns != 13){
	$szns = $numszns . "rd";
} else {
	$szns = $numszns . "th";
}

$team_string = "The " . $teamLoc . " " . $team . " are in their " . $szns . " season in the NBA. ";
if ($id == 'SEA'){
	$team_string = "The " . $teamLoc . " " . $team . " were an NBA franchise for " . $numszns . " years before relocating to Oklahoma City. ";
}
if ($id == 'OKC'){
	$win_string = "Before moving to Oklahoma City in 2008, the Thunder won an NBA Title as the SuperSonics. ";
}
if ($id == 'SEA'){
	$win_string = "They won " . $finals . $grammar;
}

$team_string = $team_string . $win_string;
if ($id == 'OKC'){
	$app_string = "Their last Finals appearance as the Thunder came in " . $recent . ".";
}
$team_string = $team_string . $app_string;

?>

<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title><?php echo $teamLoc . " " . $team;?></title>
		<link rel='stylesheet' type='text/css' href='teamStyle.php'/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>
		<div class="trophies">
				<?php 
					if ($finals > 0) {
				?>
					<img src="../../Assets/NBA/trophy.png" id = "<?php echo "trophy";?>" height=75 width=75/>
					<span style="position:relative; color: <?php echo $third;?>; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $finals;?></span>
				<?php
					}
				?>		
		</div>		
		<img class="pic" src="../../Assets/NBA/<?php echo $id;?>.png" style="border: 5px solid <?php echo $priColor;?>">

		<div class="team-container" align="center" style="margin-bottom: 25px;">
			<h1><?php echo $teamLoc . " " . $team;?></h1>
			<div class="bio" style="width: 30%; margin-left: .5%; display: inline-block;">
				<p><?php echo $team_string;?></p>
			</div>
			<div class="table" id = "rivals" style="vertical-align: top; width: 30%;">
				<table class = "records">
				<caption style="font-weight: bold; padding-bottom: 5px;"></caption>

					<?php
						$que = mysqli_query($db, "SELECT * FROM nbateams WHERE division = '$div' ORDER BY pct DESC");
						$numrows = mysqli_num_rows($que);
					?>					
					<tr>
					<?php
						$i=1;
						while ($i <= $numrows && $q = mysqli_fetch_array($que)){
							$team = $q['team'];
							$w = $q['wins'];
							$l = $q['losses'];
							$pct = $q['pct'];
							$tid = $q['teamShort'];
							$sql = mysqli_query($db, "SELECT * FROM nbateams WHERE division = '$div' ORDER BY pct DESC");
							$row = mysqli_fetch_array($sql);
							$top_team = $row['team'];
							$top_wins = $row['wins'];
							$top_losses = $row['losses'];
							$gb = (($top_wins - $w)/2)+(($l - $top_losses)/2);
							if ($gb == 0){
								$gb = "-";
							}									
					?>
						<th>Team</th>
						<th>Record</th>
						<th>Pct</th>
						<th>GB</th>
					</tr>
					<tr>
						<?php
							if ($tid == $id){
							?>
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $team;?></td>
								<td id="<?php echo $tid;?>" style="text-align: center;background-color:yellow;"><?php echo $w . "-" . $l;?></td>
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $pct;?></td>	
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $gb;?></td>
							<?php
							}
							else {
							?>
								<td id="<?php echo $tid;?>"><?php echo $team;?></td>
								<td id="<?php echo $tid;?>"style="text-align: center;"><?php echo $w . "-" . $l;?></td>
								<td id="<?php echo $tid;?>"><?php echo $pct;?></td>
								<td id="<?php echo $tid;?>"><?php echo $gb;?></td>								
							<?php
							}
							?>
					</tr>
					<?php
						$i++;
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
	.tester td, .tester th {
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
		top:33%;
		padding: 7px;
		color:black;
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