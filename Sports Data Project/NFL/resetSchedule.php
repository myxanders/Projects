<?php
include("../../session.php");
$n = "<br>";

// RENAME TEAMS IN SCHEDULE ONCE SCHEDULE IS GENERATED
$sql = mysqli_query($db, "SELECT team, location, teamShort FROM nflteams");
$i=0;
while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
	$name = $r['location'] . " " . $r['team'];
	$tsho = $r['teamShort'];
	for($k=1; $k<=17; $k++){
		$table = "nflweek" . $k;
		mysqli_query($db, "UPDATE $table SET hometeam = '$tsho' WHERE hometeam = '$name'");
		mysqli_query($db, "UPDATE $table SET awayteam = '$tsho' WHERE awayteam = '$name'");
    }
	$tSho = $r['teamShort'];
	$tsched = $r['team'] . "_schedule";
	for($j=1;$j<=17;$j++){
		$table = "nflweek" . $j;
		$query = mysqli_query($db, "SELECT * FROM $table WHERE hometeam = '$tSho'");
		$yoink = mysqli_num_rows($query);
		if ($yoink == 1){
			$q = mysqli_fetch_array($query);
			$opp = $q['awayteam'];
			mysqli_query($db, "UPDATE $tsched SET opponent = '$opp', score = NULL, oppscore = NULL, home_away = 'H', result = NULL WHERE week = $j");
		}
		elseif ($yoink == 0){
			$query = mysqli_query($db, "SELECT * FROM $table WHERE awayteam = '$tSho'");
			$yeet = mysqli_num_rows($query);
			if ($yeet == 1){
				$q = mysqli_fetch_array($query);
				$opp = $q['hometeam'];
				mysqli_query($db, "UPDATE $tsched SET opponent = '$opp', score = NULL, oppscore = NULL, home_away = 'A', result = NULL WHERE week = $j");
			}
			elseif ($yeet == 0){
				mysqli_query($db, "UPDATE $tsched SET opponent = 'BYE', score = NULL, oppscore = NULL, home_away = 'B', result = NULL WHERE week = $j");
			}
		}
	}    
    $i++;
}

// UPDATE PLAYOFF SCHEDULE
$j=18;
while ($j <=21){
	$table = 'nflweek' . $j;
	if ($j != 21){
		mysqli_query($db, "UPDATE $table SET awayteam = 'TBD', hometeam = 'TBD', awayscore = NULL, homescore = NULL");
	}
	else{
		mysqli_query($db, "UPDATE $table SET afcteam = 'TBD', nfcteam = 'TBD', afcscore = NULL, nfcscore = NULL");
	}
	$j++;
}
mysqli_query($db, "UPDATE nflweek18 SET homeseed = NULL, awayseed = NULL WHERE game = 'NFC2' OR game = 'AFC2'");
mysqli_query($db, "UPDATE nflweek19 SET homeseed = NULL, awayseed = NULL");
$columns = ["wins", "losses", "ties", "pct", "points", "against", "diff", "divw", "divl", "divpct", "confw", "confl", "confpct", "homew", "homel", "awayw", "awayl", "sov", "sos", "headtohead"];
$cols = ["w", "l", "t", "pct", "headtohead", "confpct", "sos", "sov", "pf", "pa", "pd"];
foreach ($columns as $x) {
	mysqli_query($db, "UPDATE nflteams SET $x = 0");
}

foreach ($cols as $y){
	mysqli_query($db, "UPDATE nfcleaders SET $y = 0");
	mysqli_query($db, "UPDATE afcleaders SET $y = 0");
}

?>