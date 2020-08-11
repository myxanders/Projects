<?php
include("../../../session.php");
include("../../../eflsidenav.php");
//Variables for new lines and spaces make it easier for concatenation
$n = "<br>";
$sp = "&nbsp";
//Initialize the week number and create a variable that refers to schedule tables
$wknum = 1;
$wk = "champ". $wknum;
//Initialize empty score variables


//If the submit button is pressed
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	 	//Assigns the week ID to the wknum variable
	 	$wknum = $_POST['wk'];
	 	//Assigns the nfl schedule table to a variable for easier concatenation in sql statements
	 	$wk = "champ" . $wknum; 
	 	$i=0;
	 	 	//Checking if a score is assigned to each team, otherwise keep the value empty
	 	$sql = mysqli_query($db, "SELECT * FROM $wk");
		$games = mysqli_num_rows($sql);
	 	while ($i <= $games && $r=mysqli_fetch_array($sql)){
			$homename = "home" . $i;
	 		$awayname = "away" . $i;
	 		$homegoals = $r['HomeScore'];
	 		$awaygoals = $r['AwayScore'];
	 		$homesquad = $r['Home'];
	 		$awaysquad = $r['Away'];
	 		$hsched = $homesquad . "_schedule";
	 		$asched = $awaysquad . "_schedule";
	 		$weekid = $wknum;
	 		$gameid = $r['index'];
		 	if(isset($_POST[$homename])){
				 $homescore = $_POST[$homename];
		 	}
		 	if(isset($_POST[$awayname])){
		 		$awayscore = $_POST[$awayname];
		 	} 	
		 	if ($homegoals == $homescore && $awaygoals == $awayscore){
		 		//Don't do anything
		 	}
		 	else if ($homegoals == $homescore || $awaygoals == $awayscore){
		 		mysqli_query($db, "UPDATE `$hsched` SET gf = $homescore, ga = $awayscore WHERE week = '$weekid' AND game = '$gameid'");
		 		mysqli_query($db, "UPDATE `$asched` SET gf = $awayscore, ga = $homescore WHERE week = '$weekid' AND game = '$gameid'");
		 		mysqli_query($db, "UPDATE $wk SET HomeScore = $homescore, AwayScore = $awayscore WHERE `$wk`.`index` = $gameid");
				 	if ($homescore > $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$hsched` SET result = 'W' WHERE week = '$weekid' AND game = '$gameid'");
				 		$final = mysqli_query($db, "UPDATE `$asched` SET result = 'L' WHERE week = '$weekid' AND game = '$gameid'");
				 	}
				 	if ($homescore < $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$hsched` SET result = 'L' WHERE week = '$weekid' AND game = '$gameid'");
				 		$final = mysqli_query($db, "UPDATE `$asched` SET result = 'W' WHERE week = '$weekid' AND game = '$gameid'");
				 	}
				 	if ($homescore == $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$hsched` SET result = 'D' WHERE week = '$weekid' AND game = '$gameid'");
				 		$final = mysqli_query($db, "UPDATE `$asched` SET result = 'D' WHERE week = '$weekid' AND game = '$gameid'");
				 	}	

		 	}
		 	else {
		 		$hschedsql = mysqli_query($db, "INSERT INTO `$hsched`(`week`, `game`, `opponent`, `gf`, `ga`) VALUES ('$weekid','$gameid','$awaysquad', $homescore, $awayscore)");
				 	if ($homescore > $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$hsched` SET result = 'W' WHERE week = '$weekid' AND game = '$gameid'");
				 	}
				 	if ($homescore < $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$hsched` SET result = 'L' WHERE week = '$weekid' AND game = '$gameid'");
				 	}
				 	if ($homescore == $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$hsched` SET result = 'D' WHERE week = '$weekid' AND game = '$gameid'");
				 	}				 					 	
		 		$hschedsql = mysqli_query($db, "INSERT INTO `$asched`(`week`, `game`, `opponent`, `gf`, `ga`) VALUES ('$weekid','$gameid','$homesquad', $awayscore, $homescore)");
				 	if ($homescore < $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$asched` SET result = 'W' WHERE week = '$weekid' AND game = '$gameid'");
				 	}
				 	if ($homescore > $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$asched` SET result = 'L' WHERE week = '$weekid' AND game = '$gameid'");
				 	}
				 	if ($homescore == $awayscore){
				 		$final = mysqli_query($db, "UPDATE `$asched` SET result = 'D' WHERE week = '$weekid' AND game = '$gameid'");
				 	}			 				 			 		
		 		$upd = mysqli_query($db, "UPDATE $wk SET HomeScore = $homescore, AwayScore = $awayscore WHERE `$wk`.`index` = $gameid");
		 	}

		 	$i++;
		}
	}

	$wld = mysqli_query($db, "SELECT * FROM efl_clubs WHERE league = 'Championship'");
	for($i=1; $i<=24; $i++){
		$q = mysqli_fetch_array($wld);
		$tsho = $q['teamShort'];
		$tsched = $tsho . "_schedule";
		$wtotal = mysqli_query($db, "SELECT game, COUNT(*) FROM $tsched WHERE result = 'W'");
		$r = mysqli_fetch_array($wtotal);
		$w = $r['COUNT(*)'];
		$ltotal = mysqli_query($db, "SELECT game, COUNT(*) FROM $tsched WHERE result = 'L'");
		$s = mysqli_fetch_array($ltotal);
		$l = $s['COUNT(*)'];		
		$dtotal = mysqli_query($db, "SELECT game, COUNT(*) FROM $tsched WHERE result = 'D'");
		$t = mysqli_fetch_array($dtotal);
		$d = $t['COUNT(*)'];
		$pts = (3*$w)+$d;
		$gfsql = mysqli_query($db, "SELECT SUM(gf), SUM(ga) FROM $tsched");
		if (!$gfsql){
			$gf = 0;
			$ga = 0;
		}
		else {
			$x = mysqli_fetch_array($gfsql);
			$gf = $x['SUM(gf)'];
			$ga = $x['SUM(ga)'];
		}
		
		$gd = $gf - $ga;
		//echo $tsho . ": (" . $pts . ") " . $w . "-" . $d . "-" . $l . " ... " . $gf . "-" . $ga . "==> " . $gd . $n;
		mysqli_query($db, "UPDATE efl_clubs SET wins = $w, losses = $l, draws = $d, pts = $pts, gf = $gf, ga = $ga, gd = $gd WHERE teamShort = '$tsho'");		
	}

	$standing = mysqli_query($db, "SELECT * FROM efl_clubs WHERE league = 'Championship' ORDER BY pts DESC, gd DESC, gf DESC, nickname ASC");
	$j = 1;
	while($j <= mysqli_num_rows($standing) && $st = mysqli_fetch_array($standing)){
		if ($j == 1){
			$tsho = $st['teamShort'];
			$moop = mysqli_query($db, "UPDATE efl_prorel SET champpro = '$tsho' WHERE `rank` = 1");
		}
		elseif ($j == 2){
			$tsho = $st['teamShort'];
			$moop = mysqli_query($db, "UPDATE efl_prorel SET champpro = '$tsho' WHERE `rank` = 2");
		}
		elseif ($j == 3){
			$tsho = $st['teamShort'];
			mysqli_query($db, "UPDATE efl_playoff_semis SET home = '$tsho' WHERE match_id = 'champ36'");
		}
		elseif ($j == 4){
			$tsho = $st['teamShort'];
			mysqli_query($db, "UPDATE efl_playoff_semis SET home = '$tsho' WHERE match_id = 'champ45'");
		}
		elseif ($j == 5){
			$tsho = $st['teamShort'];
			mysqli_query($db, "UPDATE efl_playoff_semis SET away = '$tsho' WHERE match_id = 'champ45'");
		}
		elseif ($j == 6){
			$tsho = $st['teamShort'];
			mysqli_query($db, "UPDATE efl_playoff_semis SET away = '$tsho' WHERE match_id = 'champ36'");
		}
		elseif ($j == 22){
			$tsho = $st['teamShort'];
			$moop = mysqli_query($db, "UPDATE efl_prorel SET champrel = '$tsho' WHERE `rank` = 1");
		}
		elseif ($j == 23){
			$tsho = $st['teamShort'];
			$moop = mysqli_query($db, "UPDATE efl_prorel SET champrel = '$tsho' WHERE `rank` = 2");
		}
		elseif ($j == 24){
			$tsho = $st['teamShort'];
			$moop = mysqli_query($db, "UPDATE efl_prorel SET champrel = '$tsho' WHERE `rank` = 3");
		}
		$j++;
	}	

?>

<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>EFL Championship Fixtures</title>
	  <link rel='stylesheet' type='text/css' href='../eflstyle.css'/>
	  <link rel="stylesheet" type="text/css" href="../../../StyleSheet.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>

<body>
	<h1 align="center"><a href='../Championship' style="text-decoration: none; color:white;">2019-20 Championship Fixtures</a></h1>
	<div class="tab" align="center">
		<?php
		//cycle through all weeks
		for ($k = 1; $k <= 46; $k++) {
			if ($k == 1) {
				?>
		<button class="tablinks active" id="wk<?php echo $k; ?>" onclick="openTab(event, 'week<?php echo $k ?>')"><?php echo "Week " . $k; ?></button>
		<?php
			} else {
				?>
		<!--identify each tab appropriately-->
		<button class="tablinks" id="wk<?php echo $k; ?>" onclick="openTab(event, 'week<?php echo $k ?>')"><?php echo "Week " . $k; ?></button>
		<?php
			}
		}
		?>
	</div>
	<?php
	//cycle through all weeks
	for ($k = 1; $k <= 46; $k++) {
		if ($k == 1) {
			?>
	<div id="week<?php echo $k ?>" class="tabcontent" style="display:block;">
		<?php
			} else {
				?>
		<div id="week<?php echo $k ?>" class="tabcontent">
			<?php
				}
				$week = "champ" . $k;
				//echo $week;
				$schedule = mysqli_query($db, "SELECT * FROM $week");
				$numrows = mysqli_num_rows($schedule);
				?>
			<form action="schedule.php" method="post" align="center">
					<table align="center" id="champgames">
						<tr>
							<th style="width:15%">Score</th>
							<th style="width:27.5%">Home</th>
							<th style="width:15%;">Match</th>
							<th style="width:27.5%">Away</th>
							<th style="width:15%">Score</th>
						</tr>
						<?php
						$i = 0;
						//Dump the data into an easily readable table
						while ($i < $numrows && $row=mysqli_fetch_array($schedule)){
							$homename = "home" . $i;
							$awayname = "away" . $i;
							?>		
						<tr>				
							<td align="center">
								<!-- Cell for the away score box-->
								<input type="text" name="<?php echo $homename;?>" placeholder="<?php echo $row['HomeScore'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['HomeScore'];?>">
							</td>
								<!-- Cell for the away tricode and logo -->
							<td id="<?php echo $row['Home']?>" style="font-weight: bold; text-align: right;"><img src="../../../Assets/EFL/Championship/<?php echo $row['Home']?>.png" style="float:left;" width=30 height=30><span style="float: right; padding-top: 6px;" width=100;><?php echo $row['Home']?></span></td>
							<td align="center"><?php echo $i+1;?></td>
								<!-- Cell for the home tricode and logo -->
							<td id="<?php echo $row['Away']?>" style="font-weight: bold;"><span style="float: left; padding-top: 6px;"><?php echo $row['Away']?></span><img src="../../../Assets/EFL/Championship/<?php echo $row['Away']?>.png" style="float: right; text-align: right; vertical-align: bottom;" width=30 height=30></td>
							<td align="center">
								<!-- Cell for the home score box-->
								<input type="text" name="<?php echo $awayname;?>" placeholder="<?php echo $row['AwayScore'];?>" pattern="\d*" maxlength="2" style="width:30px;" value="<?php echo $row['AwayScore'];?>">
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
					<input type="hidden" name="wk" value="<?php echo $k?>">
					<div align="center">
						<button type="submit" style="font-family: 'Cambo', Times, serif; padding:5px;">Submit</button>
					</div>
				</form>
			</div>
			<?php 
			}
			?>
		</div>
		<!-- Back button needed to keep form submission clean -->
		<br>
		<div align="center" style="margin-bottom: 20px;">
			<button id="back" align="center" onclick="window.location.href='../Championship'" style="font-size: 20px; padding: 5px;"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to EPL Page</button>
		</div>
	</body>
</html>
<style>

	body {
		background-color: navy;
	}

	h1 {
		font-size: 90px;
		color: navy;
		text-shadow: 3px 3px red;
		margin:15px;
	}
	.tester {
	border-collapse: collapse;
	}

	.tester td, .tester th {
		border: 2px solid black;
		padding: 8px;
	}

	.tester th {
		background-color: darkgrey;
		color: black;
		text-align: center;
	}

	#champsched {
		font-family: 'Cambo', Times, serif;
		margin-left: 20%;
		margin-right: 20%;
		margin-bottom: 5%;
		width: auto;
		min-width: 800px;
		border: 3px solid red;
	}

	.tab {
		border: 3px solid white;
		/* background-color: chocolate; */
		background-image: linear-gradient(red, white);
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
		background-image: linear-gradient(black, navy);
		color: white;
		margin: 3px;
		width: auto;
		min-width: 125px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-image: linear-gradient(navy, white);
		color: yellow;
		border: none;

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
	#champgames {
		border-collapse: collapse;
		border-radius: 30px;
		width:450px;
		min-width: 360px;
	}

	#champgames td{
		border: 1px solid grey;
		padding: 2%;
		width: 45px;
	}

	#champgames th {
		background-color: navy;
		color: red;
		text-align: center;
		border: 1px solid black;
		padding: 1%;
	}	

	#TBD {
	  	font-family: 'Cambo', Times, serif;
	 	background-color: white;
	 	color: black;
	}	
</style>