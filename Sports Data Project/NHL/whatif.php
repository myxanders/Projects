<?php
include("../../session.php");
include("../../nestedsidenav.php");

//Shortcuts for concatenation
$sp = "&nbsp";
$n = "<br>";

$sql = mysqli_query($db, "SELECT * FROM whatif_stanleycup WHERE eShort != 'TBD' AND wShort != 'TBD' ORDER BY year DESC");
$bowls = mysqli_num_rows($sql);


?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>Almost Stanley Cup Matchups</title>
		<link rel='stylesheet' type='text/css' href='nhlstyle.css'/>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../NHL' style="text-decoration: none; color: white;">NHL</a></h1>
		<h3 align="center" style="color:white;">What if the other conference finalists won their respective trophies?</h3>
		<div class="history" align="center" style="margin-top: 10px">
			<table align="center" id="bowls">
				<tr>
					<th style="width: 100px; text-align: center;">Year</th>
					<th style="width: 175px; text-align: center;">West</th>
					<th style="width: 175px; text-align: center;">East</th>
				</tr>
				<?php
				$i=1;
				while ($i <= $bowls && $r=mysqli_fetch_array($sql)){
				?>
				<tr>
					<td style="background-color: white;"><?php echo $r['year'];?></td>
					<td id="<?php echo $r['wShort']?>" style="font-weight: bold;"><a href="team.php?id=<?php echo $r['wShort'];?>"><img src="../../Assets/NHL/<?php echo $r['wShort']?>.png" style="float:left;" width=30 height=30></a><span style="float: left; padding-top: 6px; width:125px;"><?php echo $r['west']?></span></td>
					<td id="<?php echo $r['eShort']?>" style="font-weight: bold;"><a href="team.php?id=<?php echo $r['eShort'];?>"><img src="../../Assets/NHL/<?php echo $r['eShort']?>.png" style="float:right;" width=30 height=30></a><span style="float: right; padding-top: 6px; width:125px;"><?php echo $r['east']?></span></td>
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
		<div align="center">
			<button id="back" align="center" onclick="window.location.href='stanleycups.php'"><< Actual Stanley Cups</button>
		</div>
	</body>
</html>
<style>

html {
		height: 100%;
	}

	body {
		background-image: linear-gradient(silver, lightskyblue);
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 120px;
		color: black;
		text-shadow: 5px 5px lightskyblue;
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
		background-color: lightskyblue;
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

/* The following styles are for defunct/rebranded teams */
	#AMD {
		background-color: #512A44;
		color: #00685E;
	}
	#BST {
		background-color: black;
		color: #FFD100;
	}
	#DLS {
		background-color: black;
		color: #154734;
	}
	#MNS {
		background-color: #009639;
		color: #FFD100;
	}
	#MON {
		background-color: #C8102E;
		color: #003087;
	}
	#SEN {
	 	background-color: #e4173e;
	 	color: black;
	}
	#PEN {
		background-color: black;
		color: #CFC493;
	}
	#QBC {
		background-color: #005bbc;
		color: white;
	}	
	#SAB {
		background-color: black;
		color: #C8102E;
	}
	#SJS {
		background-color: black;
		color: #006780;
	}
	#TML {
	 	background-color: #001f5c;
	 	color: white;
	}			
</style> 