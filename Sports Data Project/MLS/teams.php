<?php
include("../../session.php");
include("../../nestedsidenav.php");
$n = "<br>";
?>


<html>

<head>
	<meta charset="UTF-8">
	<Title>MLS Teams</Title>
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" type="text/css" href="mlsstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>

<body>
	<h1 align="center"><a href='../MLS' style="text-decoration: none; color: white;">MLS</a></h1>
	<h2 align="center">Select a team to view their profile.</h2>
	<div id="mlsteams" align="left">
		<button class="accordion" id="west">Western Conference</button>
		<div class="panel" style="background-color: #dddddd;">
			<div align=center>
				<?php
				$sql = "SELECT * FROM mlsteams WHERE conference = 'West' ORDER BY team ASC";
				$res = mysqli_query($db, $sql);
				if (mysqli_num_rows($res) > 0) {
					$i = 1;

					while ($row = mysqli_fetch_array($res)) {
				?>
						<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/MLS/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
				<?php
						$i++;
					}
				}
				?>
			</div>
		</div>
		<button class="accordion" id="east">Eastern Conference</button>
		<div class="panel" style="background-color: #dddddd;">
			<div align=center>
				<?php
				$sql = "SELECT * FROM mlsteams WHERE conference = 'East' ORDER BY team ASC";
				$res = mysqli_query($db, $sql);
				if (mysqli_num_rows($res) > 0) {
					$i = 1;

					while ($row = mysqli_fetch_array($res)) {
				?>
						<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/MLS/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
				<?php
						$i++;
					}
				}
				?>
			</div>
		</div>
	</div>
	<script>
		//JavaScript accordion
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("active");

				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			});
		}
	</script>
</body>

</html>
<style>
	html {
		height: 100%;
	}

	body {
		background-image: linear-gradient(darkgreen, limegreen);
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 5px 5px black;
		margin: 15px;
	}

	#mlsteams {
		padding-top: 2%;
		margin-left: 15%;
		margin-right: 15%;
		width: auto;
	}

	#west {
		background-color: red;
	}

	#east {
		background-color: dodgerblue;
	}

	.accordion {
		background-color: black;
		color: white;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border: 1px solid white;
		text-align: left;
		outline: none;
		font-size: 20px;
		transition: 0.4s;
	}

	.active {
		background-color: white;
		color: black;
	}

	.accordion:hover {
		background-color: #ccc;
		color: black;
	}

	.accordion:after {
		content: '\02795';
		/* Unicode character for "plus" sign (+) */
		font-size: 13px;
		color: #777;
		float: right;
		margin-left: 5px;
	}

	.active:after {
		content: "\2796";
		/* Unicode character for "minus" sign (-) */
	}

	.panel {
		padding: 20px;
		display: none;
		background-color: white;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}

	.app {
		font-family: 'Cambo', Times, serif;
		font-size: 20px;
		font-weight: bold;
		width: 150px;
		height: 75px;
		background-color: black;
		color: white;
		border: 5px solid white;
		border-radius: 8px;
		padding: 2%;
		transition-duration: 0.3s;
		margin: 2px 4px 2px 4px;
		cursor: pointer;
	}

	.app:hover {
		color: black;
		background-color: white;
		border: 5px solid yellow;
		transition-duration: 0.3s;
		cursor: pointer;
	}
/* The following teams' names are too large to fit comfortably in their boxes */
	#DC,
	#TOR {
		font-size: 18px;
	}

	#SJ,
	#SKC,
	#ATL,
	#NSH,
	#MIA {
		font-size: 16px;
	}

	#CIN {
		font-size: 15px;
	}

	#RSL {
		font-size: 14px;
	}

	#MIN,
	#OSC {
		font-size: 13px;
	}
</style>