<?php
include("../../session.php");
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";

$sql = mysqli_query($db, "SELECT * FROM nbaround1");
$numrows = mysqli_num_rows($sql);

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="nbastyle.css">
		<title>Update NBA Playoffs</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	  <script>
	  $( function() {
	    $( "#nbaplayoffs" ).tabs();
	  } );
	  </script>
	<body>
		<h1 align="center">NBA Playoffs</h1>
		<div align="center" style="margin: 5px;">
			<button id="back" align="center" onclick="window.location.href='playoffs.php'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Playoff Bracket</button>
		</div>
		<form action="processPlayoffs.php" method="post">
		<div id="nbaplayoffs">
		  <ul>
		    <li><a href="#confquarters">Conference Quarters</a></li>
		    <li><a href="#confsemis">Conference Semis</a></li>
		    <li><a href="#conffinals">Conference Finals</a></li>
		    <li><a href="#nbafinals">NBA Finals</a></li>
		  </ul>
		 <div id="confquarters">
		 	<h3>Conference Quarterfinals</h3>
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
		 					$i=1;
		 					while ($i <= 4 && $r=mysqli_fetch_array($sql)){
		 						$series = $r['series'];
		 						$home = $r['hometeam'];
		 						$homew = $r['homewins'];
		 						$away = $r['awayteam'];
		 						$awayw = $r['awaywins'];
		 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$home'");
		 						$row = mysqli_fetch_array($query);
		 						$homename = $row['team'];
		 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$away'");
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
		 					$j=5;
		 					while ($j <= $numrows && $r=mysqli_fetch_array($sql)){
		 						$series = $r['series'];
		 						$home = $r['hometeam'];
		 						$homew = $r['homewins'];
		 						$away = $r['awayteam'];
		 						$awayw = $r['awaywins'];
		 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$home'");
		 						$row = mysqli_fetch_array($query);
		 						$homename = $row['team'];
		 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$away'");
		 						$row = mysqli_fetch_array($query);
		 						$awayname = $row['team'];
		 				?>
		 				<td><input type="text" name="<?php echo $series . 'home';?>" placeholder="<?php echo $homew;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $homew;?>"></td>
		 				<td id="<?php echo $home;?>"><?php echo $homename;?></td>
		 				<td id="<?php echo $away;?>"><?php echo $awayname;?></td>		 							 				
		 				<td><input type="text" name="<?php echo $series . 'away';?>" placeholder="<?php echo $awayw;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $awayw;?>"></td>
		 			</tr>
		 				<?php
		 						$j++;
		 					}
		 				?>		 					 			
		 		</table>
		 	</div>
		 </div>
<?php
	$sql = mysqli_query($db, "SELECT * FROM nbaround2");
	$numrows = mysqli_num_rows($sql);
?>
			<div id="confsemis">
			 	<h3>Conference Semifinals</h3>	
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
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$bot'");
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
			 					$j=3;
			 					while ($j <= $numrows && $r=mysqli_fetch_array($sql)){
			 						$series = $r['series'];
			 						$top = $r['topteam'];
			 						$topw = $r['topwins'];
			 						$bot = $r['botteam'];
			 						$botw = $r['botwins'];
			 						if ($top != "TBD" && $bot != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$bot'");
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
			 						$j++;
			 					}
			 				?>		 					 			
			 		</table>
			 	</div>			 				 	
			 </div>
<?php
	$sql = mysqli_query($db, "SELECT * FROM nbaround3");
	$numrows = mysqli_num_rows($sql);
?>	 
			 <div id="conffinals">
			 	<h3>Conference Finals</h3>
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
			 					$i=1;
			 					while ($i == 1 && $r=mysqli_fetch_array($sql)){
			 						$series = $r['series'];
			 						$top = $r['topteam'];
			 						$topw = $r['topwins'];
			 						$bot = $r['botteam'];
			 						$botw = $r['botwins'];
			 						if ($top != "TBD" && $bot != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$bot'");
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
			 					$j=2;
			 					while ($j == 2 && $r=mysqli_fetch_array($sql)){
			 						$series = $r['series'];
			 						$top = $r['topteam'];
			 						$topw = $r['topwins'];
			 						$bot = $r['botteam'];
			 						$botw = $r['botwins'];
			 						if ($top != "TBD" && $bot != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$top'");
				 						$row = mysqli_fetch_array($query);
				 						$topname = $row['team'];
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$bot'");
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
			 						$j++;
			 					}
			 				?>		 					 			
			 		</table>
			 	</div>			 	
			</div>
<?php
	$sql = mysqli_query($db, "SELECT * FROM nbafinals WHERE conf = 'West'");
?>	
			<div id="nbafinals">
			 	<h3>NBA Finals</h3>
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
			 						$wins = $r['games'];
			 						if ($team != "TBD"){
				 						$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$team'");
				 						$row = mysqli_fetch_array($query);
										 $name = $row['team'];
									}
			 				?>		 							 				
							 <td><input type="text" name="<?php echo $conf . '_f';?>" placeholder="<?php echo $wins;?>"  pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $wins;?>"></td>
							 <td id="<?php echo $team;?>"><?php echo $name;?></td>
						<?php
							$sql = mysqli_query($db, "SELECT * FROM nbafinals WHERE conf = 'East'");
							$r=mysqli_fetch_array($sql);
								$conf = $r['conf'];
								$team = $r['team'];
								$wins = $r['games'];
								if ($team != "TBD"){
									$query = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$team'");
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
		background-color: firebrick;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px darkblue;
		margin:15px;
	}

	.ui-tabs .ui-tabs-nav {
		background: darkblue;
		padding-top: 8px;
		border: 1px solid black;
	}

	.ui-state-active a {
		background:	tan;
	}

	#nbaplayoffs {
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
		background-color: gold;
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