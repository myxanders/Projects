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
	<link rel="stylesheet" type="text/css" href="mlsstyle.css">
	<title>MLS Table</title>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
	function openTab(evt, tabName) {
		//Tabs for East/West
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

	<h1 align="center"><a href='../MLS' style="text-decoration: none; color:white;">MLS Standings</a></h1>
	<div class="tab" align="center">
		<button class="tablinks active" onclick="openTab(event, 'Western')">Western Conference</button>
		<button class="tablinks" onclick="openTab(event, 'Eastern')">Eastern Conference</button>
	</div>
	<div class="tabcontent" id="Western" style="display:block;">
		<div class="tab-container" align="center">
			<h3>Western Conference Table</h3>
			<div id="west" class="nltable">
				<?php
				$west = mysqli_query($db, "SELECT * FROM mlsteams WHERE conference = 'West' ORDER BY points DESC, wins DESC, gd DESC, gf DESC, location ASC");
				$westrows = mysqli_num_rows($west);
				?>
				<table id="weststandings">
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:65px;">Points</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">Rem.</th>
					</tr>
					<?php
					$i = 1;
					while ($i <= $westrows && $r = mysqli_fetch_array($west)) {
						$rem = 34 - $r['wins'] - $r['losses'] - $r['draws'];
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLS/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['wins'] . "-" . $r['draws'] . "-" . $r['losses']; ?></td>
						<td><?php echo $r['gf']; ?></td>
						<td><?php echo $r['ga']; ?></td>
						<td><?php echo $r['gd']; ?></td>
						<td><?php echo $rem; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>	
	<div class="tabcontent" id="Eastern">
		<div class="tab-container" align="center">
			<h3>Eastern Conference Table</h3>
			<div id="east" class="altable">
				<?php
				$east = mysqli_query($db, "SELECT * FROM mlsteams WHERE conference = 'East' ORDER BY points DESC, wins DESC, gd DESC, gf DESC, location ASC");
				$eastrows = mysqli_num_rows($east);
				?>
				<table id="eaststandings">
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:65px;">Points</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">Rem.</th>
					</tr>
					<?php
					$i = 1;
					while ($i <= $eastrows && $r = mysqli_fetch_array($east)) {
						$rem = 34 - $r['wins'] - $r['losses'] - $r['draws'];
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/MLS/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
						<td><?php echo $r['points']; ?></td>
						<td><?php echo $r['wins'] . "-" . $r['draws'] . "-" . $r['losses']; ?></td>
						<td><?php echo $r['gf']; ?></td>
						<td><?php echo $r['ga']; ?></td>
						<td><?php echo $r['gd']; ?></td>
						<td><?php echo $rem; ?></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>

</html>
<style>
	body {
		background-color: #228200;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px black;
		margin: 15px;
	}

	h2 {
		font-size: 30px;
		color: white;
		text-shadow: 2px 2px #ca0913;
	}

	.tab {
		border: 3px solid white;
		background-image: linear-gradient(darkgreen, white);
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
		padding: 15px 6px 15px 6px;
		text-align: center;
		transition: 0.3s;
		font-size: 18px;
		background-image: linear-gradient(black, darkgoldenrod);
		color: white;
		margin: 2px;
		width: 225px;
	}

	.tab button:hover {
		background-image: linear-gradient(black, white);
		color: yellow;
		border: none;

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
		margin-bottom: 30px;
	}

	#mlsstandings {
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

	#eaststandings tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eaststandings tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eaststandings tr:nth-child(4) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eaststandings tr:nth-child(5) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eaststandings tr:nth-child(6) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eaststandings tr:nth-child(7) {
		background-color: rgba(0, 255, 0, .2);
	}

	#eaststandings tr:nth-child(8) {
		background-color: rgba(0, 255, 0, .2);
	}

	#weststandings tr:nth-child(2) {
		background-color: rgba(0, 255, 0, .2);
	}

	#weststandings tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#weststandings tr:nth-child(4) {
		background-color: rgba(0, 255, 0, .2);
	}

	#weststandings tr:nth-child(5) {
		background-color: rgba(0, 255, 0, .2);
	}

	#weststandings tr:nth-child(6) {
		background-color: rgba(0, 255, 0, .2);
	}

	#weststandings tr:nth-child(7) {
		background-color: rgba(0, 255, 0, .2);
	}

	#weststandings tr:nth-child(8) {
		background-color: rgba(0, 255, 0, .2);
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
		border: 2px solid black;
		padding: 2px;
	}
</style>