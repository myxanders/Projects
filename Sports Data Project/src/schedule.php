<?php
include("../../session.php");
include("../../nestedsidenav.php");
include("year.php");
//Variables for new lines and spaces make it easier for concatenation
$n = "<br>";
$sp = "&nbsp";
//Initialize the week number and create a variable that refers to schedule tables
$wknum = 1;
$wk = "nflweek" . $wknum;
//Initialize each team score as an empty string
$arz = NULL;
$atl = NULL;
$bal = NULL;
$buf = NULL;
$car = NULL;
$chi = NULL;
$cin = NULL;
$cle = NULL;
$dal = NULL;
$den = NULL;
$det = NULL;
$gb = NULL;
$hou = NULL;
$ind = NULL;
$jax = NULL;
$kc = NULL;
$lac = NULL;
$lar = NULL;
$mia = NULL;
$min = NULL;
$ne = NULL;
$no = NULL;
$nyg = NULL;
$nyj = NULL;
$oak = NULL;
$phi = NULL;
$pit = NULL;
$sf = NULL;
$sea = NULL;
$tb = NULL;
$ten = NULL;
$was = NULL;

//If the submit button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Assigns the week ID to the wknum variable
	$wknum = $_POST['wk'];
	//Assigns the nfl schedule table to a variable for easier concatenation in sql statements
	$wk = "nflweek" . $wknum;

	//Checking if a score is assigned to each team, otherwise keep the value empty

	if (isset($_POST['ARZ'])) {
		$arz = $_POST['ARZ'];
	}
	if ($arz == NULL){
		$arz = 'NULL';
	}

	if (isset($_POST['ATL'])) {
		$atl = $_POST['ATL'];
	}
	if ($atl == NULL){
		$atl = 'NULL';
	}

	if (isset($_POST['BAL'])) {
		$bal = $_POST['BAL'];
	}
	if ($bal == NULL){
		$bal = 'NULL';
	}

	if (isset($_POST['BUF'])) {
		$buf = $_POST['BUF'];
	}
	if ($buf == NULL){
		$buf = 'NULL';
	}

	if (isset($_POST['CAR'])) {
		$car = $_POST['CAR'];
	}
	if ($car == NULL){
		$car = 'NULL';
	}
	if (isset($_POST['CHI'])) {
		$chi = $_POST['CHI'];
	}
	if ($chi == NULL){
		$chi = 'NULL';
	}
	if (isset($_POST['CIN'])) {
		$cin = $_POST['CIN'];
	}
	if ($cin == NULL){
		$cin = 'NULL';
	}
	if (isset($_POST['CLE'])) {
		$cle = $_POST['CLE'];
	}
	if ($cle == NULL){
		$cle = 'NULL';
	}
	if (isset($_POST['DAL'])) {
		$dal = $_POST['DAL'];
	}
	if ($dal == NULL){
		$dal = 'NULL';
	}
	if (isset($_POST['DEN'])) {
		$den = $_POST['DEN'];
	}
	if ($den == NULL){
		$den = 'NULL';
	}
	if (isset($_POST['DET'])) {
		$det = $_POST['DET'];
	}
	if ($det == NULL){
		$det = 'NULL';
	}
	if (isset($_POST['GB'])) {
		$gb = $_POST['GB'];
	}
	if ($gb == NULL){
		$gb = 'NULL';
	}
	if (isset($_POST['HOU'])) {
		$hou = $_POST['HOU'];
	}
	if ($hou == NULL){
		$hou = 'NULL';
	}
	if (isset($_POST['IND'])) {
		$ind = $_POST['IND'];
	}
	if ($ind == NULL){
		$ind = 'NULL';
	}
	if (isset($_POST['JAX'])) {
		$jax = $_POST['JAX'];
	}
	if ($jax == NULL){
		$jax = 'NULL';
	}
	if (isset($_POST['KC'])) {
		$kc = $_POST['KC'];
	}
	if ($kc == NULL){
		$kc = 'NULL';
	}
	if (isset($_POST['LAC'])) {
		$lac = $_POST['LAC'];
	}
	if ($lac == NULL){
		$lac = 'NULL';
	}
	if (isset($_POST['LAR'])) {
		$lar = $_POST['LAR'];
	}
	if ($lar == NULL){
		$lar = 'NULL';
	}
	if (isset($_POST['MIA'])) {
		$mia = $_POST['MIA'];
	}
	if ($mia == NULL){
		$mia = 'NULL';
	}
	if (isset($_POST['MIN'])) {
		$min = $_POST['MIN'];
	}
	if ($min == NULL){
		$min = 'NULL';
	}
	if (isset($_POST['NE'])) {
		$ne = $_POST['NE'];
	}
	if ($ne == NULL){
		$ne = 'NULL';
	}
	if (isset($_POST['NO'])) {
		$no = $_POST['NO'];
	}
	if ($no == NULL){
		$no = 'NULL';
	}
	if (isset($_POST['NYG'])) {
		$nyg = $_POST['NYG'];
	}
	if ($nyg == NULL){
		$nyg = 'NULL';
	}
	if (isset($_POST['NYJ'])) {
		$nyj = $_POST['NYJ'];
	}
	if ($nyj == NULL){
		$nyj = 'NULL';
	}
	if (isset($_POST['OAK'])) {
		$oak = $_POST['OAK'];
	}
	if ($oak == NULL){
		$oak = 'NULL';
	}
	if (isset($_POST['PHI'])) {
		$phi = $_POST['PHI'];
	}
	if ($phi == NULL){
		$phi = 'NULL';
	}
	if (isset($_POST['PIT'])) {
		$pit = $_POST['PIT'];
	}
	if ($pit == NULL){
		$pit = 'NULL';
	}
	if (isset($_POST['SF'])) {
		$sf = $_POST['SF'];
	}
	if ($sf == NULL){
		$sf = 'NULL';
	}
	if (isset($_POST['SEA'])) {
		$sea = $_POST['SEA'];
	}
	if ($sea == NULL){
		$sea = 'NULL';
	}
	if (isset($_POST['TB'])) {
		$tb = $_POST['TB'];
	}
	if ($tb == NULL){
		$tb = 'NULL';
	}
	if (isset($_POST['TEN'])) {
		$ten = $_POST['TEN'];
	}
	if ($ten == NULL){
		$ten = 'NULL';
	}
	if (isset($_POST['WAS'])) {
		$was = $_POST['WAS'];
	}
	if ($was == NULL){
		$was = 'NULL';
	}
	//Prior to the Super Bowl, check for home and away scores and assign them to the appropriate team tricodes
	if ($wknum != 21) {
		$sqlaway = "UPDATE $wk 
			   SET awayscore = (CASE WHEN awayteam = 'ARZ' THEN $arz
			   						 WHEN awayteam = 'ATL' THEN $atl
			   						 WHEN awayteam = 'BAL' THEN $bal
			   						 WHEN awayteam = 'BUF' THEN $buf
			   						 WHEN awayteam = 'CAR' THEN $car
			   						 WHEN awayteam = 'CHI' THEN $chi
			   						 WHEN awayteam = 'CIN' THEN $cin
			   						 WHEN awayteam = 'CLE' THEN $cle
			   						 WHEN awayteam = 'DAL' THEN $dal
			   						 WHEN awayteam = 'DEN' THEN $den
			   						 WHEN awayteam = 'DET' THEN $det
			   						 WHEN awayteam = 'GB' THEN $gb
			   						 WHEN awayteam = 'HOU' THEN $hou
			   						 WHEN awayteam = 'IND' THEN $ind
			   						 WHEN awayteam = 'JAX' THEN $jax
			   						 WHEN awayteam = 'KC' THEN $kc
			   						 WHEN awayteam = 'LAC' THEN $lac
			   						 WHEN awayteam = 'LAR' THEN $lar
			   						 WHEN awayteam = 'MIA' THEN $mia
			   						 WHEN awayteam = 'MIN' THEN $min
			   						 WHEN awayteam = 'NE' THEN $ne
			   						 WHEN awayteam = 'NO' THEN $no
			   						 WHEN awayteam = 'NYG' THEN $nyg
			   						 WHEN awayteam = 'NYJ' THEN $nyj
			   						 WHEN awayteam = 'OAK' THEN $oak
			   						 WHEN awayteam = 'PHI' THEN $phi
			   						 WHEN awayteam = 'PIT' THEN $pit
			   						 WHEN awayteam = 'SF' THEN $sf
			   						 WHEN awayteam = 'SEA' THEN $sea
			   						 WHEN awayteam = 'TB' THEN $tb
			   						 WHEN awayteam = 'TEN' THEN $ten
			   						 WHEN awayteam = 'WAS' THEN $was
								   END)";
								   
		$sqlhome = "UPDATE $wk 
			   SET homescore = (CASE WHEN hometeam = 'ARZ' THEN $arz
			   						 WHEN hometeam = 'ATL' THEN $atl
			   						 WHEN hometeam = 'BAL' THEN $bal
			   						 WHEN hometeam = 'BUF' THEN $buf
			   						 WHEN hometeam = 'CAR' THEN $car
			   						 WHEN hometeam = 'CHI' THEN $chi
			   						 WHEN hometeam = 'CIN' THEN $cin
			   						 WHEN hometeam = 'CLE' THEN $cle
			   						 WHEN hometeam = 'DAL' THEN $dal
			   						 WHEN hometeam = 'DEN' THEN $den
			   						 WHEN hometeam = 'DET' THEN $det
			   						 WHEN hometeam = 'GB' THEN $gb
			   						 WHEN hometeam = 'HOU' THEN $hou
			   						 WHEN hometeam = 'IND' THEN $ind
			   						 WHEN hometeam = 'JAX' THEN $jax
			   						 WHEN hometeam = 'KC' THEN $kc
			   						 WHEN hometeam = 'LAC' THEN $lac
			   						 WHEN hometeam = 'LAR' THEN $lar
			   						 WHEN hometeam = 'MIA' THEN $mia
			   						 WHEN hometeam = 'MIN' THEN $min
			   						 WHEN hometeam = 'NE' THEN $ne
			   						 WHEN hometeam = 'NO' THEN $no
			   						 WHEN hometeam = 'NYG' THEN $nyg
			   						 WHEN hometeam = 'NYJ' THEN $nyj
			   						 WHEN hometeam = 'OAK' THEN $oak
			   						 WHEN hometeam = 'PHI' THEN $phi
			   						 WHEN hometeam = 'PIT' THEN $pit
			   						 WHEN hometeam = 'SF' THEN $sf
			   						 WHEN hometeam = 'SEA' THEN $sea
			   						 WHEN hometeam = 'TB' THEN $tb
			   						 WHEN hometeam = 'TEN' THEN $ten
			   						 WHEN hometeam = 'WAS' THEN $was
								   END)";
								   
		$weekoneA = mysqli_query($db, $sqlaway);
		if (!$weekoneA){
			echo "Error: " . mysqli_error($db) . $n;
		}
		$weekoneH = mysqli_query($db, $sqlhome);
	}

	//Do the same thing for the Super Bowl. The exception is that the teams are distinguished by conference and not home/away
	else if ($wknum == 21) {
		$sqlaway = "UPDATE $wk 
			   SET afcscore = (CASE WHEN afcteam = 'BAL' THEN '$bal'
			   				   		WHEN afcteam = 'BUF' THEN '$buf'
			   						WHEN afcteam = 'CIN' THEN '$cin'
			   						WHEN afcteam = 'CLE' THEN '$cle'
			   						WHEN afcteam = 'DEN' THEN '$den'
			   						WHEN afcteam = 'HOU' THEN '$hou'
			   						WHEN afcteam = 'IND' THEN '$ind'
			   						WHEN afcteam = 'JAX' THEN '$jax'
			   						WHEN afcteam = 'KC' THEN '$kc'
			   						WHEN afcteam = 'LAC' THEN '$lac'
			   						WHEN afcteam = 'MIA' THEN '$mia'
			   						WHEN afcteam = 'NE' THEN '$ne'
			   						WHEN afcteam = 'NYJ' THEN '$nyj'
			   						WHEN afcteam = 'OAK' THEN '$oak'
			   						WHEN afcteam = 'PIT' THEN '$pit'
			   						WHEN afcteam = 'TEN' THEN '$ten'
			   					END)";

		$sqlhome = "UPDATE $wk 
			   SET nfcscore = (CASE WHEN nfcteam = 'ARZ' THEN '$arz'
			   						WHEN nfcteam = 'ATL' THEN '$atl'
			   						WHEN nfcteam = 'CAR' THEN '$car'
			   						WHEN nfcteam = 'CHI' THEN '$chi'
			   						WHEN nfcteam = 'DAL' THEN '$dal'
			   						WHEN nfcteam = 'DET' THEN '$det'
			   						WHEN nfcteam = 'GB' THEN '$gb'
			   						WHEN nfcteam = 'LAR' THEN '$lar'
			   						WHEN nfcteam = 'MIN' THEN '$min'
			   						WHEN nfcteam = 'NO' THEN '$no'
			   						WHEN nfcteam = 'NYG' THEN '$nyg'
			   						WHEN nfcteam = 'PHI' THEN '$phi'
			   						WHEN nfcteam = 'SF' THEN '$sf'
			   						WHEN nfcteam = 'SEA' THEN '$sea'
			   						WHEN nfcteam = 'TB' THEN '$tb'
			   						WHEN nfcteam = 'WAS' THEN '$was'
			   					END)";

		$weekoneA = mysqli_query($db, $sqlaway);
		$weekoneH = mysqli_query($db, $sqlhome);
	}

	//During wildcard weekend, we have to account for the highest seeded winner visiting the 2 seed the next week, and the lowest-seeded winner visiting the 1 seed the next week
	if ($wknum == 18) {
		$sql = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC3'");
		$r = mysqli_fetch_array($sql);
		$three = $r['homescore'];
		$threeseed = $r['hometeam'];
		$six = $r['awayscore'];
		$sixseed = $r['awayteam'];
		if ($three > $six) {
			$win36a = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$threeseed', awayseed = 3 WHERE game = 'AFC2'");
			$que = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC4'");
			$q = mysqli_fetch_array($que);
			$four = $q['homescore'];
			$fourseed = $q['hometeam'];
			$five = $q['awayscore'];
			$fiveseed = $q['awayteam'];
			if ($four > $five) {
				$win45a = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fourseed', awayseed = 4 WHERE game = 'AFC1'");
			} else if ($four < $five) {
				$win45a = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fiveseed', awayseed = 5 WHERE game = 'AFC1'");
			}
		} else if ($three < $six) {
			$win36a = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$sixseed', awayseed = 6 WHERE game = 'AFC1'");
			$que = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC4'");
			$q = mysqli_fetch_array($que);
			$four = $q['homescore'];
			$fourseed = $q['hometeam'];
			$five = $q['awayscore'];
			$fiveseed = $q['awayteam'];
			if ($four > $five) {
				$win45a = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fourseed', awayseed = 4 WHERE game = 'AFC2'");
			} else if ($four < $five) {
				$win45a = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fiveseed', awayseed = 5 WHERE game = 'AFC2'");
			}
		}
		$sql = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC3'");
		$r = mysqli_fetch_array($sql);
		$three = $r['homescore'];
		$threeseed = $r['hometeam'];
		$six = $r['awayscore'];
		$sixseed = $r['awayteam'];
		if ($three > $six) {
			$win36n = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$threeseed', awayseed = 3 WHERE game = 'NFC2'");
			$que = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC4'");
			$q = mysqli_fetch_array($que);
			$four = $q['homescore'];
			$fourseed = $q['hometeam'];
			$five = $q['awayscore'];
			$fiveseed = $q['awayteam'];
			if ($four > $five) {
				$win45n = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fourseed', awayseed = 4 WHERE game = 'NFC1'");
			} else if ($four < $five) {
				$win45n = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fiveseed', awayseed = 5 WHERE game = 'NFC1'");
			}
		} else if ($three < $six) {
			$win36n = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$sixseed', awayseed = 6 WHERE game = 'NFC1'");
			$que = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC4'");
			$q = mysqli_fetch_array($que);
			$four = $q['homescore'];
			$fourseed = $q['hometeam'];
			$five = $q['awayscore'];
			$fiveseed = $q['awayteam'];
			if ($four > $five) {
				$win45n = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fourseed', awayseed = 4 WHERE game = 'NFC2'");
			} else if ($four < $five) {
				$win45n = mysqli_query($db, "UPDATE nflweek19 SET awayteam = '$fiveseed', awayseed = 5 WHERE game = 'NFC2'");
			}
		}
	}

	//During the divisional round we have to account for the highest-seed winner hosting the lower-seed winner.	
	if ($wknum == 19) {
		$sql = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'AFC1'");
		$r = mysqli_fetch_array($sql);
		$one = $r['homescore'];
		$oneseed = $r['hometeam'];
		$low = $r['awayscore'];
		$lowseed = $r['awayteam'];
		$lownum = $r['awayseed'];
		if ($one > $low) {
			$win1a = mysqli_query($db, "UPDATE nflweek20 SET hometeam = '$oneseed', homeseed = 1 WHERE game = 'AFCCG'");
			$que = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'AFC2'");
			$q = mysqli_fetch_array($que);
			$two = $q['homescore'];
			$twoseed = $q['hometeam'];
			$lower = $q['awayscore'];
			$lowerseed = $q['awayteam'];
			$lowernum = $q['awayseed'];
			if ($two > $lower) {
				$win2a = mysqli_query($db, "UPDATE nflweek20 SET awayteam = '$twoseed', awayseed = 2 WHERE game = 'AFCCG'");
			} else if ($two < $lower) {
				$win2a = mysqli_query($db, "UPDATE nflweek20 SET awayteam = '$lowerseed', awayseed = $lowernum WHERE game = 'AFCCG'");
			}
		}
		if ($one < $low) {
			$win1a = mysqli_query($db, "UPDATE nflweek20 SET awayteam = '$lowseed', awayseed = $lownum WHERE game = 'AFCCG'");
			$que = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'AFC2'");
			$q = mysqli_fetch_array($que);
			$two = $q['homescore'];
			$twoseed = $q['hometeam'];
			$lower = $q['awayscore'];
			$lowerseed = $q['awayteam'];
			$lowernum = $q['awayseed'];
			if ($two > $lower) {
				$win2a = mysqli_query($db, "UPDATE nflweek20 SET hometeam = '$twoseed', homeseed = 2 WHERE game = 'AFCCG'");
			} else if ($two < $lower) {
				$win2a = mysqli_query($db, "UPDATE nflweek20 SET hometeam = '$lowerseed', homeseed = $lowernum WHERE game = 'AFCCG'");
			}
		}
		$sql = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'NFC1'");
		$r = mysqli_fetch_array($sql);
		$one = $r['homescore'];
		$oneseed = $r['hometeam'];
		$low = $r['awayscore'];
		$lowseed = $r['awayteam'];
		$lownum = $r['awayseed'];
		if ($one > $low) {
			$win1n = mysqli_query($db, "UPDATE nflweek20 SET hometeam = '$oneseed', homeseed = 1 WHERE game = 'NFCCG'");
			$que = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'NFC2'");
			$q = mysqli_fetch_array($que);
			$two = $q['homescore'];
			$twoseed = $q['hometeam'];
			$lower = $q['awayscore'];
			$lowerseed = $q['awayteam'];
			$lowernum = $q['awayseed'];
			if ($two > $lower) {
				$win2n = mysqli_query($db, "UPDATE nflweek20 SET awayteam = '$twoseed', awayseed = 2 WHERE game = 'NFCCG'");
			} else if ($two < $lower) {
				$win2n = mysqli_query($db, "UPDATE nflweek20 SET awayteam = '$lowerseed', awayseed = $lowernum WHERE game = 'NFCCG'");
			}
		}
		if ($one < $low) {
			$win1n = mysqli_query($db, "UPDATE nflweek20 SET awayteam = '$lowseed', awayseed = $lownum WHERE game = 'NFCCG'");
			$que = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'NFC2'");
			$q = mysqli_fetch_array($que);
			$two = $q['homescore'];
			$twoseed = $q['hometeam'];
			$lower = $q['awayscore'];
			$lowerseed = $q['awayteam'];
			$lowernum = $q['awayseed'];
			if ($two > $lower) {
				$win2n = mysqli_query($db, "UPDATE nflweek20 SET hometeam = '$twoseed', homeseed = 2 WHERE game = 'NFCCG'");
			} else if ($two < $lower) {
				$win2n = mysqli_query($db, "UPDATE nflweek20 SET hometeam = '$lowerseed', homeseed = $lowernum WHERE game = 'NFCCG'");
			}
		}
	}

	//Put AFC and NFC Championship Game winners in the Super Bowl.
	if ($wknum == 20) {
		$yr_check = mysqli_query($db, "SELECT * FROM whatif_superbowl WHERE year = $year");
		if (mysqli_num_rows($yr_check) == 0){
			mysqli_query($db, "INSERT INTO whatif_superbowl (`year`) VALUES ($year)");
		}		
		$sqla = mysqli_query($db, "SELECT * FROM nflweek20 WHERE game = 'AFCCG'");
		$r = mysqli_fetch_array($sqla);
		$home = $r['homescore'];
		$hometeam = $r['hometeam'];
		$away = $r['awayscore'];
		$awayteam = $r['awayteam'];
		if ($home > $away) {
			$wina = mysqli_query($db, "UPDATE nflweek21 SET afcteam = '$hometeam'");
			mysqli_query($db, "UPDATE whatif_superbowl SET afcShort = '$awayteam', afc = (SELECT team FROM nflteams WHERE teamShort = '$awayteam') WHERE year = $year");
		} else if ($home < $away) {
			$wina = mysqli_query($db, "UPDATE nflweek21 SET afcteam = '$awayteam'");
			mysqli_query($db, "UPDATE whatif_superbowl SET afcShort = '$hometeam', afc = (SELECT team FROM nflteams WHERE teamShort = '$hometeam') WHERE year = $year");
		}
		$sqln = mysqli_query($db, "SELECT * FROM nflweek20 WHERE game = 'NFCCG'");
		$r = mysqli_fetch_array($sqln);
		$home = $r['homescore'];
		$hometeam = $r['hometeam'];
		$away = $r['awayscore'];
		$awayteam = $r['awayteam'];
		if ($home > $away) {
			$winn = mysqli_query($db, "UPDATE nflweek21 SET nfcteam = '$hometeam'");
			mysqli_query($db, "UPDATE whatif_superbowl SET nfcShort = '$awayteam', nfc = (SELECT team FROM nflteams WHERE teamShort = '$awayteam') WHERE year = $year");
		} else if ($home < $away) {
			$winn = mysqli_query($db, "UPDATE nflweek21 SET nfcteam = '$awayteam'");
			mysqli_query($db, "UPDATE whatif_superbowl SET nfcShort = '$hometeam', nfc = (SELECT team FROM nflteams WHERE teamShort = '$hometeam') WHERE year = $year");
		}
	}

	//Put Super Bowl winner,loser,scores in Super Bowls table
	if ($wknum == 21) {
		$sql = mysqli_query($db, "SELECT * FROM nflweek21");
		$r = mysqli_fetch_array($sql);
		$nfc = $r['nfcscore'];
		$afc = $r['afcscore'];
		$nfcteam = $r['nfcteam'];
		$afcteam = $r['afcteam'];
		$sbnfc = mysqli_query($db, "SELECT tid, team FROM nflteams WHERE teamShort = '$nfcteam'");
		$sbafc = mysqli_query($db, "SELECT tid, team FROM nflteams WHERE teamShort = '$afcteam'");
		$sbn = mysqli_fetch_array($sbnfc);
		$sba = mysqli_fetch_array($sbafc);
		$nfcnickname = $sbn['team'];
		$nfcid = $sbn['tid'];
		$afcnickname = $sba['team'];
		$afcid = $sba['tid'];
		if ($nfc > $afc) {
			$sb = mysqli_query($db, "UPDATE superbowls SET winners = '$nfcteam', losers = '$afcteam', winnerid = '$nfcid', loserid = '$afcid', winningteam = '$nfcnickname', losingteam = '$afcnickname', winningscore = '$nfc', losingscore = '$afc' WHERE season = $year;");
			mysqli_query($db, "UPDATE nflteams SET sbwins = sbwins+1 WHERE tid = $nfcid");
		} elseif ($afc > $nfc) {
			$sb = mysqli_query($db, "UPDATE superbowls SET winners = '$afcteam', losers = '$nfcteam', winnerid = '$afcid', loserid = '$nfcid', winningteam = '$afcnickname', losingteam = '$nfcnickname', winningscore = '$afc', losingscore = '$nfc' WHERE season = $year;");
			mysqli_query($db, "UPDATE nflteams SET sbwins = sbwins+1 WHERE tid = $afcid");
		}
	}
}

for ($j = 1; $j <= 32; $j++) {
	$ksql = mysqli_query($db, "SELECT * FROM nflteams WHERE tid = $j");
	$k = mysqli_fetch_array($ksql);
	$tName = $k['team'];
	$tSho = $k['teamShort'];
	$tSchedule = $tName . "_schedule";
	if ($wknum < 18) {
		$x = mysqli_query($db, "SELECT * FROM $wk WHERE hometeam = '$tSho' OR awayteam = '$tSho'");
		$y = mysqli_fetch_array($x);
		$h = $y['hometeam'];
		$a = $y['awayteam'];
		if ($h == $tSho) {
			$z = mysqli_query($db, "UPDATE $tSchedule SET home_away = 'H', opponent = '$a' WHERE week = '$wknum'");
		} elseif ($a == $tSho) {
			$z = mysqli_query($db, "UPDATE $tSchedule SET home_away = 'A', opponent = '$h' WHERE week = '$wknum'");
		} else {
			$z = mysqli_query($db, "UPDATE $tSchedule SET home_away = 'B', opponent = 'BYE', score = NULL, oppscore = NULL, result = NULL WHERE week = '$wknum'");
		}
	}
}


//Start updating individual team schedules
$getTeam = "SELECT * FROM nflteams";
$teams = mysqli_query($db, $getTeam);
$count = mysqli_num_rows($teams);
//Cycle through every team
for ($j = 1; $j <= 32; $j++) {
	$t = mysqli_query($db, "SELECT * FROM nflteams WHERE tid = $j");
	$row = mysqli_fetch_array($t);
	//Identify each team, their tricode, division, conference, and assign a variable to the table for their schedule
	$tName = $row['team'];
	$tShort = $row['teamShort'];
	$tSched = $tName . "_schedule";
	$tDiv = $row['division'];
	$tConf = $row['conference'];
	//During the regular season, check for matchup and results from the team's game
	if ($wknum < 18) {
		$u = mysqli_query($db, "SELECT * FROM $wk WHERE hometeam = '$tShort' OR awayteam = '$tShort'");
		$urow = mysqli_fetch_array($u);
		$ascore = $urow['awayscore'];
		$hscore = $urow['homescore'];
		//If it's an away game, figure out if it was a win, loss, or tie
		if ($urow['awayteam'] == $tShort) {
			if ($ascore > $hscore) {
				$qr = mysqli_query($db, "UPDATE $tSched SET result = 'W' WHERE week = $wknum");
			} else if ($ascore < $hscore) {
				$qr = mysqli_query($db, "UPDATE $tSched SET result = 'L' WHERE week = $wknum");
			} else if ($ascore == $hscore) {
				if ($ascore > 0) {
					$qr = mysqli_query($db, "UPDATE $tSched SET result = 'T' WHERE week = $wknum");
				} else {
					$qr = mysqli_query($db, "UPDATE $tSched SET result = NULL WHERE week = $wknum");
				}
			}
			//assign scores appropriately
			$qa = "UPDATE $tSched SET score = $ascore WHERE week = $wknum";
			$ua = mysqli_query($db, $qa);
		} else {
			$qa = "UPDATE $tSched SET oppscore = $ascore WHERE week = $wknum";
			$ua = mysqli_query($db, $qa);
		}
		//If it's a home game, figur eout if it was a win, loss, or tie
		if ($urow['hometeam'] == $tShort) {
			if ($ascore > $hscore) {
				$qr = mysqli_query($db, "UPDATE $tSched SET result = 'L' WHERE week = $wknum");
			} else if ($ascore < $hscore) {
				$qr = mysqli_query($db, "UPDATE $tSched SET result = 'W' WHERE week = $wknum");
			} else if ($ascore == $hscore) {
				if ($ascore > 0) {
					$qr = mysqli_query($db, "UPDATE $tSched SET result = 'T' WHERE week = $wknum");
				} else {
					$qr = mysqli_query($db, "UPDATE $tSched SET result = NULL WHERE week = $wknum");
				}
			}
			//assign scores appropriately				
			$qh = "UPDATE $tSched SET score = $hscore WHERE week = $wknum";
			$uh = mysqli_query($db, $qh);
		} else {
			$qh = "UPDATE $tSched SET oppscore = $hscore WHERE week = $wknum";
			$uh = mysqli_query($db, $qh);
		}
	}

	//Calculate the data needed for determining standings
	$wins = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE result = 'W'");
	$wrow = mysqli_fetch_array($wins);
	$w = $wrow['COUNT(*)'];
	$losses = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE result = 'L'");
	$lrow = mysqli_fetch_array($losses);
	$l = $lrow['COUNT(*)'];
	$ties = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE result = 'T'");
	$trow = mysqli_fetch_array($ties);
	$t = $trow['COUNT(*)'];
	$points = mysqli_query($db, "SELECT SUM(score) FROM $tSched");
	$prow = mysqli_fetch_array($points);
	$pf = $prow['SUM(score)'];
	$against = mysqli_query($db, "SELECT SUM(oppscore) FROM $tSched");
	$arow = mysqli_fetch_array($against);
	$pa = $arow['SUM(oppscore)'];
	$divWins = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE opponent IN (SELECT teamShort FROM nflteams WHERE conference = '$tConf' AND division = '$tDiv') AND result = 'W'");
	$divwrow = mysqli_fetch_array($divWins);
	$divW = $divwrow['COUNT(*)'];
	$divLosses = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE opponent IN (SELECT teamShort FROM nflteams WHERE conference = '$tConf' AND division = '$tDiv') AND result = 'L'");
	$divlrow = mysqli_fetch_array($divLosses);
	$divL = $divlrow['COUNT(*)'];
	$confWins = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE opponent IN (SELECT teamShort FROM nflteams WHERE conference = '$tConf') AND result = 'W'");
	$confwrow = mysqli_fetch_array($confWins);
	$confW = $confwrow['COUNT(*)'];
	$confLosses = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE opponent IN (SELECT teamShort FROM nflteams WHERE conference = '$tConf') AND result = 'L'");
	$conflrow = mysqli_fetch_array($confLosses);
	$confL = $conflrow['COUNT(*)'];
	$homeWins = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE home_away = 'H' AND result = 'W'");
	$homewrow = mysqli_fetch_array($homeWins);
	$homeW = $homewrow['COUNT(*)'];
	$homeLosses = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE home_away = 'H' AND result = 'L'");
	$homelrow = mysqli_fetch_array($homeLosses);
	$homeL = $homelrow['COUNT(*)'];
	$awayWins = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE home_away = 'A' AND result = 'W'");
	$awaywrow = mysqli_fetch_array($awayWins);
	$awayW = $awaywrow['COUNT(*)'];
	$awayLosses = mysqli_query($db, "SELECT COUNT(*) FROM $tSched WHERE home_away = 'A' AND result = 'L'");
	$awaylrow = mysqli_fetch_array($awayLosses);
	$awayL = $awaylrow['COUNT(*)'];
	//Refactoring for easier computing
	$gp = $w + $l + $t;
	//Avoid divide by 0 errors
	if ($gp != 0) {
		$percent = ($w + (.5 * $t)) / ($gp);
	} else {
		$percent = 0;
	}
	$pct = number_format($percent, 3);
	$schedstr = mysqli_query($db, "SELECT AVG(n.pct) FROM nflteams n, $tSched s WHERE s.opponent = n.teamShort");
	$sched = mysqli_fetch_array($schedstr);
	$sos = $sched['AVG(n.pct)'];
	$winstr = mysqli_query($db, "SELECT AVG(n.pct) FROM nflteams n, $tSched s WHERE s.opponent = n.teamShort AND s.result = 'W'");
	$victory = mysqli_fetch_array($winstr);
	$sov = $victory['AVG(n.pct)'];
	if (!$sov){
		$sov = 0;
	}
	//Refactoring for easier computing
	$divgp = $divW + $divL;
	//Avoid divide by 0 errors
	if ($divgp != 0) {
		$divrec = $divW / ($divgp);
	} else {
		$divrec = 0;
	}
	//Refactoring for easier computing
	$confgp = $confW + $confL;
	//Avoid divide by 0 errors
	if ($confgp != 0) {
		$confrec = $confW / ($confgp);
	} else {
		$confrec = 0;
	}
	$hermagerd = "UPDATE nflteams SET wins = $w, losses = $l, ties = $t, points = $pf, against = $pa, diff = $pf - $pa, divw = $divW, divl = $divL, confw = $confW, confl = $confL, pct = $pct, homew = $homeW, homel = $homeL, awayw = $awayW, awayL = $awayL, sov = $sov, sos = $sos, divpct = $divrec, confpct = $confrec WHERE team = '$tName'";
	$record = mysqli_query($db, $hermagerd);
	if (!$record){
		echo $tShort . ": " . mysqli_error($db) . $n;
		echo $hermagerd . $n;
	}
}
/*
	updateDivisions() and updatePlayoffPic are functions included in the NFL's year.php page.
	These functions contain SQL statements thatupdate the standings and playoff picture with appropriate tiebreakers.
*/
updateDivisions($db);
//Update Playoff Picture
if ($wknum <= 17) {
	updatePlayoffPic($db);
}
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NFL Schedule</title>
	<link rel='stylesheet' type='text/css' href='schedulestyle.css' />
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
	/*
		Javascript to display each week tab and the games being played that week.
	*/
		function openTab(evt, tabName) {
			// Declare all variables
			var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(tabName).style.display = "block";
			evt.currentTarget.className += " active";
		}
	</script>
</head>

<body>
	<h1 align="center"><a href='../NFL' style="text-decoration: none; color:white;"><?php echo $year; ?> NFL Schedule</a></h1>
	<div class="tab" align=center>
		<?php
		//create a tab for each week (1-21)
		echo $sp;
		for ($k = 1; $k <= 21; $k++) {
			if ($k == 1) {
				?>
		<button class="tablinks active" id="wk<?php echo $k;?>" onclick="openTab(event, 'week<?php echo $k ?>')"><?php echo "Week " . $k; ?></button>
		<?php
			} else {
				?>
		<!--identify each tab appropriately-->
		<button class="tablinks" id="wk<?php echo $k;?>" onclick="openTab(event, 'week<?php echo $k ?>')">
			<?php
					//Appropriately name each tab
					if ($k <= 17) {
						echo "Week " . $k;
					}
					if ($k == 18) {
						echo "Wild Card";
					}
					if ($k == 19) {
						echo "Divisional";
					}
					if ($k == 20) {
						echo "Championships";
					}
					if ($k == 21) {
						echo "Super Bowl";
					} ?></button>
		<?php
			}
		}
		echo $sp;
		?>
	</div>
	<?php
	//cycle through all weeks
	for ($k = 1; $k <= 20; $k++) {
		if ($k == 1) {
			?>
	<div id="week<?php echo $k ?>" class="tabcontent" style="display:block;">
		<?php
			} else {
				?>
		<div id="week<?php echo $k ?>" class="tabcontent">

			<?php
				}
				$week = "nflweek" . $k;
				//echo $week;
				$schedule = mysqli_query($db, "SELECT * FROM $week");
				$numrows = mysqli_num_rows($schedule);
				?>
			<form action="schedule.php" method="post" align="center">
				<table align="center" id="nflgames">
					<tr>
						<th style="width:15%">Score</th>
						<th style="width:27.5%">Away</th>
						<th style="width:15%;">Wk <?php echo $k; ?></th>
						<th style="width:27.5%">Home</th>
						<th style="width:15%">Score</th>
					</tr>
					<?php
						$i = 1;
						//Dump the data into an easily readable table
						while ($i <= $numrows && $row = mysqli_fetch_array($schedule)) {
							?>
					<tr>
						<td align="center">
							<!-- Cell for the away score box-->
							<input type="text" name="<?php echo $row['awayteam']; ?>" placeholder="<?php echo $row['awayscore']; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awayscore']; ?>">
						</td>
						<!-- Cell for the away tricode and logo -->
						<td id="<?php echo $row['awayteam'] ?>" style="font-weight: bold; text-align: right;"><img src="../../Assets/NFL/<?php echo $row['awayteam'] ?>.png" style="float:left;" width=30 height=30><span style="float: right; padding-top: 6px;" width=100;><?php echo $row['awayteam'] ?></span></td>
						<td align="center">@</td>
						<!-- Cell for the home tricode and logo -->
						<td id="<?php echo $row['hometeam'] ?>" style="font-weight: bold;"><span style="float: left; padding-top: 6px;"><?php echo $row['hometeam'] ?></span><img src="../../Assets/NFL/<?php echo $row['hometeam'] ?>.png" style="float: right; text-align: right; vertical-align: bottom;" width=30 height=30></td>
						<td align="center">
							<!-- Cell for the home score box-->
							<input type="text" name="<?php echo $row['hometeam']; ?>" placeholder="<?php echo $row['homescore']; ?>" pattern="\d*" maxlength="2" style="width:30px;" value="<?php echo $row['homescore']; ?>">
						</td>
					</tr>
					<?php
							//Print out next game in the schedule table
							$i++;
						}
						?>
				</table>
				<br>
				<!-- Submit button to update week's scores -->
				<input type="hidden" name="wk" value="<?php echo $k ?>">
				<div align=center><button type="submit" id="update">Submit</button></div>
			</form>
		</div>
		<?php
		}
		//For the Super Bowl, the headers change to NFC and AFC instead of Home and Away
		if ($k == 21) {
			?>
		<div id="week<?php echo $k ?>" class="tabcontent">
			<?php
				$week = "nflweek" . $k;
				//echo $week;
				$schedule = mysqli_query($db, "SELECT * FROM $week");
				$numrows = mysqli_num_rows($schedule);
				?>
			<form action="schedule.php" method="post" align="center">
				<table align="center" id="nflgames">
					<tr>
						<th style="width:15%">Score</th>
						<th style="width:27.5%">AFC</th>
						<th style="width:15%;">Wk <?php echo $k; ?></th>
						<th style="width:27.5%">NFC</th>
						<th style="width:15%">Score</th>
					</tr>
					<?php
						$i = 1;
						while ($i <= $numrows && $row = mysqli_fetch_array($schedule)) {
							?>
					<tr>
						<td align="center">
							<input type="text" name="<?php echo $row['afcteam']; ?>" placeholder="<?php echo $row['afcscore']; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['afcscore']; ?>">
						</td>
						<td id="<?php echo $row['afcteam'] ?>" style="font-weight: bold; text-align: right;"><img src="../../Assets/NFL/<?php echo $row['afcteam'] ?>.png" style="float:left;" width=30 height=30><span style="float: right; padding-top: 6px;" width=100;><?php echo $row['afcteam'] ?></span></td>
						<td align="center">vs.</td>
						<td id="<?php echo $row['nfcteam'] ?>" style="font-weight: bold;"><span style="float: left; padding-top: 6px;"><?php echo $row['nfcteam'] ?></span><img src="../../Assets/NFL/<?php echo $row['nfcteam'] ?>.png" style="float: right; text-align: right; vertical-align: bottom;" width=30 height=30></td>
						<td align="center">
							<input type="text" name="<?php echo $row['nfcteam']; ?>" placeholder="<?php echo $row['nfcscore']; ?>" pattern="\d*" maxlength="2" style="width:30px;" value="<?php echo $row['nfcscore']; ?>">
						</td>
					</tr>
					<?php
							$i++;
						}
						?>
				</table>
				<br>
				<input type="hidden" name="wk" value="<?php echo $k ?>">
				<div align=center><button type="submit" id="update"> Submit</button></div>
			</form>
			<?php
			}
			?>
		</div>
</body>

</html>
<style>
	html {
		height: 100%;
	}
	body {
		background-color: #00356e;
		background-image: linear-gradient(rgb(0,53,110), white, rgb(202, 9, 19));
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 90px;
		color: white;
		text-shadow: 4px 4px #ca0913;
		margin: 15px;
	}

	.tester {
		border-collapse: collapse;
	}

	.tester td,
	.tester th {
		border: 2px solid black;
		padding: 8px;
	}

	.tester th {
		background-color: darkgrey;
		color: black;
		text-align: center;
	}

	#nflsched {
		font-family: 'Cambo', Times, serif;
		margin-bottom: 5%;
		width: auto;
		min-width: 800px;
		border: 3px solid black;
	}

	.tab {
		border: 3px solid white;
		/* background-color: chocolate; */
		background-image: linear-gradient(rgb(202, 9, 19), white);
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		display: flex;
		overflow-x: scroll;
		scrollbar-width: none;
	}

	.tab::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0);
		box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
		border-radius: 10px;
		background-color: transparent;
	}

	.tab::-webkit-scrollbar {
		width: 0px;
		background-color: transparent;
	}

	.tab::-webkit-scrollbar-thumb {
		border-radius: 10px;
		-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0);
		box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
		background-color: rgba(0, 0, 0, 0);
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 15px 6px 15px 6px;
		text-align: center;
		transition: 0.3s;
		font-size: 18px;
		background-image: linear-gradient(darkgrey, black);
		color: white;
		margin: 2px;
		width: auto;
		min-width: 125px;
	}

	.tab button#wk20 {
		min-width: 150px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-image: linear-gradient(black, white);
		color: yellow;

	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-image: none;
		background-color: white;
		color: black;

	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 3px solid white;
		border-top: none;
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		background-color: white;
		color: black;
	}

	#nflgames {
		border-collapse: collapse;
		border-radius: 30px;
		width: 450px;
		min-width: 360px;
	}

	#nflgames td {
		border: 1px solid grey;
		padding: 2%;
		width: 45px;
	}

	#nflgames th {
		background-color: #00356e;
		color: white;
		text-align: center;
		border: 1px solid black;
		padding: 1%;
	}

	#back {
		margin-bottom: 20px;
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
		background-color: #cc0000;
		box-shadow: 0px 1px white;
	}

	#TBD {
		font-family: 'Cambo', Times, serif;
		background-color: white;
		color: black;
	}
</style>