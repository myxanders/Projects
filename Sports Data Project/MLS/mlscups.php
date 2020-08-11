<?php
include("../../session.php");
include("../../nestedsidenav.php");

$sql = mysqli_query($db, "SELECT * FROM mlscup WHERE winner != '' AND winner != 'TBD' ORDER BY year DESC");
$nums = mysqli_num_rows($sql);
?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>MLS Cup History</title>
		<link rel='stylesheet' type='text/css' href='mlsstyle.css'/>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../MLS' style="text-decoration: none; color:white;">MLS</a></h1>
		<div class="history" align="center" style="margin-top: 10px">
			<p>MLS Cup History</p>
			<table align="center" id="cups">
				<tr>
					<th style="width: 100px; text-align: center;">Year</th>
					<th style="width: 200px; text-align: center;">Winners</th>
					<th style="width: 100px; text-align: center;">Score</th>
					<th style="width: 200px; text-align: center;">Losers</th>
					<th style="width: 200px; text-align: center;">U.S. Open Cup</th>
					<th style="width: 200px; text-align: center;">Supporters' Shield</th>
				</tr>
				<?php
				$i=1;
				while ($i <= $nums && $r=mysqli_fetch_array($sql)){
					if ($r['winnerpk'] != NULL && $r['loserpk'] != NULL){
						$pkwin = "(" . $r['winnerpk'] . ")";
						$pklose = "(" . $r['loserpk'] . ")";
					}
					else {
						$pkwin = NULL;
						$pklose = NULL;
					}
					$winner = $r['winner'];
					$loser = $r['loser'];
					$usoc = $r['usopenwinner'];
					$sups = $r['supportersshield'];
					$name = mysqli_query($db, "SELECT team FROM mlsteams WHERE teamShort = '$winner'");
					$a = mysqli_fetch_array($name);
					//Some teams had different branding earlier
					$winteam = $a['team'];
					if ($winner == "GAL"){
						$winteam = "Galaxy";
					}
					if ($winner == "KCW"){
						$winteam = "Wizards";
					}
					$names = mysqli_query($db, "SELECT team FROM mlsteams WHERE teamShort = '$loser'");
					$b = mysqli_fetch_array($names);
					$loseteam = $b['team'];	
					if ($loser == "GAL"){
						$loseteam = "Galaxy";
					}
					if ($loser == "KCW"){
						$loseteam = "Wizards";
					}									
					$score = $pkwin . " " . $r['winnerscore'] . "-" . $r['loserscore'] . " " . $pklose;
				?>
				<tr>
					<td style="background-color: white;"><?php echo $r['year'];?></td>
					<td id="<?php echo $winner?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $winner;?>"><img src="../../Assets/MLS/<?php echo $winner?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $winteam?></span></td>
					<td style="background-color: white;"><?php echo $score;?></td>
					<td id="<?php echo $loser?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $loser;?>"><img src="../../Assets/MLS/<?php echo $loser?>.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;"><?php echo $loseteam?></span></td>
					<?php 
						$us = mysqli_query($db, "SELECT team FROM mlsteams WHERE teamShort = '$usoc'");
						$u = mysqli_fetch_array($us);
						$usocwinner = $u['team'];
						//TSHOs not among the standard TSHOs
					if ($usoc == "GAL"){
						$usocwinner = "Galaxy";
					}
					if ($usoc == "KCW"){
						$usocwinner = "Wizards";
					}	
					if ($usoc == "MF"){
						$usocwinner = "Fusion";
					}
					if ($usoc == "TB"){
						$usocwinner = "Mutiny";
					}
					if ($usoc == "DB"){
						$usocwinner = "Burn";
					}
					if ($usoc == "ROC"){
						$usocwinner = "Rhinos (USL)";
					}						
					?>
					<td id="<?php echo $usoc?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $usoc;?>"><img src="../../Assets/MLS/<?php echo $usoc?>.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;"><?php echo $usocwinner?></span></td>
					<?php 
						$ss = mysqli_query($db, "SELECT team FROM mlsteams WHERE teamShort = '$sups'");
						$s = mysqli_fetch_array($ss);
						$sswinner = $s['team'];
						//TSHOs not among the standard TSHOs
					if ($sups == "GAL"){
						$sswinner = "Galaxy";
					}
					if ($sups == "KCW"){
						$sswinner = "Wizards";
					}	
					if ($sups == "TB"){
						$sswinner ="Mutiny";
					}	
					if ($sups == "DB"){
						$sswinner ="Burn";
					}						
					if ($sups == "ROC"){
						$sswinner = "Rhinos (USL)";
					}
					if ($sups == "MF"){
						$sswinner = "Fusion";
					}																
					?>					
					<td id="<?php echo $sups?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $sups;?>"><img src="../../Assets/MLS/<?php echo $sups?>.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;"><?php echo $sswinner?></span></td>					
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
	</body>
</html>
<style>

	body {
		background-color: green;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px black;
		margin:15px;
	}

	p {
		font-size: 30px;
		color: white;
		text-shadow: 1px 1px black;
		margin:15px;
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

    .history {
    	margin-top: 100px;
    	margin-left: -8%;
    	margin-right: -8%;
        width: auto;
        margin-bottom: 2%;
        display: block;
    }

	#cups {
		border-collapse: collapse;
		border-radius: 30px;
		font-size: 18px;
	}

	#cups td{
		border: 1px solid grey;
		padding: 1%;
		text-align: center;
	}    

	#cups th {
		background-color: goldenrod;
		color: black;
		text-align: center;
		border: 1px solid black;
		padding: 1%;
	}		

	td a {
		display: block;
		text-decoration: none;
		width: 100%;
		color:black;
	}
/*The following schemes are not defined by current team ids */
	#DB {
		background-color: #ac1a34;
		color: black;
	}

	#GAL {
		background-color: #2a5922;
		color: #deb446;
	}

	#KCW {
		background-color: #3c80c1;
		color: black;
	}	

	#TB {
		background-color: #3da6e2;
		color: black;
	}	

	#MF {
		background-color: #083e89;
		color: #fcca0b;
	}

	#ROC {
		background-color: #04725c;
		color: #f5e808;
	}
</style> 