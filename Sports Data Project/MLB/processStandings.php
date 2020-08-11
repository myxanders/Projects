<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";


//Process W/L inputs
$arzwins = "";
$atlwins = "";
$balwins = "";
$boswins = "";
$chcwins = "";
$cwswins = "";
$cinwins = "";
$clewins = "";
$colwins = "";
$detwins = "";
$houwins = "";
$kcwins = "";
$laawins = "";
$ladwins = "";
$miawins = "";
$milwins = "";
$minwins = "";
$nymwins = "";
$nyywins = "";
$oakwins = "";
$phiwins = "";
$pitwins = "";
$sdwins = "";
$sfwins = "";
$seawins = "";
$stlwins = "";
$tbwins = "";
$texwins = "";
$torwins = "";
$waswins = "";

$arzlosses = "";
$atllosses = "";
$ballosses = "";
$boslosses = "";
$chclosses = "";
$cwslosses = "";
$cinlosses = "";
$clelosses = "";
$collosses = "";
$detlosses = "";
$houlosses = "";
$kclosses = "";
$laalosses = "";
$ladlosses = "";
$mialosses = "";
$millosses = "";
$minlosses = "";
$nymlosses = "";
$nyylosses = "";
$oaklosses = "";
$philosses = "";
$pitlosses = "";
$sdlosses = "";
$sflosses = "";
$sealosses = "";
$stllosses = "";
$tblosses = "";
$texlosses = "";
$torlosses = "";
$waslosses = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZwins'])) {
 		$arzwins = $_POST['ARZwins'];
 	}

 	if (isset($_POST['ATLwins'])) {
 		$atlwins = $_POST['ATLwins'];
 	}

 	if (isset($_POST['BALwins'])) {
 		$balwins = $_POST['BALwins'];
 	}

	if (isset($_POST['BOSwins'])) {
 		$boswins = $_POST['BOSwins'];
 	}

	if (isset($_POST['CHCwins'])) {
 		$chcwins = $_POST['CHCwins'];
 	}
	if (isset($_POST['CWSwins'])) {
 		$cwswins = $_POST['CWSwins'];
 	}
	if (isset($_POST['CINwins'])) {
 		$cinwins = $_POST['CINwins'];
 	}
	if (isset($_POST['CLEwins'])) {
 		$clewins = $_POST['CLEwins'];
 	}
	if (isset($_POST['COLwins'])) {
 		$colwins = $_POST['COLwins'];
 	}
	if (isset($_POST['DETwins'])) {
 		$detwins = $_POST['DETwins'];
 	}
	if (isset($_POST['HOUwins'])) {
 		$houwins = $_POST['HOUwins'];
 	}
	if (isset($_POST['KCwins'])) {
 		$kcwins = $_POST['KCwins'];
 	}
	if (isset($_POST['LAAwins'])) {
 		$laawins = $_POST['LAAwins'];
 	}
	if (isset($_POST['LADwins'])) {
 		$ladwins = $_POST['LADwins'];
 	}
	if (isset($_POST['MIAwins'])) {
 		$miawins = $_POST['MIAwins'];
 	}
	if (isset($_POST['MILwins'])) {
 		$milwins = $_POST['MILwins'];
 	} 	
	if (isset($_POST['MINwins'])) {
 		$minwins = $_POST['MINwins'];
 	}
	if (isset($_POST['NYMwins'])) {
 		$nymwins = $_POST['NYMwins'];
 	}
	if (isset($_POST['NYYwins'])) {
 		$nyywins = $_POST['NYYwins'];
 	}
	if (isset($_POST['OAKwins'])) {
 		$oakwins = $_POST['OAKwins'];
 	}
	if (isset($_POST['PHIwins'])) {
 		$phiwins = $_POST['PHIwins'];
 	}
	if (isset($_POST['PITwins'])) {
 		$pitwins = $_POST['PITwins'];
 	}
	if (isset($_POST['SDwins'])) {
 		$sdwins = $_POST['SDwins'];
 	} 	
	if (isset($_POST['SFwins'])) {
 		$sfwins = $_POST['SFwins'];
 	}
	if (isset($_POST['SEAwins'])) {
 		$seawins = $_POST['SEAwins'];
 	}
	if (isset($_POST['STLwins'])) {
 		$stlwins = $_POST['STLwins'];
 	} 	
	if (isset($_POST['TBwins'])) {
 		$tbwins = $_POST['TBwins'];
 	}
	if (isset($_POST['TEXwins'])) {
 		$texwins = $_POST['TEXwins'];
 	}
	if (isset($_POST['TORwins'])) {
 		$torwins = $_POST['TORwins'];
 	} 	
	if (isset($_POST['WASwins'])) {
 		$waswins = $_POST['WASwins'];
 	}
 }

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZlosses'])) {
 		$arzlosses = $_POST['ARZlosses'];
 	}

 	if (isset($_POST['ATLlosses'])) {
 		$atllosses = $_POST['ATLlosses'];
 	}

 	if (isset($_POST['BALlosses'])) {
 		$ballosses = $_POST['BALlosses'];
 	}

	if (isset($_POST['BOSlosses'])) {
 		$boslosses = $_POST['BOSlosses'];
 	}

	if (isset($_POST['CHClosses'])) {
 		$chclosses = $_POST['CHClosses'];
 	}
	if (isset($_POST['CWSlosses'])) {
 		$cwslosses = $_POST['CWSlosses'];
 	}
	if (isset($_POST['CINlosses'])) {
 		$cinlosses = $_POST['CINlosses'];
 	}
	if (isset($_POST['CLElosses'])) {
 		$clelosses = $_POST['CLElosses'];
 	}
	if (isset($_POST['COLlosses'])) {
 		$collosses = $_POST['COLlosses'];
 	}
	if (isset($_POST['DETlosses'])) {
 		$detlosses = $_POST['DETlosses'];
 	}
	if (isset($_POST['HOUlosses'])) {
 		$houlosses = $_POST['HOUlosses'];
 	}
	if (isset($_POST['KClosses'])) {
 		$kclosses = $_POST['KClosses'];
 	}
	if (isset($_POST['LAAlosses'])) {
 		$laalosses = $_POST['LAAlosses'];
 	}
	if (isset($_POST['LADlosses'])) {
 		$ladlosses = $_POST['LADlosses'];
 	}
	if (isset($_POST['MIAlosses'])) {
 		$mialosses = $_POST['MIAlosses'];
 	}
	if (isset($_POST['MILlosses'])) {
 		$millosses = $_POST['MILlosses'];
 	} 	
	if (isset($_POST['MINlosses'])) {
 		$minlosses = $_POST['MINlosses'];
 	}
	if (isset($_POST['NYMlosses'])) {
 		$nymlosses = $_POST['NYMlosses'];
 	}
	if (isset($_POST['NYYlosses'])) {
 		$nyylosses = $_POST['NYYlosses'];
 	}
	if (isset($_POST['OAKlosses'])) {
 		$oaklosses = $_POST['OAKlosses'];
 	}
	if (isset($_POST['PHIlosses'])) {
 		$philosses = $_POST['PHIlosses'];
 	}
	if (isset($_POST['PITlosses'])) {
 		$pitlosses = $_POST['PITlosses'];
 	}
	if (isset($_POST['SDlosses'])) {
 		$sdlosses = $_POST['SDlosses'];
 	} 	
	if (isset($_POST['SFlosses'])) {
 		$sflosses = $_POST['SFlosses'];
 	}
	if (isset($_POST['SEAlosses'])) {
 		$sealosses = $_POST['SEAlosses'];
 	}
	if (isset($_POST['STLlosses'])) {
 		$stllosses = $_POST['STLlosses'];
 	} 	
	if (isset($_POST['TBlosses'])) {
 		$tblosses = $_POST['TBlosses'];
 	}
	if (isset($_POST['TEXlosses'])) {
 		$texlosses = $_POST['TEXlosses'];
 	}
	if (isset($_POST['TORlosses'])) {
 		$torlosses = $_POST['TORlosses'];
 	} 	
	if (isset($_POST['WASlosses'])) {
 		$waslosses = $_POST['WASlosses'];
 	}
 }

$sqlwins ="UPDATE mlbteams 
		  SET wins = (CASE WHEN teamShort = 'ARZ' THEN '$arzwins'
		   						 WHEN teamShort = 'ATL' THEN '$atlwins'
		   						 WHEN teamShort = 'BAL' THEN '$balwins'
		   						 WHEN teamShort = 'BOS' THEN '$boswins'
		   						 WHEN teamShort = 'CHC' THEN '$chcwins'
		   						 WHEN teamShort = 'CWS' THEN '$cwswins'
		   						 WHEN teamShort = 'CIN' THEN '$cinwins'
		   						 WHEN teamShort = 'CLE' THEN '$clewins'
		   						 WHEN teamShort = 'COL' THEN '$colwins'
		   						 WHEN teamShort = 'DET' THEN '$detwins'
		   						 WHEN teamShort = 'HOU' THEN '$houwins'
		   						 WHEN teamShort = 'KC' THEN '$kcwins'
		   						 WHEN teamShort = 'LAA' THEN '$laawins'
		   						 WHEN teamShort = 'LAD' THEN '$ladwins'
		   						 WHEN teamShort = 'MIA' THEN '$miawins'
		   						 WHEN teamShort = 'MIL' THEN '$milwins'
		   						 WHEN teamShort = 'MIN' THEN '$minwins'
		   						 WHEN teamShort = 'NYM' THEN '$nymwins'
		   						 WHEN teamShort = 'NYY' THEN '$nyywins'
		   						 WHEN teamShort = 'OAK' THEN '$oakwins'
		   						 WHEN teamShort = 'PHI' THEN '$phiwins'
		   						 WHEN teamShort = 'PIT' THEN '$pitwins'
		   						 WHEN teamShort = 'SD' THEN '$sdwins'
		   						 WHEN teamShort = 'SF' THEN '$sfwins'
		   						 WHEN teamShort = 'SEA' THEN '$seawins'
		   						 WHEN teamShort = 'STL' THEN '$stlwins'
		   						 WHEN teamShort = 'TB' THEN '$tbwins'
		   						 WHEN teamShort = 'TEX' THEN '$texwins'
		   						 WHEN teamShort = 'TOR' THEN '$torwins'
		   						 WHEN teamShort = 'WAS' THEN '$waswins'
		   					END)";
$sqllosses ="UPDATE mlbteams 
		  SET losses = (CASE WHEN teamShort = 'ARZ' THEN '$arzlosses'
		   						 WHEN teamShort = 'ATL' THEN '$atllosses'
		   						 WHEN teamShort = 'BAL' THEN '$ballosses'
		   						 WHEN teamShort = 'BOS' THEN '$boslosses'
		   						 WHEN teamShort = 'CHC' THEN '$chclosses'
		   						 WHEN teamShort = 'CWS' THEN '$cwslosses'
		   						 WHEN teamShort = 'CIN' THEN '$cinlosses'
		   						 WHEN teamShort = 'CLE' THEN '$clelosses'
		   						 WHEN teamShort = 'COL' THEN '$collosses'
		   						 WHEN teamShort = 'DET' THEN '$detlosses'
		   						 WHEN teamShort = 'HOU' THEN '$houlosses'
		   						 WHEN teamShort = 'KC' THEN '$kclosses'
		   						 WHEN teamShort = 'LAA' THEN '$laalosses'
		   						 WHEN teamShort = 'LAD' THEN '$ladlosses'
		   						 WHEN teamShort = 'MIA' THEN '$mialosses'
		   						 WHEN teamShort = 'MIL' THEN '$millosses'
		   						 WHEN teamShort = 'MIN' THEN '$minlosses'
		   						 WHEN teamShort = 'NYM' THEN '$nymlosses'
		   						 WHEN teamShort = 'NYY' THEN '$nyylosses'
		   						 WHEN teamShort = 'OAK' THEN '$oaklosses'
		   						 WHEN teamShort = 'PHI' THEN '$philosses'
		   						 WHEN teamShort = 'PIT' THEN '$pitlosses'
		   						 WHEN teamShort = 'SD' THEN '$sdlosses'
		   						 WHEN teamShort = 'SF' THEN '$sflosses'
		   						 WHEN teamShort = 'SEA' THEN '$sealosses'
		   						 WHEN teamShort = 'STL' THEN '$stllosses'
		   						 WHEN teamShort = 'TB' THEN '$tblosses'
		   						 WHEN teamShort = 'TEX' THEN '$texlosses'
		   						 WHEN teamShort = 'TOR' THEN '$torlosses'
		   						 WHEN teamShort = 'WAS' THEN '$waslosses'
		   					END)";		   					

$sqlpct = "UPDATE mlbteams SET pct = wins / (wins+losses)";

$updatewins = mysqli_query($db, $sqlwins);
$updatelosses = mysqli_query($db, $sqllosses);
$updatepct = mysqli_query($db, $sqlpct);

if ($updatewins){
	echo "wins updated" . $n;
}else {
	echo "couldn't update wins" . $n;
}

if ($updatelosses){
	echo "losses updated" . $n;
}else {
	echo "couldn't update losses" . $n;
}

if ($updatepct){
	echo "pct updated" . $n;
}else {
	echo "couldn't update pct" . $n;
}

//Put division/wild card leaders in playoff spots
$alesql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'East' ORDER BY pct DESC");
$row = mysqli_fetch_array($alesql);
$aleleader = $row['team'];
$aleast = mysqli_query($db, "SELECT * FROM mlbteams WHERE team = '$aleleader'");
$r = mysqli_fetch_array($aleast);
$aleshort = $r['teamShort'];
$alewins = $r['wins'];
$alelosses = $r['losses'];
$alepct = $r['pct'];

$aleupdate = mysqli_query($db, "UPDATE al_leaders SET teamShort = '$aleshort', leader = '$aleleader', w = '$alewins', l = '$alelosses', pct = '$alepct' WHERE division = 'east'");

$alcsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'Central' ORDER BY pct DESC");
$row = mysqli_fetch_array($alcsql);
$alcleader = $row['team'];
$alcast = mysqli_query($db, "SELECT * FROM mlbteams WHERE team = '$alcleader'");
$r = mysqli_fetch_array($alcast);
$alcshort = $r['teamShort'];
$alcwins = $r['wins'];
$alclosses = $r['losses'];
$alcpct = $r['pct'];

$alcupdate = mysqli_query($db, "UPDATE al_leaders SET teamShort = '$alcshort', leader = '$alcleader', w = '$alcwins', l = '$alclosses', pct = '$alcpct' WHERE division = 'central'");

$alwsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'West' ORDER BY pct DESC");
$row = mysqli_fetch_array($alwsql);
$alwleader = $row['team'];
$alwast = mysqli_query($db, "SELECT * FROM mlbteams WHERE team = '$alwleader'");
$r = mysqli_fetch_array($alwast);
$alwshort = $r['teamShort'];
$alwwins = $r['wins'];
$alwlosses = $r['losses'];
$alwpct = $r['pct'];

$alwupdate = mysqli_query($db, "UPDATE al_leaders SET teamShort = '$alwshort', leader = '$alwleader', w = '$alwwins', l = '$alwlosses', pct = '$alwpct' WHERE division = 'west'");

$nlesql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'East' ORDER BY pct DESC");
$row = mysqli_fetch_array($nlesql);
$nleleader = $row['team'];
$nleast = mysqli_query($db, "SELECT * FROM mlbteams WHERE team = '$nleleader'");
$r = mysqli_fetch_array($nleast);
$nleshort = $r['teamShort'];
$nlewins = $r['wins'];
$nlelosses = $r['losses'];
$nlepct = $r['pct'];

$nleupdate = mysqli_query($db, "UPDATE nl_leaders SET teamShort = '$nleshort', leader = '$nleleader', w = '$nlewins', l = '$nlelosses', pct = '$nlepct' WHERE division = 'east'");

$nlcsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'Central' ORDER BY pct DESC");
$row = mysqli_fetch_array($nlcsql);
$nlcleader = $row['team'];
$nlcast = mysqli_query($db, "SELECT * FROM mlbteams WHERE team = '$nlcleader'");
$r = mysqli_fetch_array($nlcast);
$nlcshort = $r['teamShort'];
$nlcwins = $r['wins'];
$nlclosses = $r['losses'];
$nlcpct = $r['pct'];

$nlcupdate = mysqli_query($db, "UPDATE nl_leaders SET teamShort = '$nlcshort', leader = '$nlcleader', w = '$nlcwins', l = '$nlclosses', pct = '$nlcpct' WHERE division = 'central'");

$nlwsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'West' ORDER BY pct DESC");
$row = mysqli_fetch_array($nlwsql);
$nlwleader = $row['team'];
$nlwast = mysqli_query($db, "SELECT * FROM mlbteams WHERE team = '$nlwleader'");
$r = mysqli_fetch_array($nlwast);
$nlwshort = $r['teamShort'];
$nlwwins = $r['wins'];
$nlwlosses = $r['losses'];
$nlwpct = $r['pct'];

$nlwupdate = mysqli_query($db, "UPDATE nl_leaders SET teamShort = '$nlwshort', leader = '$nlwleader', w = '$nlwwins', l = '$nlwlosses', pct = '$nlwpct' WHERE division = 'west'");

$alwcteams = mysqli_query($db, "CREATE OR REPLACE VIEW al_wild_cards AS SELECT team, teamShort, pct FROM mlbteams WHERE league = 'American'AND teamShort NOT IN (SELECT teamShort FROM al_leaders) ORDER BY pct DESC, team DESC LIMIT 2");

$al4sql = mysqli_query($db, "SELECT teamShort FROM al_wild_cards WHERE pct = (SELECT MAX(pct) AS max FROM al_wild_cards)");
$row = mysqli_fetch_array($al4sql);
$al4seed = $row['teamShort'];
$updateal4 = mysqli_query($db, "UPDATE mlb_wildcard SET hometeam = '$al4seed' WHERE game = 'alwc'");
$al5sql = mysqli_query($db, "SELECT teamShort FROM al_wild_cards WHERE pct = (SELECT MIN(pct) AS min FROM al_wild_cards)");
$r = mysqli_fetch_array($al5sql);
$al5seed = $r['teamShort'];
$updateal5 = mysqli_query($db, "UPDATE mlb_wildcard SET awayteam = '$al5seed' WHERE game = 'alwc'");



$nlwcteams = mysqli_query($db, "CREATE OR REPLACE VIEW nl_wild_cards AS SELECT team, teamShort, pct FROM mlbteams WHERE league = 'National'AND teamShort NOT IN (SELECT teamShort FROM nl_leaders) ORDER BY pct DESC, team DESC LIMIT 2");

$nl4sql = mysqli_query($db, "SELECT teamShort FROM nl_wild_cards WHERE pct = (SELECT MAX(pct) AS max FROM nl_wild_cards)");
$row = mysqli_fetch_array($nl4sql);
$nl4seed = $row['teamShort'];
$updatenl4 = mysqli_query($db, "UPDATE mlb_wildcard SET hometeam = '$nl4seed' WHERE game = 'nlwc'");
$nl5sql = mysqli_query($db, "SELECT teamShort FROM nl_wild_cards WHERE pct = (SELECT MIN(pct) AS min FROM nl_wild_cards)");
$r = mysqli_fetch_array($nl5sql);
$nl5seed = $r['teamShort'];
$updatenl5 = mysqli_query($db, "UPDATE mlb_wildcard SET awayteam = '$nl5seed' WHERE game = 'nlwc'");

$alseeds = mysqli_query($db, "CREATE OR REPLACE VIEW al_seeding AS SELECT teamShort, pct FROM al_leaders ORDER BY pct DESC LIMIT 2");

$nlseeds = mysqli_query($db, "CREATE OR REPLACE VIEW nl_seeding AS SELECT teamShort, pct FROM nl_leaders ORDER BY pct DESC LIMIT 2");

$alseed1 = mysqli_query($db, "SELECT teamShort FROM al_leaders WHERE pct = (SELECT MAX(pct) FROM al_leaders)");
$r = mysqli_fetch_array($alseed1);
$al1 = $r['teamShort'];
$updatealseed1 = mysqli_query($db, "UPDATE mlb_ds SET hometeam = '$al1' WHERE series = 'alds14'");

$alseed2 = mysqli_query($db, "SELECT teamShort FROM al_seeding WHERE pct = (SELECT MIN(pct) FROM al_seeding)");
$r = mysqli_fetch_array($alseed2);
$al2 = $r['teamShort'];
$updatealseed2 = mysqli_query($db, "UPDATE mlb_ds SET hometeam = '$al2' WHERE series = 'alds23'");

$alseed3 = mysqli_query($db, "SELECT teamShort FROM al_leaders WHERE pct = (SELECT MIN(pct) FROM al_leaders)");
$r = mysqli_fetch_array($alseed3);
$al3 = $r['teamShort'];
$updatealseed3 = mysqli_query($db, "UPDATE mlb_ds SET awayteam = '$al3' WHERE series = 'alds23'");

$nlseed1 = mysqli_query($db, "SELECT teamShort FROM nl_leaders WHERE pct = (SELECT MAX(pct) FROM nl_leaders)");
$r = mysqli_fetch_array($nlseed1);
$nl1 = $r['teamShort'];
$updatenlseed1 = mysqli_query($db, "UPDATE mlb_ds SET hometeam = '$nl1' WHERE series = 'nlds14'");

$nlseed2 = mysqli_query($db, "SELECT teamShort FROM nl_seeding WHERE pct = (SELECT MIN(pct) FROM nl_seeding)");
$r = mysqli_fetch_array($nlseed2);
$nl2 = $r['teamShort'];
$updatenlseed2 = mysqli_query($db, "UPDATE mlb_ds SET hometeam = '$nl2' WHERE series = 'nlds23'");

$nlseed3 = mysqli_query($db, "SELECT teamShort FROM nl_leaders WHERE pct = (SELECT MIN(pct) FROM nl_leaders)");
$r = mysqli_fetch_array($nlseed3);
$nl3 = $r['teamShort'];
$updatenlseed3 = mysqli_query($db, "UPDATE mlb_ds SET awayteam = '$nl3' WHERE series = 'nlds23'");

header("location: updateStandings.php");

?>