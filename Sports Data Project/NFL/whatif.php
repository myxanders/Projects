<?php
include("../../session.php");
include("../../nestedsidenav.php");

//Shortcuts for concatenation
$sp = "&nbsp";
$n = "<br>";

$sql = mysqli_query($db, "SELECT * FROM whatif_superbowl ORDER BY year DESC");
$bowls = mysqli_num_rows($sql);


?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>Almost Super Bowl Matchups</title>
		<link rel='stylesheet' type='text/css' href='schedulestyle.css'/>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../NFL' style="text-decoration: none; color: #ca0913;">NFL</a></h1>
		<h3 align="center">What if the other conference finalists won their respective titles?</h3>
		<div class="history" align="center" style="margin-top: 10px">
			<table align="center" id="bowls">
				<tr>
					<th style="width: 100px; text-align: center;">Year</th>
					<th style="width: 150px; text-align: center;">NFC</th>
					<th style="width: 150px; text-align: center;">AFC</th>
				</tr>
				<?php
				$i=1;
				while ($i <= $bowls && $r=mysqli_fetch_array($sql)){
				?>
				<tr>
					<td style="background-color: white;"><?php echo $r['year'];?></td>
					<td id="<?php echo $r['nfcShort']?>" style="font-weight: bold;"><a href="team.php?id=<?php echo $r['nfcShort'];?>"><img src="../../Assets/NFL/<?php echo $r['nfcShort']?>.png" style="float:left;" width=30 height=30></a><span style="float: left; padding-top: 6px; width:100px;"><?php echo $r['nfc']?></span></td>
					<td id="<?php echo $r['afcShort']?>" style="font-weight: bold;"><a href="team.php?id=<?php echo $r['afcShort'];?>"><img src="../../Assets/NFL/<?php echo $r['afcShort']?>.png" style="float:right;" width=30 height=30></a><span style="float: right; padding-top: 6px; width:100px;"><?php echo $r['afc']?></span></td>
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
		<div align="center">
			<button id="back" align="center" onclick="window.location.href='superbowls.php'"><< Real Super Bowls</button>
		</div>
	</body>
</html>
<style>

	body {
		background-color: #00356e;
		background-image: linear-gradient(rgb(0,53,110), white, rgb(202, 9, 19));
	}

	h1 {
		font-size: 120px;
		color: #ca0913;
		text-shadow: 5px 5px white;
		margin:15px;
	}

	h3 {
		color: white;
		text-shadow: 2px 2px black;
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

	#back {
		margin-bottom: 5%;
		font-size: 16px;
		border-radius: 8px;
		border: 2px solid white;
		box-shadow: 2px 2px black;
	}
	#back:hover {
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