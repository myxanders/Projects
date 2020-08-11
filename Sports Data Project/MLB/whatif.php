<?php
include("../../session.php");
include("../../nestedsidenav.php");


$sql = mysqli_query($db, "SELECT * FROM whatif_worldseries ORDER BY year DESC");
$bowls = mysqli_num_rows($sql);


?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>Almost World Series Matchups</title>
		<link rel='stylesheet' type='text/css' href='mlbstyle.css'/>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../MLB' style="text-decoration: none; color: white;">MLB</a></h1>
		<h3 align="center" style="color:white;">What if the other conference finalists won their respective titles?</h3>
		<div class="history" align="center" style="margin-top: 10px">
			<table align="center" id="bowls">
				<tr>
					<th style="width: 100px; text-align: center;">Year</th>
					<th style="width: 150px; text-align: center;">AL</th>
					<th style="width: 150px; text-align: center;">NL</th>
				</tr>
				<?php
				$i=1;
				while ($i <= $bowls && $r=mysqli_fetch_array($sql)){
				?>
				<tr>
					<td style="background-color: white;"><?php echo $r['year'];?></td>
					<td id="<?php echo $r['alShort']?>" style="font-weight: bold;"><a href="team.php?id=<?php echo $r['alShort'];?>"><img src="../../Assets/MLB/<?php echo $r['alShort']?>hat.png" style="float:left;" width=30 height=30></a><span style="float: left; padding-top: 6px; width:100px;"><?php echo $r['al']?></span></td>
					<td id="<?php echo $r['nlShort']?>" style="font-weight: bold;"><a href="team.php?id=<?php echo $r['nlShort'];?>"><img src="../../Assets/MLB/<?php echo $r['nlShort']?>hat.png" style="float:right;" width=30 height=30></a><span style="float: right; padding-top: 6px; width:100px;"><?php echo $r['nl']?></span></td>
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
		<div align="center">
			<button id="back" align="center" onclick="window.location.href='worldseries.php'"><< Actual World Series</button>
		</div>
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

	#HST {
		background-color: black;
		color: #9A3324;
	}

	#AST {
		background-color: #ff4819;
		color: #002147;
	}

	#BLT {
		background-color: black;
		color: #fc4c02;
	}

	#CHW {
		background-color: #002144;
		color: white;
	}

	#PHL {
		background-color: #6f263d;
		color: white;
	}	

	#MTL {
		background-color: #002e89;
		color: white;
	}	

	#ANA {
		background-color: #021b2c;
		color: #c1033b;
	}

	#RED {
		background-color: #d6083b;
		color: white;
	}			
</style> 