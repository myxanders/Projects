<?php
include("../../session.php");
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";
?>
<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="schedulestyle.css">
	<title>NFL Standings</title>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
	//JavaScript tabs for NFC/AFC/playoffs/draft order
	function openTab(evt, tabName) {
		var i, tabcontent, tablinks;

		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}

		document.getElementById(tabName).style.display = "block";
		evt.currentTarget.className += " active";
	}
</script>

<body>

	<h1 align="center"><a href='../NFL' style="text-decoration: none; color: #ca0913;">NFL Standings</a></h1>
	<div class="tab" align=center>
		<!-- Create tabs for displaying different standings tables -->
		<button class="tablinks active" onclick="openTab(event, 'afcstandings')">AFC</button>
		<button class="tablinks" onclick="openTab(event, 'nfcstandings')">NFC</button>
		<button class="tablinks" onclick="openTab(event, 'playoffstandings')">Playoffs</button>
		<button class="tablinks" onclick="openTab(event,'draftorder')">Draft Order</button>
	</div>
	<div id="afcstandings" class="tabcontent" style="display: block;">
		<div align="center">
			<h3>AFC Standings</h3>
			<div id="afcn" class="afctable">
				<?php
				$afcn = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'AFC' AND division = 'North' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$afcnrows = mysqli_num_rows($afcn);
				?>
				<p>AFC North</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $afcnrows + 1 && $r = mysqli_fetch_array($afcn)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="afcs" class="afctable">
				<?php
				$afcs = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'AFC' AND division = 'South' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$afcsrows = mysqli_num_rows($afcs);
				?>
				<p>AFC South</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $afcsrows + 1 && $r = mysqli_fetch_array($afcs)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="afce" class="afctable">
				<?php
				$afce = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'AFC' AND division = 'East' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$afcerows = mysqli_num_rows($afce);
				?>
				<p>AFC East</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $afcerows + 1 && $r = mysqli_fetch_array($afce)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="afcw" class="afctable">
				<?php
				$afcw = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'AFC' AND division = 'West' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$afcwrows = mysqli_num_rows($afcs);
				?>
				<p>AFC West</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $afcwrows + 1 && $r = mysqli_fetch_array($afcw)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<div id="nfcstandings" class="tabcontent">
		<div align="center">
			<h3>NFC Standings</h3>
			<div id="nfcs" class="nfctable">
				<?php
				$nfcn = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'North' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$nfcnrows = mysqli_num_rows($nfcn);
				?>
				<p>NFC North</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $nfcnrows + 1 && $r = mysqli_fetch_array($nfcn)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="nfcs" class="nfctable">
				<?php
				$nfcs = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'South' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$nfcsrows = mysqli_num_rows($nfcs);
				?>
				<p>NFC South</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $nfcsrows + 1 && $r = mysqli_fetch_array($nfcs)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="nfce" class="nfctable">
				<?php
				$nfce = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'East' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$nfcerows = mysqli_num_rows($nfce);
				?>
				<p>NFC East</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $nfcerows + 1 && $r = mysqli_fetch_array($nfce)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="nfcw" class="nfctable">
				<?php
				$nfcw = mysqli_query($db, "SELECT * FROM nflteams WHERE conference = 'NFC' AND division = 'West' ORDER BY pct DESC, headtohead DESC, divpct DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$nfcwrows = mysqli_num_rows($nfcw);
				?>
				<p>NFC West</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Div</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">Home</th>
						<th style="width:45px;">Away</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $nfcwrows + 1 && $r = mysqli_fetch_array($nfcw)) {
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($r['ties'] == 0) {
									echo $r['wins'] . "-" . $r['losses'];
								} else {
									echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $r['divw'] . "-" . $r['divl']; ?></td>
						<td><?php echo $r['confw'] . "-" . $r['confl']; ?></td>
						<td><?php echo $r['homew'] . "-" . $r['homel']; ?></td>
						<td><?php echo $r['awayw'] . "-" . $r['awayl']; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<div id="playoffstandings" class="tabcontent">
		<div align="center">
			<h3>Playoff Picture</h3>
			<div id="afcplayoffs" class="afctable">

				<?php
				$afcplayoffpic = mysqli_query($db, "SELECT leader,w,l,t,pct,confpct,headtohead,sov,sos,pf,pa,pd FROM afcleaders ORDER BY pct DESC, headtohead DESC, confpct DESC, sov DESC, sos DESC, l ASC");
				$numberafc = mysqli_num_rows($afcplayoffpic);
				$afcwcrace = mysqli_query($db, "SELECT team,wins,losses,ties,pct,confpct,headtohead,sov,sos,points,against,diff FROM nflteams WHERE conference = 'AFC' AND team NOT IN (SELECT leader FROM afcleaders)ORDER BY pct DESC, headtohead DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$numberafcwc = mysqli_num_rows($afcwcrace);
				?>
				<p>AFC</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">SOV</th>
						<th style="width:45px;">SOS</th>
					</tr>
					<?php
					$i = 1;
					$j = 1;
					while ($i <= $numberafc && $r = mysqli_fetch_array($afcplayoffpic)) {
						?>
					<tr><?php
							$team = $r['leader'];
							$que = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$team'");
							$q = mysqli_fetch_array($que);
							?>
						<td id="<?php echo $q['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $q['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($q['ties'] == 0) {
									echo $q['wins'] . "-" . $q['losses'];
								} else {
									echo $q['wins'] . "-" . $q['losses'] . "-" . $q['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['pf']; ?></td>
						<td><?php echo $r['pa']; ?></td>
						<td><?php echo $r['pd']; ?></td>
						<td><?php echo $q['confw'] . "-" . $q['confl']; ?></td>
						<td><?php echo $r['sov']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
						$i++;
					}
					while ($j <= $numberafcwc && $r = mysqli_fetch_array($afcwcrace)) {
						?>
					<tr><?php
							$team = $r['team'];
							$que = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$team'");
							$q = mysqli_fetch_array($que);
							?>
						<td id="<?php echo $q['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $q['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($q['ties'] == 0) {
									echo $q['wins'] . "-" . $q['losses'];
								} else {
									echo $q['wins'] . "-" . $q['losses'] . "-" . $q['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $q['confw'] . "-" . $q['confl']; ?></td>
						<td><?php echo $r['sov']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
						$j++;
					}
					?>
				</table>
			</div>
			<br>
			<div id="nfcplayoffs" class="nfctable">
				<?php
				$nfcplayoffpic = mysqli_query($db, "SELECT leader,w,l,t,pct,confpct,headtohead,sov,sos,pf,pa,pd FROM nfcleaders ORDER BY pct DESC, headtohead DESC, confpct DESC, sov DESC, sos DESC, l ASC");
				$numbernfc = mysqli_num_rows($nfcplayoffpic);
				$nfcwcrace = mysqli_query($db, "SELECT team,wins,losses,ties,pct,confpct,headtohead,sov,sos,points,against,diff FROM nflteams WHERE conference = 'NFC' AND team NOT IN (SELECT leader FROM nfcleaders)ORDER BY pct DESC, headtohead DESC, confpct DESC, losses ASC, sov DESC, sos DESC");
				$numbernfcwc = mysqli_num_rows($nfcwcrace);
				?>
				<p>NFC</p>
				<table>
					<tr>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">PF</th>
						<th style="width:50px;">PA</th>
						<th style="width:50px;">PD</th>
						<th style="width:45px;">Conf</th>
						<th style="width:45px;">SOV</th>
						<th style="width:45px;">SOS</th>
					</tr>
					<?php
					$i = 1;
					$j = 1;
					while ($i <= $numbernfc && $r = mysqli_fetch_array($nfcplayoffpic)) {
						?>
					<tr><?php
							$team = $r['leader'];
							$que = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$team'");
							$q = mysqli_fetch_array($que);
							?>
						<td id="<?php echo $q['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $q['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($q['ties'] == 0) {
									echo $q['wins'] . "-" . $q['losses'];
								} else {
									echo $q['wins'] . "-" . $q['losses'] . "-" . $q['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['pf']; ?></td>
						<td><?php echo $r['pa']; ?></td>
						<td><?php echo $r['pd']; ?></td>
						<td><?php echo $q['confw'] . "-" . $q['confl']; ?></td>
						<td><?php echo $r['sov']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
						$i++;
					}
					while ($j <= $numbernfcwc && $r = mysqli_fetch_array($nfcwcrace)) {
						?>
					<tr><?php
							$team = $r['team'];
							$que = mysqli_query($db, "SELECT * FROM nflteams WHERE team = '$team'");
							$q = mysqli_fetch_array($que);
							?>
						<td id="<?php echo $q['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $q['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
								if ($q['ties'] == 0) {
									echo $q['wins'] . "-" . $q['losses'];
								} else {
									echo $q['wins'] . "-" . $q['losses'] . "-" . $q['ties'];
								}
								?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['against']; ?></td>
						<td><?php echo $r['diff']; ?></td>
						<td><?php echo $q['confw'] . "-" . $q['confl']; ?></td>
						<td><?php echo $r['sov']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
						$j++;
					}
					?>
				</table>
			</div>
		</div>
		<br>
		<div align="center">
			<button id="update" align="center" style="font-family: 'Cambo', Times, serif;" onclick="window.location.href='playoffs.php'"> Playoff Bracket </button>
		</div>
	</div>
	<div id="draftorder" class="tabcontent">
		<div align="center">
			<h3>Draft Order</h3>
			<?php
			if (date('n') > 8 && date('n') <= 12) {
				?>
			<p>Draft order will be available when the regular season ends.</p>
			<?php
			} else {
				?>
			<div id="draft" class="nfctable">
				<!-- Draft order is not a simple reverse-order standing. 
					 First we take reverse standings with weakest SOS first.
					 Then we add on playoff losers round by round with same tiebreakers.-->
				<?php
					$draftsql = mysqli_query($db, "SELECT * FROM nflteams WHERE teamShort NOT IN (SELECT hometeam FROM nflweek18 UNION SELECT awayteam FROM nflweek18 UNION SELECT hometeam FROM nflweek19) ORDER BY pct ASC, sos ASC, tid ASC");
					$numberdraft = mysqli_num_rows($draftsql);
					?>
				<table style="display:inline-block;">
					<tr>
						<th style="width:30px;">Pick</th>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">SOS</th>
					</tr>
					<?php
						$i = 1;
						while ($i <= $numberdraft && $r = mysqli_fetch_array($draftsql)) {
							?>
					<tr>
						<td><?php echo $i; ?></td>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
									if ($r['ties'] == 0) {
										echo $r['wins'] . "-" . $r['losses'];
									} else {
										echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
									}
									?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
							$i++;
						}
						?>
				</table>
				<table style="display:inline-block; vertical-align: top;">
					<tr>
						<th style="width:30px;">Pick</th>
						<th style="width:100px;">Team</th>
						<th>Record</th>
						<th style="width:50px;">Pct.</th>
						<th style="width:50px;">SOS</th>
					</tr>
					<?php
						$draftsql = mysqli_query($db, "SELECT * FROM nflteams WHERE teamShort IN (SELECT hometeam FROM nflweek18 UNION SELECT awayteam FROM nflweek18) AND teamShort NOT IN (SELECT hometeam FROM nflweek19 UNION SELECT awayteam FROM nflweek19) ORDER BY pct ASC, sos ASC, tid ASC");
						$numberdraft = mysqli_num_rows($draftsql);
						$i = 1;
						while ($i <= $numberdraft && $r = mysqli_fetch_array($draftsql)) {
							?>
					<tr>
						<td><?php echo 18 + $i; ?></td>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
									if ($r['ties'] == 0) {
										echo $r['wins'] . "-" . $r['losses'];
									} else {
										echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
									}
									?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
							$i++;
						}
						$draftsql = mysqli_query($db, "SELECT * FROM nflteams WHERE teamShort IN (SELECT hometeam FROM nflweek19 UNION SELECT awayteam FROM nflweek19) AND teamShort NOT IN (SELECT hometeam FROM nflweek20 UNION SELECT awayteam FROM nflweek20) ORDER BY pct ASC, sos ASC, tid ASC");
						$numberdraft = mysqli_num_rows($draftsql);
						$i = 1;
						while ($i <= $numberdraft && $r = mysqli_fetch_array($draftsql)) {
							?>
					<tr>
						<td><?php echo 24 + $i; ?></td>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
									if ($r['ties'] == 0) {
										echo $r['wins'] . "-" . $r['losses'];
									} else {
										echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
									}
									?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
							$i++;
						}
						$draftsql = mysqli_query($db, "SELECT * FROM nflteams WHERE teamShort IN (SELECT hometeam FROM nflweek20 UNION SELECT awayteam FROM nflweek20) AND teamShort NOT IN (SELECT nfcteam FROM nflweek21 UNION SELECT afcteam FROM nflweek21) ORDER BY pct ASC, sos ASC, tid ASC");
						$numberdraft = mysqli_num_rows($draftsql);
						$i = 1;
						while ($i <= $numberdraft && $r = mysqli_fetch_array($draftsql)) {
							?>
					<tr>
						<td><?php echo 28 + $i; ?></td>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
									if ($r['ties'] == 0) {
										echo $r['wins'] . "-" . $r['losses'];
									} else {
										echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
									}
									?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
							$i++;
						}

						$sql = mysqli_query($db, "SELECT * FROM nflweek21");
						$q = mysqli_fetch_array($sql);
						$loser = NULL;
						$winner = NULL;
						if ($q['nfcscore'] > $q['afcscore']) {
							$winner = $q['nfcteam'];
							$loser = $q['afcteam'];
						} elseif ($q['afcscore'] > $q['nfcscore']) {
							$winner = $q['afcteam'];
							$loser = $q['nfcteam'];
						}
						if ($loser != NULL) {
							$draftsql = mysqli_query($db, "SELECT * FROM nflteams WHERE teamShort = '$loser'");
							$numberdraft = mysqli_num_rows($draftsql);
							$i = 1;
							while ($i <= $numberdraft && $r = mysqli_fetch_array($draftsql)) {
								?>
					<tr>
						<td>31</td>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
										if ($r['ties'] == 0) {
											echo $r['wins'] . "-" . $r['losses'];
										} else {
											echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
										}
										?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
								$i++;
							}
						}
						if ($winner != NULL) {
							$draftsql = mysqli_query($db, "SELECT * FROM nflteams WHERE teamShort = '$winner'");
							$numberdraft = mysqli_num_rows($draftsql);
							$i = 1;
							while ($i <= $numberdraft && $r = mysqli_fetch_array($draftsql)) {
								?>
					<tr>
						<td>32</td>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NFL/<?php echo $r['teamShort']; ?>type.png" width=88px height=22px /></td>
						<td><?php
										if ($r['ties'] == 0) {
											echo $r['wins'] . "-" . $r['losses'];
										} else {
											echo $r['wins'] . "-" . $r['losses'] . "-" . $r['ties'];
										}
										?>
						</td>
						<td><?php echo $r['pct']; ?></td>
						<td><?php echo $r['sos']; ?></td>
					</tr>
					<?php
								$i++;
							}
						}
						?>
				</table>
			</div>
			<?php
			}
			?>
		</div>
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
		font-size: 120px;
		color: #ca0913;
		text-shadow: 5px 5px white;
		margin: 15px;
	}

	h2 {
		font-size: 30px;
		color: white;
		text-shadow: 2px 2px #ca0913;
	}

	.tab {
		border: 3px solid white;
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
	.tab button {
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 20px;
		background-image: linear-gradient(darkgrey, black);
		color: white;
		margin: 2px;
		width: 150px;
	}
	.tab button:hover {
		background-image: linear-gradient(black, white);

	}
	.tab button.active {
		background-image: none;
		background-color: white;
		color: black;

	}
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
		margin-bottom: 25px;
	}

	caption {
		margin-bottom: 5px;
	}

	table {
		border-collapse: collapse;
		text-align: center;
	}

	#afcplayoffs tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#afcplayoffs tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#afcplayoffs tr:nth-child(4) {
		background-color: rgba(0, 255, 0, .2);
	}

	#afcplayoffs tr:nth-child(5) {
		background-color: rgba(0, 255, 0, .2);
	}

	#afcplayoffs tr:nth-child(6) {
		background-color: rgba(0, 0, 255, .1);
	}

	#afcplayoffs tr:nth-child(7) {
		background-color: rgba(0, 0, 255, .1);
	}

	#afcplayoffs tr:nth-child(8) {
		background-color: rgba(0, 0, 255, .1);
	}

	#nfcplayoffs tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#nfcplayoffs tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#nfcplayoffs tr:nth-child(4) {
		background-color: rgba(0, 255, 0, .2);
	}

	#nfcplayoffs tr:nth-child(5) {
		background-color: rgba(0, 255, 0, .2);
	}

	#nfcplayoffs tr:nth-child(6) {
		background-color: rgba(0, 0, 255, .1);
	}

	#nfcplayoffs tr:nth-child(7) {
		background-color: rgba(0, 0, 255, .1);
	}

	#nfcplayoffs tr:nth-child(8) {
		background-color: rgba(0, 0, 255, .1);
	}	

	.afctable th {
		background-color: red;
		color: white;
	}

	.nfctable th {
		background-color: dodgerblue;
		color: white;
	}

	table td,
	th {
		border: 2px solid silver;
		padding: 2px;
	}

	img {
		padding: 3px;
	}
</style>