<?php
include("../../session.php");
include("../../sidenav.php");
$n = "<br>";

?>


<html>

<head>
	<meta charset="UTF-8">
	<Title>NBA Teams</Title>
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='nbastyle.css' />
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>

<body>
	<h1 align="center"><a href='../NBA' style="text-decoration: none; color: white;">NBA</a></h1>
	<h2 align="center">Select a team to view their profile.</h2>
	<div id="nbateams" align="left">
		<button class="accordion" id="afc">Western Conference</button>
		<div class="panel">
			<button class="accordion" id="afc">Northwest</button>
			<div class="panel" style="background-color: #dddddd;">
				<div align=center>
					<?php
					$sql = "SELECT * FROM nbateams WHERE conference = 'West' AND division = 'Northwest' ORDER BY team ASC";
					$res = mysqli_query($db, $sql);
					if (mysqli_num_rows($res) > 0) {
						$i = 1;

						while ($row = mysqli_fetch_array($res)) {
							?>
					<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/NBA/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
					<?php
							$i++;
						}
					}
					?>
				</div>
			</div>
			<button class="accordion" id="afc">Pacific</button>
			<div class="panel" style="background-color: #dddddd;">
				<div align=center>
					<?php
					$sql = "SELECT * FROM nbateams WHERE conference = 'West' AND division = 'Pacific' ORDER BY team ASC";
					$res = mysqli_query($db, $sql);
					if (mysqli_num_rows($res) > 0) {
						$i = 1;

						while ($row = mysqli_fetch_array($res)) {
							?>
					<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/NBA/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
					<?php
							$i++;
						}
					}
					?>
				</div>
			</div>
			<button class="accordion" id="afc">Southwest</button>
			<div class="panel" style="background-color: #dddddd;">
				<div align=center>
					<?php
					$sql = "SELECT * FROM nbateams WHERE conference = 'West' AND division = 'Southwest' ORDER BY team ASC";
					$res = mysqli_query($db, $sql);
					if (mysqli_num_rows($res) > 0) {
						$i = 1;

						while ($row = mysqli_fetch_array($res)) {
							?>
					<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/NBA/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
					<?php
							$i++;
						}
					}
					?>
				</div>
			</div>
		</div>
		<button class="accordion" id="nfc">Eastern Conference</button>
		<div class="panel">
			<button class="accordion" id="nfc">Atlantic</button>
			<div class="panel" style="background-color: #dddddd;">
				<div align=center>
					<?php
					$sql = "SELECT * FROM nbateams WHERE conference = 'East' AND division = 'Atlantic' ORDER BY team ASC";
					$res = mysqli_query($db, $sql);
					if (mysqli_num_rows($res) > 0) {
						$i = 1;

						while ($row = mysqli_fetch_array($res)) {
							?>
					<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/NBA/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
					<?php
							$i++;
						}
					}
					?>
				</div>
			</div>
			<button class="accordion" id="nfc">Central</button>
			<div class="panel" style="background-color: #dddddd;">
				<div align=center>
					<?php
					$sql = "SELECT * FROM nbateams WHERE conference = 'East' AND division = 'Central' ORDER BY team ASC";
					$res = mysqli_query($db, $sql);
					if (mysqli_num_rows($res) > 0) {
						$i = 1;

						while ($row = mysqli_fetch_array($res)) {
							?>
					<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/NBA/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
					<?php
							$i++;
						}
					}
					?>
				</div>
			</div>
			<button class="accordion" id="nfc">Southeast</button>
			<div class="panel" style="background-color: #dddddd;">
				<div align=center>
					<?php
					$sql = "SELECT * FROM nbateams WHERE conference = 'East' AND division = 'Southeast' ORDER BY team ASC";
					$res = mysqli_query($db, $sql);
					if (mysqli_num_rows($res) > 0) {
						$i = 1;

						while ($row = mysqli_fetch_array($res)) {
							?>
					<button class="app" id="<?php echo $row['teamShort']; ?>" onclick="window.location.href='team.php?id=<?php echo $row['teamShort'] ?>'" style="font-family: 'Cambo', Times, serif; background-image: url('../../Assets/NBA/<?php echo $row['logo'] ?>'); background-size: 50px 50px; background-repeat: no-repeat; background-position-x: center;"><span style="position: relative; top: 20px; background-color: rgba(255,255,255,0.5); border-radius: 4px; text-shadow:1px 1px <?php echo $row['terColor'] ?>; padding: 0px 4px;"><?php echo $row['team']; ?></span></button>
					<?php
							$i++;
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				/* Toggle between adding and removing the "active" class,
				to highlight the button that controls the panel */
				this.classList.toggle("active");

				/* Toggle between hiding and showing the active panel */
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
		background-image: linear-gradient(firebrick, white);
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
		margin: 0;
	}
	h1 {
		font-size: 120px;
		color: #ca0913;
		text-shadow: 5px 5px red;
		margin: 15px;
	}

	h2 {
		font-size: 40px;
		text-shadow: 2px 2px red;
		color: white;
	}

	#nbateams {
		padding-top: 2%;
		margin-left: 15%;
		margin-right: 15%;
		width: auto;
		margin-bottom: 50px;
	}

	#afc {
		background-color: red;
	}

	#nfc {
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


	.subaccordion {
		background-color: black;
		color: white;
		cursor: pointer;
		padding: 18px;
		width: 80%;
		border: 1px solid white;
		text-align: left;
		outline: none;
		font-size: 20px;
		transition: 0.4s;
	}

	.subaccordion:hover {
		background-color: #ccc;
		color: black;
	}

	.subaccordion:after {
		content: '\02795';
		/* Unicode character for "plus" sign (+) */
		font-size: 13px;
		color: #777;
		float: right;
		margin-left: 5px;
	}
</style>