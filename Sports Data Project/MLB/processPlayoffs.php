<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";

$alwcaway = "";
$alwchome = "";
$nlwcaway = "";
$nlwchome = "";
$alds14away = "";
$alds14home = "";
$alds23away = "";
$alds23home = "";
$nlds14away = "";
$nlds14home = "";
$nlds23away = "";
$nlds23home = "";
$alcsaway = "";
$alcshome = "";
$nlcsaway = "";
$nlcshome = "";
$wsal = "";
$wsnl = "";


//Grabbing scores/wins and updating where series stand
if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['alwcaway'])) {
 		$alwcaway = $_POST['alwcaway'];
 	}

 	if (isset($_POST['alwchome'])) {
 		$alwchome = $_POST['alwchome'];
 	}	

 	if (isset($_POST['nlwcaway'])) {
 		$nlwcaway = $_POST['nlwcaway'];
 	}

 	if (isset($_POST['nlwchome'])) {
 		$nlwchome = $_POST['nlwchome'];
 	}
 	if (isset($_POST['alds14away'])) {
 		$alds14away = $_POST['alds14away'];
 	}
 	if (isset($_POST['alds23away'])) {
 		$alds23away = $_POST['alds23away'];
 	}
 	if (isset($_POST['alds14home'])) {
 		$alds14home = $_POST['alds14home'];
 	}
 	if (isset($_POST['alds23home'])) {
 		$alds23home = $_POST['alds23home'];
 	}
 	if (isset($_POST['nlds14away'])) {
 		$nlds14away = $_POST['nlds14away'];
 	}
 	if (isset($_POST['nlds23away'])) {
 		$nlds23away = $_POST['nlds23away'];
 	}
 	if (isset($_POST['nlds14home'])) {
 		$nlds14home = $_POST['nlds14home'];
 	}
 	if (isset($_POST['nlds23home'])) {
 		$nlds23home = $_POST['nlds23home'];
 	}
 	if (isset($_POST['alcsaway'])) {
 		$alcsaway = $_POST['alcsaway'];
 	}
 	if (isset($_POST['alcshome'])) {
 		$alcshome = $_POST['alcshome'];
 	} 
 	if (isset($_POST['nlcsaway'])) {
 		$nlcsaway = $_POST['nlcsaway'];
 	}
 	if (isset($_POST['nlcshome'])) {
 		$nlcshome = $_POST['nlcshome'];
 	}  	
 	if (isset($_POST['alwinner'])) {
 		$wsal = $_POST['alwinner'];
 	}
 	if (isset($_POST['nlwinner'])) {
 		$wsnl = $_POST['nlwinner'];
 	} 		
 }

 $alwcsql = mysqli_query($db, "UPDATE mlb_wildcard SET awayscore = '$alwcaway', homescore = '$alwchome' WHERE game = 'alwc'");
 $nlwcsql = mysqli_query($db, "UPDATE mlb_wildcard SET awayscore = '$nlwcaway', homescore = '$nlwchome' WHERE game = 'nlwc'");
 $alds14sql = mysqli_query($db, "UPDATE mlb_ds SET awaywins = '$alds14away', homewins = '$alds14home' WHERE series = 'alds14'");
 $alds23sql = mysqli_query($db, "UPDATE mlb_ds SET awaywins = '$alds23away', homewins = '$alds23home' WHERE series = 'alds23'");
 $nlds14sql = mysqli_query($db, "UPDATE mlb_ds SET awaywins = '$nlds14away', homewins = '$nlds14home' WHERE series = 'nlds14'");
 $nlds23sql = mysqli_query($db, "UPDATE mlb_ds SET awaywins = '$nlds23away', homewins = '$nlds23home' WHERE series = 'nlds23'");
 $alcsql = mysqli_query($db, "UPDATE mlb_cs SET awaywins = '$alcsaway', homewins = '$alcshome' WHERE series = 'alcs'");
 $nlcsql = mysqli_query($db, "UPDATE mlb_cs SET awaywins = '$nlcsaway', homewins = '$nlcshome' WHERE series = 'nlcs'");
 $wsql = mysqli_query($db, "UPDATE worldseries SET al_wins = '$wsal', nl_wins = '$wsnl'");

$alwcsql = mysqli_query($db, "SELECT * FROM mlb_wildcard WHERE game = 'alwc'");
$al = mysqli_fetch_array($alwcsql);
$nlwcsql = mysqli_query($db, "SELECT * FROM mlb_wildcard WHERE game = 'nlwc'");
$nl = mysqli_fetch_array($nlwcsql);
$al4 = $al['hometeam'];
$al5 = $al['awayteam'];
$nl4 = $nl['hometeam'];
$nl5 = $nl['awayteam'];


//Series of checks for seeding/matchups
if ($alwcaway > $alwchome){
	$query = mysqli_query($db, "UPDATE mlb_ds SET awayteam = '$al5' WHERE series = 'alds14'");
}
elseif ($alwchome > $alwcaway){
	$query = mysqli_query($db, "UPDATE mlb_ds SET awayteam = '$al4' WHERE series = 'alds14'");
}

if ($nlwcaway > $nlwchome){
	$query = mysqli_query($db, "UPDATE mlb_ds SET awayteam = '$nl5' WHERE series = 'nlds14'");
}
elseif ($nlwchome > $nlwcaway){
	$query = mysqli_query($db, "UPDATE mlb_ds SET awayteam = '$nl4' WHERE series = 'nlds14'");
}

$al14 = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'alds14'");
$a = mysqli_fetch_array($al14);
$al23 = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'alds23'");
$b = mysqli_fetch_array($al23);
$nl14 = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'nlds14'");
$m = mysqli_fetch_array($nl14);
$nl23 = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'nlds23'");
$n = mysqli_fetch_array($nl23);

$al1 = $a['hometeam'];
$al4 = $a['awayteam'];
$al2 = $b['hometeam'];
$al3 = $b['awayteam'];

$nl1 = $m['hometeam'];
$nl4 = $m['awayteam'];
$nl2 = $n['hometeam'];
$nl3 = $n['awayteam'];

if ($alds14home == 3){
	if ($alds23home == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$al1', awayteam = '$al2' WHERE series = 'alcs'");
	}
	elseif ($alds23away == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$al1', awayteam = '$al3' WHERE series = 'alcs'");
	}
}
elseif ($alds14away == 3){
	if ($alds23home == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$al2', awayteam = '$al4' WHERE series = 'alcs'");
	}
	elseif ($alds23away == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$al3', awayteam = '$al4' WHERE series = 'alcs'");
	}	
}
if ($nlds14home == 3){
	if ($nlds23home == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$nl1', awayteam = '$nl2' WHERE series = 'nlcs'");
	}
	elseif ($nlds23away == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$nl1', awayteam = '$nl3' WHERE series = 'nlcs'");
	}
}
elseif ($nlds14away == 3){
	if ($nlds23home == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$nl2', awayteam = '$nl4' WHERE series = 'nlcs'");
	}
	elseif ($nlds23away == 3){
		$query = mysqli_query($db, "UPDATE mlb_cs SET hometeam = '$nl3', awayteam = '$nl4' WHERE series = 'nlcs'");
	}	
}

$alq = mysqli_query($db, "SELECT * FROM mlb_cs WHERE series = 'alcs'");
$al = mysqli_fetch_array($alq);
$nlq = mysqli_query($db, "SELECT * FROM mlb_cs WHERE series = 'nlcs'");
$nl = mysqli_fetch_array($nlq);
$alh = $al['hometeam'];
$ala = $al['awayteam'];
$nlh = $nl['hometeam'];
$nla = $nl['awayteam'];

echo $alh . " vs. " . $ala . "<br>";
echo $nlh . " vs. " . $nla;

if ($alcshome == 4){
	$query = mysqli_query($db, "UPDATE worldseries SET al_winner = '$alh'");
}
elseif ($alcsaway == 4){
	$query = mysqli_query($db, "UPDATE worldseries SET al_winner = '$ala'");
}
if ($nlcshome == 4){
	$query = mysqli_query($db, "UPDATE worldseries SET nl_winner = '$nlh'");
}
elseif ($nlcsaway == 4){
	$query = mysqli_query($db, "UPDATE worldseries SET nl_winner = '$nla'");
}

$wsql = mysqli_query($db, "SELECT * FROM worldseries");
$r = mysqli_fetch_array($wsql);
$alw = $r['al_wins'];
$alt = $r['al_winner'];
$nlw = $r['nl_wins'];
$nlt = $r['nl_winner'];
$tsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$alt'");
$t = mysqli_fetch_array($tsql);
$alid = $t['tid'];
$alteam = $t['team'];
$zsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$nlt'");
$z = mysqli_fetch_array($zsql);
$nlid = $z['tid'];
$nlteam = $z['team'];
$games = $alw + $nlw;
$yr = date("Y");

if ($alw == 4 || $nlw == 4){
	if ($alw == 4){
		$end = mysqli_query($db, "UPDATE ws_history SET winner = '$alteam', winnerid = '$alid', winnerShort = '$alt', loser = '$nlteam', loserid = '$nlid', loserShort = '$nlt', games = '$games' WHERE year = '$yr'");
		$win = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$alt'");
		$w = mysqli_fetch_array($win);
		$ws = $w['wswins'];
		$pen = $w['pennants'];
		$ws++;
		$pen++;
		$upd = mysqli_query($db, "UPDATE mlbteams SET wswins = '$ws', pennants = '$pen' WHERE teamShort = '$alt'");
		$loss = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$nlt'");
		$p = mysqli_fetch_array($loss);
		$lost = $p['pennants'];
		$lost++;
		$upd = mysqli_query($db, "UPDATE mlbteams SET pennants = '$lost' WHERE teamShort = '$nlt'");	
	}
	elseif ($nlw == 4){
		$end = mysqli_query($db, "UPDATE ws_history SET winner = '$nlteam', winnerid = '$nlid', winnerShort = '$nlt', loser = '$alteam', loserid = '$alid', loserShort = '$alt', games = '$games' WHERE year = '$yr'");	
		$win = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$nlt'");
		$w = mysqli_fetch_array($win);
		$ws = $w['wswins'];
		$pen = $w['pennants'];
		$ws++;
		$pen++;
		$upd = mysqli_query($db, "UPDATE mlbteams SET wswins = '$ws', pennants = '$pen' WHERE teamShort = '$nlt'");
		$loss = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$alt'");
		$p = mysqli_fetch_array($loss);
		$lost = $p['pennants'];
		$lost++;
		$upd = mysqli_query($db, "UPDATE mlbteams SET pennants = '$lost' WHERE teamShort = '$alt'");			
	}
}

header("location: updatePlayoffs.php");
