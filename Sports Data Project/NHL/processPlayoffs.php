<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";

$cen14away = NULL;
$cen14home = NULL;
$pac14away = NULL;
$pac14home = NULL;
$cen23away = NULL;
$cen23home = NULL;
$pac23away = NULL;
$pac23home = NULL;
$met14away = NULL;
$met14home = NULL;
$met23away = NULL;
$met23home = NULL;
$atl14away = NULL;
$atl14home = NULL;
$atl23away = NULL;
$atl23home = NULL;
$cenfinaltop = NULL;
$cenfinalbot = NULL;
$pacfinaltop = NULL;
$pacfinalbot = NULL;
$metfinaltop = NULL;
$metfinalbot = NULL;
$atlfinaltop = NULL;
$atlfinalbot = NULL;
$eastftop = NULL;
$eastfbot = NULL;
$westftop = NULL;
$westfbot = NULL;
$east_f = NULL;
$west_f = NULL;

//Process series wins
if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['cen14away'])) {
 		$cen14away = $_POST['cen14away'];
 	}
 	if (isset($_POST['cen14home'])) {
 		$cen14home = $_POST['cen14home'];
 	}	
 	if (isset($_POST['pac14away'])) {
 		$pac14away = $_POST['pac14away'];
 	}
 	if (isset($_POST['pac14home'])) {
 		$pac14home = $_POST['pac14home'];
 	}
 	if (isset($_POST['cen23away'])) {
 		$cen23away = $_POST['cen23away'];
 	}
 	if (isset($_POST['cen23home'])) {
 		$cen23home = $_POST['cen23home'];
 	}	
 	if (isset($_POST['pac23away'])) {
 		$pac23away = $_POST['pac23away'];
 	}
 	if (isset($_POST['pac23home'])) {
 		$pac23home = $_POST['pac23home'];
 	} 
 	if (isset($_POST['met14away'])) {
 		$met14away = $_POST['met14away'];
 	}
 	if (isset($_POST['met14home'])) {
 		$met14home = $_POST['met14home'];
 	}
 	if (isset($_POST['met23away'])) {
 		$met23away = $_POST['met23away'];
 	}
 	if (isset($_POST['met23home'])) {
 		$met23home = $_POST['met23home'];
 	}	
 	if (isset($_POST['atl14away'])) {
 		$atl14away = $_POST['atl14away'];
 	}
 	if (isset($_POST['atl14home'])) {
 		$atl14home = $_POST['atl14home'];
 	}
 	if (isset($_POST['atl23away'])) {
 		$atl23away = $_POST['atl23away'];
 	}
 	if (isset($_POST['atl23home'])) {
 		$atl23home = $_POST['atl23home'];
 	} 		
 	if (isset($_POST['cenfinalbot'])) {
 		$cenfinalbot = $_POST['cenfinalbot'];
 	}
 	if (isset($_POST['cenfinaltop'])) {
 		$cenfinaltop = $_POST['cenfinaltop'];
 	}	
 	if (isset($_POST['pacfinalbot'])) {
 		$pacfinalbot = $_POST['pacfinalbot'];
 	}
 	if (isset($_POST['pacfinaltop'])) {
 		$pacfinaltop = $_POST['pacfinaltop'];
 	}
 	if (isset($_POST['metfinalbot'])) {
 		$metfinalbot = $_POST['metfinalbot'];
 	}
 	if (isset($_POST['metfinaltop'])) {
 		$metfinaltop = $_POST['metfinaltop'];
 	}	
 	if (isset($_POST['atlfinalbot'])) {
 		$atlfinalbot = $_POST['atlfinalbot'];
 	}
 	if (isset($_POST['atlfinaltop'])) {
 		$atlfinaltop = $_POST['atlfinaltop'];
 	} 
 	if (isset($_POST['eastftop'])) {
 		$eastftop = $_POST['eastftop'];
 	}
 	if (isset($_POST['eastfbot'])) {
 		$eastfbot = $_POST['eastfbot'];
 	}	
 	if (isset($_POST['westftop'])) {
 		$westftop = $_POST['westftop'];
 	}
 	if (isset($_POST['westfbot'])) {
 		$westfbot = $_POST['westfbot'];
 	}
 	if (isset($_POST['east_f'])) {
 		$east_f = $_POST['east_f'];
 	}
 	if (isset($_POST['west_f'])) {
 		$west_f = $_POST['west_f'];
 	}		
 }

mysqli_query($db, "UPDATE nhlround1 SET homewins = '$cen14home', awaywins = '$cen14away' WHERE series = 'cen14'");
mysqli_query($db, "UPDATE nhlround1 SET homewins = '$cen23home', awaywins = '$cen23away' WHERE series = 'cen23'");
mysqli_query($db, "UPDATE nhlround1 SET homewins = '$met14home', awaywins = '$met14away' WHERE series = 'met14'");
mysqli_query($db, "UPDATE nhlround1 SET homewins = '$atl14home', awaywins = '$atl14away' WHERE series = 'atl14'");
mysqli_query($db, "UPDATE nhlround1 SET homewins = '$pac14home', awaywins = '$pac14away' WHERE series = 'pac14'");
mysqli_query($db, "UPDATE nhlround1 SET homewins = '$pac23home', awaywins = '$pac23away' WHERE series = 'pac23'");
mysqli_query($db, "UPDATE nhlround1 SET homewins = '$met23home', awaywins = '$met23away' WHERE series = 'met23'");
mysqli_query($db, "UPDATE nhlround1 SET homewins = '$atl23home', awaywins = '$atl23away' WHERE series = 'atl23'");
mysqli_query($db, "UPDATE nhlround2 SET topwins = '$cenfinaltop', botwins = '$cenfinalbot' WHERE series = 'cenfinal'");
mysqli_query($db, "UPDATE nhlround2 SET topwins = '$metfinaltop', botwins = '$metfinalbot' WHERE series = 'metfinal'");
mysqli_query($db, "UPDATE nhlround2 SET topwins = '$pacfinaltop', botwins = '$pacfinalbot' WHERE series = 'pacfinal'");
mysqli_query($db, "UPDATE nhlround2 SET topwins = '$atlfinaltop', botwins = '$atlfinalbot' WHERE series = 'atlfinal'");
mysqli_query($db, "UPDATE nhlround3 SET topwins = '$eastftop', botwins = '$eastfbot' WHERE series = 'Eastf'");
mysqli_query($db, "UPDATE nhlround3 SET topwins = '$westftop', botwins = '$westfbot' WHERE series = 'Westf'");
mysqli_query($db, "UPDATE nhl_sc_finals SET wins = '$east_f' WHERE conf = 'East'");
mysqli_query($db, "UPDATE nhl_sc_finals SET wins = '$west_f' WHERE conf = 'West'");

//Advance teams when they win best-of-7
if ($cen14home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'cen14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'cenfinal'");
}
elseif ($cen14away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'cen14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'cenfinal'");	
}

if ($cen23home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'cen23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'cenfinal'");
}
elseif ($cen23away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'cen23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'cenfinal'");	
}

if ($met14home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'met14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'metfinal'");
}
elseif ($met14away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'met14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'metfinal'");	
}

if ($atl14home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'atl14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'atlfinal'");
}
elseif ($atl14away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'atl14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'atlfinal'");	
}

if ($pac14home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'pac14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'pacfinal'");
}
elseif ($pac14away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'pac14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET topteam = '$team' WHERE series = 'pacfinal'");	
}

if ($pac23home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'pac23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'pacfinal'");
}
elseif ($pac23away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'pac23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'pacfinal'");	
}

if ($met23home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'met23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'metfinal'");
}
elseif ($met23away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'met23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'metfinal'");	
}

if ($atl23home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'atl23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'atlfinal'");
}
elseif ($atl23away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'atl23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nhlround2 SET botteam = '$team' WHERE series = 'atlfinal'");	
}

if ($cenfinaltop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'cenfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nhlround3 SET topteam = '$team' WHERE series = 'Westf'");
}
elseif ($cenfinalbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'cenfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nhlround3 SET topteam = '$team' WHERE series = 'Westf'");	
}

if ($metfinaltop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'metfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nhlround3 SET topteam = '$team' WHERE series = 'Eastf'");
}
elseif ($metfinalbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'metfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nhlround3 SET topteam = '$team' WHERE series = 'Eastf'");	
}

if ($pacfinaltop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'pacfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nhlround3 SET botteam = '$team' WHERE series = 'Westf'");
}
elseif ($pacfinalbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'pacfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nhlround3 SET botteam = '$team' WHERE series = 'Westf'");	
}

if ($atlfinaltop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'atlfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nhlround3 SET botteam = '$team' WHERE series = 'Eastf'");
}
elseif ($atlfinalbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'atlfinal'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nhlround3 SET botteam = '$team' WHERE series = 'Eastf'");	
}

$year = date("Y");
$ok = mysqli_query($db, "SELECT * FROM whatif_stanleycup WHERE year = $year");
$num = mysqli_num_rows($ok);

if ($num < 1){
	mysqli_query($db, "INSERT INTO whatif_stanleycup (`year`) VALUES ($year)");
}

if ($eastftop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround3 WHERE series = 'Eastf'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	$loser = $r['botteam'];
	mysqli_query($db, "UPDATE nhl_sc_finals SET team = '$team' WHERE conf = 'East'");
	mysqli_query($db, "UPDATE whatif_stanleycup SET eShort = '$loser' WHERE year = $year");
}
elseif ($eastfbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround3 WHERE series = 'Eastf'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	$loser = $r['topteam'];
	mysqli_query($db, "UPDATE nhl_sc_finals SET team = '$team' WHERE conf = 'East'");	
	mysqli_query($db, "UPDATE whatif_stanleycup SET eShort = '$loser' WHERE year = $year");
}

if ($westftop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround3 WHERE series = 'Westf'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	$loser = $r['botteam'];
	mysqli_query($db, "UPDATE nhl_sc_finals SET team = '$team' WHERE conf = 'West'");
	mysqli_query($db, "UPDATE whatif_stanleycup SET wShort = '$loser' WHERE year = $year");
}
elseif ($westfbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nhlround3 WHERE series = 'Westf'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	$loser = $r['topteam'];
	mysqli_query($db, "UPDATE nhl_sc_finals SET team = '$team' WHERE conf = 'West'");
	mysqli_query($db, "UPDATE whatif_stanleycup SET wShort = '$loser' WHERE year = $year");	
}

mysqli_query($db, "UPDATE whatif_stanleycup a SET west = (SELECT team FROM nhlteams WHERE teamShort = a.wShort), east = (SELECT team FROM nhlteams WHERE teamShort = a.eShort) WHERE year = $year");
$sql = mysqli_query($db, "SELECT * FROM nhl_sc_finals WHERE conf = 'West'");
$r = mysqli_fetch_array($sql);
$westteam = $r['team']; 
$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$westteam'");
$r = mysqli_fetch_array($sql);
$westid = $r['tid'];
$sql = mysqli_query($db, "SELECT * FROM nhl_sc_finals WHERE conf = 'East'");
$r = mysqli_fetch_array($sql);
$eastteam = $r['team'];
$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$eastteam'");
$r = mysqli_fetch_array($sql);
$eastid = $r['tid'];
$games = $west_f + $east_f;

if ($west_f == 4){
	mysqli_query($db, "UPDATE stanleycups SET winner = '$westteam', winnerid = $westid, loser = '$eastteam', loserid = $eastid, games = $games WHERE year = $year");
}
elseif ($east_f == 4){
	mysqli_query($db, "UPDATE stanleycups SET winner = '$eastteam', winnerid = $eastid, loser = '$westteam', loserid = $westid, games = $games WHERE year = $year");	
}
header("location: updatePlayoffs.php");
