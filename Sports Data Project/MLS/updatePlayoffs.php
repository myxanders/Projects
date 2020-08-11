<?php
include("../../session.php");
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";

$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East2'");
$r = mysqli_fetch_array($sql);
$e_2 = $r['team'];
$e_2score = $r['score'];
$e_2pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East7'");
$r = mysqli_fetch_array($sql);
$e_7 = $r['team'];
$e_7score = $r['score'];
$e_7pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East3'");
$r = mysqli_fetch_array($sql);
$e_3 = $r['team'];
$e_3score = $r['score'];
$e_3pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East6'");
$r = mysqli_fetch_array($sql);
$e_6 = $r['team'];
$e_6score = $r['score'];
$e_6pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East4'");
$r = mysqli_fetch_array($sql);
$e_4 = $r['team'];
$e_4score = $r['score'];
$e_4pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East5'");
$r = mysqli_fetch_array($sql);
$e_5 = $r['team'];
$e_5score = $r['score'];
$e_5pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West2'");
$r = mysqli_fetch_array($sql);
$w_2 = $r['team'];
$w_2score = $r['score'];
$w_2pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West7'");
$r = mysqli_fetch_array($sql);
$w_7 = $r['team'];
$w_7score = $r['score'];
$w_7pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West3'");
$r = mysqli_fetch_array($sql);
$w_3 = $r['team'];
$w_3score = $r['score'];
$w_3pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West6'");
$r = mysqli_fetch_array($sql);
$w_6 = $r['team'];
$w_6score = $r['score'];
$w_6pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West4'");
$r = mysqli_fetch_array($sql);
$w_4 = $r['team'];
$w_4score = $r['score'];
$w_4pks = $r['pks'];
$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West5'");
$r = mysqli_fetch_array($sql);
$w_5 = $r['team'];
$w_5score = $r['score'];
$w_5pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East1'");
$r = mysqli_fetch_array($sql);
$e_1 = $r['team'];
$e1_score = $r['score'];
$e1_ot = $r['ot'];
$e1_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
$r = mysqli_fetch_array($sql);
$e_2hi = $r['team'];
$e2hi_score = $r['score'];
$e2hi_ot = $r['ot'];
$e2hi_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
$r = mysqli_fetch_array($sql);
$e_hi = $r['team'];
$ehi_score = $r['score'];
$ehi_ot = $r['ot'];
$ehi_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East4'");
$r = mysqli_fetch_array($sql);
$e_lo = $r['team'];
$elo_score = $r['score'];
$elo_ot = $r['ot'];
$elo_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West1'");
$r = mysqli_fetch_array($sql);
$w_1 = $r['team'];
$w1_score = $r['score'];
$w1_ot = $r['ot'];
$w1_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
$r = mysqli_fetch_array($sql);
$w_2hi = $r['team'];
$w2hi_score = $r['score'];
$w2hi_ot = $r['ot'];
$w2hi_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
$r = mysqli_fetch_array($sql);
$w_hi = $r['team'];
$whi_score = $r['score'];
$whi_ot = $r['ot'];
$whi_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West4'");
$r = mysqli_fetch_array($sql);
$w_lo = $r['team'];
$wlo_score = $r['score'];
$wlo_ot = $r['ot'];
$wlo_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'easth'");
$r = mysqli_fetch_array($sql);
$easth = $r['team'];
$easth_score = $r['score'];
$easth_ot = $r['ot'];
$easth_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'easta'");
$r = mysqli_fetch_array($sql);
$easta = $r['team'];
$easta_score = $r['score'];
$easta_ot = $r['ot'];
$easta_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'westh'");
$r = mysqli_fetch_array($sql);
$westh = $r['team'];
$westh_score = $r['score'];
$westh_ot = $r['ot'];
$westh_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'westa'");
$r = mysqli_fetch_array($sql);
$westa = $r['team'];
$westa_score = $r['score'];
$westa_ot = $r['ot'];
$westa_pks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'East'");
$r = mysqli_fetch_array($sql);
$east = $r['team'];
$geast = $r['score'];
$eastpks = $r['pks'];

$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'West'");
$r = mysqli_fetch_array($sql);
$west = $r['team'];
$gwest = $r['score'];
$westpks = $r['pks'];
?>


<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="mlsstyle.css">
	<title>Update MLS Playoffs</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
	$(function() {
		$("#mlsplayoffs").tabs();
	});
</script>

<body>
	<h1 align="center">MLS Playoffs</h1>
	<div align="center" style="margin: 5px;">
		<button id="back" align="center" onclick="window.location.href='playoffs.php'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Playoff Bracket</button>
	</div>
	<form action="processPlayoffs.php" method="post">
		<div id="mlsplayoffs">
			<ul>
				<li><a href="#wildcard">Wild Card</a></li>
				<li><a href="#confsemis">Conference Semis</a></li>
				<li><a href="#conffinals">Conference Finals</a></li>
				<li><a href="#mlscup">MLS Cup</a></li>
			</ul>
			<div id="wildcard">
				<h3>Wild Card Round</h3>
				<div id="east27" class="altable">
					<p> East 2/7 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($e_2score == $e_7score && $e_2score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_2'");
							$r = mysqli_fetch_array($query);
							$e2team = $r['team'];
							?>
							<td id="<?php echo $e_2; ?>"><?php echo $e2team; ?></td>
							<td><input type="text" name="e27home" placeholder="<?php echo $e_2score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_3score; ?>"></td>
							<?php
							if ($e_3score == $e_6score && $e_3score != NULL) {
							?>
								<td><input type="text" name="e2pks" placeholder="<?php echo $e_2pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_2pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_7'");
							$r = mysqli_fetch_array($query);
							$e7team = $r['team'];
							?>
							<td id="<?php echo $e_7; ?>"><?php echo $e7team; ?></td>
							<td><input type="text" name="e27away" placeholder="<?php echo $e_7score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_7score; ?>"></td>
							<?php
							if ($e_2score == $e_7score && $e_2score != NULL) {
							?>
								<td><input type="text" name="e7pks" placeholder="<?php echo $e_7pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_7pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<div id="east36" class="altable">
					<p> East 3/6 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($e_3score == $e_6score && $e_3score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_3'");
							$r = mysqli_fetch_array($query);
							$e3team = $r['team'];
							?>
							<td id="<?php echo $e_3; ?>"><?php echo $e3team; ?></td>
							<td><input type="text" name="e36home" placeholder="<?php echo $e_3score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_3score; ?>"></td>
							<?php
							if ($e_3score == $e_6score && $e_3score != NULL) {
							?>
								<td><input type="text" name="e3pks" placeholder="<?php echo $e_3pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_3pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_6'");
							$r = mysqli_fetch_array($query);
							$e6team = $r['team'];
							?>
							<td id="<?php echo $e_6; ?>"><?php echo $e6team; ?></td>
							<td><input type="text" name="e36away" placeholder="<?php echo $e_6score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_6score; ?>"></td>
							<?php
							if ($e_3score == $e_6score && $e_3score != NULL) {
							?>
								<td><input type="text" name="e6pks" placeholder="<?php echo $e_6pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_6pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<div id="east45" class="altable">
					<p> East 4/5 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($e_4score == $e_5score && $e_4score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_4'");
							$r = mysqli_fetch_array($query);
							$e4team = $r['team'];
							?>
							<td id="<?php echo $e_4; ?>"><?php echo $e4team; ?></td>
							<td><input type="text" name="e45home" placeholder="<?php echo $e_4score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_4score; ?>"></td>
							<?php
							if ($e_4score == $e_5score && $e_4score != NULL) {
							?>
								<td><input type="text" name="e4pks" placeholder="<?php echo $e_4pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_4pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_5'");
							$r = mysqli_fetch_array($query);
							$e5team = $r['team'];
							?>
							<td id="<?php echo $e_5; ?>"><?php echo $e5team; ?></td>
							<td><input type="text" name="e45away" placeholder="<?php echo $e_5score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_5score; ?>"></td>
							<?php
							if ($e_4score == $e_5score && $e_5score != NULL) {
							?>
								<td><input type="text" name="e5pks" placeholder="<?php echo $e_5pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e_5pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<br>
				<div id="west27" class="nltable">
					<p> West 2/7 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($w_2score == $w_7score && $w_2score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_2'");
							$r = mysqli_fetch_array($query);
							$w2team = $r['team'];
							?>
							<td id="<?php echo $w_2; ?>"><?php echo $w2team; ?></td>
							<td><input type="text" name="w27home" placeholder="<?php echo $w_2score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_2score; ?>"></td>
							<?php
							if ($w_2score == $w_7score && $w_2score != NULL) {
							?>
								<td><input type="text" name="w2pks" placeholder="<?php echo $w_2pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_2pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_7'");
							$r = mysqli_fetch_array($query);
							$w7team = $r['team'];
							?>
							<td id="<?php echo $w_7; ?>"><?php echo $w7team; ?></td>
							<td><input type="text" name="w27away" placeholder="<?php echo $w_7score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_7score; ?>"></td>
							<?php
							if ($w_2score == $w_7score && $w_2score != NULL) {
							?>
								<td><input type="text" name="e7pks" placeholder="<?php echo $w_7pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_7pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<div id="west36" class="nltable">
					<p> West 3/6 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($w_3score == $w_6score && $w_3score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_3'");
							$r = mysqli_fetch_array($query);
							$w3team = $r['team'];
							?>
							<td id="<?php echo $w_3; ?>"><?php echo $w3team; ?></td>
							<td><input type="text" name="w36home" placeholder="<?php echo $w_3score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_3score; ?>"></td>
							<?php
							if ($w_3score == $w_6score && $w_3score != NULL) {
							?>
								<td><input type="text" name="w3pks" placeholder="<?php echo $w_6pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_3pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_6'");
							$r = mysqli_fetch_array($query);
							$w6team = $r['team'];
							?>
							<td id="<?php echo $w_6; ?>"><?php echo $w6team; ?></td>
							<td><input type="text" name="w36away" placeholder="<?php echo $w_6score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_6score; ?>"></td>
							<?php
							if ($w_3score == $w_6score && $w_3score != NULL) {
							?>
								<td><input type="text" name="w6pks" placeholder="<?php echo $w_6pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_6pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<div id="west45" class="nltable">
					<p> West 4/5 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($w_4score == $w_5score && $w_4score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_4'");
							$r = mysqli_fetch_array($query);
							$w4team = $r['team'];
							?>
							<td id="<?php echo $w_4; ?>"><?php echo $w4team; ?></td>
							<td><input type="text" name="w45home" placeholder="<?php echo $w_4score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_4score; ?>"></td>
							<?php
							if ($w_4score == $w_5score && $w_4score != NULL) {
							?>
								<td><input type="text" name="w4pks" placeholder="<?php echo $w_4pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_4pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_5'");
							$r = mysqli_fetch_array($query);
							$w5team = $r['team'];
							?>
							<td id="<?php echo $w_5; ?>"><?php echo $w5team; ?></td>
							<td><input type="text" name="w45away" placeholder="<?php echo $w_5score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_5score; ?>"></td>
							<?php
							if ($w_4score == $w_5score && $w_5score != NULL) {
							?>
								<td><input type="text" name="w5pks" placeholder="<?php echo $w_5pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w_5pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
			</div>
			<div id="confsemis">
				<h3>Conference Semifinals</h3>
				<div id="east14" class="altable">
					<p> East Semifinal #1 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($e1_score == $elo_score && $e1_score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_1'");
							$r = mysqli_fetch_array($query);
							$e1team = $r['team'];
							?>
							<td id="<?php echo $e_1; ?>"><?php echo $e1team; ?></td>
							<td><input type="text" name="e14home" placeholder="<?php echo $e1_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e1_score; ?>"></td>
							<?php
							if ($e1_score == $elo_score && $e1_score != NULL) {
							?>
								<td><input type="text" name="e1pks" placeholder="<?php echo $elo_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e1_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_lo'");
							$r = mysqli_fetch_array($query);
							$eloteam = $r['team'];
							?>
							<td id="<?php echo $e_lo; ?>"><?php echo $eloteam; ?></td>
							<td><input type="text" name="e14away" placeholder="<?php echo $elo_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $elo_score; ?>"></td>
							<?php
							if ($e1_score == $elo_score && $e1_score != NULL) {
							?>
								<td><input type="text" name="elopks" placeholder="<?php echo $elo_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $elo_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<div id="east23" class="altable">
					<p> East Semifinal #2 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($e2hi_score == $ehi_score && $e2hi_score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_2hi'");
							$r = mysqli_fetch_array($query);
							$e2hiteam = $r['team'];
							?>
							<td id="<?php echo $e_2hi; ?>"><?php echo $e2hiteam; ?></td>
							<td><input type="text" name="e23home" placeholder="<?php echo $e2hi_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e2hi_score; ?>"></td>
							<?php
							if ($e2hi_score == $ehi_score && $e2hi_score != NULL) {
							?>
								<td><input type="text" name="e1pks" placeholder="<?php echo $ehi_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $e2_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$e_hi'");
							$r = mysqli_fetch_array($query);
							$ehiteam = $r['team'];
							?>
							<td id="<?php echo $e_hi; ?>"><?php echo $ehiteam; ?></td>
							<td><input type="text" name="e23away" placeholder="<?php echo $ehi_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $ehi_score; ?>"></td>
							<?php
							if ($e2hi_score == $ehi_score && $e2hi_score != NULL) {
							?>
								<td><input type="text" name="ehipks" placeholder="<?php echo $ehi_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $ehi_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<br>
				<div id="west14" class="nltable">
					<p> West Semifinal #1 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($w1_score == $wlo_score && $w1_score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_1'");
							$r = mysqli_fetch_array($query);
							$w1team = $r['team'];
							?>
							<td id="<?php echo $w_1; ?>"><?php echo $w1team; ?></td>
							<td><input type="text" name="w14home" placeholder="<?php echo $w1_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w1_score; ?>"></td>
							<?php
							if ($w1_score == $wlo_score && $w1_score != NULL) {
							?>
								<td><input type="text" name="w1pks" placeholder="<?php echo $wlo_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w1_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_lo'");
							$r = mysqli_fetch_array($query);
							$wloteam = $r['team'];
							?>
							<td id="<?php echo $w_lo; ?>"><?php echo $wloteam; ?></td>
							<td><input type="text" name="w14away" placeholder="<?php echo $wlo_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $wlo_score; ?>"></td>
							<?php
							if ($w1_score == $wlo_score && $w1_score != NULL) {
							?>
								<td><input type="text" name="wlopks" placeholder="<?php echo $wlo_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $wlo_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<div id="west23" class="nltable">
					<p> West Semifinal #2 </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($w2hi_score == $whi_score && $w2hi_score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_2hi'");
							$r = mysqli_fetch_array($query);
							$w2hiteam = $r['team'];
							?>
							<td id="<?php echo $w_2hi; ?>"><?php echo $w2hiteam; ?></td>
							<td><input type="text" name="w23home" placeholder="<?php echo $w2hi_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w2hi_score; ?>"></td>
							<?php
							if ($w2hi_score == $whi_score && $w2hi_score != NULL) {
							?>
								<td><input type="text" name="w1pks" placeholder="<?php echo $whi_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $w2hi_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$w_hi'");
							$r = mysqli_fetch_array($query);
							$whiteam = $r['team'];
							?>
							<td id="<?php echo $w_hi; ?>"><?php echo $whiteam; ?></td>
							<td><input type="text" name="w23away" placeholder="<?php echo $whi_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $whi_score; ?>"></td>
							<?php
							if ($w2hi_score == $whi_score && $w2hi_score != NULL) {
							?>
								<td><input type="text" name="whipks" placeholder="<?php echo $whi_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $whi_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
			</div>
			<div id="conffinals">
				<h3>Conference Finals</h3>
				<div id="eastfinals" class="altable">
					<p>Eastern Conference Finals</p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($easth_score == $easta_score && $easth_score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$easth'");
							$r = mysqli_fetch_array($query);
							$easthteam = $r['team'];
							?>
							<td id="<?php echo $easth; ?>"><?php echo $easthteam; ?></td>
							<td><input type="text" name="easth" placeholder="<?php echo $easth_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $easth_score; ?>"></td>
							<?php
							if ($easth_score == $easta_score && $easth_score != NULL) {
							?>
								<td><input type="text" name="w1pks" placeholder="<?php echo $easta_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $easth_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$easta'");
							$r = mysqli_fetch_array($query);
							$eastateam = $r['team'];
							?>
							<td id="<?php echo $easta; ?>"><?php echo $eastateam; ?></td>
							<td><input type="text" name="easta" placeholder="<?php echo $easta_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $easta_score; ?>"></td>
							<?php
							if ($easth_score == $easta_score && $easth_score != NULL) {
							?>
								<td><input type="text" name="eastapks" placeholder="<?php echo $easta_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $easta_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<br>
				<div id="westfinals" class="nltable">
					<p>Western Conference Finals</p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($westh_score == $westa_score && $westh_score != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$westh'");
							$r = mysqli_fetch_array($query);
							$westhteam = $r['team'];
							?>
							<td id="<?php echo $westh; ?>"><?php echo $westhteam; ?></td>
							<td><input type="text" name="westh" placeholder="<?php echo $westh_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $westh_score; ?>"></td>
							<?php
							if ($westh_score == $westa_score && $westh_score != NULL) {
							?>
								<td><input type="text" name="w1pks" placeholder="<?php echo $westa_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $westh_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$westa'");
							$r = mysqli_fetch_array($query);
							$westateam = $r['team'];
							?>
							<td id="<?php echo $westa; ?>"><?php echo $westateam; ?></td>
							<td><input type="text" name="westa" placeholder="<?php echo $westa_score; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $westa_score; ?>"></td>
							<?php
							if ($westh_score == $westa_score && $westh_score != NULL) {
							?>
								<td><input type="text" name="westapks" placeholder="<?php echo $westa_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $westa_pks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
			</div>
			<div id="mlscup">
				<h3>MLS Cup</h3>
				<div id="mlscup" class="finaltable">
					<p> MLS Cup Final </p>
					<table>
						<tr>
							<th style="width:250px;">Team</th>
							<th style="width:50px;">Score</th>
							<?php
							if ($geast == $gwest && $geast != NULL) {
							?>
								<th style="width:50px;">PKs</th>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$east'");
							$r = mysqli_fetch_array($query);
							$eteam = $r['team'];
							?>
							<td id="<?php echo $east; ?>"><?php echo $eteam; ?></td>
							<td><input type="text" name="eastfinal" placeholder="<?php echo $geast; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $geast; ?>"></td>
							<?php
							if ($geast == $gwest && $geast != NULL) {
							?>
								<td><input type="text" name="eastfinalpk" placeholder="<?php echo $eastpks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $eastpks; ?>"></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<?php
							$query = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$west'");
							$r = mysqli_fetch_array($query);
							$wteam = $r['team'];
							?>
							<td id="<?php echo $west; ?>"><?php echo $wteam; ?></td>
							<td><input type="text" name="westfinal" placeholder="<?php echo $gwest; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $gwest; ?>"></td>
							<?php
							if ($geast == $gwest && $geast != NULL) {
							?>
								<td><input type="text" name="westfinalpk" placeholder="<?php echo $westpks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $westpks; ?>"></td>
							<?php
							}
							?>
						</tr>
					</table>
				</div>
				<br>
			</div>
		</div>
		<div align="center">
			<button type="submit" style="font-family: 'Cambo', Times, serif; margin-left: 40%; margin-right: 40%; width: auto;">Submit</button>
		</div>
	</form>
</body>

</html>
<style>
	body {
		background-color: green;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px black;
		margin: 15px;
	}

	.ui-tabs .ui-tabs-nav {
		background: goldenrod;
		padding-top: 8px;
		border: 1px solid black;
	}

	.ui-state-active a,
	.ui-state-active a:link {
		background: black;
		color: white;
	}

	#mlsplayoffs {
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		margin-bottom: 15px;
	}

	table {
		border-collapse: collapse;
		text-align: center;
	}

	.altable th {
		background-color: red;
		color: white;
	}

	.nltable th {
		background-color: dodgerblue;
		color: white;
	}

	.finaltable th {
		background-color: black;
		color: goldenrod;
	}

	table td,
	th {
		border: 2px solid black;
		padding: 2px;
	}

	button {
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
</style>