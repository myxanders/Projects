<?php
include("../../session.php");
$n = "<br>";


//RENAMING SCHEDULE AFTER IMPORTING
// $i = 1;
// for ($i == 1; $i <= 26; $i++){
// 	$sql = mysqli_query($db, "SELECT teamShort, team, location FROM mlsteams WHERE tid = $i");
// 	$r = mysqli_fetch_array($sql);
// 	$tSho = $r['teamShort'];
// 	$name = $r['team'];
// 	$loc = $r['location'];
// 	mysqli_query($db, "UPDATE realschedules.mls_schedule SET hometeam = '$tSho' WHERE hometeam = '$name' OR hometeam = '$loc'");
// 	mysqli_query($db, "UPDATE realschedules.mls_schedule SET awayteam = '$tSho' WHERE awayteam = '$name' OR awayteam = '$loc'");
// 	if ($tSho == 'LFC'){
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET hometeam = '$tSho' WHERE hometeam = 'Los Angeles FC'");
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET awayteam = '$tSho' WHERE awayteam = 'Los Angeles FC'");
// 	}
// 	elseif ($tSho == 'LAG'){
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET hometeam = '$tSho' WHERE hometeam = 'LA Galaxy'");
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET awayteam = '$tSho' WHERE awayteam = 'LA Galaxy'");
// 	}
// 	elseif ($tSho == 'OSC'){
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET hometeam = '$tSho' WHERE hometeam = 'Orlando City'");
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET awayteam = '$tSho' WHERE awayteam = 'Orlando City'");
// 	}
// 	elseif ($tSho == 'NYC'){
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET hometeam = '$tSho' WHERE hometeam = 'NYCFC'");
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET awayteam = '$tSho' WHERE awayteam = 'NYCFC'");
// 	}
// 	elseif ($tSho == 'NY'){
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET hometeam = '$tSho' WHERE hometeam = 'NY Red Bulls'");
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET awayteam = '$tSho' WHERE awayteam = 'NY Red Bulls'");
// 	}
// 	elseif ($tSho == 'MIA'){
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET hometeam = '$tSho' WHERE hometeam = 'Inter Miami'");
// 		mysqli_query($db, "UPDATE realschedules.mls_schedule SET awayteam = '$tSho' WHERE awayteam = 'Inter Miami'");
// 	}
// }

//POPULATE MLS SCHEDULE
// $i = 1;
// while ($i <= 32){
// 	$sql = mysqli_query($db, "SELECT * FROM realschedules.mls_schedule WHERE Week_ID = $i");
// 	$j = 1;
// 	$wk = "mlsweek" . $i;
// 	mysqli_query($db, "DELETE FROM $wk");
// 	echo $wk . $n;
// 	while ($j <= mysqli_num_rows($sql) && $r = mysqli_fetch_array($sql)){
// 		$home = $r['hometeam'];
// 		$away = $r['awayteam'];
// 		echo $i . "-" . $j . ": " . $away . " @ " . $home . $n;
// 		mysqli_query($db, "INSERT INTO $wk (gid, hometeam, awayteam) VALUES ($j, '$home', '$away')");
// 		$j++;
// 	}
// 	$i++;
// }

// $i = 1;
// $sql = mysqli_query($db, "SELECT * FROM mlsteams");
// while ($i <= mysqli_num_rows($sql) && $r = mysqli_fetch_array($sql)){
// 	$tSho = $r['teamShort'];
// 	$tSched = $tSho . "_schedule";
// 	mysqli_query($db, "DELETE FROM $tSched");
// 	$i++;
// }

?>