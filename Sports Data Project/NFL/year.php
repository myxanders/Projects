<?php
$year = 2020;

//Updates divisional standings with appropriate tiebreakers
function updateDivisions($db){
	$nfcn = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'North' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($nfcn);

	$nfcnleader = $row['team'];
	$nfcnsql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$nfcnleader'");
	$nfcnteam = $row['team'];
	$nfcnshort = $row['teamShort'];
	$nfcnw = $row['wins'];
	$nfcnl = $row['losses'];
	$nfcnt = $row['ties'];
	$nfcnpct = $row['pct'];
	$nfcnconf = $row['confpct'];
	$nfcnh2h = $row['headtohead'];
	$nfcnsos = $row['sos'];
	$nfcnsov = $row['sov'];
	$nfcnpf = $row['points'];
	$nfcnpa = $row['against'];
	$nfcnpd = $row['diff'];

	$updatenn = mysqli_query($db, "UPDATE nfcleaders SET leader = '$nfcnteam', teamShort = '$nfcnshort', w = '$nfcnw', l = '$nfcnl', t = '$nfcnt', pct = '$nfcnpct', confpct = '$nfcnconf', sos = '$nfcnsos', sov = '$nfcnsov', headtohead = '$nfcnh2h', pf = '$nfcnpf', pa = '$nfcnpa', pd = '$nfcnpd' WHERE division = 'North'");

	$nfcs = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'South' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($nfcs);

	$nfcsleader = $row['team'];
	$nfcssql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$nfcsleader'");
	$nfcsteam = $row['team'];
	$nfcsshort = $row['teamShort'];
	$nfcsw = $row['wins'];
	$nfcsl = $row['losses'];
	$nfcst = $row['ties'];
	$nfcspct = $row['pct'];
	$nfcsconf = $row['confpct'];
	$nfcsh2h = $row['headtohead'];
	$nfcssos = $row['sos'];
	$nfcssov = $row['sov'];
	$nfcspf = $row['points'];
	$nfcspa = $row['against'];
	$nfcspd = $row['diff'];

	$updatenn = mysqli_query($db, "UPDATE nfcleaders SET leader = '$nfcsteam', teamShort = '$nfcsshort', w = '$nfcsw', l = '$nfcsl', t = '$nfcst', pct = '$nfcspct', confpct = '$nfcsconf', sos = '$nfcssos', sov = '$nfcssov', headtohead = '$nfcsh2h', pf = '$nfcspf', pa = '$nfcspa', pd = '$nfcspd' WHERE division = 'South'");

	$nfce = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'East' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($nfce);

	$nfceleader = $row['team'];
	$nfcesql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$nfceleader'");
	$nfceteam = $row['team'];
	$nfceshort = $row['teamShort'];
	$nfcew = $row['wins'];
	$nfcel = $row['losses'];
	$nfcet = $row['ties'];
	$nfcepct = $row['pct'];
	$nfceconf = $row['confpct'];
	$nfceh2h = $row['headtohead'];
	$nfcesos = $row['sos'];
	$nfcesov = $row['sov'];
	$nfcepf = $row['points'];
	$nfcepa = $row['against'];
	$nfcepd = $row['diff'];

	$updatenn = mysqli_query($db, "UPDATE nfcleaders SET leader = '$nfceteam', teamShort = '$nfceshort', w = '$nfcew', l = '$nfcel', t = '$nfcet', pct = '$nfcepct', confpct = '$nfceconf', sos = '$nfcesos', sov = '$nfcesov', headtohead = '$nfceh2h', pf = '$nfcepf', pa = '$nfcepa', pd = '$nfcepd' WHERE division = 'East'");

	$nfcw = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'West' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($nfcw);

	$nfcwleader = $row['team'];
	$nfcwsql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$nfcwleader'");
	$nfcwteam = $row['team'];
	$nfcwshort = $row['teamShort'];
	$nfcww = $row['wins'];
	$nfcwl = $row['losses'];
	$nfcwt = $row['ties'];
	$nfcwpct = $row['pct'];
	$nfcwconf = $row['confpct'];
	$nfcwh2h = $row['headtohead'];
	$nfcwsos = $row['sos'];
	$nfcwsov = $row['sov'];
	$nfcwpf = $row['points'];
	$nfcwpa = $row['against'];
	$nfcwpd = $row['diff'];

	$updatenw = mysqli_query($db, "UPDATE nfcleaders SET leader = '$nfcwteam', teamShort = '$nfcwshort', w = '$nfcww', l = '$nfcwl', t = '$nfcwt', pct = '$nfcwpct', confpct = '$nfcwconf', sos = '$nfcwsos', sov = '$nfcwsov', headtohead = '$nfcwh2h', pf = '$nfcwpf', pa = '$nfcwpa', pd = '$nfcwpd' WHERE division = 'West'");

	$afcn = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'afc' AND division = 'North' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($afcn);

	$afcnleader = $row['team'];
	$afcnsql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$afcnleader'");
	$afcnteam = $row['team'];
	$afcnshort = $row['teamShort'];
	$afcnw = $row['wins'];
	$afcnl = $row['losses'];
	$afcnt = $row['ties'];
	$afcnpct = $row['pct'];
	$afcnconf = $row['confpct'];
	$afcnh2h = $row['headtohead'];
	$afcnsos = $row['sos'];
	$afcnsov = $row['sov'];
	$afcnpf = $row['points'];
	$afcnpa = $row['against'];
	$afcnpd = $row['diff'];

	$updatean = mysqli_query($db, "UPDATE afcleaders SET leader = '$afcnteam', teamShort = '$afcnshort', w = '$afcnw', l = '$afcnl', t = '$afcnt', pct = '$afcnpct', confpct = '$afcnconf', sos = '$afcnsos', sov = '$afcnsov', headtohead = '$afcnh2h', pf = '$afcnpf', pa = '$afcnpa', pd = '$afcnpd' WHERE division = 'North'");

	$afcs = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'afc' AND division = 'South' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($afcs);

	$afcsleader = $row['team'];
	$afcssql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$afcsleader'");
	$afcsteam = $row['team'];
	$afcsshort = $row['teamShort'];
	$afcsw = $row['wins'];
	$afcsl = $row['losses'];
	$afcst = $row['ties'];
	$afcspct = $row['pct'];
	$afcsconf = $row['confpct'];
	$afcsh2h = $row['headtohead'];
	$afcssos = $row['sos'];
	$afcssov = $row['sov'];
	$afcspf = $row['points'];
	$afcspa = $row['against'];
	$afcspd = $row['diff'];

	$updatean = mysqli_query($db, "UPDATE afcleaders SET leader = '$afcsteam', teamShort = '$afcsshort', w = '$afcsw', l = '$afcsl', t = '$afcst', pct = '$afcspct', confpct = '$afcsconf', sos = '$afcssos', sov = '$afcssov', headtohead = '$afcsh2h', pf = '$afcspf', pa = '$afcspa', pd = '$afcspd' WHERE division = 'South'");

	$afce = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'afc' AND division = 'East' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($afce);

	$afceleader = $row['team'];
	$afcesql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$afceleader'");
	$afceteam = $row['team'];
	$afceshort = $row['teamShort'];
	$afcew = $row['wins'];
	$afcel = $row['losses'];
	$afcet = $row['ties'];
	$afcepct = $row['pct'];
	$afceconf = $row['confpct'];
	$afceh2h = $row['headtohead'];
	$afcesos = $row['sos'];
	$afcesov = $row['sov'];
	$afcepf = $row['points'];
	$afcepa = $row['against'];
	$afcepd = $row['diff'];

	$updatean = mysqli_query($db, "UPDATE afcleaders SET leader = '$afceteam', teamShort = '$afceshort', w = '$afcew', l = '$afcel', t = '$afcet', pct = '$afcepct', confpct = '$afceconf', sos = '$afcesos', sov = '$afcesov', headtohead = '$afceh2h', pf = '$afcepf', pa = '$afcepa', pd = '$afcepd' WHERE division = 'East'");

	$afcw = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'afc' AND division = 'West' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
	$row = mysqli_fetch_array($afcw);

	$afcwleader = $row['team'];
	$afcwsql = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$afcwleader'");
	$afcwteam = $row['team'];
	$afcwshort = $row['teamShort'];
	$afcww = $row['wins'];
	$afcwl = $row['losses'];
	$afcwt = $row['ties'];
	$afcwpct = $row['pct'];
	$afcwconf = $row['confpct'];
	$afcwh2h = $row['headtohead'];
	$afcwsos = $row['sos'];
	$afcwsov = $row['sov'];
	$afcwpf = $row['points'];
	$afcwpa = $row['against'];
	$afcwpd = $row['diff'];

	$updateaw = mysqli_query($db, "UPDATE afcleaders SET leader = '$afcwteam', teamShort = '$afcwshort', w = '$afcww', l = '$afcwl', t = '$afcwt', pct = '$afcwpct', confpct = '$afcwconf', sos = '$afcwsos', sov = '$afcwsov', headtohead = '$afcwh2h', pf = '$afcwpf', pa = '$afcwpa', pd = '$afcwpd' WHERE division = 'West'");
}

//Updates playoff picture every week
function updatePlayoffPic($db){
	$playoffpic = mysqli_query($db, "SELECT teamShort FROM `nfcleaders` ORDER BY pct DESC, headtohead DESC, confpct DESC, sov DESC, sos DESC");
	$numb = mysqli_num_rows($playoffpic);
	$i = 1;
	while ($i < $numb + 1 && $r = mysqli_fetch_array($playoffpic)) {
		if ($i == 1) {
			$one = $r['teamShort'];
			$oneseed = mysqli_query($db, "UPDATE nflweek19 SET hometeam = '$one' WHERE game = 'NFC1'");
		} elseif ($i == 2) {
			$two = $r['teamShort'];
			$twoseed = mysqli_query($db, "UPDATE nflweek18 SET hometeam = '$two' WHERE game = 'NFC2'");
		} elseif ($i == 3) {
			$three = $r['teamShort'];
			$threeseed = mysqli_query($db, "UPDATE nflweek18 SET hometeam = '$three' WHERE game = 'NFC3'");
		} elseif ($i == 4) {
			$four = $r['teamShort'];
			$fourseed = mysqli_query($db, "UPDATE nflweek18 SET hometeam = '$four' WHERE game = 'NFC4'");
		}
		$i++;
	}
	$nfcwc = mysqli_query($db, "SELECT teamShort FROM nflteams WHERE conference = 'NFC' AND team NOT IN (SELECT leader FROM nfcleaders)ORDER BY pct DESC, headtohead DESC, confpct DESC, sov DESC, sos DESC");
	$j = 1;
	while ($j < 4 && $r = mysqli_fetch_array($nfcwc)) {
		if ($j == 1) {
			$five = $r['teamShort'];
			$fiveseed = mysqli_query($db, "UPDATE nflweek18 SET awayteam = '$five' WHERE game = 'NFC4'");
		} elseif ($j == 2) {
			$six = $r['teamShort'];
			$sixseed = mysqli_query($db, "UPDATE nflweek18 SET awayteam = '$six' WHERE game = 'NFC3'");
		} elseif ($j == 3) {
			$seven = $r['teamShort'];
			$sevenseed = mysqli_query($db, "UPDATE nflweek18 SET awayteam = '$seven' WHERE game = 'NFC2'");
		}
		$j++;
	}

	$playoffpic = mysqli_query($db, "SELECT teamShort FROM `afcleaders` ORDER BY pct DESC, headtohead DESC, confpct DESC, sov DESC, sos DESC");
	$numb = mysqli_num_rows($playoffpic);
	$i = 1;
	while ($i < $numb + 1 && $r = mysqli_fetch_array($playoffpic)) {
		if ($i == 1) {
			$one = $r['teamShort'];
			$oneseed = mysqli_query($db, "UPDATE nflweek19 SET hometeam = '$one' WHERE game = 'AFC1'");
		} elseif ($i == 2) {
			$two = $r['teamShort'];
			$twoseed = mysqli_query($db, "UPDATE nflweek18 SET hometeam = '$two' WHERE game = 'AFC2'");
		} elseif ($i == 3) {
			$three = $r['teamShort'];
			$threeseed = mysqli_query($db, "UPDATE nflweek18 SET hometeam = '$three' WHERE game = 'AFC3'");
		} elseif ($i == 4) {
			$four = $r['teamShort'];
			$fourseed = mysqli_query($db, "UPDATE nflweek18 SET hometeam = '$four' WHERE game = 'AFC4'");
		}
		$i++;
	}

	$afcwc = mysqli_query($db, "SELECT teamShort FROM nflteams WHERE conference = 'AFC' AND team NOT IN (SELECT leader FROM afcleaders)ORDER BY pct DESC, headtohead DESC, confpct DESC, sov DESC, sos DESC");
	$j = 1;
	while ($j < 4 && $r = mysqli_fetch_array($afcwc)) {
		if ($j == 1) {
			$five = $r['teamShort'];
			$fiveseed = mysqli_query($db, "UPDATE nflweek18 SET awayteam = '$five' WHERE game = 'AFC4'");
		} elseif ($j == 2) {
			$six = $r['teamShort'];
			$sixseed = mysqli_query($db, "UPDATE nflweek18 SET awayteam = '$six' WHERE game = 'AFC3'");
		} elseif ($j == 3) {
			$seven = $r['teamShort'];
			$sevenseed = mysqli_query($db, "UPDATE nflweek18 SET awayteam = '$seven' WHERE game = 'AFC2'");
		}
		$j++;
	}    
}
?>