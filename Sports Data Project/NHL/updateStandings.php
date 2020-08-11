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
	<title>Update NHL Standings</title>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
	function openTab(evt, tabName) {
		//JavaScript tabs for East/West
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
<h1 align="center"><a href='../NHL' style="text-decoration: none; color:black;">Update NHL Standings</a></h1>
	<div class="tab" align=center>
		<button class="tablinks active" onclick="openTab(event, 'Western')">Western Conference</button>
		<button class="tablinks" onclick="openTab(event, 'Eastern')">Eastern Conference</button>
	</div>
	<form action="processStandings.php" method="post">
		<div id="Western" class="tabcontent" style="display: block;">
			<div clas="tab-container" align="center">
				<h3>Western Conference Standings</h3>
				<div id="west" class="altable">
					<?php
					$nhlwest = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'West' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
					$westrows = mysqli_num_rows($nhlwest);
					?>
					<table>
						<tr>
							<th style="width:200px;">Team</th>
							<th>Wins</th>
							<th>Losses</th>
							<th>OTL</th>
							<th>ROW</th>
							<th>GF</th>
							<th>GA</th>
						</tr>
						<?php
						$i = 1;
						while ($i < $westrows + 1 && $r = mysqli_fetch_array($nhlwest)) {
							$wins = $r['w'];
							$losses = $r['l'];
							$otl = $r['otl'];
							$gf = $r['gf'];
							$ga = $r['ga'];
							$rowins = $r['row'];
							?>
						<tr>
							<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "wins"; ?>" value="<?php echo $r['w']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "losses"; ?>" value="<?php echo $r['l']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "otl"; ?>" value="<?php echo $r['otl']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "rowins"; ?>" value="<?php echo $r['row']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "gf"; ?>" value="<?php echo $r['gf']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "ga"; ?>" value="<?php echo $r['ga']; ?>" style="width:45px; text-align: center;">
							</td>
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
			<div clas="tab-container" align="center">
				<h3>Eastern Conference Standings</h3>
				<div id="east" class="nltable">
					<?php
					$nhleast = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'East' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
					$eastrows = mysqli_num_rows($nhleast);
					?>
					<table>
						<tr>
							<th style="width:200px;">Team</th>
							<th>Wins</th>
							<th>Losses</th>
							<th>OTL</th>
							<th>ROW</th>
							<th>GF</th>
							<th>GA</th>
						</tr>
						<?php
						$i = 1;
						while ($i < $eastrows + 1 && $r = mysqli_fetch_array($nhleast)) {
							$wins = $r['w'];
							$losses = $r['l'];
							$otl = $r['otl'];
							$gf = $r['gf'];
							$ga = $r['ga'];
							$rowins = $r['row'];
							?>
						<tr>
							<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NHL/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "wins"; ?>" value="<?php echo $r['w']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "losses"; ?>" value="<?php echo $r['l']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "otl"; ?>" value="<?php echo $r['otl']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "rowins"; ?>" value="<?php echo $r['row']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "gf"; ?>" value="<?php echo $r['gf']; ?>" style="width:45px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "ga"; ?>" value="<?php echo $r['ga']; ?>" style="width:45px; text-align: center;">
							</td>
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
		<div align="center">
		<button type="submit" style="padding: 5px;">Submit</button>
		</div>
	</form>
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
		/* background-color: chocolate; */
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
		width: 225px;
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
	</style>