<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";

$east18away = NULL;
$east18home = NULL;
$west18away = NULL;
$west18home = NULL;
$east45away = NULL;
$east45home = NULL;
$west45away = NULL;
$west45home = NULL;
$east36away = NULL;
$east36home = NULL;
$west36away = NULL;
$west36home = NULL;
$east27away = NULL;
$east27home = NULL;
$west27away = NULL;
$west27home = NULL;
$east14top = NULL;
$east14bot = NULL;
$west14top = NULL;
$west14bot = NULL;
$east23top = NULL;
$east23bot = NULL;
$west23top = NULL;
$west23bot = NULL;
$easttop = NULL;
$eastbot = NULL;
$westtop = NULL;
$westbot = NULL;
$east_f = NULL;
$west_f = NULL;


if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['east18away'])) {
 		$east18away = $_POST['east18away'];
 		echo "east18away = " . $east18away . $n;
 	}
 	if (isset($_POST['east18home'])) {
 		$east18home = $_POST['east18home'];
 		echo "east18home = " . $east18home . $n;
 	}	
 	if (isset($_POST['west18away'])) {
 		$west18away = $_POST['west18away'];
 		echo "west18away = " . $west18away . $n;
 	}
 	if (isset($_POST['west18home'])) {
 		$west18home = $_POST['west18home'];
 		echo "west18home = " . $west18home . $n;
 	}
 	if (isset($_POST['east45away'])) {
 		$east45away = $_POST['east45away'];
 		echo "east45away = " . $east45away . $n;
 	}
 	if (isset($_POST['east45home'])) {
 		$east45home = $_POST['east45home'];
 		echo "east45home = " . $east45home . $n;
 	}	
 	if (isset($_POST['west45away'])) {
 		$west45away = $_POST['west45away'];
 		echo "west45away = " . $west45away . $n;
 	}
 	if (isset($_POST['west45home'])) {
 		$west45home = $_POST['west45home'];
 		echo "west45home = " . $west45home . $n;
 	} 
 	if (isset($_POST['east36away'])) {
 		$east36away = $_POST['east36away'];
 		echo "east36away = " . $east36away . $n;
 	}
 	if (isset($_POST['east36home'])) {
 		$east36home = $_POST['east36home'];
 		echo "east36home = " . $east36home . $n;
 	}
 	if (isset($_POST['west36away'])) {
 		$west36away = $_POST['west36away'];
 		echo "west36away = " . $west36away . $n;
 	}
 	if (isset($_POST['west36home'])) {
 		$west36home = $_POST['west36home'];
 		echo "west36home = " . $west36home . $n;
 	}	
 	if (isset($_POST['east27away'])) {
 		$east27away = $_POST['east27away'];
 		echo "east27away = " . $east27away . $n;
 	}
 	if (isset($_POST['east27home'])) {
 		$east27home = $_POST['east27home'];
 		echo "east27home = " . $east27home . $n;
 	}
 	if (isset($_POST['west27away'])) {
 		$west27away = $_POST['west27away'];
 		echo "west27away = " . $west27away . $n;
 	}
 	if (isset($_POST['west27home'])) {
 		$west27home = $_POST['west27home'];
 		echo "west27home = " . $west27home . $n;
 	} 		
 	if (isset($_POST['east14bot'])) {
 		$east14bot = $_POST['east14bot'];
 		echo "east14bot = " . $east14bot . $n;
 	}
 	if (isset($_POST['east14top'])) {
 		$east14top = $_POST['east14top'];
 		echo "east14top = " . $east14top . $n;
 	}	
 	if (isset($_POST['west14bot'])) {
 		$west14bot = $_POST['west14bot'];
 		echo "west14bot = " . $west14bot . $n;
 	}
 	if (isset($_POST['west14top'])) {
 		$west14top = $_POST['west14top'];
 		echo "west14top = " . $west14top . $n;
 	}
 	if (isset($_POST['east23bot'])) {
 		$east23bot = $_POST['east23bot'];
 		echo "east23bot = " . $east23bot . $n;
 	}
 	if (isset($_POST['east23top'])) {
 		$east23top = $_POST['east23top'];
 		echo "east23top = " . $east23top . $n;
 	}	
 	if (isset($_POST['west23bot'])) {
 		$west23bot = $_POST['west23bot'];
 		echo "west23away = " . $west23away . $n;
 	}
 	if (isset($_POST['west23top'])) {
 		$west23top = $_POST['west23top'];
 		echo "west23top = " . $west23top . $n;
 	} 
 	if (isset($_POST['easttop'])) {
 		$easttop = $_POST['easttop'];
 		echo "easttop = " . $easttop . $n;
 	}
 	if (isset($_POST['eastbot'])) {
 		$eastbot = $_POST['eastbot'];
 		echo "eastbot = " . $eastbot . $n;
 	}	
 	if (isset($_POST['westtop'])) {
 		$westtop = $_POST['westtop'];
 		echo "westtop = " . $westtop . $n;
 	}
 	if (isset($_POST['westbot'])) {
 		$westbot = $_POST['westbot'];
 		echo "westbot = " . $westbot . $n;
 	}
 	if (isset($_POST['east_f'])) {
 		$east_f = $_POST['east_f'];
 		echo "east_f = " . $east_f . $n;
 	}
 	if (isset($_POST['west_f'])) {
 		$west_f = $_POST['west_f'];
 		echo "west_f = " . $west_f . $n;
 	}		
 }

mysqli_query($db, "UPDATE nbaround1 SET homewins = '$east18home', awaywins = '$east18away' WHERE series = 'East18'");
mysqli_query($db, "UPDATE nbaround1 SET homewins = '$east45home', awaywins = '$east45away' WHERE series = 'East45'");
mysqli_query($db, "UPDATE nbaround1 SET homewins = '$east36home', awaywins = '$east36away' WHERE series = 'East36'");
mysqli_query($db, "UPDATE nbaround1 SET homewins = '$east27home', awaywins = '$east27away' WHERE series = 'East27'");
mysqli_query($db, "UPDATE nbaround1 SET homewins = '$west18home', awaywins = '$west18away' WHERE series = 'West18'");
mysqli_query($db, "UPDATE nbaround1 SET homewins = '$west45home', awaywins = '$west45away' WHERE series = 'West45'");
mysqli_query($db, "UPDATE nbaround1 SET homewins = '$west36home', awaywins = '$west36away' WHERE series = 'West36'");
mysqli_query($db, "UPDATE nbaround1 SET homewins = '$west27home', awaywins = '$west27away' WHERE series = 'West27'");
mysqli_query($db, "UPDATE nbaround2 SET topwins = '$east14top', botwins = '$east14bot' WHERE series = 'East14'");
mysqli_query($db, "UPDATE nbaround2 SET topwins = '$east23top', botwins = '$east23bot' WHERE series = 'East23'");
mysqli_query($db, "UPDATE nbaround2 SET topwins = '$west14top', botwins = '$west14bot' WHERE series = 'West14'");
mysqli_query($db, "UPDATE nbaround2 SET topwins = '$west23top', botwins = '$west23bot' WHERE series = 'West23'");
mysqli_query($db, "UPDATE nbaround3 SET topwins = '$easttop', botwins = '$eastbot' WHERE series = 'East'");
mysqli_query($db, "UPDATE nbaround3 SET topwins = '$westtop', botwins = '$westbot' WHERE series = 'West'");
mysqli_query($db, "UPDATE nbafinals SET games = '$east_f' WHERE conf = 'East'");
mysqli_query($db, "UPDATE nbafinals SET games = '$west_f' WHERE conf = 'West'");

if ($east18home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East18'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'East14'");
}
elseif ($east18away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East18'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'East14'");	
}

if ($east45home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East45'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'East14'");
}
elseif ($east45away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East45'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'East14'");	
}

if ($east36home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East36'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'East23'");
}
elseif ($east36away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East36'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'East23'");	
}

if ($east27home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East27'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'East23'");
}
elseif ($east27away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'East27'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'East23'");	
}

if ($west18home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West18'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'West14'");
}
elseif ($west18away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West18'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'West14'");	
}

if ($west45home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West45'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'West14'");
}
elseif ($west45away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West45'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'West14'");	
}

if ($west36home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West36'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'West23'");
}
elseif ($west36away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West36'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET topteam = '$team' WHERE series = 'West23'");	
}

if ($west27home == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West27'");
	$r = mysqli_fetch_array($sql);
	$team = $r['hometeam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'West23'");
}
elseif ($west27away == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'West27'");
	$r = mysqli_fetch_array($sql);
	$team = $r['awayteam'];
	mysqli_query($db, "UPDATE nbaround2 SET botteam = '$team' WHERE series = 'West23'");	
}

if ($east14top == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'East14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nbaround3 SET topteam = '$team' WHERE series = 'East'");
}
elseif ($east14bot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'East14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nbaround3 SET topteam = '$team' WHERE series = 'East'");	
}

if ($east23top == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'East23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nbaround3 SET botteam = '$team' WHERE series = 'East'");
}
elseif ($east23bot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'East23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nbaround3 SET botteam = '$team' WHERE series = 'East'");	
}

if ($west14top == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'West14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nbaround3 SET topteam = '$team' WHERE series = 'West'");
}
elseif ($west14bot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'West14'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nbaround3 SET topteam = '$team' WHERE series = 'West'");	
}

if ($west23top == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'West23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nbaround3 SET botteam = '$team' WHERE series = 'West'");
}
elseif ($west23bot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'West23'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nbaround3 SET botteam = '$team' WHERE series = 'West'");	
}

if ($easttop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround3 WHERE series = 'East'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nbafinals SET team = '$team' WHERE conf = 'East'");
}
elseif ($eastbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround3 WHERE series = 'East'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nbafinals SET team = '$team' WHERE conf = 'East'");	
}

if ($westtop == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround3 WHERE series = 'West'");
	$r = mysqli_fetch_array($sql);
	$team = $r['topteam'];
	mysqli_query($db, "UPDATE nbafinals SET team = '$team' WHERE conf = 'West'");
}
elseif ($westbot == 4){
	$sql = mysqli_query($db, "SELECT * FROM nbaround3 WHERE series = 'West'");
	$r = mysqli_fetch_array($sql);
	$team = $r['botteam'];
	mysqli_query($db, "UPDATE nbafinals SET team = '$team' WHERE conf = 'West'");	
}

$sql = mysqli_query($db, "SELECT * FROM nbafinals WHERE conf = 'West'");
$r = mysqli_fetch_array($sql);
$westteam = $r['team']; 
$sql = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$westteam'");
$r = mysqli_fetch_array($sql);
$westid = $r['tid'];
$sql = mysqli_query($db, "SELECT * FROM nbafinals WHERE conf = 'East'");
$r = mysqli_fetch_array($sql);
$eastteam = $r['team'];
$sql = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$eastteam'");
$r = mysqli_fetch_array($sql);
$eastid = $r['tid'];
$games = $west_f + $east_f;

$year = 2018;
$query = mysqli_query($db, "SELECT * FROM nba_finals_history WHERE year = $year");
$num = mysqli_num_rows($query);
if ($num < 1){
	mysqli_query($db, "INSERT INTO nba_finals_history (`year`) VALUES ($year)");
}
if ($west_f == 4){
	mysqli_query($db, "UPDATE nba_finals_history SET winner = '$westteam', winnerid = '$westid', loser = '$eastteam', loserid = '$eastid', games = $games WHERE year = $year");
}
elseif ($east_f == 4){
	mysqli_query($db, "UPDATE nba_finals_history SET winner = '$eastteam', winnerid = '$eastid', loser = '$westteam', loserid = '$westid', games = $games WHERE year = $year");
} 

header("location: updatePlayoffs.php");
