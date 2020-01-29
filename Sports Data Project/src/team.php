<?php

/*
	Team IDs are used to reference each particular MLB team. The request for the ID can come from the team selection page or
	through the World Series history page.
*/
$id = $_GET['id'];

//Establish an array of current MLB teams. This is the haystack in which we search for the needle that is our $id
$mlbteams = array("ARZ", "ATL", "BAL", "BOS", "CHC", "CWS", "CIN", "CLE", "COL", "DET", "HOU", "KC", "LAA", "LAD", "MIA", "MIL", "MIN", "NYM", "NYY", "OAK", "PHI", "PIT", "SD", "SF", "SEA", "STL", "TB", "TEX", "TOR", "WAS");

include("../../session.php");
include("year.php");

/*
	While the team selection page has all current teams and branding, the World Series history contians prior locations for
	teams, as well as era-appropriate branding. Because these older logos/colors have different reference names, these references
	need to point back to the appropriate current MLB franchise.
*/
//Boston Americans became the Boston Red Sox
if ($id == 'BA'){
	header("location:team.php?id=BOS");
}
//Boston Braves moved to Milwaukee and then Atlanta
if ($id == 'BST' || $id == 'MLW'){
	header("location:team.php?id=ATL");
}
//Washington Senators became the Minnesota Twins
if ($id == 'WSH'){
	header("location:team.php?id=MIN");
}
//Diamondbacks Rebrand
if ($id == 'ARI'){
	header("location:team.php?id=ARZ");
}
//Marlins Rebrand
if ($id == 'FLA'){
	header("location:team.php?id=MIA");
}
//Padres Rebrand
if ($id == 'SDP'){
	header("location:team.php?id=SD");
}
//Brewers Rebrand
if ($id == 'MB'){
	header("location:team.php?id=MIL");
}
//Brooklyn Dodgers moved to Los Angeles
if ($id == 'BKN'){
	header("location:team.php?id=LAD");
}
//New York Giants moved to San Francisco
if ($id == 'NYG'){
	header("location:team.php?id=SF");
}
//Astros Rebrand
if ($id == 'HST'){
	header("location:team.php?id=HOU");
}
//Orioles Rebrand
if ($id == 'BLT'){
	header("location:team.php?id=BAL");
}
//Reds Rebrand
if ($id == 'RED'){
	header("location:team.php?id=CIN");
}
//White Sox Rebrand
if ($id == 'CHW'){
	header("location:team.php?id=CWS");
}
//Angels Rebrand
if ($id == 'ANA'){
	header("location:team.php?id=LAA");
}
//Montreal Expos moved to DC and became the Nationals
if ($id == 'MTL'){
	header("location:team.php?id=WSH");
}
//Phillies Rebrand
if ($id == 'PHL'){
	header("location:team.php?id=PHI");
}
/*
	There was no World Series played in 1994. The series history page makes note of this. By clicking on the MLB logos in the
	row on the table (referenced in Assets as TBD), the original direction is toward a team page with a tricode of 'TBD', which
	doesn't exist. As a solution, I made clicking the MLB logo point the user to a random MLB page.
*/
if ($id == 'TBD'){
	$id = mt_rand(0,29);
	$team = $mlbteams[$id];
	header("location:team.php?id=$team");
}
//Team page is now the corresponding id for future reference/query
$_SESSION['id'] = $id;
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";

/*
	The mlbteams table in the database contains information for the current season, as wells as historical data such as division
	titles, league pennants, and World Series championships. A team page should include all this information, so we grab it all.
*/
$teamcheck = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '" . $id . "'");
$r = mysqli_fetch_array($teamcheck);
$team = $r['team'];
$teamLoc = $r['location'];
$wswins = $r['wswins'];
$pens = $r['pennants'];
$league = $r['league'];
$div = $r['division'];
$est = $r['est'];
$teamid = $r['tid'];
$apps = "";
$ws_check = mysqli_query($db, "SELECT year FROM ws_history WHERE winnerid = '$teamid' ORDER BY year DESC");
$a = mysqli_fetch_array($ws_check);
$lastwin = $a['year'];
$app_check = mysqli_query($db, "SELECT year FROM ws_history WHERE loserid = '$teamid' ORDER BY year DESC");
$b = mysqli_fetch_array($app_check);
$lastloss = $b['year'];

/*
	The $recent variable points to the most recent World Series appearance, which would either be their most recent win or
	their most recent loss.
*/
if ($lastwin > $lastloss){
	$recent = $lastwin;
}
elseif ($lastloss > $lastwin){
	$recent = $lastloss;
}

$app_string = "";
if ($wswins > 0){
	$win_string = "Their last title came in " . $lastwin;
}
if ($pens > 0){
	$app_string = "Their last appearance came in " . $recent . ".";
}


//We want to check for grammar because the number of appearances varies from team to team.
if ($pens == 1){
	$apps = $pens . " appearance";
}
else {
	$apps = $pens . " appearances";
}
/*
	This is for calculating how long each team has been a member of the MLB. The $current variable is pulled from year.php,
	which is a simple file that stores the year corresponding to the current season, so as to not require hard-coded maintenance
	across the file system for every turn of the calendar.
	The purpose of this block is to make sure the corresponding sentence utilizes proper grammar with respect to how long the team
	has been around.
*/

$numszns = $current - $est;
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
?>

<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<!-- Each team Web page is customized to refer to that specific team. 
			 The stylesheet referenced is a php file that allows for conditional coloring of each page
			 to make it more team-spefic in appearance. -->
		<title><?php echo $teamLoc . " " . $team;?></title>
		<link rel='stylesheet' type='text/css' href='teamStyle.php'/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>
		<div class="trophies">
				<?php 
				/*
					If the team has won a World Series, we make note of how many with a small trophy and the number of times
					they've won. The same deal goes for league pennants, appropriately colored for each league, depending on
					which league the team is a member of.
				*/
					if ($wswins > 0) {
				?>
					<img src="../../Assets/MLB/trophy.png" id = "<?php echo "trophy";?>" height=75 width=75/>
					<span style="position:relative; color: white; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $wswins;?></span>
				<?php
					}
					echo $sp;
					if ($pens > 0 && $league == 'American'){
				?>
						<img src="../../Assets/MLB/ALPennant.png" id = "<?php echo "trophy";?>" height=75 width=75/>
						<span style="position:relative; color: white; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $pens;?></span>
				<?php
					}
					if ($pens > 0 && $league == 'National'){
				?>
						<img src="../../Assets/MLB/NLPennant.png" id = "<?php echo "trophy";?>" height=75 width=75/>
						<span style="position:relative; color: white; font-size: 22px; bottom: 25px; left: -10px;">x <?php echo $pens;?></span>
				<?php	
					}
				?>		
		</div>		
		<img class="pic" src="../../Assets/MLB/<?php echo $id;?>.png" style="border: 5px solid <?php echo $priColor;?>">

		<div class="team-container" align="center">
			<h1><?php echo $teamLoc . " " . $team;?></h1>
			<div class="bio" style="width: 30%; margin-left: .5%; display: inline-block;">
				<p>
					The <?php echo $teamLoc . " " . $team?> are in their <?php echo $szns?> season in the MLB. To date, they have won <?php echo $wswins . " World Series in " . $apps . ". ";
					/*
						If the team has won a World Series, we'll add that to the string, as it's important info for the team's
						history. If they won their last appearance, we don't need to reiterate when the last time they made it
						was. If they haven't won a World Series, we'll just list their last appearance, as that's the highest
						success they've seen.
					*/
					if ($wswins > 0){

						echo $win_string . ". ";
						if ($lastwin != $recent){
							echo $app_string;
						}
					}
					elseif($wswins == 0){
						echo $app_string;
					}

					?>
				</p>
			</div>
			<div class="table" id = "rivals" style="vertical-align: top; width: 30%;">
				<table class = "records">
				<caption style="font-weight: bold; padding-bottom: 5px;">
					<?php 
					/*
						The following table incorporates the current seasons' standings, highlighting where the selected team
						falls in their division.
					*/
					if ($league == 'American'){
						$alnl = 'AL';
					}
					elseif ($league == 'National'){
						$alnl = 'NL';
					}
					echo date("Y") . " " . $alnl . " " . $div . " Standings";?></caption>

					<?php
						$que = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = '$league' AND division = '$div' ORDER BY pct DESC");
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
						
					?>
						<th>Team</th>
						<th>Record</th>
						<th>Pct</th>
					</tr>
					<tr>
						<?php
							if ($tid == $id){
							?>
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $team;?></td>
								<td id="<?php echo $tid;?>"style="text-align: center;background-color:yellow;"><?php echo $w . "-" . $l;?></td>
								<td id="<?php echo $tid;?>" style="background-color:yellow;"><?php echo $pct;?></td>								
							<?php
							}
							else {
							?>
								<td id="<?php echo $tid;?>"><?php echo $team;?></td>
								<td id="<?php echo $tid;?>"style="text-align: center;"><?php echo $w . "-" . $l;?></td>
								<td id="<?php echo $tid;?>"><?php echo $pct;?></td>								
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