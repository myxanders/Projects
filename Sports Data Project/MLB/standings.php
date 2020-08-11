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
	<link rel="stylesheet" type="text/css" href="mlbstyle.css">
	<title>MLB Standings</title>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
	//tabs using javascript
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
	<h1 align="center"><a href='../MLB' style="text-decoration: none; color:white;">MLB Standings</a></h1>
	<div class="tab" align=center>
		<button class="tablinks active" onclick="openTab(event, 'American')">American</button>
		<button class="tablinks" onclick="openTab(event, 'National')">National</button>
		<button class="tablinks" onclick="openTab(event, 'Playoffs')">Playoffs</button>
	</div>
<!--Display standings for AL/NL/Playoff Picture-->
	<div id="American" class="tabcontent" style="display: block;">
		<div class="tab-container" align=center>
			<h3>American League Standings</h3>
			<div id="aleast" class="altable">
				<?php
				$aleast = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'East' ORDER BY pct DESC");
				$aleastrows = mysqli_num_rows($aleast);
				?>
				<p>AL East</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $aleastrows + 1 && $r = mysqli_fetch_array($aleast)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'East' ORDER BY pct DESC");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($gb == 0) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="alcentral" class="altable">
				<?php
				$alcentral = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'Central' ORDER BY pct DESC");
				$alcentralrows = mysqli_num_rows($alcentral);
				?>
				<p>AL Central</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $alcentralrows + 1 && $r = mysqli_fetch_array($alcentral)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'Central' ORDER BY pct DESC");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($gb == 0) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="alwest" class="altable">
				<?php
				$alwest = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'West' ORDER BY pct DESC");
				$alwestrows = mysqli_num_rows($alwest);
				?>
				<p>AL West</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $alwestrows + 1 && $r = mysqli_fetch_array($alwest)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND division = 'West' ORDER BY pct DESC");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($gb == 0) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

	<div id="National" class="tabcontent">
		<div class="tab-container" align=center>
			<h3>National League Standings</h3>
			<div id="nleast" class="nltable">
				<?php
				$nleast = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'East' ORDER BY pct DESC");
				$nleastrows = mysqli_num_rows($nleast);
				?>
				<p>NL East</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$i = 1;
					while ($nleastrows + 1 && $r = mysqli_fetch_array($nleast)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'East' ORDER BY pct DESC");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($gb == 0) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="nlcentral" class="nltable">
				<?php
				$nlcentral = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'Central' ORDER BY pct DESC");
				$nlcentralrows = mysqli_num_rows($nlcentral);
				?>
				<p>NL Central</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $nlcentralrows + 1 && $r = mysqli_fetch_array($nlcentral)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'Central' ORDER BY pct DESC");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($gb == 0) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div id="nlwest" class="nltable">
				<?php
				$nlwest = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'West' ORDER BY pct DESC");
				$nlwestrows = mysqli_num_rows($nlwest);
				?>
				<p>NL West</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$i = 1;
					while ($i < $nlwestrows + 1 && $r = mysqli_fetch_array($nlwest)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND division = 'West' ORDER BY pct DESC");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($gb == 0) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

	<div id="Playoffs" class="tabcontent">
		<div class="tab-container" align=center>
			<h3>Playoff Picture</h3>
			<div id="alplayoffs" class="altable">
				<?php
				$alplayoffpic = mysqli_query($db, "SELECT teamShort,leader,w,l,pct FROM al_leaders ORDER BY pct DESC, leader DESC");
				$numberal = mysqli_num_rows($alplayoffpic);
				$alwcrace = mysqli_query($db, "SELECT teamShort,team,wins,losses,pct FROM mlbteams WHERE league = 'American' AND team NOT IN (SELECT leader FROM al_leaders) ORDER BY pct DESC, team DESC");
				$numberalwc = mysqli_num_rows($alwcrace);
				?>
				<p>American League</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$i = 1;
					$j = 1;
					while ($i <= $numberal && $r = mysqli_fetch_array($alplayoffpic)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$pct = $r['pct'];
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['leader'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td>-</td>
					</tr>
					<?php
						$i++;
					}
					while ($j <= $numberalwc && $r = mysqli_fetch_array($alwcrace)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'American' AND team NOT IN (SELECT leader FROM al_leaders) ORDER BY pct DESC, team DESC LIMIT 1 OFFSET 1");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($j <= 2) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$j++;
					}
					?>
				</table>
			</div>
			<br>
			<div id="nlplayoffs" class="nltable">
				<?php
				$nlplayoffpic = mysqli_query($db, "SELECT teamShort,leader,w,l,pct FROM nl_leaders ORDER BY pct DESC, leader DESC");
				$numbernl = mysqli_num_rows($nlplayoffpic);
				$nlwcrace = mysqli_query($db, "SELECT teamShort,team,wins,losses,pct FROM mlbteams WHERE league = 'National' AND team NOT IN (SELECT leader FROM nl_leaders) ORDER BY pct DESC, team DESC");
				$numbernlwc = mysqli_num_rows($nlwcrace);
				?>
				<p>National League</p>
				<table>
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB.</th>
					</tr>
					<?php
					$i = 1;
					$j = 1;
					while ($i <= $numbernl && $r = mysqli_fetch_array($nlplayoffpic)) {
						$wins = $r['w'];
						$losses = $r['l'];
						$pct = $r['pct'];
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['leader'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td>-</td>
					</tr>
					<?php
						$i++;
					}
					while ($j <= $numbernlwc && $r = mysqli_fetch_array($nlwcrace)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM mlbteams WHERE league = 'National' AND team NOT IN (SELECT leader FROM nl_leaders) ORDER BY pct DESC, team DESC LIMIT 1 OFFSET 1");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($j <= 2) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLB/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $wins . "-" . $losses; ?></td>
						<td><?php echo $pct; ?></td>
						<td><?php echo $gb; ?></td>
					</tr>
					<?php
						$j++;
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
	body {
		background-image: radial-gradient(white, lightgreen, green, darkgreen);
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px chocolate;
		margin: 15px;
	}

	h2 {
		font-size: 30px;
		color: white;
		text-shadow: 2px 2px #ca0913;
	}

	.tab {
		border: 3px solid white;
		background-image: linear-gradient(chocolate, white);
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
		padding: 6px 12px 24px 12px;
		border: 3px solid white;
		border-top: none;
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		background-color: white;
		color: black;
	}

	#mlbstandings {
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
		color: black;
	}

	#alplayoffs tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#alplayoffs tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#alplayoffs tr:nth-child(4) {
		background-color: rgba(0, 255, 0, .2);
	}

	#alplayoffs tr:nth-child(5) {
		background-color: rgba(0, 0, 255, .1);
	}

	#alplayoffs tr:nth-child(6) {
		background-color: rgba(0, 0, 255, .1);
	}


	#nlplayoffs tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#nlplayoffs tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#nlplayoffs tr:nth-child(4) {
		background-color: rgba(0, 255, 0, .2);
	}

	#nlplayoffs tr:nth-child(5) {
		background-color: rgba(0, 0, 255, .1);
	}

	#nlplayoffs tr:nth-child(6) {
		background-color: rgba(0, 0, 255, .1);
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
</style>