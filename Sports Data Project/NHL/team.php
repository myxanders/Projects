<?php
//What id was clicked on
$id = $_GET['id'];

include_once("../../session.php");
include("titleUpdate.php");

//When a defunct team is clicked on, user will stay on the cups page
$nhlteams = array("ANA", "ARZ", "BOS", "BUF", "CGY", "CAR", "CHI", "COL", "CBJ", "DAL", "DET", "EDM", "FLA", "LA", "MIN", "MTL", "NSH", "NJ", "NYI", "NYR", "OTT", "PHI", "PIT", "STL", "SJ", "TB", "TOR", "VAN", "VGK", "WSH", "WPG");
$defunct = array("CT", "EE", "MM", "OWA", "POR", "SM", "VIC", "VM");


if (in_array($id, $defunct)){
	header("location:stanleycups.php");
}

//Ducks' rebrands
if ($id == "ANH" || $id == "AMD"){
	header("location:team.php?id=ANA");
}
//Sabres' rebrands
if ($id == "BFO" || $id == "SAB"){
	header("location:team.php?id=BUF");
}
//Bruins logo update
if ($id == "BST"){
	header("location:team.php?id=BOS");
}
//The Minnesota North Stars moved to Dallas
if ($id == "DLS" || $id == "MIN"){
	header("location:team.php?id=DAL");
}
//Kings' rebrand
if ($id == "LAK"){
	header("location:team.php?id=LA");
}
//Canadiens' logo update
if ($id == "MON"){
	header("location:team.php?id=MTL");
}
//Panthers' rebrand
if ($id == "PAN"){
	header("location:team.php?id=FLA");
}
//Penguins rebrand
if ($id == "PEN"){
	header("location:team.php?id=PIT");
}
//The Quebec Nordiques moved to Colorado and became the Avalanhce
if ($id == "QBC"){
	header("location:team.php?id=COL");
}
//Rangers' logo update
if ($id == "RAG"){
	header("location:team.php?id=NYR");
}
//Senators' logo update
if ($id == "SEN"){
	header("location:team.php?id=OTT");
}
//Sharks' logo update
if ($id == "SJS"){
	header("location:team.php?id=SJ");
}
//Maple Leafs' rebrands
if ($id == "TAR" || $id == "TSP" || $id == "TML"){
	header("location:team.php?id=TOR");
}
//Lightning's rebrand
if ($id == "TBL"){
	header("location:team.php?id=TB");
}
//Canucks' rebrand
if ($id == "VCV"){
	header("location:team.php?id=VAN");
}
//Capitals' rebrand
if ($id == "WAS"){
	header("location:team.php?id=WSH");
}

if ($id == 'TBD'){
	$id = mt_rand(0,29);
	$team = $nhlteams[$id];
	header("location:team.php?id=$team");
}

//Team page is now the corresponding id
$_SESSION['id'] = $id;
include("../../nestedsidenav.php");
updateTitles($id);
$sp = "&nbsp";
$n = "<br>";
$teamcheck = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '" . $id . "'");
$r = mysqli_fetch_array($teamcheck);
$team = $r['team'];
$teamLoc = $r['location'];
$div = $r['division'];
$conf = $r['conference'];
$est = $r['est'];
$teamid = $r['tid'];
$apps = $r['apps'];
$cups = $r['cups'];
$third = $r['terColor'];
$win_check = mysqli_query($db, "SELECT year FROM stanleycups WHERE winnerid = '$teamid' ORDER BY year DESC");
$a = mysqli_fetch_array($win_check);
$lastwin = $a['year'];
$app_check = mysqli_query($db, "SELECT year FROM stanleycups WHERE loserid = '$teamid' ORDER BY year DESC");
$b = mysqli_fetch_array($app_check);
$lastloss = $b['year'];


if ($lastwin > $lastloss){
	$recent = $lastwin;

}
elseif ($lastloss > $lastwin){
	$recent = $lastloss;
}

$grammar = "";
$win_string = "";
$app_string = "";
if ($cups > 0){
	if ($cups == 1){
		$grammar = " Stanley Cup. ";
		$app_string = "That title came in " . $lastwin . ".";
	}
	else{
		$grammar = " Stanley Cups. ";
		$app_string = "Their last title came in " . $lastwin . ".";
	}

	$win_string = "They have won " . $cups . $grammar;	
}
elseif ($cups == 0){
	$win_string = "They have yet to win a Stanley Cup. ";
	if ($apps > 0){
		$app_string = "Their last Stanley Cup Finals appearance came in " . $recent . ".";
	}
	else {
		$app_string = "They have yet to reach the Stanley Cup Finals. ";
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
$year = date("Y");
$numszns = $year + 1 - $est;
$lastdigit = substr($numszns, -1);
$szns = "";
if ($lastdigit == 1 && $numszns != 11){
	$szns = $numszns . "st";
} else if ($lastdigit == 2 && $numszns != 12){
	$szns = $numszns . "nd";
} else if ($lastdigit == 3 && $numszns != 13){
	$szns = $numszns . "rd";
} else {
	$szns = $numszns . "th";
}

$team_string = "The " . $teamLoc . " " . $team . " are in their " . $szns . " season in the NHL. ";

if ($apps > 0){
	$team_string = $team_string . $win_string;
}
$team_string = $team_string . $app_string;

?>

<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title><?php echo $teamLoc . " " . $team;?></title>
		<link rel='stylesheet' type='text/css' href='teamStyle.php'/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>
		<div class="trophies">
			<!-- Show trophy wins -->
				<?php 
					if ($cups > 0) {
				?>
					<img src="../../Assets/NHL/stanleycup.png" id = "<?php echo "trophy";?>" height=75 width=75/>
					<span style="position:relative; color: <?php echo $third;?>; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $cups;?></span>
				<?php
					}
					echo $sp;
					if ($apps > 0 && $conf == 'West'){
				?>
					<img src="../../Assets/NHL/campbell.png" id = "<?php echo "trophy";?>" height=75 width=75/>
					<span style="position:relative; color: <?php echo $third;?>; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $apps;?></span>
				<?php
					}
					if ($apps > 0 && $conf == 'East'){
				?>
					<img src="../../Assets/NHL/wales.png" id = "<?php echo "trophy";?>" height=75 width=75/>
					<span style="position:relative; color: <?php echo $third;?>; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $apps;?></span>
				<?php
					}
				?>		
		</div>		
		<img class="pic" src="../../Assets/NHL/<?php echo $id;?>.png" style="border: 5px solid <?php echo $priColor;?>">

		<div class="team-container" align="center" style="margin-bottom: 25px;">
			<h1><?php echo $teamLoc . " " . $team;?></h1>
			<div class="bio" style="width: 30%; margin-left: .5%; display: inline-block;">
				<p><?php echo $team_string;?></p>
			</div>
			<div class="table" id = "rivals" style="vertical-align: top; width: 30%;">
				<table class = "records">
				<caption style="font-weight: bold; padding-bottom: 5px;"><?php echo $year . " " . $div . " Division Standings";?></caption>

					<?php
						$que = mysqli_query($db, "SELECT * FROM nhlteams WHERE division = '$div' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
						$numrows = mysqli_num_rows($que);
					?>					
					<tr>
					<?php
						$i=1;
						while ($i <= $numrows && $q = mysqli_fetch_array($que)){
							$team = $q['team'];
							$w = $q['w'];
							$l = $q['l'];
							$otl = $q['otl'];
							$pts = $q['pts'];
							$gd = $q['gd'];
							$tid = $q['teamShort'];								
					?>
						<th>Team</th>
						<th>Pts</th>						
						<th>Record</th>
						<th>GD</th>
					</tr>
					<tr>
						<?php
							if ($tid == $id){
							?>
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $team;?></td>
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $pts;?></td>									
								<td id="<?php echo $tid;?>" style="text-align: center;background-color:yellow;"><?php echo $w . "-" . $l . "-" . $otl;?></td>
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $gd;?></td>
							<?php
							}
							else {
							?>
								<td id="<?php echo $tid;?>"><?php echo $team;?></td>
								<td id="<?php echo $tid;?>"><?php echo $pts;?></td>								
								<td id="<?php echo $tid;?>"style="text-align: center;"><?php echo $w . "-" . $l . "-" . $otl;?></td>
								<td id="<?php echo $tid;?>"><?php echo $gd;?></td>								
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