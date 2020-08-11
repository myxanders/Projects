<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";

$phxwins = "";
$atlwins = "";//hawks
$sacwins = "";
$boswins = "";//celtics
$chiwins = "";
$indwins = "";
$chawins = "";
$clewins = "";//cavs
$denwins = "";
$detwins = "";//pistons
$houwins = "";//rockets
$utawins = "";
$lacwins = "";
$lalwins = "";
$miawins = "";//heat
$milwins = "";//bucks
$minwins = "";//timberwolves
$nykwins = "";
$bknwins = "";
$gswwins = "";
$phiwins = "";//76ers
$porwins = "";
$memwins = "";
$nowins = "";
$okcwins = "";
$saswins = "";
$orlwins = "";
$dalwins = "";
$torwins = "";//raptors
$waswins = "";//wizards

$phxlosses = "";
$atllosses = "";
$saclosses = "";
$boslosses = "";
$chilosses = "";
$indlosses = "";
$chalosses = "";
$clelosses = "";
$denlosses = "";
$detlosses = "";
$houlosses = "";
$utalosses = "";
$laclosses = "";
$lallosses = "";
$mialosses = "";
$millosses = "";
$minlosses = "";
$nyklosses = "";
$bknlosses = "";
$gswlosses = "";
$philosses = "";
$porlosses = "";
$memlosses = "";
$nolosses = "";
$okclosses = "";
$saslosses = "";
$orllosses = "";
$dallosses = "";
$torlosses = "";
$waslosses = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['PHXwins'])) {
 		$phxwins = $_POST['PHXwins'];
 	}

 	if (isset($_POST['ATLwins'])) {
 		$atlwins = $_POST['ATLwins'];
 	}

 	if (isset($_POST['SACwins'])) {
 		$sacwins = $_POST['SACwins'];
 	}

	if (isset($_POST['BOSwins'])) {
 		$boswins = $_POST['BOSwins'];
 	}

	if (isset($_POST['CHIwins'])) {
 		$chiwins = $_POST['CHIwins'];
 	}
	if (isset($_POST['INDwins'])) {
 		$indwins = $_POST['INDwins'];
 	}
	if (isset($_POST['CHAwins'])) {
 		$chawins = $_POST['CHAwins'];
 	}
	if (isset($_POST['CLEwins'])) {
 		$clewins = $_POST['CLEwins'];
 	}
	if (isset($_POST['DENwins'])) {
 		$denwins = $_POST['DENwins'];
 	}
	if (isset($_POST['DETwins'])) {
 		$detwins = $_POST['DETwins'];
 	}
	if (isset($_POST['HOUwins'])) {
 		$houwins = $_POST['HOUwins'];
 	}
	if (isset($_POST['UTAwins'])) {
 		$utawins = $_POST['UTAwins'];
 	}
	if (isset($_POST['LACwins'])) {
 		$lacwins = $_POST['LACwins'];
 	}
	if (isset($_POST['LALwins'])) {
 		$lalwins = $_POST['LALwins'];
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
	if (isset($_POST['NYKwins'])) {
 		$nykwins = $_POST['NYKwins'];
 	}
	if (isset($_POST['BKNwins'])) {
 		$bknwins = $_POST['BKNwins'];
 	}
	if (isset($_POST['GSWwins'])) {
 		$gswwins = $_POST['GSWwins'];
 	}
	if (isset($_POST['PHIwins'])) {
 		$phiwins = $_POST['PHIwins'];
 	}
	if (isset($_POST['PORwins'])) {
 		$porwins = $_POST['PORwins'];
 	}
	if (isset($_POST['MEMwins'])) {
 		$memwins = $_POST['MEMwins'];
 	} 	
	if (isset($_POST['NOwins'])) {
 		$nowins = $_POST['NOwins'];
 	}
	if (isset($_POST['OKCwins'])) {
 		$okcwins = $_POST['OKCwins'];
 	}
	if (isset($_POST['SASwins'])) {
 		$saswins = $_POST['SASwins'];
 	} 	
	if (isset($_POST['ORLwins'])) {
 		$orlwins = $_POST['ORLwins'];
 	}
	if (isset($_POST['DALwins'])) {
 		$dalwins = $_POST['DALwins'];
 	}
	if (isset($_POST['TORwins'])) {
 		$torwins = $_POST['TORwins'];
 	} 	
	if (isset($_POST['WASwins'])) {
 		$waswins = $_POST['WASwins'];
 	}
 }

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['PHXlosses'])) {
 		$phxlosses = $_POST['PHXlosses'];
 	}

 	if (isset($_POST['ATLlosses'])) {
 		$atllosses = $_POST['ATLlosses'];
 	}

 	if (isset($_POST['SAClosses'])) {
 		$saclosses = $_POST['SAClosses'];
 	}

	if (isset($_POST['BOSlosses'])) {
 		$boslosses = $_POST['BOSlosses'];
 	}

	if (isset($_POST['CHIlosses'])) {
 		$chilosses = $_POST['CHIlosses'];
 	}
	if (isset($_POST['INDlosses'])) {
 		$indlosses = $_POST['INDlosses'];
 	}
	if (isset($_POST['CHAlosses'])) {
 		$chalosses = $_POST['CHAlosses'];
 	}
	if (isset($_POST['CLElosses'])) {
 		$clelosses = $_POST['CLElosses'];
 	}
	if (isset($_POST['DENlosses'])) {
 		$denlosses = $_POST['DENlosses'];
 	}
	if (isset($_POST['DETlosses'])) {
 		$detlosses = $_POST['DETlosses'];
 	}
	if (isset($_POST['HOUlosses'])) {
 		$houlosses = $_POST['HOUlosses'];
 	}
	if (isset($_POST['UTAlosses'])) {
 		$utalosses = $_POST['UTAlosses'];
 	}
	if (isset($_POST['LAClosses'])) {
 		$laclosses = $_POST['LAClosses'];
 	}
	if (isset($_POST['LALlosses'])) {
 		$lallosses = $_POST['LALlosses'];
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
	if (isset($_POST['NYKlosses'])) {
 		$nyklosses = $_POST['NYKlosses'];
 	}
	if (isset($_POST['BKNlosses'])) {
 		$bknlosses = $_POST['BKNlosses'];
 	}
	if (isset($_POST['GSWlosses'])) {
 		$gswlosses = $_POST['GSWlosses'];
 	}
	if (isset($_POST['PHIlosses'])) {
 		$philosses = $_POST['PHIlosses'];
 	}
	if (isset($_POST['PORlosses'])) {
 		$porlosses = $_POST['PORlosses'];
 	}
	if (isset($_POST['MEMlosses'])) {
 		$memlosses = $_POST['MEMlosses'];
 	} 	
	if (isset($_POST['NOlosses'])) {
 		$nolosses = $_POST['NOlosses'];
 	}
	if (isset($_POST['OKClosses'])) {
 		$okclosses = $_POST['OKClosses'];
 	}
	if (isset($_POST['SASlosses'])) {
 		$saslosses = $_POST['SASlosses'];
 	} 	
	if (isset($_POST['ORLlosses'])) {
 		$orllosses = $_POST['ORLlosses'];
 	}
	if (isset($_POST['DALlosses'])) {
 		$dallosses = $_POST['DALlosses'];
 	}
	if (isset($_POST['TORlosses'])) {
 		$torlosses = $_POST['TORlosses'];
 	} 	
	if (isset($_POST['WASlosses'])) {
 		$waslosses = $_POST['WASlosses'];
 	}
 }

$sqlwins ="UPDATE nbateams 
		  SET wins = (CASE WHEN teamShort = 'PHX' THEN '$phxwins'
		   						 WHEN teamShort = 'ATL' THEN '$atlwins'
		   						 WHEN teamShort = 'SAC' THEN '$sacwins'
		   						 WHEN teamShort = 'BOS' THEN '$boswins'
		   						 WHEN teamShort = 'CHI' THEN '$chiwins'
		   						 WHEN teamShort = 'IND' THEN '$indwins'
		   						 WHEN teamShort = 'CHA' THEN '$chawins'
		   						 WHEN teamShort = 'CLE' THEN '$clewins'
		   						 WHEN teamShort = 'DEN' THEN '$denwins'
		   						 WHEN teamShort = 'DET' THEN '$detwins'
		   						 WHEN teamShort = 'HOU' THEN '$houwins'
		   						 WHEN teamShort = 'UTA' THEN '$utawins'
		   						 WHEN teamShort = 'LAC' THEN '$lacwins'
		   						 WHEN teamShort = 'LAL' THEN '$lalwins'
		   						 WHEN teamShort = 'MIA' THEN '$miawins'
		   						 WHEN teamShort = 'MIL' THEN '$milwins'
		   						 WHEN teamShort = 'MIN' THEN '$minwins'
		   						 WHEN teamShort = 'NYK' THEN '$nykwins'
		   						 WHEN teamShort = 'BKN' THEN '$bknwins'
		   						 WHEN teamShort = 'GSW' THEN '$gswwins'
		   						 WHEN teamShort = 'PHI' THEN '$phiwins'
		   						 WHEN teamShort = 'POR' THEN '$porwins'
		   						 WHEN teamShort = 'MEM' THEN '$memwins'
		   						 WHEN teamShort = 'NO' THEN '$nowins'
		   						 WHEN teamShort = 'OKC' THEN '$okcwins'
		   						 WHEN teamShort = 'SAS' THEN '$saswins'
		   						 WHEN teamShort = 'ORL' THEN '$orlwins'
		   						 WHEN teamShort = 'DAL' THEN '$dalwins'
		   						 WHEN teamShort = 'TOR' THEN '$torwins'
		   						 WHEN teamShort = 'WAS' THEN '$waswins'
		   					END)";
$sqllosses ="UPDATE nbateams 
		  SET losses = (CASE WHEN teamShort = 'PHX' THEN '$phxlosses'
		   						 WHEN teamShort = 'ATL' THEN '$atllosses'
		   						 WHEN teamShort = 'SAC' THEN '$saclosses'
		   						 WHEN teamShort = 'BOS' THEN '$boslosses'
		   						 WHEN teamShort = 'CHI' THEN '$chilosses'
		   						 WHEN teamShort = 'IND' THEN '$indlosses'
		   						 WHEN teamShort = 'CHA' THEN '$chalosses'
		   						 WHEN teamShort = 'CLE' THEN '$clelosses'
		   						 WHEN teamShort = 'DEN' THEN '$denlosses'
		   						 WHEN teamShort = 'DET' THEN '$detlosses'
		   						 WHEN teamShort = 'HOU' THEN '$houlosses'
		   						 WHEN teamShort = 'UTA' THEN '$utalosses'
		   						 WHEN teamShort = 'LAC' THEN '$laclosses'
		   						 WHEN teamShort = 'LAL' THEN '$lallosses'
		   						 WHEN teamShort = 'MIA' THEN '$mialosses'
		   						 WHEN teamShort = 'MIL' THEN '$millosses'
		   						 WHEN teamShort = 'MIN' THEN '$minlosses'
		   						 WHEN teamShort = 'NYK' THEN '$nyklosses'
		   						 WHEN teamShort = 'BKN' THEN '$bknlosses'
		   						 WHEN teamShort = 'GSW' THEN '$gswlosses'
		   						 WHEN teamShort = 'PHI' THEN '$philosses'
		   						 WHEN teamShort = 'POR' THEN '$porlosses'
		   						 WHEN teamShort = 'MEM' THEN '$memlosses'
		   						 WHEN teamShort = 'NO' THEN '$nolosses'
		   						 WHEN teamShort = 'OKC' THEN '$okclosses'
		   						 WHEN teamShort = 'SAS' THEN '$saslosses'
		   						 WHEN teamShort = 'ORL' THEN '$orllosses'
		   						 WHEN teamShort = 'DAL' THEN '$dallosses'
		   						 WHEN teamShort = 'TOR' THEN '$torlosses'
		   						 WHEN teamShort = 'WAS' THEN '$waslosses'
		   					END)";		   					

$sqlpct = "UPDATE nbateams SET pct = wins / (wins+losses)";

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

$westql = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'West' ORDER BY pct DESC, headtohead DESC, team ASC");
$i=1;
while ($i <= 8 && $r = mysqli_fetch_array($westql)){
	$team = $r['teamShort'];
	if ($i == 1){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'west18'");
	}
	if ($i == 2){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'west27'");
	}
	if ($i == 3){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'west36'");
	}
	if ($i == 4){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'west45'");
	}
	if ($i == 5){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'west45'");
	}
	if ($i == 6){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'west36'");
	}
	if ($i == 7){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'west27'");
	}
	if ($i == 8){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'west18'");
	}
	$i++;						
}

$eastql = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'East' ORDER BY pct DESC, headtohead DESC, team ASC");
$i=1;
while ($i <= 8 && $r = mysqli_fetch_array($eastql)){
	$team = $r['teamShort'];
	if ($i == 1){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'east18'");
	}
	if ($i == 2){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'east27'");
	}
	if ($i == 3){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'east36'");
	}
	if ($i == 4){
		mysqli_query($db, "UPDATE nbaround1 SET hometeam = '$team' WHERE series = 'east45'");
	}
	if ($i == 5){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'east45'");
	}
	if ($i == 6){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'east36'");
	}
	if ($i == 7){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'east27'");
	}
	if ($i == 8){
		mysqli_query($db, "UPDATE nbaround1 SET awayteam = '$team' WHERE series = 'east18'");
	}
	$i++;						
}

header("location: updateStandings.php");

?>