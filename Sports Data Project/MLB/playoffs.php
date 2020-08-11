<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MLB Playoffs</title>
	<link rel='stylesheet' type='text/css' href='mlbstyle.css'/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<body>
	<h1 align="middle">MLB Playoff Bracket</h1>
	<div id="container" align="center">
	<table>
		<thead>
			<tr>
			<th style="width: 160px;">Wild Card Round</th>
			<th style="width: 160px;">ALDS</th>
			<th style="width: 160px;">ALCS</th>
			<th style="width: 10px;">   </th>
			<th id="superbowl">World Series</th>
			<th style="width: 10px;">   </th>
			<th style="width: 160px;">NLCS</th>
			<th style="width: 160px;">NLDS</th>
			<th style="width: 160px;">Wild Card Round</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td style="font-weight: bold; background-color: burlywood; color: black;" align="middle";>World Series Champs:</td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>
			<tr>
				<td id="empty"></td>
				<!-- ALDS 4/5 SEED -->
				<?php
				$aldssql = mysqli_query($db,"SELECT * FROM mlb_ds WHERE series = 'alds14'");
				$r = mysqli_fetch_array($aldssql);
				$seedwc = $r['awayteam'];
				$score = $r['awaywins'];
				$teamwc = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$seedwc'");
				$row = mysqli_fetch_array($teamwc);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $seedwc;?>"><?php echo $teamname . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- WORLD SERIES CHAMPION -->
				<?php
				$wssql = mysqli_query($db,"SELECT * FROM worldseries");
				$r = mysqli_fetch_array($wssql);
				$alwins = $r['al_wins'];
				$nlwins = $r['nl_wins'];
				$alteam = $r['al_winner'];
				$nlteam = $r['nl_winner'];
				$wswinner = "";
				if ($alwins == 4){
					$wswinner = $alteam;
				}
				else if ($nlwins == 4){
					$wswinner = $nlteam;
				}
				else {
					$wswinner = "TBD";
				}
				$teamws = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$wswinner'");
				$row = mysqli_fetch_array($teamws);
				$location = $row['location'];
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $wswinner;?>" style="text-align: center;"><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="font-weight: bold;"><?php echo $location . $sp. $teamname;?></span><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- NLDS 4/5 SEED -->
				<?php
				$nldssql = mysqli_query($db,"SELECT * FROM mlb_ds WHERE series = 'nlds14'");
				$r = mysqli_fetch_array($nldssql);
				$seedwc = $r['awayteam'];
				$score = $r['awaywins'];
				$teamwc = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$seedwc'");
				$row = mysqli_fetch_array($teamwc);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>					
				<td id="<?php echo $seedwc;?>" align="right"><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $teamname . $sp;?></td>
				<td id="empty"></td>
			</tr>
			<tr>
				<td id="empty"></td>
				<!-- ALDS 1 SEED -->
				<?php
				$altopsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'alds14'");
				$r = mysqli_fetch_array($altopsql);
				$seed1 = $r['hometeam'];
				$score = $r['homewins'];
				$teamsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE mlbteams.teamShort = '$seed1'");
				$row = mysqli_fetch_array($teamsql);
				$name = $row['team'];
				$logo = $row['hatLogo'];
				?>
				<td id="<?php echo $seed1;?>">(1) <?php echo $name . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- NLDS 1 SEED --> 
				<?php
				$nltopsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'nlds14'");
				$r = mysqli_fetch_array($nltopsql);
				$seed1 = $r['hometeam'];
				$score = $r['homewins'];
				$teamsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE mlbteams.teamShort = '$seed1'");
				$row = mysqli_fetch_array($teamsql);
				$name = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $seed1;?>" align="right"><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $name . $sp;?> (1)</td>
				<td id="empty"></td>
			</tr>
			<tr>
				<!-- AL 5 SEED -->
				<?php
				$al5sql = mysqli_query($db,"SELECT * FROM mlb_wildcard WHERE game = 'alwc'");
				$r = mysqli_fetch_array($al5sql);
				$seed5 = $r['awayteam'];
				$score = $r['awayscore'];
				$team5 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$seed5'");
				$row = mysqli_fetch_array($team5);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>
				<td id="<?php echo $seed5;?>">(5) <?php echo $teamname . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<!-- ALCS HIGHER SEED -->
				<?php
				$alcssql = mysqli_query($db,"SELECT * FROM mlb_cs WHERE series = 'alcs'");
				$r = mysqli_fetch_array($alcssql);
				$topseed = $r['hometeam'];
				$score = $r['homewins'];
				$team5 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$topseed'");
				$row = mysqli_fetch_array($team5);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>
				<td id="<?php echo $topseed;?>"><?php echo $teamname . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<!-- ALCS WINNER -->
				<?php
				$alsql = mysqli_query($db,"SELECT * FROM worldseries WHERE series = 'world_series'");
				$r = mysqli_fetch_array($alsql);
				$alteam = $r['al_winner'];
				$score = $r['al_wins'];
				$teamal = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$alteam'");
				$row = mysqli_fetch_array($teamal);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $alteam;?>"><?php echo $sp . $sp . $teamname . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<!-- NLCS HIGH SEED -->
				<?php
				$nlcssql = mysqli_query($db,"SELECT * FROM mlb_cs WHERE series = 'nlcs'");
				$r = mysqli_fetch_array($nlcssql);
				$topseed = $r['hometeam'];
				$score = $r['homewins'];
				$team5 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$topseed'");
				$row = mysqli_fetch_array($team5);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $topseed;?>" align="right"><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $teamname . $sp;?></td>
				<td id="empty"></td>
				<!-- NL 5 SEED -->
				<?php
				$nl5sql = mysqli_query($db,"SELECT * FROM mlb_wildcard WHERE game = 'nlwc'");
				$r = mysqli_fetch_array($nl5sql);
				$seed5 = $r['awayteam'];
				$score = $r['awayscore'];
				$team5 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$seed5'");
				$row = mysqli_fetch_array($team5);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $seed5;?>" align="right"><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $teamname . $sp;?> (5)</td>
			</tr>
			<tr>
				<!-- NL 4 SEED -->
				<?php
				$al4sql = mysqli_query($db,"SELECT * FROM mlb_wildcard WHERE game = 'alwc'");
				$r = mysqli_fetch_array($al4sql);
				$seed4 = $r['hometeam'];
				$score = $r['homescore'];
				$team4 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$seed4'");
				$row = mysqli_fetch_array($team4);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $seed4;?>">(4) <?php echo $teamname . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<!-- ALCS LOW SEED -->
				<?php
				$alcssql = mysqli_query($db,"SELECT * FROM mlb_cs WHERE series = 'alcs'");
				$r = mysqli_fetch_array($alcssql);
				$lowseed = $r['awayteam'];
				$score = $r['awaywins'];
				$team4 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$lowseed'");
				$row = mysqli_fetch_array($team4);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>					
				<td id="<?php echo $lowseed;?>"><?php echo $teamname . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<!-- NLCS WINNER -->
				<?php
				$nlsql = mysqli_query($db,"SELECT * FROM worldseries WHERE series = 'world_series'");
				$r = mysqli_fetch_array($nlsql);
				$nlteam = $r['nl_winner'];
				$score = $r['nl_wins'];
				$teamnl = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$nlteam'");
				$row = mysqli_fetch_array($teamnl);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $nlteam;?>"><?php echo $sp . $sp . $teamname . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<!-- NLCS LOW SEED -->
				<?php
				$nlcssql = mysqli_query($db,"SELECT * FROM mlb_cs WHERE series = 'nlcs'");
				$r = mysqli_fetch_array($nlcssql);
				$lowseed = $r['awayteam'];
				$score = $r['awaywins'];
				$team4 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$lowseed'");
				$row = mysqli_fetch_array($team4);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>					
				<td id="<?php echo $lowseed;?>" align="right"><img src="/Assets/MLB/<?php echo $logo?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $teamname . $sp;?></td>
				<td id="empty"></td>
				<!-- NL 4 SEED -->
				<?php
				$nl4sql = mysqli_query($db,"SELECT * FROM mlb_wildcard WHERE game = 'nlwc'");
				$r = mysqli_fetch_array($nl4sql);
				$seed4 = $r['hometeam'];
				$score = $r['homescore'];
				$team4 = mysqli_query($db, "SELECT * FROM mlbteams WHERE teamShort = '$seed4'");
				$row = mysqli_fetch_array($team4);
				$teamname = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $seed4;?>" align="right"><img src="/Assets/MLB/<?php echo $logo?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $teamname . $sp;?> (4)</td>
			</tr>
			<tr>
				<td id="empty"></td>
				<!-- AL 2 SEED -->
				<?php
				$altopsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'alds23'");
				$r = mysqli_fetch_array($altopsql);
				$seed2 = $r['hometeam'];
				$score = $r['homewins'];
				$teamsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE mlbteams.teamShort = '$seed2'");
				$row = mysqli_fetch_array($teamsql);
				$name = $row['team'];
				$logo = $row['hatLogo'];
				?>
				<td id="<?php echo $seed2;?>">(2) <?php echo $name . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- NL 2 SEED -->
				<?php
				$nltopsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'nlds23'");
				$r = mysqli_fetch_array($nltopsql);
				$seed2 = $r['hometeam'];
				$score = $r['homewins'];
				$teamsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE mlbteams.teamShort = '$seed2'");
				$row = mysqli_fetch_array($teamsql);
				$name = $row['team'];
				$logo = $row['hatLogo'];
				?>				
				<td id="<?php echo $seed2;?>" align="right"><img src="/Assets/MLB/<?php echo $logo?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $name . $sp;?> (2)</td>
				<td id="empty"></td>
			</tr>
			<tr>
				<td id="empty"></td>
				<!-- AL 3 SEED -->
				<?php
				$altopsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'alds23'");
				$r = mysqli_fetch_array($altopsql);
				$seed3 = $r['awayteam'];
				$score = $r['awaywins'];
				$teamsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE mlbteams.teamShort = '$seed3'");
				$row = mysqli_fetch_array($teamsql);
				$name = $row['team'];
				$logo = $row['hatLogo'];
				?>
				<td id="<?php echo $seed3;?>">(3) <?php echo $name . $sp;?><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $score . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!-- NL 3 SEED -->
				<?php
				$nltopsql = mysqli_query($db, "SELECT * FROM mlb_ds WHERE series = 'nlds23'");
				$r = mysqli_fetch_array($nltopsql);
				$seed3 = $r['awayteam'];
				$score = $r['awaywins'];
				$teamsql = mysqli_query($db, "SELECT * FROM mlbteams WHERE mlbteams.teamShort = '$seed3'");
				$row = mysqli_fetch_array($teamsql);
				$name = $row['team'];
				$logo = $row['hatLogo'];
				?>			
				<td id="<?php echo $seed3;?>" align="right"><img src="/Assets/MLB/<?php echo $logo;?>" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $score . $sp;?></span><?php echo $name . $sp;?> (3)</td>
				<td id="empty"></td>
			</tr>
						<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"><button id="back" align="center" onclick="window.location.href='../MLB'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to MLB Page</button></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>
		</tbody>
	</table>

	</div>
	<div align="center" style="margin-top: 30px; margin-bottom: 25px;">
		<button id="update" align="center" onclick="window.location.href='updatePlayoffs.php'">Update Playoff Results</button>
	</div>	
</body>
</html>
<style>

body {
	background-color: #a94a07;
	font-family: 'Cambo', Times, serif;
}

h1 {
	font-size: 80px;
	color: white;
	text-shadow: 3px 3px #ca0913;
	margin:25px;
}

th {
	color: white;
	font-weight: bold;
	text-shadow: 1px 1px blue;
	padding-bottom: 12px;
	padding-right: 10px;
	padding-left: 10px;
}

td#empty {
	border: none;
}

td {
	border: solid white 2px;
	padding: 8px;
	border-radius: 8px;
}
span {
	padding: none;
}

	button {
		font-family: 'Cambo', Times, serif;
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

	#back {
		font-size: 20px;
		border-radius: 8px;
		border: 2px solid white;
		box-shadow: 2px 2px black;
	}
	#back:hover {
		font-size: 20px;
		border-radius: 8px;
		border: 2px solid black;
		color: white;
		background-color:#cc0000;
		box-shadow: 0px 1px white;
	}

	#TBD {
		font-family: 'Cambo', Times, serif;
		background-color: white;
		color: black;
	}
</style>
