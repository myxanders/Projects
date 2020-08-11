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
	<link rel="stylesheet" type="text/css" href="nbastyle.css">
	<title>Update NBA Standings</title>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
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

<body>
	<h1 align="center"><a href='../NBA' style="text-decoration: none; color:white;">Update NBA Standings</a></h1>
	<div class="tab" align=center>
		<button class="tablinks active" onclick="openTab(event, 'Western')">Western Conference</button>
		<button class="tablinks" onclick="openTab(event, 'Eastern')">Eastern Conference</button>
	</div>
	<form action="processStandings.php" method="post">
		<div id="Western" class="tabcontent" style="display: block;">
			<div class="tab-container" align=center>
				<h3>Western Conference Standings</h3>
				<div id="aleast" class="altable">
					<?php
					$aleast = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'West' ORDER BY pct DESC, team DESC");
					$aleastrows = mysqli_num_rows($aleast);
					?>
					<table>
						<tr>
							<th style="width:200px;">Team</th>
							<th style="width: 75px;">Wins</th>
							<th style="width: 75px;">Losses</th>
						</tr>
						<?php
						$i = 1;
						while ($i < $aleastrows + 1 && $r = mysqli_fetch_array($aleast)) {
							?>
						<tr>
							<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NBA/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "wins"; ?>" value="<?php echo $r['wins']; ?>" style="width:60px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "losses"; ?>" value="<?php echo $r['losses']; ?>" style="width:60px; text-align: center;">
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
			<div class="tab-container" align=center>
				<h3>Eastern Conference Standings</h3>
				<div id="aleast" class="altable">
					<?php
					$aleast = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'East' ORDER BY pct DESC, team DESC");
					$aleastrows = mysqli_num_rows($aleast);
					?>
					<table>
						<tr>
							<th style="width:200px;">Team</th>
							<th style="width: 75px;">Wins</th>
							<th style="width: 75px;">Losses</th>
						</tr>
						<?php
						$i = 1;
						while ($i < $aleastrows + 1 && $r = mysqli_fetch_array($aleast)) {
							?>
						<tr>
							<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NBA/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "wins"; ?>" value="<?php echo $r['wins']; ?>" style="width:60px; text-align: center;">
							</td>
							<td align="center">
								<input type="number" name="<?php echo $r['teamShort'] . "losses"; ?>" value="<?php echo $r['losses']; ?>" style="width:60px; text-align: center;">
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
		<div align=center><button type="submit" id="update" align=center>Submit</button></div>
	</form>
</body>

</html>
<style>
	html {
		height: 100%;
	}

	body {
		background-image: linear-gradient(firebrick, black);
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px darkblue;
		margin: 15px;
	}

	h2 {
		font-size: 30px;
		color: white;
		text-shadow: 2px 2px #ca0913;
	}

	.tab {
		border: 3px solid white;
		/* background-color: chocolate; */
		background-image: linear-gradient(darkblue, white);
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
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 20px;
		background-image: linear-gradient(black, chocolate);
		color: white;
		margin: 2px;
		width: 225px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-image: linear-gradient(chocolate, white);

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

	#nbastandings {
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