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
	<link rel="stylesheet" type="text/css" href="nhlstyle.css">
	<title>NHL Standings</title>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
	function openTab(evt, tabName) {
		//JavaScript tabs for East/West/Playoffs
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

	<h1 align="center"><a href='../NHL' style="text-decoration: none; color:white;">NHL Standings</a></h1>
	<div class="tab" align=center>
		<button class="tablinks active" onclick="openTab(event, 'Western')">Western</button>
		<button class="tablinks" onclick="openTab(event, 'Eastern')">Eastern</button>
		<button class="tablinks" onclick="openTab(event, 'WestPlayoffs')">Western Playoffs</button>
		<button class="tablinks" onclick="openTab(event, 'EastPlayoffs')">Eastern Playoffs</button>
	</div>
	<div id="Western" class="tabcontent" style="display: block;">
		<div class="tab-container" align="center">
			<h3>Western Conference Standings</h3>
			<div id="central" class="altable">
				<?php
				$nhlcentral = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'West' AND division = 'Central' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$centralrows = mysqli_num_rows($nhlcentral);
				?>
				<p>Central Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $centralrows + 1 && $r = mysqli_fetch_array($nhlcentral)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="font-weight: bold;"><?php echo $pts; ?></td>
						<td><?php echo $rowins; ?></td>
						<td><?php echo $gf; ?></td>
						<td><?php echo $ga; ?></td>
						<td><?php echo $gd; ?></td>
						<td><?php echo $pp; ?></td>
						<td><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="pacific" class="altable">
				<?php
				$nhlpacific = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'West' AND division = 'Pacific' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$pacificrows = mysqli_num_rows($nhlpacific);
				?>
				<p>Pacific Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $pacificrows + 1 && $r = mysqli_fetch_array($nhlpacific)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="font-weight: bold;"><?php echo $pts; ?></td>
						<td><?php echo $rowins; ?></td>
						<td><?php echo $gf; ?></td>
						<td><?php echo $ga; ?></td>
						<td><?php echo $gd; ?></td>
						<td><?php echo $pp; ?></td>
						<td><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<div id="Eastern" class="tabcontent">
		<div class="tab-container" align="center">
			<h3>Eastern Conference Standings</h3>
			<div id="metro" class="nltable">
				<?php
				$nhlmet = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'East' AND division = 'Metropolitan' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$metrows = mysqli_num_rows($nhlmet);
				?>
				<p>Metropolitan Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $metrows + 1 && $r = mysqli_fetch_array($nhlmet)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="font-weight: bold;"><?php echo $pts; ?></td>
						<td><?php echo $rowins; ?></td>
						<td><?php echo $gf; ?></td>
						<td><?php echo $ga; ?></td>
						<td><?php echo $gd; ?></td>
						<td><?php echo $pp; ?></td>
						<td><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="atlantic" class="nltable">
				<?php
				$nhlatlantic = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'East' AND division = 'Atlantic' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$atlanticrows = mysqli_num_rows($nhlatlantic);
				?>
				<p>Atlantic Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $atlanticrows + 1 && $r = mysqli_fetch_array($nhlatlantic)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="font-weight: bold;"><?php echo $pts; ?></td>
						<td><?php echo $rowins; ?></td>
						<td><?php echo $gf; ?></td>
						<td><?php echo $ga; ?></td>
						<td><?php echo $gd; ?></td>
						<td><?php echo $pp; ?></td>
						<td><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<!--INSERT PLAYOFF TABS HERE-->
	<div id="WestPlayoffs" class="tabcontent">
		<div class="tab-container" align="center">
			<h3>Western Conference Playoff Picture</h3>
			<div id="cenleaders" class="altable">
				<?php
				$nhlcen = mysqli_query($db, "SELECT * FROM central_leaders ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$cenrows = mysqli_num_rows($nhlcen);
				?>
				<p>Central Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $cenrows + 1 && $r = mysqli_fetch_array($nhlcen)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pts; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $rowins; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gf; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $ga; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gd; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pp; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="pacleaders" class="altable">
				<?php
				$nhlpac = mysqli_query($db, "SELECT * FROM pacific_leaders ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$pacrows = mysqli_num_rows($nhlpac);
				?>
				<p>Pacific Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $pacrows + 1 && $r = mysqli_fetch_array($nhlpac)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pts; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $rowins; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gf; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $ga; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gd; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pp; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="westwc" class="altable">
				<?php
				$nhlwwc = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'West' AND team NOT IN (SELECT team FROM pacific_leaders UNION ALL SELECT team FROM central_leaders) ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$wwcrows = mysqli_num_rows($nhlwwc);
				?>
				<p>Wild Card</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $wwcrows + 1 && $r = mysqli_fetch_array($nhlwwc)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="font-weight: bold;"><?php echo $pts; ?></td>
						<td><?php echo $rowins; ?></td>
						<td><?php echo $gf; ?></td>
						<td><?php echo $ga; ?></td>
						<td><?php echo $gd; ?></td>
						<td><?php echo $pp; ?></td>
						<td><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<div id="EastPlayoffs" class="tabcontent">
		<div class="tab-container" align="center">
			<h3>Eastern Conference Playoff Picture</h3>
			<div id="metleaders" class="nltable">
				<?php
				$nhlmet = mysqli_query($db, "SELECT * FROM metro_leaders ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$metrows = mysqli_num_rows($nhlmet);
				?>
				<p>Metropolitan Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $metrows + 1 && $r = mysqli_fetch_array($nhlmet)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pts; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $rowins; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gf; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $ga; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gd; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pp; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="atlleaders" class="nltable">
				<?php
				$nhlatl = mysqli_query($db, "SELECT * FROM atlantic_leaders ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$atlrows = mysqli_num_rows($nhlatl);
				?>
				<p>Atlantic Division</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $atlrows + 1 && $r = mysqli_fetch_array($nhlatl)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pts; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $rowins; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gf; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $ga; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gd; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $pp; ?></td>
						<td style="background-color: rgba(0,0,255,.1);"><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="eastwc" class="nltable">
				<?php
				$nhlewc = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'East' AND team NOT IN (SELECT team FROM atlantic_leaders UNION ALL SELECT team FROM metro_leaders) ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
				$ewcrows = mysqli_num_rows($nhlewc);
				?>
				<p>Wild Card</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pts</th>
						<th style="width:65px;">ROW</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">PT %</th>
						<th style="width:65px;">GR</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $ewcrows + 1 && $r = mysqli_fetch_array($nhlewc)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$otl = $r['otl'];
						$pts = $r['pts'];
						$gf = $r['gf'];
						$ga = $r['ga'];
						$gd = $r['gd'];
						$rowins = $r['row'];
						$pp = $r['pp'];
						$gr = 82 - ($wins + $losses + $otl);
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses . "-" . $otl; ?></td>
						<td style="font-weight: bold;"><?php echo $pts; ?></td>
						<td><?php echo $rowins; ?></td>
						<td><?php echo $gf; ?></td>
						<td><?php echo $ga; ?></td>
						<td><?php echo $gd; ?></td>
						<td><?php echo $pp; ?></td>
						<td><?php echo $gr; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<br>
	<div align="center" style="margin-bottom: 25px;">
		<button id="update" align="center" onclick="window.location.href='updateStandings.php'">Update Standings</button>
	</div>
</body>

</html>
<style>
	html {
		height: 100%;
	}

	body {
		background-image: linear-gradient(silver, lightskyblue);
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 120px;
		color: black;
		text-shadow: 5px 5px lightskyblue;
		margin: 15px;
	}

	h2 {
		font-size: 30px;
		color: white;
		text-shadow: 2px 2px black;
	}

	.tab {
		border: 3px solid white;
		background-image: linear-gradient(lightskyblue, white);
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
		width: 200px;
	}

	.tab button:hover {
		background-image: linear-gradient(black, white);
		border: none;
		color: yellow;

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
	}

	#nhlstandings {
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		margin-bottom: 15px;
	}

	caption {
		margin-bottom: 5px;
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

	table td,
	th {
		border: 2px solid silver;
		padding: 2px;
	}

	#westwc tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#westwc tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eastwc tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eastwc tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}
</style>