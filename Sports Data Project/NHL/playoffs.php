<?php
include("../../session.php");
include("../../nestedsidenav.php");
$sp = "&nbsp";
$n = "<br>";

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'cen14'");
$r = mysqli_fetch_array($sql);
$cen1 = $r['hometeam'];
$cen1w = $r['homewins'];
$cenwc = $r['awayteam'];
$cenwcw = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'cen23'");
$r = mysqli_fetch_array($sql);
$cen2 = $r['hometeam'];
$cen2w = $r['homewins'];
$cen3 = $r['awayteam'];
$cen3w = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'pac14'");
$r = mysqli_fetch_array($sql);
$pac1 = $r['hometeam'];
$pac1w = $r['homewins'];
$pacwc = $r['awayteam'];
$pacwcw = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'pac23'");
$r = mysqli_fetch_array($sql);
$pac2 = $r['hometeam'];
$pac2w = $r['homewins'];
$pac3 = $r['awayteam'];
$pac3w = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'met14'");
$r = mysqli_fetch_array($sql);
$met1 = $r['hometeam'];
$met1w = $r['homewins'];
$metwc = $r['awayteam'];
$metwcw = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'met23'");
$r = mysqli_fetch_array($sql);
$met2 = $r['hometeam'];
$met2w = $r['homewins'];
$met3 = $r['awayteam'];
$met3w = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'atl14'");
$r = mysqli_fetch_array($sql);
$atl1 = $r['hometeam'];
$atl1w = $r['homewins'];
$atlwc = $r['awayteam'];
$atlwcw = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround1 WHERE series = 'atl23'");
$r = mysqli_fetch_array($sql);
$atl2 = $r['hometeam'];
$atl2w = $r['homewins'];
$atl3 = $r['awayteam'];
$atl3w = $r['awaywins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'cenfinal'");
$r = mysqli_fetch_array($sql);
$centop = $r['topteam'];
$centopw = $r['topwins'];
$cenbot = $r['botteam'];
$cenbotw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'pacfinal'");
$r = mysqli_fetch_array($sql);
$pactop = $r['topteam'];
$pactopw = $r['topwins'];
$pacbot = $r['botteam'];
$pacbotw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'metfinal'");
$r = mysqli_fetch_array($sql);
$mettop = $r['topteam'];
$mettopw = $r['topwins'];
$metbot = $r['botteam'];
$metbotw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround2 WHERE series = 'atlfinal'");
$r = mysqli_fetch_array($sql);
$atltop = $r['topteam'];
$atltopw = $r['topwins'];
$atlbot = $r['botteam'];
$atlbotw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround3 WHERE series = 'westf'");
$r = mysqli_fetch_array($sql);
$wtop = $r['topteam'];
$wtopw = $r['topwins'];
$wbot = $r['botteam'];
$wbotw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nhlround3 WHERE series = 'eastf'");
$r = mysqli_fetch_array($sql);
$etop = $r['topteam'];
$etopw = $r['topwins'];
$ebot = $r['botteam'];
$ebotw = $r['botwins'];

$sql = mysqli_query($db, "SELECT * FROM nhl_sc_finals WHERE conf = 'West'");
$r = mysqli_fetch_array($sql);
$westf = $r['team'];
$westfw = $r['wins'];

$sql = mysqli_query($db, "SELECT * FROM nhl_sc_finals WHERE conf = 'East'");
$r = mysqli_fetch_array($sql);
$eastf = $r['team'];
$eastfw = $r['wins'];
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Stanley Cup Playoffs</title>
	<link rel='stylesheet' type='text/css' href='nhlstyle.css'/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<h1 align="center"><a href='../NHL' style="text-decoration: none; color:black;">Stanley Cup Playoffs</a></h1>
	<div id="container" align="center">
	<table>
		<thead>
			<tr>
			<th style="width: 160px;">Conference Quarterfinals</th>
			<th style="width: 160px;">Conference Semifinals</th>
			<th style="width: 160px;">Conference Finals</th>
			<th style="width: 10px;">   </th>
			<th id="superbowl">Stanley Cup Finals</th>
			<th style="width: 10px;">   </th>
			<th style="width: 160px;">Conference Finals</th>
			<th style="width: 160px;">Conference Semifinals</th>
			<th style="width: 160px;">Conference Quarterfinals</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<!--CENTRAL 1 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$cen1'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $cen1;?>">(1) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $cen1;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $cen1w . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td style="font-weight: bold; background-color: skyblue; color: black;" align="middle";>Stanley Cup Champs:</td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--METRO 1 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$met1'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $met1;?>" align="right"><img src="/Assets/NHL/<?php echo $met1;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $met1w . $sp;?></span><?php echo $teamname . $sp;?>(1)
				</td>
			</tr>
			<tr>
				<!--CENTRAL WC-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$cenwc'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $cenwc;?>">(4) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $cenwc;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $cenwcw . $sp;?></span></td>
				<!--CENTRAL FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$centop'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $centop;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $centop;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $centopw . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--SCF WINNER-->
				<?php
					if ($westfw == 4){
						$champ = $westf;
					}
					elseif ($eastfw == 4){
						$champ = $eastf;
					}
					else {
						$champ = "TBD";
					}
					$sql = mysqli_query($db, "SELECT location, team FROM nhlteams WHERE teamShort = '$champ'");
					$r = mysqli_fetch_array($sql);
					$champname = $r['team'];
					$location = $r['location'];
				?>
				<td id="<?php echo $champ;?>" style="text-align: center;"><img src="/Assets/NHL/<?php echo $champ;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><?php echo $location . $sp. $champname;?><img src="/Assets/NHL/<?php echo $champ;?>.png" style="vertical-align: middle; float: right;" width=20 height=20></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--METRO FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$mettop'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $mettop;?>" align="right"><img src="/Assets/NHL/<?php echo $mettop;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $mettopw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>
				<!--METRO WC-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$metwc'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $metwc;?>" align="right"><img src="/Assets/NHL/<?php echo $metwc;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $metwcw . $sp;?></span><?php echo $teamname . $sp;?>(4)
				</td>
			</tr>
			<tr>
				<!--CENTRAL 2 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$cen2'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $cen2;?>">(2) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $cen2;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $cen2w . $sp;?></span></td>
				<!--CENTRAL FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$cenbot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $cenbot;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $cenbot;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $cenbotw . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--METRO FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$metbot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $metbot;?>" align="right"><img src="/Assets/NHL/<?php echo $metbot;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $metbotw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>				
				<!--METRO 2 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$met2'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>					
				<td id="<?php echo $met2;?>" align="right"><img src="/Assets/NHL/<?php echo $met2;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $met2w . $sp;?></span><?php echo $teamname . $sp;?>(2)
				</td>
			</tr>
			<tr>
				<!--CENTRAL 3 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$cen3'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $cen3;?>">(3) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $cen3;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $cen3w . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--METRO 3 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$met3'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>					
				<td id="<?php echo $met3;?>" align="right"><img src="/Assets/NHL/<?php echo $met3;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $met3w . $sp;?></span><?php echo $teamname . $sp;?>(3)
				</td>
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--CENTRAL WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$wtop'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $wtop;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $wtop;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $wtopw . $sp;?></span></td>
				<td id="empty"></td>
				<!--WEST WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$westf'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $westf;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $westf;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $westfw . $sp;?></span></td>
				<td id="empty"></td>
				<!--METRO WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$etop'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $etop;?>" align="right"><img src="/Assets/NHL/<?php echo $etop;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $etopw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>	
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--PACIFIC WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$wbot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $wbot;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $wbot;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $wbotw . $sp;?></span></td>
				<td id="empty"></td>
				<!--EAST WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$eastf'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $eastf;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $eastf;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $eastfw . $sp;?></span></td>
				<td id="empty"></td>
				<!--ATLANTIC WINNER-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$ebot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $ebot;?>" align="right"><img src="/Assets/NHL/<?php echo $ebot;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $ebotw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>	
				<td id="empty"></td>
				<td id="empty"></td>
			</tr>			
			<tr>
				<!--PACIFIC 1 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$pac1'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $pac1;?>">(1) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $pac1;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $pac1w . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--ATLANTIC 1 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$atl1'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>					
				<td id="<?php echo $atl1;?>" align="right"><img src="/Assets/NHL/<?php echo $atl1;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $atl1w . $sp;?></span><?php echo $teamname . $sp;?>(1)
				</td>
			</tr>
			<tr>
				<!--PACIFIC WC-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$pacwc'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $pacwc;?>">(4) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $pacwc;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $pacwcw . $sp;?></span></td>
				<!--PACIFIC FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$pactop'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $pactop;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $pactop;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $pactopw . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--ATLANTIC FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$atltop'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $atltop;?>" align="right"><img src="/Assets/NHL/<?php echo $atltop;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $atltopw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>
				<!--ATLANTIC WC-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$atlwc'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>					
				<td id="<?php echo $atlwc;?>" align="right"><img src="/Assets/NHL/<?php echo $atlwc;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $atlwcw . $sp;?></span><?php echo $teamname . $sp;?>(4)
				</td>
			</tr>
			<tr>
				<!--PACIFIC 2 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$pac2'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $pac2;?>">(2) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $pac2;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $pac2w . $sp;?></span></td>
				<!--PACIFIC FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$pacbot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $pacbot;?>"><?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $pacbot;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $pacbotw . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--ATLANTIC FINALIST-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$atlbot'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>				
				<td id="<?php echo $atlbot;?>" align="right"><img src="/Assets/NHL/<?php echo $atlbot;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $atlbotw . $sp;?></span><?php echo $teamname . $sp;?>
				</td>
				<!--ATLANTIC 2 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$atl2'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>					
				<td id="<?php echo $atl2;?>" align="right"><img src="/Assets/NHL/<?php echo $atl2;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $atl2w . $sp;?></span><?php echo $teamname . $sp;?>(2)
				</td>
			</tr>			
			<tr>
				<!--PACIFIC 3 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$pac3'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>
				<td id="<?php echo $pac3;?>">(3) <?php echo $teamname . $sp;?><img src="/Assets/NHL/<?php echo $pac3;?>.png" style="vertical-align: middle; float: right;" width=20 height=20><span style="float: right; font-weight: bold;"><?php echo $pac3w . $sp;?></span></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<!--ATLANTIC 3 SEED-->
				<?php
					$sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$atl3'");
					$r = mysqli_fetch_array($sql);
					$teamname = $r['team'];
				?>					
				<td id="<?php echo $atl3;?>" align="right"><img src="/Assets/NHL/<?php echo $atl3;?>.png" style="vertical-align: middle; float: left;" width=20 height=20><span style="float: left; font-weight: bold;"><?php echo $sp. $atl3w . $sp;?></span><?php echo $teamname . $sp;?>(3)
				</td>
			</tr>
			<tr>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"></td>
				<td id="empty"><button id="back" align="center" onclick="window.location.href='../NHL'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to NHL Page</button></td>
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
	background-color: silver;
	font-family: 'Cambo', Times, serif;
}

h1 {
	font-size: 80px;
	color: black;
	text-shadow: 3px 3px white;
	margin:25px;
}

th {
	color: black;
	font-weight: bold;
	text-shadow: 1px 1px goldenrod;
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
		background-color: darkblue;
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
		color: darkblue;
		background-color: white;
		box-shadow: 0px 1px white;
	}

	#TBD {
		font-family: 'Cambo', Times, serif;
		background-color: white;
		color: black;
	}
</style>
