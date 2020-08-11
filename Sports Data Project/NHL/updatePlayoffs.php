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
		<title>Update NHL Playoffs</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	  <script>
	  $( function() {
	    $( "#nhlplayoffs" ).tabs();
	  } );
	  </script>
	<body>
		<h1 align="center">NHL Playoffs</h1>
		<div align="center" style="margin: 5px;">
			<button id="back" align="center" onclick="window.location.href='playoffs.php'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Playoff Bracket</button>
		</div>
		<form action="processPlayoffs.php" method="post">
		<div id="nhlplayoffs">
		  <ul>
		    <li><a href="#confquarters">First Round</a></li>
		    <li><a href="#confsemis">Second Round</a></li>
		    <li><a href="#conffinals">Conference Finals</a></li>
		    <li><a href="#scfinals">Stanley Cup Finals</a></li>
		  </ul>
		 <div id="confquarters">
		 	<h3>First Round</h3>
		 	<div id="westqf" class="altable">
		 		<p>Western Conference</p>
		 		<table>
		 			<tr>
		 				<th style="width:50px;">Wins</th>
		 				<th style="width:250px;">Team</th>
		 				<th style="width:250px;">Team</th>
		 				<th style="width:50px;">Wins</th>

		 			</tr>
		 			<tr>
		 				<?php
		 					$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series LIKE 'cen%' OR series LIKE 'pac%'");
		 					$i=1;
		 					while ($i <= 4 && $r=mysqli_fetch_array($sql)){
		 						$series = $r['series'];
		 						$home = $r['hometeam'];
		 						$homew = $r['homewins'];
		 						$away = $r['awayteam'];
		 						$awayw = $r['awaywins'];
		 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$home'");
		 						$row = mysqli_fetch_array($query);
		 						$homename = $row['team'];
		 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$away'");
		 						$row = mysqli_fetch_array($query);
		 						$awayname = $row['team'];
		 				?>
		 				<td><input type="text" name="<?php echo $series . 'home';?>" placeholder="<?php echo $homew;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $homew;?>"></td>
		 				<td id="<?php echo $home;?>"><?php echo $homename;?></td>
		 				<td id="<?php echo $away;?>"><?php echo $awayname;?></td>		 							 				
		 				<td><input type="text" name="<?php echo $series . 'away';?>" placeholder="<?php echo $awayw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $awayw;?>"></td>
		 			</tr>
		 				<?php
		 						$i++;
		 					}
		 				?>		 					 			
		 		</table>
		 	</div>
		 	<div id="eastqf" class="nltable">
		 		<p>Eastern Conference</p>
		 		<table>
		 			<tr>
		 				<th style="width:50px;">Wins</th>
		 				<th style="width:250px;">Team</th>
		 				<th style="width:250px;">Team</th>
		 				<th style="width:50px;">Wins</th>

		 			</tr>
		 			<tr>
		 				<?php
		 					$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series LIKE 'met%' OR series LIKE 'atl%'");
		 					$i=1;
		 					while ($i <= 4 && $r=mysqli_fetch_array($sql)){
		 						$series = $r['series'];
		 						$home = $r['hometeam'];
		 						$homew = $r['homewins'];
		 						$away = $r['awayteam'];
		 						$awayw = $r['awaywins'];
		 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$home'");
		 						$row = mysqli_fetch_array($query);
		 						$homename = $row['team'];
		 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$away'");
		 						$row = mysqli_fetch_array($query);
		 						$awayname = $row['team'];
		 				?>
		 				<td><input type="text" name="<?php echo $series . 'home';?>" placeholder="<?php echo $homew;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $homew;?>"></td>
		 				<td id="<?php echo $home;?>"><?php echo $homename;?></td>
		 				<td id="<?php echo $away;?>"><?php echo $awayname;?></td>		 							 				
		 				<td><input type="text" name="<?php echo $series . 'away';?>" placeholder="<?php echo $awayw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $awayw;?>"></td>
		 			</tr>
		 				<?php
		 						$i++;
		 					}
		 				?>		 					 			
		 		</table>
		 	</div>
		 </div>
<?php
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series LIKE 'cen%' OR series LIKE 'pac%'");
?>
			<div id="confsemis">
			 	<h3>Second Round</h3>	
			 	<div id="westsemis" class="altable">
			 		<p>Western Conference</p>
			 		<table>
			 			<tr>
			 				<th style="width:50px;">Wins</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:50px;">Wins</th>

			 			</tr>
			 			<tr>
			 				<?php
			 					$i=1;
			 					while ($i <= 2 && $r=mysqli_fetch_array($sql)){
			 						$series = $r['series'];
			 						$top = $r['topteam'];
			 						$topw = $r['topwins'];
			 						$bot = $r['botteam'];
			 						$botw = $r['botwins'];
			 						if ($top != "TBD" && $bot != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$bot'");
				 						$row = mysqli_fetch_array($query);
				 						$botname = $row['team'];
				 					
			 				?>
			 				<td><input type="text" name="<?php echo $series . 'top';?>" placeholder="<?php echo $topw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $topw;?>"></td>
			 				<td id="<?php echo $top;?>"><?php echo $topname;?></td>
			 				<td id="<?php echo $bot;?>"><?php echo $botname;?></td>		 							 				
			 				<td><input type="text" name="<?php echo $series . 'bot';?>" placeholder="<?php echo $botw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $botw;?>"></td>
				 			<?php	}?>
			 			</tr>
			 				<?php
			 						$i++;
			 					}
			 				?>		 					 			
			 		</table>
			 	</div>
<?php
	$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series LIKE 'met%' OR series LIKE 'atl%'");
?>
			 	<div id="eastsemis" class="nltable">
			 		<p>Eastern Conference</p>
			 		<table>
			 			<tr>
			 				<th style="width:50px;">Wins</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:50px;">Wins</th>

			 			</tr>
			 			<tr>
			 				<?php
			 					$i=1;
			 					while ($i <= 2 && $r=mysqli_fetch_array($sql)){
			 						$series = $r['series'];
			 						$top = $r['topteam'];
			 						$topw = $r['topwins'];
			 						$bot = $r['botteam'];
			 						$botw = $r['botwins'];
			 						if ($top != "TBD" && $bot != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$bot'");
				 						$row = mysqli_fetch_array($query);
				 						$botname = $row['team'];
				 					
			 				?>
			 				<td><input type="text" name="<?php echo $series . 'top';?>" placeholder="<?php echo $topw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $topw;?>"></td>
			 				<td id="<?php echo $top;?>"><?php echo $topname;?></td>
			 				<td id="<?php echo $bot;?>"><?php echo $botname;?></td>		 							 				
			 				<td><input type="text" name="<?php echo $series . 'bot';?>" placeholder="<?php echo $botw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $botw;?>"></td>
				 			<?php	}?>
			 			</tr>
			 				<?php
			 						$i++;
			 					}
			 				?>		 					 			
			 		</table>
			 	</div>			 				 	
			 </div>
<?php
	$sql = mysqli_query($db, "SELECT * FROM nhlround3");
?>	 
			 <div id="conffinals">
			 	<h3>Conference Finals</h3>
			 	<div id="westfinals" class="altable">
			 		<p>Western Conference</p>
			 		<table>
			 			<tr>
			 				<th style="width:50px;">Wins</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:50px;">Wins</th>

			 			</tr>
			 			<tr>
			 				<?php
			 					$i=1;
			 					while ($i == 1 && $r=mysqli_fetch_array($sql)){
			 						$series = $r['series'];
			 						$top = $r['topteam'];
			 						$topw = $r['topwins'];
			 						$bot = $r['botteam'];
			 						$botw = $r['botwins'];
			 						if ($top != "TBD" && $bot != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$bot'");
				 						$row = mysqli_fetch_array($query);
				 						$botname = $row['team'];
				 					
			 				?>
			 				<td><input type="text" name="<?php echo $series . 'top';?>" placeholder="<?php echo $topw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $topw;?>"></td>
			 				<td id="<?php echo $top;?>"><?php echo $topname;?></td>
			 				<td id="<?php echo $bot;?>"><?php echo $botname;?></td>		 							 				
			 				<td><input type="text" name="<?php echo $series . 'bot';?>" placeholder="<?php echo $botw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $botw;?>"></td>
				 			<?php	}?>
			 			</tr>
			 				<?php
			 						$i++;
			 					}
			 				?>		 					 			
			 		</table>
			 	</div>
			 	<div id="eastfinals" class="nltable">
			 		<p>Eastern Conference</p>
			 		<table>
			 			<tr>
			 				<th style="width:50px;">Wins</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:50px;">Wins</th>

			 			</tr>
			 			<tr>
			 				<?php
			 					while ($i == 2 && $r=mysqli_fetch_array($sql)){
			 						$series = $r['series'];
			 						$top = $r['topteam'];
			 						$topw = $r['topwins'];
			 						$bot = $r['botteam'];
			 						$botw = $r['botwins'];
			 						if ($top != "TBD" && $bot != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$bot'");
				 						$row = mysqli_fetch_array($query);
				 						$botname = $row['team'];
				 					
			 				?>
			 				<td><input type="text" name="<?php echo $series . 'top';?>" placeholder="<?php echo $topw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $topw;?>"></td>
			 				<td id="<?php echo $top;?>"><?php echo $topname;?></td>
			 				<td id="<?php echo $bot;?>"><?php echo $botname;?></td>		 							 				
			 				<td><input type="text" name="<?php echo $series . 'bot';?>" placeholder="<?php echo $botw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $botw;?>"></td>
				 			<?php	}?>
			 			</tr>
			 				<?php
			 						$i++;
			 					}
			 				?>		 					 			
			 		</table>
			 	</div>			 	
			</div>
<?php
	$sql = mysqli_query($db, "SELECT * FROM nhl_sc_finals WHERE conf = 'West'");
?>
			<div id="scfinals">
			 	<h3>Stanley Cup Finals</h3>
			 	<div id="finals" class="finaltable">
			 		<table>
			 			<tr>
			 				<th style="width:50px;">Wins</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:250px;">Team</th>
			 				<th style="width:50px;">Wins</th>

			 			</tr>
			 			<tr>
			 				<?php
			 					$r=mysqli_fetch_array($sql);
								$conf = $r['conf'];
								$team = $r['team'];
								$wins = $r['wins'];
								if ($team != "TBD"){
									$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$team'");
									$row = mysqli_fetch_array($query);
									$name = $row['team'];
								}
			 				?>
							 <td><input type="text" name="<?php echo $conf . '_f';?>" placeholder="<?php echo $wins;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $wins;?>"></td>
							 <td id="<?php echo $team;?>"><?php echo $name;?></td>
						<?php
							$sql = mysqli_query($db, "SELECT * FROM nhl_sc_finals WHERE conf = 'East'");
							$r=mysqli_fetch_array($sql);
							$conf = $r['conf'];
							$team = $r['team'];
							$wins = $r['wins'];
							if ($team != "TBD"){
								$query = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$team'");
								$row = mysqli_fetch_array($query);
								$name = $row['team'];
							}	
						?>
							<td id="<?php echo $team;?>"><?php echo $name;?></td>
							<td><input type="text" name="<?php echo $conf . '_f';?>" placeholder="<?php echo $wins;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $wins;?>"></td>
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
		background-color: silver;
	}

	h1 {
		font-size: 120px;
		color: black;
		text-shadow: 5px 5px lightskyblue;
		margin:15px;
	}

	.ui-tabs .ui-tabs-nav {
		background: lightskyblue;
		padding-top: 8px;
		border: 1px solid black;
	}

	.ui-state-active a, .ui-state-active a:link {
		background:	black;
		color: white;
	}

	#nhlplayoffs {
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
		background-color: lightskyblue;
		color: black;
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