<?php
//Conditional CSS styling for team pages
	header("Content-type: text/css; charset: UTF-8");
	include("../../session.php");
	$currentTeam = 	$_SESSION['id'];
	$sql= "SELECT priColor, secColor, terColor FROM mlsteams WHERE teamShort = '". $currentTeam ."'";
	$colors = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($colors);
	$primary = $row['priColor'];
	$secondary = $row['secColor'];
	$tertiary = $row['terColor'];
?>


body {
	background-color: <?php echo $primary?>;
}

.pic {
	height: 200px;
	width: 200px;
	border-radius: 8px;
	border: 5px solid <?php echo $secondary?>;
	margin-left: 40%;
	margin-top: 5%;
	padding: 2%;
	background-color: white;
}

h1 {
	color: <?php echo $primary?>;
}

.team-container {
	display: block;
	width: 80%;
	margin-left: 10%;
	background-color: white;
	border: 3px solid <?php echo $secondary;?>;
	border-radius: 8px;
	margin-top: 5px;
}

.records {
	border-collapse: collapse;
}

.records td, .records th {
	border: 2px solid <?php echo $secondary;?>;
	padding: 8px;
}

.records tr {
	background-color: #f0f0f0;
}

.records th {
	background-color: <?php echo $primary;?>;
	color: white;
	text-align: center;
}

p {
	border: 5px solid <?php echo $primary;?>;
	padding: 15px;
	border-radius: 8px;
	font-size: 20px;
}