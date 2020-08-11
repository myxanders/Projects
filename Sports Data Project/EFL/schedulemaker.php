<?php

include("../../session.php");
$sp = "&nbsp";
$n = "<br>";
$tab = $sp . $sp . $sp . $sp;

function populateEFLSchedules($db, $league){
	if ($league == "Premier"){
		$x = 1;
		$div = "EPL";
		$weeks = 38;
		$prefix = "eplweek";
	}
	elseif ($league = "Championship"){
		$x = 381;
		$div = "EC";
		$weeks = 46;
		$prefix = "champweek";
	}
	elseif ($league = "League_One"){
		$x = 933;
		$div = "L1";
		$weeks = 46;
		$prefix = "eloweek";
	}
	elseif ($league = "League_Two"){
		$x = 1485;
		$div = "L2";
		$weeks = 46;
		$prefix = "eltweek";
	}

	//Week's Difference
	$z_diff = 604800;
	//Array for Cutoff Dates
	$gamedays = [];

	//Populate the Array with the first date of each game week
	$sql = mysqli_query($db, "SELECT * FROM realschedules.efl_fixtures WHERE division = '$div'");
	$num = mysqli_num_rows($sql);
	$i = 1;
	$start = 0;
	$weeks = 0;
	while ($i <= $num && $r = mysqli_fetch_array($sql)){
		$date = strtotime($r['DATE']);
		if ($date - $start >= $z_diff){
			$start = $date;
			$weeks++;
			array_push($gamedays, $start);
		}
		$i++;
	}
	//Since we look for upper bounds, we'll add one more bound to the array
	$max = sizeof($gamedays)-1;
	$final = $gamedays[$max] + 1;
	array_push($gamedays, $final);

	$sql = mysqli_query($db, "SELECT * FROM realschedules.efl_fixtures WHERE division = '$div'");
	$num = mysqli_num_rows($sql);

	//Set up variables
	$i=1;
	$j=1;
	$k=1;
	//Give each game the correct week number
	while ($i <= $num && $r = mysqli_fetch_array($sql)){
		$check = strtotime($r['DATE']);
		if ($check < $gamedays[$k]){
			mysqli_query($db, "UPDATE realschedules.efl_fixtures SET week = $j WHERE row = $x");
		}
		else {
			$wk = $j+1;
			mysqli_query($db, "UPDATE realschedules.efl_fixtures SET week = $wk WHERE row = $x");
			$j++;
			$k++;
		}
		$x++;
		$i++;
	}
	// Create Weekly Schedules
	$i = 1;
	while ($i <= $weeks){
		$sched = $prefix . $i;
		mysqli_query($db,"CREATE TABLE IF NOT EXISTS $sched ( `gid` INT(2) NOT NULL AUTO_INCREMENT , `hometeam` VARCHAR(3) NOT NULL , `homescore` INT(2) NULL , `awayteam` VARCHAR(3) NOT NULL , `awayscore` INT(2) NULL , PRIMARY KEY (`gid`)) ENGINE = InnoDB");
		$i++;
	}
	// Populate Weekly Schedules
	$sql = mysqli_query($db, "SELECT * FROM realschedules.efl_fixtures WHERE division = '$div'");
	$num = mysqli_num_rows($sql);
	while ($i <= $num && $q = mysqli_fetch_array($sql)){
		$sched = $prefix . $i;
		$j=1;
		$query = mysqli_query($db, "SELECT * FROM realschedules.efl_fixtures WHERE division = '$div' AND week = $i");
		$rows = mysqli_num_rows($query);
		while ($j <= $rows && $r = mysqli_fetch_array($sql)){
			$homesquad = $r['HOME_TEAM'];
			$awaysquad = $r['AWAY_TEAM'];
			$hshort = mysqli_query($db, "SELECT * FROM efl_clubs WHERE nickname = '$homesquad'");
			$h = mysqli_fetch_array($hshort);
			$home = $h['teamShort'];
			$ashort = mysqli_query($db, "SELECT * FROM efl_clubs WHERE nickname = '$awaysquad'");
			$a = mysqli_fetch_array($ashort);
			$away = $a['teamShort'];		
			mysqli_query($db, "INSERT INTO $sched (gid, hometeam, awayteam) VALUES ($j, '$home', '$away')");
			$j++;
		}
		$i++;
	}
}

function eflTeamSchedules($db, $div){
    if ($div == "Premier"){
        $prefix = "eflweek";
        $weeks = 38;
    }
    elseif ($div == "Championship"){
        $prefix = "champweek";
        $weeks = 46;
    }
    elseif ($div == "League_One"){
        $prefix = "eloweek";
        $weeks = 46;
    }
    elseif ($div == "League_Two"){
        $prefix = "eltweek";
        $weeks = 46;
    }

    $sql = mysqli_query($db, "SELECT * FROM efl_clubs WHERE league = '$div'");
    $i=1;
    while($i <= mysqli_num_rows($sql) && $r = mysqli_fetch_array($sql)){
        $tsho = $r['teamShort'];
        $sched = $tsho . "_schedule";
        $j=1;
        while ($j <= $weeks){
            $wk = $prefix . $j;
            $hquery = mysqli_query($db, "SELECT * FROM $wk WHERE hometeam = '$tsho'");
            $aquery = mysqli_query($db, "SELECT * FROM $wk WEHRE awayteam = '$tsho'");
            $hq = mysqli_fetch_array($hquery);
            $aq = mysqli_fetch_array($aquery);
            if ($hq['hometeam'] == $tsho){
                $gid = $hq['gid'];
                $opp = $hq['awayteam'];
            }
            elseif ($aq['awayteam'] == $tsho){
                $gid = $aq['gid'];
                $opp = $aq['hometeam'];
            }
            mysqli_query($db, "INSERT INTO $sched (`week`, `game`,`opponent`) VALUES ($j, $gid, '$opp')");
        }
        $i++;
    }
}

$levels = ["Premier", "Championship", "League_One", "League_Two"];

foreach($levels as $x){
	populateEFLSchedules($db, $x);
}

foreach($levels as $x){
	eflTeamSchedules($db, $x);
}
?>
