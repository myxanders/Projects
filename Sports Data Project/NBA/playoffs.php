<?php
include("../../session.php");
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";

$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'west18'");
$r = mysqli_fetch_array($sql);
$west1 = $r['hometeam'];
$west1wins = $r['homewins'];
$west8 = $r['awayteam'];
$west8wins = $r['awaywins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'west27'");
$r = mysqli_fetch_array($sql);
$west2 = $r['hometeam'];
$west2wins = $r['homewins'];
$west7 = $r['awayteam'];
$west7wins = $r['awaywins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'west36'");
$r = mysqli_fetch_array($sql);
$west3 = $r['hometeam'];
$west3wins = $r['homewins'];
$west6 = $r['awayteam'];
$west6wins = $r['awaywins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'west45'");
$r = mysqli_fetch_array($sql);
$west4 = $r['hometeam'];
$west4wins = $r['homewins'];
$west5 = $r['awayteam'];
$west5wins = $r['awaywins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'east18'");
$r = mysqli_fetch_array($sql);
$east1 = $r['hometeam'];
$east1wins = $r['homewins'];
$east8 = $r['awayteam'];
$east8wins = $r['awaywins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'east27'");
$r = mysqli_fetch_array($sql);
$east2 = $r['hometeam'];
$east2wins = $r['homewins'];
$east7 = $r['awayteam'];
$east7wins = $r['awaywins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'east36'");
$r = mysqli_fetch_array($sql);
$east3 = $r['hometeam'];
$east3wins = $r['homewins'];
$east6 = $r['awayteam'];
$east6wins = $r['awaywins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround1 WHERE series = 'east45'");
$r = mysqli_fetch_array($sql);
$east4 = $r['hometeam'];
$east4wins = $r['homewins'];
$east5 = $r['awayteam'];
$east5wins = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'west14'");
$r = mysqli_fetch_array($sql);
$west14_top = $r['topteam'];
$west14_twins = $r['topwins'];
$west14_bot = $r['botteam'];
$west14_bwins = $r['botwins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'west23'");
$r = mysqli_fetch_array($sql);
$west23_top = $r['topteam'];
$west23_twins = $r['topwins'];
$west23_bot = $r['botteam'];
$west23_bwins = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'east14'");
$r = mysqli_fetch_array($sql);
$east14_top = $r['topteam'];
$east14_twins = $r['topwins'];
$east14_bot = $r['botteam'];
$east14_bwins = $r['botwins'];
$sql = mysqli_query($db, "SELECT * FROM nbaround2 WHERE series = 'east23'");
$r = mysqli_fetch_array($sql);
$east23_top = $r['topteam'];
$east23_twins = $r['topwins'];
$east23_bot = $r['botteam'];
$east23_bwins = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nbaround3 WHERE series = 'east'");
$r = mysqli_fetch_array($sql);
$efinal_top = $r['topteam'];
$efinal_topw = $r['topwins'];
$efinal_bot = $r['botteam'];
$efinal_botw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nbaround3 WHERE series = 'west'");
$r = mysqli_fetch_array($sql);
$wfinal_top = $r['topteam'];
$wfinal_topw = $r['topwins'];
$wfinal_bot = $r['botteam'];
$wfinal_botw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nbafinals WHERE conf = 'east'");
$r = mysqli_fetch_array($sql);
$eastchamp = $r['team'];
$eastw = $r['games'];

$sql = mysqli_query($db, "SELECT * FROM nbafinals WHERE conf = 'west'");
$r = mysqli_fetch_array($sql);
$westchamp = $r['team'];
$westw = $r['games'];
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>NBA Playoffs</title>
	<link rel='stylesheet' type='text/css' href='nbastyle.css'/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
		<h1 align="center"><a href='../NBA' style="text-decoration: none; color:white;">NBA Playoffs</a></h1>
	<div id="container" align="center">
	<table>
		<thead>
			<tr>
			<th style="width: 160px;">Conference Quarterfinals</th>
			<th style="width: 160px;">Conference Semifinals</th>
			<th style="width: 160px;">Conference Finals</th>
			<th style="width: 10px;">   </th>
			<th id="superbowl">NBA Finals</th>
			<th style="width: 10px;">   </th>
			<th style="width: 160px;">Conference Finals</th>
			<th style="width: 160px;">Conference Semifinals</th>
			<th style="width: 160px;">Conference Quarterfinals</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west1'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<!--WEST 1 SEED-->
				<td id="<?php echo $west1;?>">(1) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west1;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west1wins . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td style="font-weight: bold; background-color: burlywood; color: black;" align="middle";>NBA Champions:</td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east1'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<!--EAST 1 SEED-->
				<td id="<?php echo $east1;?>" align="right"><img src="/Assets/NBA/<?php echo $east1;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east1wins . $sp;?></span><?php echo $teamname . $sp;?>(1)
				</td>
			</tr>
			<tr>
				<!--WEST 8 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west8'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west8;?>">(8) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west8;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west8wins . $sp;?></span></td>
				<!--WEST 1/8 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west14_top'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west14_top;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west14_top;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west14_twins . $sp;?></span>
				</td>				
				<td id="empty"></td>
				<td id="empty"></td>
				<!--NBA CHAMPIONS-->
				<?php
					if ($westw == 4){
						$champ = $westchamp;
					}
					elseif ($eastw == 4){
						$champ = $eastchamp;
					}
					else {
						$champ = "TBD";
					}
					$sql = mysqli_query($db, "SELECT location,team FROM nbateams WHERE teamShort = '$champ'");
					$r = mysqli_fetch_array($sql);
					$champname = $r['team'];
					$location = $r['location'];
				?>
				<td id="<?php echo $champ;?>" style = "text-align: center"><img src="/Assets/NBA/<?php echo $champ;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="font-weight: bold;"><?php echo $location . $sp. $champname;?></span><img src="/Assets/NBA/<?php echo $champ;?>.png" style="vertical-align: middle; float: right;" width=20 height=20></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--EAST 1/8 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east14_top'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east14_top;?>" align="right"><img src="/Assets/NBA/<?php echo $east14_top;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east14_twins . $sp;?></span><?php echo $teamname . $sp;?>
				</td>				
				<!--EAST 8 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east8'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east8;?>" align="right"><img src="/Assets/NBA/<?php echo $east8;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east8wins . $sp;?></span><?php echo $teamname . $sp;?>(8)
				</td>
			</tr>
			<tr>
				<!--WEST 4 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west4'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west4;?>">(4) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west4;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west4wins . $sp;?></span></td>
				<!--WEST 4/5 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west14_bot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west14_bot;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west14_bot;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west14_bwins . $sp;?></span>
				</td>					
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--EAST 4/5 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east14_bot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east14_bot;?>" align="right"><img src="/Assets/NBA/<?php echo $east14_bot;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east14_bwins . $sp;?></span><?php echo $teamname . $sp;?>
				</td>				
				<!--EAST 4 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east4'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east4;?>" align="right"><img src="/Assets/NBA/<?php echo $east4;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east4wins . $sp;?></span><?php echo $teamname . $sp;?>(4)
				</td>
			</tr>
			<tr>
				<!--WEST 5 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west5'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west5;?>">(5) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west5;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west5wins . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--EAST 5 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east5'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east5;?>" align="right"><img src="/Assets/NBA/<?php echo $east5;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east5wins . $sp;?></span><?php echo $teamname . $sp;?>(5)
				</td>
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--WEST FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$wfinal_top'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $wfinal_top;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $wfinal_top;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $wfinal_topw . $sp;?></span>
				</td>
				<td id="empty"></td>
				<!--WEST WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$westchamp'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $westchamp;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $westchamp;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $westw . $sp;?></span>
				</td>
				<td id="empty"></td>
				<!--EAST FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$efinal_top'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $efinal_top;?>" align="right"><img src="/Assets/NBA/<?php echo $efinal_top;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $efinal_topw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--WEST FINALIST -->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$wfinal_bot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $wfinal_bot;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $wfinal_bot;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $wfinal_botw . $sp;?></span>
				</td>
				<td id="empty"></td>
				<!--EAST WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$eastchamp'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $eastchamp;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $eastchamp;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $eastw . $sp;?></span>
				</td>
				<td id="empty"></td>
				<!--EAST FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$efinal_bot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $efinal_bot;?>" align="right"><img src="/Assets/NBA/<?php echo $efinal_bot;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $efinal_botw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>			
			<tr>
				<!--WEST 3 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west3'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west3;?>">(3) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west3;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west3wins . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--EAST 3 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east3'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east3;?>" align="right"><img src="/Assets/NBA/<?php echo $east3;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east3wins . $sp;?></span><?php echo $teamname . $sp;?>(3)
				</td>
			</tr>
			<tr>
				<!--WEST 6 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west6'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west6;?>">(6) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west6;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west6wins . $sp;?></span></td>
				<!--WEST 3/6 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west23_top'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west23_top;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west23_top;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west23_twins . $sp;?></span></td>	
				<td id="empty"></td>				
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--EAST 3/6 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east23_top'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east23_top;?>" align="right"><img src="/Assets/NBA/<?php echo $east23_top;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east23_twins . $sp;?></span><?php echo $teamname . $sp;?>
				</td>				
				<!--EAST 6 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east6'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east6;?>" align="right"><img src="/Assets/NBA/<?php echo $east6;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east6wins . $sp;?></span><?php echo $teamname . $sp;?>(6)
				</td>
			</tr>
			<tr>
				<!--WEST 2 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west2'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west2;?>">(2) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west2;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west2wins . $sp;?></span></td>
				<!--WEST 2/7 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west23_bot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west23_bot;?>"><?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west23_bot;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west23_bwins . $sp;?></span></td>					
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--EAST 2/7 WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east23_bot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east23_bot;?>" align="right"><img src="/Assets/NBA/<?php echo $east23_bot;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east23_bwins . $sp;?></span><?php echo $teamname . $sp;?>
				</td>				
				<!--EAST 2 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east2'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east2;?>" align="right"><img src="/Assets/NBA/<?php echo $east2;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east2wins . $sp;?></span><?php echo $teamname . $sp;?>(2)
				</td>
			</tr>			
			<tr>
				<!--WEST 7 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$west7'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $west7;?>">(7) <?php echo $teamname . $sp;?><img src="/Assets/NBA/<?php echo $west7;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $west7wins . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--EAST 7 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT team FROM nbateams WHERE teamShort = '$east7'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $east7;?>" align="right"><img src="/Assets/NBA/<?php echo $east7;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $east7wins . $sp;?></span><?php echo $teamname . $sp;?>(7)
				</td>
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"><button id="back" align="center" onclick="window.location.href='../NBA'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to NBA Page</button></td>
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
	background-color: black;
	font-family: 'Cambo', Times, serif;
}

h1 {
	font-size: 80px;
	color: white;
	text-shadow: 3px 3px darkgrey;
	margin:25px;
}

th {
	color: white;
	font-weight: bold;
	text-shadow: 1px 1px red;
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
	color: white;
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
