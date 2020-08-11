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
		<title>Update MLB Playoffs</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	  <script>
	  $( function() {
	    $( "#mlbplayoffs" ).tabs();
	  } );
	  </script>
	<body>
		<h1 align="center">MLB Playoffs</h1>
		<div align="center" style="margin: 5px;">
			<button id="back" align="center" onclick="window.location.href='playoffs.php'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Playoff Bracket</button>
		</div>
		<form action="processPlayoffs.php" method="post">
		<div id="mlbplayoffs">
		  <ul>
		    <li><a href="#wildcard">Wild Card</a></li>
		    <li><a href="#divisional">ALDS/NLDS</a></li>
		    <li><a href="#championship">ALCS/NLCS</a></li>
		    <li><a href="#worldseries">World Series</a></li>
		  </ul>
		 <div id="wildcard">
		 	<h3>Wild Card Round</h3>
		 	<div id="alwc" class="altable">
		 		<?php
		 			$alsql = mysqli_query($db, "SELECT * FROM mlb_wildcard WHERE game = 'alwc'");
		 			$row = mysqli_fetch_array($alsql);
		 			$away = $row['awayteam'];
		 			$home = $row['hometeam'];
		 		?>
		 		<p>AL Wild Card</p>
		 		<table>
		 			<tr>
		 				<th style="width:15%;">Score</th>
		 				<th style="width:35%;">Away</th>
		 				<th style="width:35%;">Home</th>
		 				<th style="width:15%;">Score</th>
		 			</tr>
		 			<tr>
		 				<td><input type="text" name="alwcaway" placeholder="<?php echo $row['awayscore'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awayscore'];?>"></td>
		 				<?php
		 					$sqlala = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
		 					$r = mysqli_fetch_array($sqlala);
		 					$awayteam = $r['team'];
		 				?>
		 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
		 				<?php
		 					$sqlalh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
		 					$q = mysqli_fetch_array($sqlalh);
		 					$hometeam = $q['team'];
		 				?>
		 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
		 				<td><input type="text" name="alwchome" placeholder="<?php echo $row['homescore'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['homescore'];?>"></td>
		 			</tr>
		 		</table>
		 	</div>
		 	<br>
		 	<div id="nlwc" class="nltable">
		 		<?php
		 			$nlsql = mysqli_query($db, "SELECT * FROM mlb_wildcard WHERE game = 'nlwc'");
		 			$rown = mysqli_fetch_array($nlsql);
		 			$away = $rown['awayteam'];
		 			$home = $rown['hometeam'];
		 		?>
		 		<p>NL Wild Card</p>
		 		<table>
		 			<tr>
		 				<th style="width:15%;">Score</th>
		 				<th style="width:35%;">Away</th>
		 				<th style="width:35%;">Home</th>
		 				<th style="width:15%;">Score</th>
		 			</tr>
		 			<tr>
		 				<td><input type="text" name="nlwcaway" placeholder="<?php echo $rown['awayscore'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $rown['awayscore'];?>"></td>
		 				<?php
		 					$sqlnla = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
		 					$rn = mysqli_fetch_array($sqlnla);
		 					$awayteam = $rn['team'];
		 				?>
		 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
		 				<?php
		 					$sqlnlh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
		 					$qn = mysqli_fetch_array($sqlnlh);
		 					$hometeam = $qn['team'];
		 				?>
		 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
		 				<td><input type="text" name="nlwchome" placeholder="<?php echo $rown['homescore'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $rown['homescore'];?>"></td>
		 			</tr>
		 		</table>
		 	</div>		 	
		 </div>
			<div id="divisional">
			 	<h3>Divisional Series</h3>
			 	<div id="alds" class="altable">
			 		<?php
			 			$alsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'alds14'");
			 			$row = mysqli_fetch_array($alsql);
			 			$away = $row['awayteam'];
			 			$home = $row['hometeam'];
			 		?>
			 		<p>ALDS</p>
			 		<table>
			 			<tr>
			 				<th style="width:15%;">Games</th>
			 				<th style="width:35%;">Away</th>
			 				<th style="width:35%;">Home</th>
			 				<th style="width:15%;">Games</th>
			 			</tr>
			 			<tr>
			 				<td><input type="text" name="alds14away" placeholder="<?php echo $row['awaywins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awaywins'];?>"></td>
			 				<?php
			 					$sqlala = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
			 					$r = mysqli_fetch_array($sqlala);
			 					$awayteam = $r['team'];
			 				?>
			 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
			 				<?php
			 					$sqlalh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
			 					$q = mysqli_fetch_array($sqlalh);
			 					$hometeam = $q['team'];
			 				?>
			 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
			 				<td><input type="text" name="alds14home" placeholder="<?php echo $row['homewins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['homewins'];?>"></td>
			 			</tr>
			 			<tr>
			 				<?php
			 				$alsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'alds23'");
			 				$row = mysqli_fetch_array($alsql);
			 				$away = $row['awayteam'];
			 				$home = $row['hometeam'];
			 				?>
			 				<td><input type="text" name="alds23away" placeholder="<?php echo $row['awaywins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awaywins'];?>"></td>
			 				<?php
			 					$sqlala = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
			 					$r = mysqli_fetch_array($sqlala);
			 					$awayteam = $r['team'];
			 				?>
			 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
			 				<?php
			 					$sqlalh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
			 					$q = mysqli_fetch_array($sqlalh);
			 					$hometeam = $q['team'];
			 				?>
			 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
			 				<td><input type="text" name="alds23home" placeholder="<?php echo $row['homewins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['homewins'];?>"></td>
			 			</tr>
			 		</table>
			 	</div>
			 	<br>
	 		 	<div id="nlds" class="nltable">
			 		<?php
			 			$nlsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'nlds14'");
			 			$row = mysqli_fetch_array($nlsql);
			 			$away = $row['awayteam'];
			 			$home = $row['hometeam'];
			 		?>
			 		<p>NLDS</p>
			 		<table>
			 			<tr>
			 				<th style="width:15%;">Games</th>
			 				<th style="width:35%;">Away</th>
			 				<th style="width:35%;">Home</th>
			 				<th style="width:15%;">Games</th>
			 			</tr>
			 			<tr>
			 				<td><input type="text" name="nlds14away" placeholder="<?php echo $row['awaywins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awaywins'];?>"></td>
			 				<?php
			 					$sqlnla = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
			 					$r = mysqli_fetch_array($sqlnla);
			 					$awayteam = $r['team'];
			 				?>
			 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
			 				<?php
			 					$sqlnlh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
			 					$q = mysqli_fetch_array($sqlnlh);
			 					$hometeam = $q['team'];
			 				?>
			 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
			 				<td><input type="text" name="nlds14home" placeholder="<?php echo $row['homewins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['homewins'];?>"></td>
			 			</tr>
			 			<tr>
			 				<?php
			 				$nlsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'nlds23'");
			 				$row = mysqli_fetch_array($nlsql);
			 				$away = $row['awayteam'];
			 				$home = $row['hometeam'];
			 				?>
			 				<td><input type="text" name="nlds23away" placeholder="<?php echo $row['awaywins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awaywins'];?>"></td>
			 				<?php
			 					$sqlnla = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
			 					$r = mysqli_fetch_array($sqlnla);
			 					$awayteam = $r['team'];
			 				?>
			 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
			 				<?php
			 					$sqlnlh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
			 					$q = mysqli_fetch_array($sqlnlh);
			 					$hometeam = $q['team'];
			 				?>
			 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
			 				<td><input type="text" name="nlds23home" placeholder="<?php echo $row['homewins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['homewins'];?>"></td>
			 			</tr>
			 		</table>
			 	</div>
			 </div>
			 <div id="championship">
			 	<h3>Championship Series</h3>
			 	<div id="alcs" class="altable">
			 		<?php
			 			$alsql = mysqli_query($db, "SELECT * FROM mlb_cs WHERE series = 'alcs'");
			 			$row = mysqli_fetch_array($alsql);
			 			$away = $row['awayteam'];
			 			$home = $row['hometeam'];
			 		?>
			 		<p>ALCS</p>
			 		<table>
			 			<tr>
			 				<th style="width:15%;">Games</th>
			 				<th style="width:35%;">Away</th>
			 				<th style="width:35%;">Home</th>
			 				<th style="width:15%;">Games</th>
			 			</tr>
			 			<tr>
			 				<td><input type="text" name="alcsaway" placeholder="<?php echo $row['awaywins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awaywins'];?>"></td>
			 				<?php
			 					$sqlala = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
			 					$r = mysqli_fetch_array($sqlala);
			 					$awayteam = $r['team'];
			 				?>
			 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
			 				<?php
			 					$sqlalh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
			 					$q = mysqli_fetch_array($sqlalh);
			 					$hometeam = $q['team'];
			 				?>
			 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
			 				<td><input type="text" name="alcshome" placeholder="<?php echo $row['homewins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['homewins'];?>"></td>
			 			</tr>
			 		</table>
			 	</div>
			 	<br>
			 	<div id="nlcs" class="nltable">
			 		<?php
			 			$nlsql = mysqli_query($db, "SELECT * FROM mlb_cs WHERE series = 'nlcs'");
			 			$row = mysqli_fetch_array($nlsql);
			 			$away = $row['awayteam'];
			 			$home = $row['hometeam'];
			 		?>
			 		<p>NLCS</p>
			 		<table>
			 			<tr>
			 				<th style="width:15%;">Games</th>
			 				<th style="width:35%;">Away</th>
			 				<th style="width:35%;">Home</th>
			 				<th style="width:15%;">Games</th>
			 			</tr>
			 			<tr>
			 				<td><input type="text" name="nlcsaway" placeholder="<?php echo $row['awaywins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['awaywins'];?>"></td>
			 				<?php
			 					$sqlnla = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$away'");
			 					$r = mysqli_fetch_array($sqlnla);
			 					$awayteam = $r['team'];
			 				?>
			 				<td id="<?php echo $away;?>"><?php echo $awayteam;?></td>
			 				<?php
			 					$sqlnlh = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$home'");
			 					$q = mysqli_fetch_array($sqlnlh);
			 					$hometeam = $q['team'];
			 				?>
			 				<td id="<?php echo $home;?>"><?php echo $hometeam;?></td>
			 				<td><input type="text" name="nlcshome" placeholder="<?php echo $row['homewins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['homewins'];?>"></td>
			 			</tr>
			 		</table>
			 	</div>	 	

			</div>
			 <div id="worldseries">
			 	<h3>World Series</h3>
			 	<div id="alcs" class="altable">
			 		<?php
			 			$wsql = mysqli_query($db, "SELECT * FROM worldseries");
			 			$row = mysqli_fetch_array($wsql);
			 			$al = $row['al_winner'];
			 			$nl = $row['nl_winner'];
			 		?>
			 		<p>World Series</p>
			 		<table>
			 			<tr>
			 				<th style="width:15%;">Games</th>
			 				<th style="width:35%;">AL Champ</th>
			 				<th style="width:35%;">NL Champ</th>
			 				<th style="width:15%;">Games</th>
			 			</tr>
			 			<tr>
			 				<td><input type="text" name="alwinner" placeholder="<?php echo $row['al_wins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['al_wins'];?>"></td>
			 				<?php
			 					$sqlwsa = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$al'");
			 					$r = mysqli_fetch_array($sqlwsa);
			 					$alteam = $r['team'];
			 				?>
			 				<td id="<?php echo $al;?>"><?php echo $alteam;?></td>
			 				<?php
			 					$sqlwsn = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$nl'");
			 					$q = mysqli_fetch_array($sqlwsn);
			 					$nlteam = $q['team'];
			 				?>
			 				<td id="<?php echo $nl;?>"><?php echo $nlteam;?></td>
			 				<td><input type="text" name="nlwinner" placeholder="<?php echo $row['nl_wins'];?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $row['nl_wins'];?>"></td>
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
		background-color: #228200;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px chocolate;
		margin:15px;
	}

	.ui-tabs .ui-tabs-nav {
		background: chocolate;
		padding-top: 8px;
		border: 1px solid black;
	}

	.ui-state-active a, .ui-state-active a:link {
		background:	white;
		color: red;
	}

	#mlbplayoffs {
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
	table td,th {
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