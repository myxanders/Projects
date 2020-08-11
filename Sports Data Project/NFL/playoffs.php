<?php
include("../../session.php");
$sp = "&nbsp";
$sql = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC3'");
$row = mysqli_fetch_array($sql);
$team = $row['hometeam'];
$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $team . "'");
$r = mysqli_fetch_array($query);
$name = $r['team'];
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>NFL Playoffs</title>
	<link rel='stylesheet' type='text/css' href='schedulestyle.css' />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<h1 align="middle">NFL Playoff Bracket</h1>
	<div id="container" align="center">
		<!-- The bracket is going to be set up as a table, with styles to certain cells to simulate bracket branches/leaves
			 Each cell provides the team logo, logotype, and score -->
		<table>
			<thead>
				<tr>
					<th style="width:165px;">Wild Card Round</th>
					<th style="width:165px;">AFC Divisional Round</th>
					<th style="width:165px;">AFC Championship</th>
					<th> </th>
					<th id="superbowl">Super Bowl</th>
					<th> </th>
					<th style="width:165px;">NFC Championship</th>
					<th style="width:165px;">NFC Divisional Round</th>
					<th style="width:165px;">Wild Card Round</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					$sqla = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC2'");
					$rowa = mysqli_fetch_array($sqla);
					if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
						$score = $rowa['homescore'];
					} else {
						$score = "";
					}
					$teama = $rowa['hometeam'];
					$seed = $rowa['homeseed'];
					$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
					$ra = mysqli_fetch_array($query);
					$namea = $ra['team'];
					?>
					<!-- AFC 2 SEED -->
					<td id="<?php echo $teama; ?>">
						<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
					</td>
					<td id="empty"></td>
					<td id="empty"></td>
					<td id="empty"></td>
					<td style="font-weight: bold; background-color: silver; color: black;" align="middle" ;>Super Bowl Champs:</td>
					<td id="empty"></td>
					<td id="empty"></td>
					<td id="empty"></td>
					<!-- NFC 2 SEED -->
					<?php
					$sqln = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC2'");
					$rown = mysqli_fetch_array($sqln);
					if ($rown['homescore'] + $rown['awayscore'] > 0) {
						$score = $rown['homescore'];
					} else {
						$score = "";
					}
					$teamn = $rown['hometeam'];
					$seed = $rown['homeseed'];
					$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
					$rn = mysqli_fetch_array($query);
					$namen = $rn['team'];
					?>
					<td id="<?php echo $teamn; ?>">
						<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
					</td>
				</tr>
				<tr>
					<!-- AFC 7 SEED -->
					<?php
					$sqla = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC2'");
					$rowa = mysqli_fetch_array($sqla);
					if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
						$score = $rowa['awayscore'];
					} else {
						$score = "";
					}
					$teama = $rowa['awayteam'];
					$seed = $rowa['awayseed'];
					$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
					$ra = mysqli_fetch_array($query);
					$namea = $ra['team']; ?>
					<td id="<?php echo $teama; ?>">
						<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
					</td>
					<!-- AFC LOW WINNING SEED -->
					<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'AFC1'");
					$rowa = mysqli_fetch_array($sqla);
					if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
						$score = $rowa['awayscore'];
					} else {
						$score = "";
					}
					$teama = $rowa['awayteam'];
					$seed = $rowa['awayseed'];
					$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
					$ra = mysqli_fetch_array($query);
					$namea = $ra['team'];
					?>
					<td id="<?php echo $teama; ?>">
						<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
					</td>
					<td id="empty"></td>
					<td id="empty"></td>
					<!-- SUPER BOWL CHAMPS -->
					<?php $sql = mysqli_query($db, "SELECT * FROM nflweek21 WHERE game = 'SB'");
					$row = mysqli_fetch_array($sql);
					$totalpoints = $row['afcscore'] + $row['nfcscore'];
					if ($totalpoints > 0) {
						if ($row['afcscore'] > $row['nfcscore']) {
							$score = $row['afcscore'];
							$team = $row['afcteam'];
						} else if ($row['nfcscore'] > $row['afcscore']) {
							$score = $row['nfcscore'];
							$team = $row['nfcteam'];
						} else {
							$score = "";
							$team = "";
						}
					} else {
						$team = "TBD";
						$score = "";
					}
					$query = mysqli_query($db, "SELECT * FROM nflteams WHERE nflteams.teamShort = '" . $team . "'");
					$ra = mysqli_fetch_array($query);
					$name = $ra['location'] . $sp . $ra['team'];
					?>
					<td id="<?php echo $team; ?>" style="text-align: center; border-color: black;"><img src="/Assets/NFL/<?php echo $team ?>.png" style="vertical-align: middle; " width=20 height=20><?php echo $sp . $name . $sp; ?><img src="/Assets/NFL/<?php echo $team ?>.png" style="vertical-align: middle; " width=20 height=20>
	</div>
	</td>
	<td id="empty"></td>
	<td id="empty"></td>
	<!-- NFC LOW WINNING SEED -->
	<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'NFC1'");
	$rown = mysqli_fetch_array($sqln);
	if ($rown['homescore'] + $rown['awayscore'] > 0) {
		$score = $rown['awayscore'];
	} else {
		$score = "";
	}
	$teamn = $rown['awayteam'];
	$seed = $rown['awayseed'];
	$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
	$rn = mysqli_fetch_array($query);
	$namen = $rn['team'];
	?>
	<td id="<?php echo $teamn; ?>">
		<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
	</td>
	<!-- NFC 7 SEED -->
	<?php
	$query = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC2'");
	$rown = mysqli_fetch_array($query);
	if ($rown['homescore'] + $rown['awayscore'] > 0) {
		$score = $rown['awayscore'];
	} else {
		$score = "";
	}
	$teamn = $rown['awayteam'];
	$seed = $rown['awayseed'];
	$que = mysqli_query($db, "SELECT * FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
	$rn = mysqli_fetch_array($que);
	$namen = $rn['team'];
	?>

	<td id="<?php echo $teamn; ?>">
		<div class="nfc"><img src="/Assets/NFL/<?php echo $teamn ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
	</td>
	</tr>
	<tr>
		<td id="empty"></td>
		<!-- AFC 1 SEED -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'AFC1'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['homescore'];
		} else {
			$score = "";
		}
		$teama = $rowa['hometeam'];
		$seed = $rowa['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<!-- NFC 1 SEED -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'NFC1'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['homescore'];
		} else {
			$score = "";
		}
		$teamn = $rown['hometeam'];
		$seed = $rown['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
	</tr>
	<tr>
		<!-- AFC 3 SEED -->
		<?php
		$sqla = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC3'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['homescore'];
		} else {
			$score = "";
		}
		$teama = $rowa['hometeam'];
		$seed = $rowa['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<!-- AFC FINALIST -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek20 WHERE game = 'AFCCG'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['homescore'];
		} else {
			$score = "";
		}
		$teama = $rowa['hometeam'];
		$seed = $rowa['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<!-- AFC WINNER -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek21 WHERE game = 'SB'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['afcscore'] + $rowa['nfcscore'] > 0) {
			$score = $rowa['afcscore'];
		} else {
			$score = "";
		}
		$teama = $rowa['afcteam'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>" style="border-color: black;">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span id="superbowl" style=" font-weight: bold; font-size: 20px;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20></div>
		</td>
		<td id="empty"></td>
		<!-- NFC FINALIST -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek20 WHERE game = 'NFCCG'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['homescore'];
		} else {
			$score = "";
		}
		$teamn = $rown['hometeam'];
		$seed = $rown['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<!-- NFC 3 SEED -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC3'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['homescore'];
		} else {
			$score = "";
		}
		$teamn = $rown['hometeam'];
		$seed = $rown['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
	</tr>
	<tr>
		<!--AFC 6 SEED -->
		<?php
		$sqla = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC3'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['awayscore'];
		} else {
			$score = "";
		}
		$teama = $rowa['awayteam'];
		$seed = $rowa['awayseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team']; ?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<!-- AFC FINALIST -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek20 WHERE game = 'AFCCG'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['awayscore'];
		} else {
			$score = "";
		}
		$teama = $rowa['awayteam'];
		$seed = $rowa['awayseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<!-- NFC WINNER -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek21 WHERE game = 'SB'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['afcscore'] + $rowa['nfcscore'] > 0) {
			$score = $rowa['nfcscore'];
		} else {
			$score = "";
		}
		$teama = $rowa['nfcteam'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>" style="border-color: black;">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span id="superbowl" style=" font-weight: bold; font-size: 20px;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20></div>
		</td>
		<td id="empty"></td>
		<!-- NFC FINALIST -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek20 WHERE game = 'NFCCG'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['awayscore'];
		} else {
			$score = "";
		}
		$teamn = $rown['awayteam'];
		$seed = $rown['awayseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<!-- NFC 6 SEED -->
		<?php
		$query = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC3'");
		$rown = mysqli_fetch_array($query);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['awayscore'];
		} else {
			$score = "";
		}
		$teamn = $rown['awayteam'];
		$seed = $rown['awayseed'];
		$que = mysqli_query($db, "SELECT * FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($que);
		$namen = $rn['team'];
		?>

		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img src="/Assets/NFL/<?php echo $teamn ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
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
		<!-- AFC 2 SEED -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'AFC2'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['homescore'];
		} else {
			$score = "";
		}
		$teama = $rowa['hometeam'];
		$seed = $rowa['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<!-- NFC 2 SEED -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'NFC2'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['homescore'];
		} else {
			$score = "";
		}
		$teamn = $rown['hometeam'];
		$seed = $rown['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
	</tr>
	<tr>
		<!-- AFC 5 SEED -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC4'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['awayscore'];
		} else {
			$score = "";
		}
		$teama = $rowa['awayteam'];
		$seed = $rowa['awayseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<!-- AFC HIGH SEED WINNER -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'AFC2'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['awayscore'];
		} else {
			$score = "";
		}
		$teama = $rowa['awayteam'];
		$seed = $rowa['awayseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<!-- NFC HIGH SEED WINNER -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek19 WHERE game = 'NFC2'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['awayscore'];
		} else {
			$score = "";
		}
		$teamn = $rown['awayteam'];
		$seed = $rown['awayseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<!-- NFC 5 SEED -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC4'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['awayscore'];
		} else {
			$score = "";
		}
		$teamn = $rown['awayteam'];
		$seed = $rown['awayseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
	</tr>
	<tr>
		<!-- AFC 4 SEED -->
		<?php $sqla = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'AFC4'");
		$rowa = mysqli_fetch_array($sqla);
		if ($rowa['homescore'] + $rowa['awayscore'] > 0) {
			$score = $rowa['homescore'];
		} else {
			$score = "";
		}
		$teama = $rowa['hometeam'];
		$seed = $rowa['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teama . "'");
		$ra = mysqli_fetch_array($query);
		$namea = $ra['team'];
		?>
		<td id="<?php echo $teama; ?>">
			<div class="afc"><img class="logo" src="/Assets/NFL/<?php echo $teama; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teama; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<!-- NFC 4 SEED -->
		<?php $sqln = mysqli_query($db, "SELECT * FROM nflweek18 WHERE game = 'NFC4'");
		$rown = mysqli_fetch_array($sqln);
		if ($rown['homescore'] + $rown['awayscore'] > 0) {
			$score = $rown['homescore'];
		} else {
			$score = "";
		}
		$teamn = $rown['hometeam'];
		$seed = $rown['homeseed'];
		$query = mysqli_query($db, "SELECT team FROM nflteams WHERE nflteams.teamShort = '" . $teamn . "'");
		$rn = mysqli_fetch_array($query);
		$namen = $rn['team'];
		?>
		<td id="<?php echo $teamn; ?>">
			<div class="nfc"><img class="logo" src="/Assets/NFL/<?php echo $teamn; ?>.png" style="vertical-align: middle; " width=20 height=20><span style=" font-weight: bold;"><?php echo $sp . $score . $sp; ?></span><img class="logotype" src="/Assets/NFL/<?php echo $teamn; ?>type.png" style="vertical-align: middle;" width=80 height=20><b><?php echo "[" . $seed . "]"; ?></b></div>
		</td>
	</tr>
	<tr>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"></td>
		<td id="empty"><button id="back" align="center" onclick="window.location.href='../NFL'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to NFL Page</button></td>
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
	html {
		height: 100%;
	}

	body {
		background-color: #00356e;
		background-image: linear-gradient(to left, rgb(0, 53, 110), white, rgb(202, 9, 19));
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
		font-family: 'Cambo', Times, serif;
	}

	h1 {
		font-size: 120px;
		color: #ca0913;
		text-shadow: 5px 5px white;
		margin: 15px;
	}

	th {
		color: black;
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
		margin-left: 2px;
		margin-right: 2px;
		background-color: rgba(255, 255, 255, .1);
		width: 30px;
		text-align: center;
	}

	span#superbowl {
		width: 40px;
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
		background-color: #cc0000;
		box-shadow: 0px 1px white;
	}

	#TBD {
		font-family: 'Cambo', Times, serif;
		background-color: white;
		color: black;
	}

	.afc {
		display: inline-flex;
		width: 100%;
		align-items: center;
		justify-content: center;
		flex-direction: row-reverse;
	}

	.nfc {
		display: inline-flex;
		width: 100%;
		align-items: center;
		justify-content: center;

	}

	img.logotype {
		margin: 2px;
	}
</style>