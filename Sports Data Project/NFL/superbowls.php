<?php
include("../../session.php");
include("../../nestedsidenav.php");

$sql = mysqli_query($db, "SELECT * FROM superbowls WHERE winners != '' ORDER BY number DESC");
$bowls = mysqli_num_rows($sql);

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>Super Bowl History</title>
		<link rel='stylesheet' type='text/css' href='schedulestyle.css'/>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../NFL' style="text-decoration: none; color: #ca0913;">SUPER BOWLS</a></h1>
		<div class="history" align="center" style="margin-top: 10px">
			<table align="center" id="bowls">
				<tr>
					<th style="width: 100px; text-align: center;">Super Bowl</th>
					<th style="width: 150px; text-align: center;">Winners</th>
					<th style="width: 100px; text-align: center;">Score</th>
					<th style="width: 150px; text-align: center;">Losers</th>
					<th style="width: 400px; text-align: center;">Venue</th>
					<th style="width: 175px; text-align: center;">Date</th>
				</tr>
				<?php
				$i=1;
				while ($i <= $bowls && $r=mysqli_fetch_array($sql)){
				?>
				<tr>
					<td style="background-color: white;"><a href="superbowl.php?sb=<?php echo $r['roman'];?>"><?php echo $r['roman'];?></a></td>
					<td id="<?php echo $r['winners']?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $r['winners'];?>"><img src="../../Assets/NFL/<?php echo $r['winners']?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $r['winningteam']?></span></td>
					<td style="background-color: white;"><?php echo $r['winningscore'] . "-" . $r['losingscore'];?></td>
					<td id="<?php echo $r['losers']?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $r['losers'];?>"><img src="../../Assets/NFL/<?php echo $r['losers']?>.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;"><?php echo $r['losingteam']?></span></td>
					<td style="font-size: 14px; background-color: white;"><?php echo $r['location'] . ", " . $r['city'] . ", " . $r['state'];?></td>
					<td style="background-color: white;"><?php 
							$date = strtotime($r['date']);
							echo date("F j, Y", $date);?>
					</td>
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
		<!-- Button leads to fun (depends on your definition of fun) page with hypothetical matchups where Champ game losers win instead. -->
		<div align="center">
			<button id="whatif" align="center" onclick="window.location.href='whatif.php'">What if the other conference finalists won their respective titles?</button>
		<div>
	</body>
</html>
<style>

	body {
		background-color: #00356e;
		background-image: linear-gradient(rgb(0,53,110), white, rgb(202, 9, 19));
	}

	h1 {
		font-size: 100px;
		color: #ca0913;
		text-shadow: 5px 5px white;
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
		background-color: red;
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
	
/* The following styles are not defined by current team ids due to relocations or rebranding */
	#BRN {
		color: #fd4614;
		background-color: #3c2e2c;
	}

	#DNV {
		color: #fc5224;
		background-color: #04168c;
	}

	#DOL {
		color: #047e8c;
		background-color: white;
	}

	#FAL {
		color: white;
		background-color: black;
	}

	#GIA {
		color: white;
		background-color: #001e62;
	}

	#JAG {
		color: #047e84;
		background-color: black;
	}

	#JET {
		color: white;
		background-color: #046A38;
	}

	#LEO {
		color: white;
		background-color: #005da6;
	}

	#PAN {
		color: black;
		background-color: #0088d4;
	}

	#PAT {
		color: #04308a;
		background-color: #c8122e;
	}

	#PHL {
		color: #c3babb;
		background-color: #037625;
	}

	#REF {
		font-family: 'Cambo', Times, serif;
		background-color: #002244;
		color: white;		
	}

	#SD {
		color: #fccd04;
		background-color: #041e45;
	}

	#SDG {
		color: #f5aa04;
		background-color: #041a73;
	}

	#SHK {
		color: #002144;
		background-color: #225780;
	}

	#SWK {
		color: #00378d;
		background-color: #8A8D8F;
	}

	#TAM {
		color: black;
		background-color: #b20032;
	}

	#TMP {
		color: #cf0226;
		background-color: #ee9b00;
	}

	#VIK {
		color: white;
		background-color: #3b0160;
	}


</style> 