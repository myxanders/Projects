<?php
include("../../session.php");
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";

$phx = "";
$atl = "";
$sac = "";
$bos = "";
$chi = "";
$ind = "";
$cha = "";
$cle = "";
$den = "";
$det = "";
$hou = "";
$uta = "";
$lac = "";
$lal = "";
$mia = "";
$mil = "";
$min = "";
$nyk = "";
$bkn = "";
$gsw = "";
$phi = "";
$por = "";
$mem = "";
$no = "";
$okc = "";
$sas = "";
$orl = "";
$dal = "";
$tor = "";
$was = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['PHX'])) {
		$phx = $_POST['PHX'];
	}

	if (isset($_POST['ATL'])) {
		$atl = $_POST['ATL'];
	}

	if (isset($_POST['SAC'])) {
		$sac = $_POST['SAC'];
	}

	if (isset($_POST['BOS'])) {
		$bos = $_POST['BOS'];
	}

	if (isset($_POST['CHI'])) {
		$chi = $_POST['CHI'];
	}
	if (isset($_POST['IND'])) {
		$ind = $_POST['IND'];
	}
	if (isset($_POST['CHA'])) {
		$cha = $_POST['CHA'];
	}
	if (isset($_POST['CLE'])) {
		$cle = $_POST['CLE'];
	}
	if (isset($_POST['DEN'])) {
		$den = $_POST['DEN'];
	}
	if (isset($_POST['DET'])) {
		$det = $_POST['DET'];
	}
	if (isset($_POST['HOU'])) {
		$hou = $_POST['HOU'];
	}
	if (isset($_POST['UTA'])) {
		$uta = $_POST['UTA'];
	}
	if (isset($_POST['LAC'])) {
		$lac = $_POST['LAC'];
	}
	if (isset($_POST['LAL'])) {
		$lal = $_POST['LAL'];
	}
	if (isset($_POST['MIA'])) {
		$mia = $_POST['MIA'];
	}
	if (isset($_POST['MIL'])) {
		$mil = $_POST['MIL'];
	}
	if (isset($_POST['MIN'])) {
		$min = $_POST['MIN'];
	}
	if (isset($_POST['NYK'])) {
		$nyk = $_POST['NYK'];
	}
	if (isset($_POST['BKN'])) {
		$bkn = $_POST['BKN'];
	}
	if (isset($_POST['GSW'])) {
		$gsw = $_POST['GSW'];
	}
	if (isset($_POST['PHI'])) {
		$phi = $_POST['PHI'];
	}
	if (isset($_POST['POR'])) {
		$por = $_POST['POR'];
	}
	if (isset($_POST['MEM'])) {
		$mem = $_POST['MEM'];
	}
	if (isset($_POST['NO'])) {
		$no = $_POST['NO'];
	}
	if (isset($_POST['OKC'])) {
		$okc = $_POST['OKC'];
	}
	if (isset($_POST['SAS'])) {
		$sas = $_POST['SAS'];
	}
	if (isset($_POST['ORL'])) {
		$orl = $_POST['ORL'];
	}
	if (isset($_POST['DAL'])) {
		$dal = $_POST['DAL'];
	}
	if (isset($_POST['TOR'])) {
		$tor = $_POST['TOR'];
	}
	if (isset($_POST['WAS'])) {
		$was = $_POST['WAS'];
	}

	$sqlh2h = "UPDATE nbateams 
		  SET headtohead = (CASE WHEN teamShort = 'PHX' THEN '$phx'
		   						 WHEN teamShort = 'ATL' THEN '$atl'
		   						 WHEN teamShort = 'SAC' THEN '$sac'
		   						 WHEN teamShort = 'BOS' THEN '$bos'
		   						 WHEN teamShort = 'CHI' THEN '$chi'
		   						 WHEN teamShort = 'IND' THEN '$ind'
		   						 WHEN teamShort = 'CHA' THEN '$cha'
		   						 WHEN teamShort = 'CLE' THEN '$cle'
		   						 WHEN teamShort = 'DEN' THEN '$den'
		   						 WHEN teamShort = 'DET' THEN '$det'
		   						 WHEN teamShort = 'HOU' THEN '$hou'
		   						 WHEN teamShort = 'UTA' THEN '$uta'
		   						 WHEN teamShort = 'LAC' THEN '$lac'
		   						 WHEN teamShort = 'LAL' THEN '$lal'
		   						 WHEN teamShort = 'MIA' THEN '$mia'
		   						 WHEN teamShort = 'MIL' THEN '$mil'
		   						 WHEN teamShort = 'MIN' THEN '$min'
		   						 WHEN teamShort = 'NYK' THEN '$nyk'
		   						 WHEN teamShort = 'BKN' THEN '$bkn'
		   						 WHEN teamShort = 'GSW' THEN '$gsw'
		   						 WHEN teamShort = 'PHI' THEN '$phi'
		   						 WHEN teamShort = 'POR' THEN '$por'
		   						 WHEN teamShort = 'MEM' THEN '$mem'
		   						 WHEN teamShort = 'NO' THEN '$no'
		   						 WHEN teamShort = 'OKC' THEN '$okc'
		   						 WHEN teamShort = 'SAS' THEN '$sas'
		   						 WHEN teamShort = 'ORL' THEN '$orl'
		   						 WHEN teamShort = 'DAL' THEN '$dal'
		   						 WHEN teamShort = 'TOR' THEN '$tor'
		   						 WHEN teamShort = 'WAS' THEN '$was'
		   					END)";


	$updateh2h = mysqli_query($db, $sqlh2h);
}

?>


<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="nbastyle.css">
	<title>NBA Standings</title>
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
	<h1 align="center"><a href='../NBA' style="text-decoration: none; color:white;">NBA Standings</a></h1>
	<div class="tab" align=center>
		<button class="tablinks active" onclick="openTab(event, 'Western')">Western</button>
		<button class="tablinks" onclick="openTab(event, 'Eastern')">Eastern</button>
		<button class="tablinks" onclick="openTab(event, 'Tiebreakers')">Tiebreakers</button>
	</div>

	<div id="Western" class="tabcontent" style="display: block;">
		<div class="tab-container" align="center">
			<div id="westplayoffs" class="altable">
				<?php
				$westrace = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'West' ORDER BY pct DESC, headtohead DESC, team DESC");
				$numwest = mysqli_num_rows($westrace);
				?>
				<h3>Western Conference</h3>
				<table id="west">
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$j = 1;
					while ($j <= $numwest && $r = mysqli_fetch_array($westrace)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'West' ORDER BY pct DESC, team DESC LIMIT 1 OFFSET 1");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($j <= 2) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NBA/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
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
	<div id="Eastern" class="tabcontent">
		<div class="tab-container" align="center">
			<div id="eastplayoffs" class="altable">
				<?php
				$eastrace = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'East' ORDER BY pct DESC, headtohead DESC, team DESC");
				$numeast = mysqli_num_rows($eastrace);
				?>
				<h3>Eastern Conference</h3>
				<table id="east">
					<tr>
						<th style="width:175px;">Team</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">Pct.</th>
						<th style="width:65px;">GB</th>
					</tr>
					<?php
					$j = 1;
					while ($j <= $numeast && $r = mysqli_fetch_array($eastrace)) {
						$wins = $r['wins'];
						$losses = $r['losses'];
						$pct = $r['pct'];
						$sql = mysqli_query($db, "SELECT * FROM nbateams WHERE conference = 'East' ORDER BY pct DESC, team DESC LIMIT 1 OFFSET 1");
						$row = mysqli_fetch_array($sql);
						$top_wins = $row['wins'];
						$top_losses = $row['losses'];
						$gb = (($top_wins - $wins) / 2) + (($losses - $top_losses) / 2);
						if ($j <= 2) {
							$gb = "-";
						}
						?>
					<tr>
						<td id="<?php echo $r['teamShort']; ?>"><img src="../../Assets/NBA/<?php echo $r['teamShort']; ?>.png" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['team'] ?></span></td>
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

	<div id="Tiebreakers" class="tabcontent">
		<div class="tab-container" align="center">
			<h3 align="center">Head to Head Tiebreakers</h3>
			<?php
			$sql = "SELECT teamShort, team, pct, headtohead FROM nbateams WHERE pct IN (SELECT pct FROM (SELECT pct, count(*) as c FROM nbateams WHERE conference = 'West' GROUP BY pct) AS m WHERE c > 1) AND conference = 'West' ORDER BY pct DESC";
			$beep = mysqli_query($db, $sql);
			$boop = mysqli_num_rows($beep);
			?>
			<div id="headtoheadties" style="margin-left: 10%; margin-right: 10%; width: auto;">
				<form action="standings.php" method="post">
					<table class="altable" style="width:40%; vertical-align: top; display: inline-block;">
						<th style="width:100px;">Team</th>
						<th>Pct</th>
						<th>H2H</th>
						</tr>
						<?php
						$i = 1;
						while ($i <= $boop && $b = mysqli_fetch_array($beep)) {
							?>
						<tr>
							<td id="<?php echo $b['teamShort']; ?>"><?php echo $b['team']; ?></td>
							<td><?php echo $b['pct']; ?></td>
							<td align="center">
								<input type="number" name="<?php echo $b['teamShort']; ?>" value="<?php echo $b['headtohead']; ?>" style="width:30px; text-align: center;">
							</td>
						</tr>
						<?php
							$i++;
						}
						?>
					</table>
					<?php
					$sql = "SELECT teamShort, team, pct, headtohead FROM nbateams WHERE pct IN (SELECT pct FROM (SELECT pct, count(*) as c FROM nbateams WHERE conference = 'East' GROUP BY pct) AS m WHERE c > 1) AND conference = 'East' ORDER BY pct DESC";
					$beep = mysqli_query($db, $sql);
					$boop = mysqli_num_rows($beep);
					?>
					<table class="nltable" style="width:40%; vertical-align: top; display: inline-block;">
						<th style="width:100px;">Team</th>
						<th>Pct</th>
						<th>H2H</th>
						</tr>
						<?php
						$i = 1;
						while ($i <= $boop && $b = mysqli_fetch_array($beep)) {
							?>
						<tr>
							<td id="<?php echo $b['teamShort']; ?>"><?php echo $b['team']; ?></td>
							<td><?php echo $b['pct']; ?></td>
							<td align="center">
								<input type="number" name="<?php echo $b['teamShort']; ?>" value="<?php echo $b['headtohead']; ?>" style="width:30px; text-align: center;">
							</td>
						</tr>
						<?php
							$i++;
						}
						?>
					</table>
					<br>
					<div align="center">
						<button type="submit" style="font-family: 'Cambo', Times, serif; padding: 5px;">Submit
						</button>
					</div>
				</form>
				<div align="center">
					<button id="clear" style="font-family: 'Cambo', Times, serif; padding: 5px;" onclick="window.location.href='clearTies.php'">Clear Tiebreakers
					</button>
				</div>
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
		width: 150px;
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

	#west tr:nth-child(2) {
		background-color: rgba(0, 0, 255, .2);
	}

	#west tr:nth-child(3) {
		background-color: rgba(0, 0, 255, .2);
	}

	#west tr:nth-child(4) {
		background-color: rgba(0, 0, 255, .2);
	}

	#west tr:nth-child(5) {
		background-color: rgba(0, 0, 255, .2);
	}

	#west tr:nth-child(6) {
		background-color: rgba(0, 0, 255, .2);
	}

	#west tr:nth-child(7) {
		background-color: rgba(0, 0, 255, .2);
	}

	#west tr:nth-child(8) {
		background-color: rgba(0, 0, 255, .2);
	}

	#west tr:nth-child(9) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(2) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(3) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(4) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(5) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(6) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(7) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(8) {
		background-color: rgba(0, 0, 255, .2);
	}

	#east tr:nth-child(9) {
		background-color: rgba(0, 0, 255, .2);
	}
</style>