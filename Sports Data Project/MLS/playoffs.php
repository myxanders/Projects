<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";
$e1pk = NULL;
$e2pk = NULL;
$e3pk = NULL;
$e4pk = NULL;
$e5pk = NULL;
$e6pk = NULL;
$e7pk = NULL;
$w1pk = NULL;
$w2pk = NULL;
$w3pk = NULL;
$w4pk = NULL;
$w5pk = NULL;
$w6pk = NULL;
$w7pk = NULL;
$e2hipk = NULL;
$elowpk = NULL;
$ehighpk = NULL;
$w2hipk = NULL;
$wlowpk = NULL;
$whighpk = NULL;
$eawaypk = NULL;
$ehomepk = NULL;
$wawaypk = NULL;
$whomepk = NULL;
$eastwpk = NULL;
$westwpk = NULL;
$champ = "TBD";
$teamLoc = NULL;
$cupwinners = NULL;

//Different teams use different naming conventions; used for displaying full champion name
//Ex: Fire ==> Chicago Fire
$useLocation = array("CHI", "COL", "CLB", "HOU", "LAG", "MTL", "NE", "NY", "PHI", "POR", "SJ", "SEA", "VAN");
//Ex: Atlanta Utd ==> Atlanta United
$utdExpand = array("ATL", "MIN");
//Example: Cincinnati FC ==> Cincinnati FC
$noChange = array("CIN", "DC", "DAL", "OSC", "RSL", "TOR");
//Example: LA FC ==> Los Angeles FC
$locFC = array("LFC", "NYC");
//SKC on its own


$sqla = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West1'");
$row = mysqli_fetch_array($sqla);
$wteamone = $row['team'];
$gwone = $row['score'];
if ($row['pks'] != NULL){
	$w1pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamone . "'");
$r = mysqli_fetch_array($query);
$wonename = $r['team'];
$sqlb = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
$row = mysqli_fetch_array($sqlb);
$wteamtwohi = $row['team'];
$gwtwohi = $row['score'];
if ($row['pks'] != NULL){
	$w2hipk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamtwohi . "'");
$r = mysqli_fetch_array($query);
$wtwohiname = $r['team'];

$sql27a = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West2'");
$row = mysqli_fetch_array($sql27a);
$wteamtwo = $row['team'];
$gwtwo = $row['score'];
if ($row['pks'] != NULL){
	$w2pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamtwo . "'");
$r = mysqli_fetch_array($query);
$wtwoname = $r['team'];

$sql27b = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West7'");
$row = mysqli_fetch_array($sql27b);
$wteamseven = $row['team'];
$gwseven = $row['score'];
if ($row['pks'] != NULL){
	$w7pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamseven . "'");
$r = mysqli_fetch_array($query);
$wsevenname = $r['team'];

$sql36a = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West3'");
$row = mysqli_fetch_array($sql36a);
$wteamthree = $row['team'];
$gwthree = $row['score'];
if ($row['pks'] != NULL){
	$w3pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamthree . "'");
$r = mysqli_fetch_array($query);
$wthreename = $r['team'];

$sql36b = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West6'");
$row = mysqli_fetch_array($sql36b);
$wteamsix = $row['team'];
$gwsix = $row['score'];
if ($row['pks'] != NULL){
	$w6pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamsix . "'");
$r = mysqli_fetch_array($query);
$wsixname = $r['team'];
$sql45a = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West4'");
$row = mysqli_fetch_array($sql45a);
$wteamfour = $row['team'];
$gwfour = $row['score'];
if ($row['pks'] != NULL){
	$w4pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamfour . "'");
$r = mysqli_fetch_array($query);
$wfourname = $r['team'];
$sql45b = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West5'");
$row = mysqli_fetch_array($sql45b);
$wteamfive = $row['team'];
$gwfive = $row['score'];
if ($row['pks'] != NULL){
	$w5pk = "(" . $row['pks'] . ")";
}

$sql27a = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East2'");
$row = mysqli_fetch_array($sql27a);
$eteamtwo = $row['team'];
$getwo = $row['score'];
if ($row['pks'] != NULL){
	$e2pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamtwo . "'");
$r = mysqli_fetch_array($query);
$etwoname = $r['team'];

$sql27b = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East7'");
$row = mysqli_fetch_array($sql27b);
$eteamseven = $row['team'];
$geseven = $row['score'];
if ($row['pks'] != NULL){
	$e7pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamseven . "'");
$r = mysqli_fetch_array($query);
$esevenname = $r['team'];

$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wteamfive . "'");
$r = mysqli_fetch_array($query);
$wfivename = $r['team'];
$sql36a = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East3'");
$row = mysqli_fetch_array($sql36a);
$eteamthree = $row['team'];
$gethree = $row['score'];
if ($row['pks'] != NULL){
	$e3pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamthree . "'");
$r = mysqli_fetch_array($query);
$ethreename = $r['team'];
$sql36b = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East6'");
$row = mysqli_fetch_array($sql36b);
$eteamsix = $row['team'];
$gesix = $row['score'];
if ($row['pks'] != NULL){
	$e6pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamsix . "'");
$r = mysqli_fetch_array($query);
$esixname = $r['team'];
$sql45a = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East4'");
$row = mysqli_fetch_array($sql45a);
$eteamfour = $row['team'];
$gefour = $row['score'];
if ($row['pks'] != NULL){
	$e4pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamfour . "'");
$r = mysqli_fetch_array($query);
$efourname = $r['team'];
$sql45b = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East5'");
$row = mysqli_fetch_array($sql45b);
$eteamfive = $row['team'];
$gefive = $row['score'];
if ($row['pks'] != NULL){
	$e5pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamfive . "'");
$r = mysqli_fetch_array($query);
$efivename = $r['team'];
$sqla = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East1'");
$row = mysqli_fetch_array($sqla);
$eteamone = $row['team'];
$geone = $row['score'];
if ($row['pks'] != NULL){
	$e1pk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamone . "'");
$r = mysqli_fetch_array($query);
$eonename = $r['team'];

$sqlb = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
$row = mysqli_fetch_array($sqlb);
$eteamtwohi = $row['team'];
$getwohi = $row['score'];
if ($row['pks'] != NULL){
	$e2hipk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $eteamtwohi . "'");
$r = mysqli_fetch_array($query);
$etwohiname = $r['team'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
$row = mysqli_fetch_array($sql);
$ehigh = $row['team'];
$gehigh = $row['score'];
if ($row['pks'] != NULL){
	$ehighpk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $ehigh . "'");
$r = mysqli_fetch_array($query);
$ehighname = $r['team'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East4'");
$row = mysqli_fetch_array($sql);
$elow = $row['team'];
$gelow = $row['score'];
if ($row['pks'] != NULL){
	$elowpk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $elow . "'");
$r = mysqli_fetch_array($query);
$elowname = $r['team'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
$row = mysqli_fetch_array($sql);
$whigh = $row['team'];
$gwhigh = $row['score'];
if ($row['pks'] != NULL){
	$whighpk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $whigh . "'");
$r = mysqli_fetch_array($query);
$whighname = $r['team'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West4'");
$row = mysqli_fetch_array($sql);
$wlow = $row['team'];
$gwlow = $row['score'];
if ($row['pks'] != NULL){
	$wlowpk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT team FROM mlsteams WHERE mlsteams.teamShort = '" . $wlow . "'");
$r = mysqli_fetch_array($query);
$wlowname = $r['team'];
//East Finals Home
$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easth'");
$row = mysqli_fetch_array($sql);
$ehome = $row['team'];
$gehome = $row['score'];
if ($row['pks'] != NULL){
	$ehomepk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE mlsteams.teamShort = '" . $ehome . "'");
$r = mysqli_fetch_array($query);
$ehomename = $r['team'];
//East Finals Away
$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easta'");
$row = mysqli_fetch_array($sql);
$eaway = $row['team'];
$geaway = $row['score'];
if ($row['pks'] != NULL){
	$eawaypk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE mlsteams.teamShort = '" . $eaway . "'");
$r = mysqli_fetch_array($query);
$eawayname = $r['team'];
//West Finals Home
$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westh'");
$row = mysqli_fetch_array($sql);
$whome = $row['team'];
$gwhome = $row['score'];
if ($row['pks'] != NULL){
	$whomepk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE mlsteams.teamShort = '" . $whome . "'");
$r = mysqli_fetch_array($query);
$whomename = $r['team'];
//West Finals Away
$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westa'");
$row = mysqli_fetch_array($sql);
$waway = $row['team'];
$gwaway = $row['score'];
if ($row['pks'] != NULL){
	$wawaypk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE mlsteams.teamShort = '" . $waway . "'");
$r = mysqli_fetch_array($query);
$wawayname = $r['team'];
//East Winner
$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'East'");
$row = mysqli_fetch_array($sql);
$eastw = $row['team'];
$geastw = $row['score'];
$epks = $row['pks'];
if ($row['pks'] != NULL){
	$eastwpk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE mlsteams.teamShort = '" . $eastw . "'");
$r = mysqli_fetch_array($query);
$eastwname = $r['team'];
//West Winner
$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'West'");
$row = mysqli_fetch_array($sql);
$westw = $row['team'];
$gwestw = $row['score'];
$wpks = $row['pks'];
if ($row['pks'] != NULL){
	$westwpk = "(" . $row['pks'] . ")";
}
$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE mlsteams.teamShort = '" . $westw . "'");
$r = mysqli_fetch_array($query);
$westwname = $r['team'];
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MLS Playoffs</title>
	<link rel='stylesheet' type='text/css' href='mlsstyle.css'/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<h1 align="middle"><a href='../MLS' style="text-decoration: none; color:white;">MLS Playoff Bracket</a></h1>
	<div id="container" align="center">
	<table>
		<thead>
			<tr>
			<th>Wild Card Round</th>
			<th>Conference Semi-Finals</th>
			<th>Conference Finals</th>
			<th>   </th>
			<th id="mlscup">MLS Cup</th>
			<th>   </th>
			<th>Conference Finals</th>
			<th>Conference Semi-Finals</th>
			<th>Wild Card Round</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<!-- West 4 SEED -->
				<td id="<?php echo $wteamfour;?>">[4] <?php echo $wfourname . $sp;?><img src="/Assets/MLS/<?php echo $wteamfour; ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwfour . $sp . $w4pk . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td style="font-weight: bold; background-color: silver; color: black;" align="middle";>MLS Cup Champs:</td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- East 4 SEED -->
				<td id="<?php echo $eteamfour;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamfour?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e4pk . $sp . $gefour . $sp;?></span><?php echo $efourname . $sp;?> [4]</td>
			</tr>
			<tr>
				<!-- West 5 SEED -->
				<td id="<?php echo $wteamfive;?>">[5] <?php echo $wfivename . $sp;?><img src="/Assets/MLS/<?php echo $wteamfive ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwfive . $sp . $w5pk . $sp;?></span></td>
				<!-- West LOW WINNING SEED -->
				<td id="<?php echo $wlow;?>"><?php echo $wlowname . $sp;?><img src="/Assets/MLS/<?php echo $wlow;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwlow . $sp . $wlowpk . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- MLS CUP CHAMPS -->
				<?php
					if ($gwestw > $geastw){
						$champ = $westw;
					}
					elseif ($gwestw < $geastw){
						$champ = $eastw;
					}
					elseif ($gwestw == $geastw){
						if ($wpks > $epks){
							$champ = $westw;
						}
						elseif ($wpks < $epks){
							$champ = $eastw;
						}
					}
					$win = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$champ'");
					$r = mysqli_fetch_array($win);
					$champions = $r['team'];
					$teamLoc = $r['location'];
					if (in_array($champ, $useLocation)){
						$cupwinners = $teamLoc . " " . $champions;
					}
					elseif (in_array($champ, $utdExpand)){
						$utd = trim($champions, "Utd");
						$cupwinners = $utd . "United";
					}
					elseif (in_array($champ, $noChange)){
						$cupwinners = $champions;
					}
					else if (in_array($champ, $locFC)){
						$cupwinners = $teamLoc . " FC";
					}
					elseif ($champ == "SKC"){
						$spo = trim($champions, "KC");
						$cupwinners = $spo . $teamLoc;
				?>
						<style> tr:nth-child(2) td:nth-child(6) {font-size:15px;}</style>
				<?php
					}
				?>
				<td id="<?php echo $champ;?>" style = "text-align: center"><img src="/Assets/MLS/<?php echo $champ;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><?php echo $sp . $cupwinners . $sp;?><img src="/Assets/MLS/<?php echo $champ;?>.png" style="vertical-align: middle; float: right;" width=20 height=20></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- East LOW WINNING SEED -->
				<td id="<?php echo $elow;?>" align="right"><img src="/Assets/MLS/<?php echo $elow;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $elowpk . $sp . $gelow;?></span><?php echo $elowname;?></td>
				<!-- East 5 SEED --> 
				<td id="<?php echo $eteamfive;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamfive ?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e5pk . $sp . $gefive . $sp;?></span><?php echo $efivename . $sp;?> [5]</td>
			</tr>
			<tr>
				<td id="empty"></td>
				<!-- West 1 SEED -->
				<td id="<?php echo $wteamone;?>">[1] <?php echo $wonename . $sp;?><img src="/Assets/MLS/<?php echo $wteamone ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwone . $sp . $w1pk . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- East 1 SEED --> 
				<td id="<?php echo $eteamone;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamone?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e1pk . $sp . $geone . $sp;?></span><?php echo $eonename;?> [1]</td>
				<td id="empty"></td>
			</tr>
			<tr>
				<!-- West 2 SEED -->
				<td id="<?php echo $wteamtwo;?>">[2] <?php echo $wtwoname . $sp;?><img src="/Assets/MLS/<?php echo $wteamtwo ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwtwo . $sp . $w2pk . $sp;?></span></td>
				<td id="empty"></td>
				<!-- West FINALIST -->
				<td id="<?php echo $whome;?>"><?php echo $sp . $whomename . $sp;?><img src="/Assets/MLS/<?php echo $whome;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwhome . $sp . $whomepk . $sp;?></span></td>
				<td id="empty"></td>
				<!-- West WINNER -->
				<td id="<?php echo $westw;?>"><?php echo $sp . $westwname . $sp;?><img src="/Assets/MLS/<?php echo $westw;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwestw . $sp . $westwpk . $sp;?></span></td>
				<td id="empty"></td>
				<!-- East FINALIST -->
				<td id="<?php echo $ehome;?>" align="right"><img src="/Assets/MLS/<?php echo $ehome;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $ehomepk . $sp . $gehome . $sp;?></span><?php echo $ehomename . $sp;?></td>
				<td id="empty"></td>
				<!-- East 2 SEED -->
				<td id="<?php echo $eteamtwo;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamtwo?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e2pk . $sp . $getwo . $sp;?></span><?php echo $etwoname . $sp;?> [2]</td>
			</tr>
			<tr>
				<!-- West 7 SEED -->
				<td id="<?php echo $wteamseven;?>">[7] <?php echo $wsevenname . $sp;?><img src="/Assets/MLS/<?php echo $wteamseven ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwseven . $sp . $w7pk . $sp;?></span></td>
				<td id="empty"></td>
				<!-- West FINALIST -->
				<td id="<?php echo $waway;?>"><?php echo $sp . $wawayname . $sp;?><img src="/Assets/MLS/<?php echo $waway;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwaway . $sp . $wawaypk . $sp;?></span></td>
				<td id="empty"></td>
				<!-- East WINNER -->
				<td id="<?php echo $eastw;?>"><?php echo $sp . $eastwname . $sp;?><img src="/Assets/MLS/<?php echo $eastw;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $geastw . $sp . $eastwpk . $sp;?></span></td>
				<td id="empty"></td>
				<!-- East FINALIST -->
				<td id="<?php echo $eaway;?>" align="right"><img src="/Assets/MLS/<?php echo $eaway;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $eawaypk . $sp . $geaway . $sp;?></span><?php echo $eawayname . $sp;?></td>
				<td id="empty"></td>
				<!-- East 7 SEED -->
				<td id="<?php echo $eteamseven;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamseven?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e7pk . $sp . $geseven . $sp;?></span><?php echo $esevenname . $sp;?> [7]</td>
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>
			<tr>
				<td id="empty"></td>
				<!-- West 2 SEED --> 
				<td id="<?php echo $wteamtwohi;?>"><?php echo $wtwohiname . $sp;?><img src="/Assets/MLS/<?php echo $wteamtwohi ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwtwohi . $sp . $w2hipk . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- East 2 SEED --> 
				<td id="<?php echo $eteamtwohi;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamtwohi?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e2hipk . $sp. $getwohi . $sp;?></span><?php echo $etwohiname;?></td>
				<td id="empty"></td>
			</tr>
			<tr>
				<!-- West 3 SEED -->
				<td id="<?php echo $wteamthree;?>">[3] <?php echo $wthreename . $sp;?><img src="/Assets/MLS/<?php echo $wteamthree ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwthree . $sp . $w3pk . $sp;?></span></td>				
				<!-- West HIGH SEED WINNER -->
				<td id="<?php echo $whigh;?>"><?php echo $whighname . $sp;?><img src="/Assets/MLS/<?php echo $whigh;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwhigh . $sp . $whighpk . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- East HIGH SEED WINNER -->
				<td id="<?php echo $ehigh;?>" align="right"><img src="/Assets/MLS/<?php echo $ehigh;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $ehighpk . $sp . $gehigh . $sp;?></span><?php echo $sp. $ehighname;?></td>
				<!-- East 3 SEED -->
				<td id="<?php echo $eteamthree;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamthree?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e3pk . $sp . $gethree . $sp;?></span><?php echo $ethreename . $sp;?> [3]</td>
			</tr>
			<tr>
				<!-- West 6 SEED -->
				<td id="<?php echo $wteamsix;?>">[6] <?php echo $wsixname . $sp;?><img src="/Assets/MLS/<?php echo $wteamsix ?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $gwsix . $sp . $w6pk . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- East 6 SEED -->
				<td id="<?php echo $eteamsix;?>" align="right"><img src="/Assets/MLS/<?php echo $eteamsix?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $e6pk . $sp . $gesix . $sp;?></span><?php echo $esixname . $sp;?> [6]</td>				
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<?php
				$zql = mysqli_query($db, "SELECT wins, losses, draws FROM mlsteams ORDER BY points DESC");
				$z = mysqli_fetch_array($zql);
				$rem = 34 - ($z['wins'] + $z['losses'] + $z['draws']);

				if ($rem == 0){
				?>
				<td id="empty"><button id="back" align="center" onclick="window.location.href='updatePlayoffs.php'"></i> Update Playoffs</button></td>
				<?php
				}
				else {
				?>
				<td id="empty"></td>
				<?php					
				}
				?>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>
		</tbody>
	</table>

	</div>
</body>
</html>
<style>

body {
	background-color: green;
	font-family: 'Cambo', Times, serif;
}

h1 {
	font-size: 120px;
	color: white;
	text-shadow: 5px 5px black;
	margin:15px;
}

th {
	color: goldenrod;
	padding-bottom: 12px;
	padding-right: 10px;
	padding-left: 10px;
}

td#empty {
	border: none;
}

td {
	border: solid white 2px;
	padding: 8px;
	border-radius: 8px;
}
span {
	padding: none;
}

	button {
		font-family: 'Cambo', Times, serif;
		background-color: #cc0000;
		border: 1px solid #3c1063;
		border-radius: 4px;
		cursor: pointer;
		padding: 6px;
		color: white;
	}

	button:hover {
		background-color: white;
		border: 1px solid #3c1063;
		border-radius: 4px;
		cursor: pointer;
		padding: 6px;
		color: black;
		transition-duration: 0.4s;
	}

	#back {
		font-size: 20px;
		border-radius: 8px;
		border: 2px solid white;
		box-shadow: 2px 2px black;
	}
	#back:hover {
		font-size: 20px;
		border-radius: 8px;
		border: 2px solid black;
		color: white;
		background-color:#cc0000;
		box-shadow: 0px 1px white;
	}

	#TBD {
		font-family: 'Cambo', Times, serif;
		background-color: white;
		color: black;
	}
</style>
