<?php
include("../../session.php");
include("../../nestedsidenav.php");

$sql = mysqli_query($db, "SELECT * FROM ws_history WHERE winner != '' ORDER BY year DESC");
$nums = mysqli_num_rows($sql);

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>World Series History</title>
		<link rel='stylesheet' type='text/css' href='mlbstyle.css'/>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../MLB' style="text-decoration: none; color:white;">MLB</a></h1>
		<div class="history" align="center" style="margin-top: 10px">
			<p>World Series History</p>
			<table align="center" id="bowls">
				<tr>
					<th style="width: 100px; text-align: center;">Year</th>
					<th style="width: 200px; text-align: center;">Winners</th>
					<th style="width: 100px; text-align: center;">Series</th>
					<th style="width: 200px; text-align: center;">Losers</th>
				</tr>
				<?php
				$i=1;
				while ($i <= $nums && $r=mysqli_fetch_array($sql)){
					$series = $r['games'];
					$games = $series - 4;
				?>
				<tr>
					<td style="background-color: white;"><?php echo $r['year'];?></td>
					<td id="<?php echo $r['winnerShort']?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $r['winnerShort'];?>"><img src="../../Assets/MLB/<?php echo $r['winnerShort']?>hat.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $r['winner']?></span></td>
					<td style="background-color: white;">
						<?php 
						//Some series did not end in a typically best-of-7 manner seen today
							if ($r['year'] <= 1922){
								if ($r['year'] ==  1922 || $r['year'] == 1907){
									echo "4-0-1";
								}
								elseif ($r['year'] == 1912){
									echo "4-3-1";
								}
								else if ($r['year'] == 1903 || $r['year'] == 1919 || $r['year'] == 1921){
									echo "5-3";
								}
								elseif($r['year'] == 1994 || $r['year'] == 1904){
									echo "~~~";
								}
								else {
									echo "4-" . $games;
								}
							}
							else {
								echo "4-" . $games;
							}							
						?>
					</td>
					<td id="<?php echo $r['loserShort']?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $r['loserShort'];?>"><img src="../../Assets/MLB/<?php echo $r['loserShort']?>hat.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;"><?php echo $r['loser']?></span></td>
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
		<div align="center">
			<button id="whatif" align="center" onclick="window.location.href='whatif.php'">What if the other LCS finalists won their respective pennants?</button>
		<div>		
	</body>
</html>
<style>

	body {
		background-image: radial-gradient(white, lightgreen, green, darkgreen);
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px chocolate;
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

	#whatif {
		margin-bottom: 5%;
		font-size: 16px;
		border-radius: 8px;
		border: 2px solid white;
		box-shadow: 2px 2px black;
	}
	#whatif:hover {
		background-color: white;
		font-size: 16px;
		border-radius: 8px;
		border: 2px solid black;
		color: black;
	}	

    .history {
    	margin-top: 100px;
    	margin-left: -8%;
    	margin-right: -8%;
        width: auto;
        margin-bottom: 2%;
        display: block;
    }

	#bowls {
		border-collapse: collapse;
		border-radius: 30px;
		font-size: 18px;
	}

	#bowls td{
		border: 1px solid grey;
		padding: 1%;
		text-align: center;
	}    

	#bowls th {
		background-color: chocolate;
		color: white;
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
/* The following styles are different color schemes than the standard schemes applied to their team id */
	#BA {
		background-color: #003087;
		color: white;
	}

	#WSH {
		background-color: #002144;
		color: white;
	}

	#ARI {
		background-color: #5F259F;
		color: #005F61;
	}

	#FLA {
		background-color: #009CA6;
		color: black;
	}

	#SDP {
		background-color: #693F23;
		color: #FFCD00;
	}

	#MB {
		background-color: #0046ae;
		color: #ffd451;
	}	

	#MLW, #BST {
		background-color: #0033A0;
		color: white;
	}
		
	#BKN {
		background-color: #003087;
		color: white;
	}	

	#NYG {
		background-color: black;
		color: #E35205;
	}

	#HST {
		background-color: black;
		color: #9A3324;
	}

	#SAI {
		background-color: #5D2A2C;
		color: #DC4405;
	}				
</style> 