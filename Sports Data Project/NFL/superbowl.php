<?php
include("../../session.php");
include("../../nestedsidenav.php");

//Shortcuts
$sp = "&nbsp";
$n = "<br>";
//Set the id clicked to the id
$id = strtoupper($_GET['sb']);
//Set that id to the session id
$_SESSION['sb'] = $id;

//Grab all data from the Super Bowl that was clicked on
$teamcheck = mysqli_query($db, "SELECT * FROM superbowls WHERE roman = '" . $id . "'");
$r = mysqli_fetch_array($teamcheck);

$sblogo = $r['sblogo'];

$winners = $r['winners'];
$losers = $r['losers'];

$winpic = $r['winnerlogo'];
$losepic = $r['loserlogo'];

$stadium = ucwords($r['location']);
$city = ucwords($r['city']);
$state = strtoupper($r['state']);

$day = date('F j, Y',strtotime($r['date']));
$recap = $r['recap'];

?>

<html>
	<head>
		<title>Super Bowl <?php echo $id;?></title>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<link rel='stylesheet' type='text/css' href='../../stylesheet.css'/>
		<link rel='stylesheet' type='text/css' href='schedulestyle.css'/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>
		<h1 align="center">Super Bowl <?php echo $id;?></h1>
		<div id="logo" align="center"><img src="../../Assets/NFL/SB/<?php echo $sblogo;?>" height=250 weight=250/>
		<div id="teams">
			<div id ="winner">
				<table id="win">
					<tr id="<?php echo $winners;?>">
						<th><img src="../../Assets/NFL/<?php echo $winpic ?>"; height=150 width=150/></th>
					</tr>
					<tr>
						<td><?php echo $r['winningscore'];?></td>
					</tr>
				</table>
			</div>

			<div id = "loser">
				<table id="lose">
					<tr id="<?php echo $losers;?>">
						<th><img src="../../Assets/NFL/<?php echo $losepic ?>"; height=150 width=150/></th>
					</tr>
					<tr>
						<td><?php echo $r['losingscore'];?></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="location" align="center">
			<span><?php echo $stadium;?></span>
			<br>
			<span><?php echo $city . ", " . $state;?></span>
			<br>
			<span style="font-size: 45px;"><?php echo $day;?></span>
		</div>
		<img src="../../Assets/NFL/SB/<?php echo $id;?>Action.jpg" height=300 width=300 style="position: relative; left: 5px; top: 15px;"/>
		<br>
		<div id ="recap" align="center">
			<p><?php echo $recap;?></p>
		</div>
	</body>
</html>
<style>

	body {
		background-color: black;
	}

	h1 {
		color: white;
		font-size: 64px;
		margin-bottom: -30px;
	}

	#winner {
		float: left;
		position: relative;
		margin-top: 10%;
		margin-left: 25%;
	}

	#win {
		border: 3px solid silver;
		border-radius: 5px;
	}

	#win th {
		color: white;
		padding: 3px;
		text-align: center;
		font-size: 70px;
		width: 100px;
	}

	#win td {
		background-color: white;
		color: black;
		padding: 3px;
		font-size: 65px;
		text-align: center;
	}

	#loser {
		float: right;
		position: relative;
		margin-top: 10%;
		margin-right: 25%;
	}

	#lose {
		border-style: collapse;
		border: 3px solid silver;
		border-radius: 5px;
	}

	#lose th {
		color: white;
		padding: 3px;
		text-align: center;
		font-size: 70px;
		width: 100px;
	}

	#lose td {
		background-color: white;
		color: black;
		padding: 3px;
		font-size: 65px;
		text-align: center;
	}	

	#location {
		color: white;
		font-size: 20px;
	}

	#recap {
		color: white;
		margin-left: 25%;
		margin-right: 25%;
		width: auto;
		margin-bottom: 5%;
		margin-top: 3%;
	}
</style>