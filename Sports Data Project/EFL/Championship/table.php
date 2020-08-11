<?php
include("../../../session.php");
include("../../../eflsidenav.php");
$sp = "&nbsp";
$n = "<br>";

?>


<html>

<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="../eflstyle.css">
	<title>EFL Championship Table</title>
	<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="favicon2.ico">
</head>
<script>
	function openTab(evt, tabName) {
		// Declare all variables
		var i, tabcontent, tablinks;

		// Get all elements with class="tabcontent" and hide them
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		// Get all elements with class="tablinks" and remove the class "active"
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}

		// Show the current tab, and add an "active" class to the button that opened the tab
		document.getElementById(tabName).style.display = "block";
		evt.currentTarget.className += " active";
	}
</script>

<body>

	<h1 align="center"><a href='../Championship' style="text-decoration: none; color:white;">EFL Championship Table</a></h1>
	<div class="tab" align="center">
		<button class="tablinks active" onclick="openTab(event, 'champstandings')" style="font-family: 'Cambo', Times, serif; font-size: 22px;">2019-20 Table</button>
	</div>
	<div class="tabcontent" id="champstandings" style="display:block;">
		<div class="tab-container" align="center">
			<h3 style="margin-top: -10px;">Championship Table</h3>
			<div id="champ" class="champtable">
				<?php
				$champ = mysqli_query($db, "SELECT * FROM efl_clubs WHERE league = 'Championship' ORDER BY pts DESC, gd DESC, gf DESC, nickname ASC");
				$champrows = mysqli_num_rows($champ);
				?>
				<table>
					<tr>
						<th style="width:175px;">Club</th>
						<th style="width:65px;">Points</th>
						<th style="width:75px;">Record</th>
						<th style="width:65px;">GF</th>
						<th style="width:65px;">GA</th>
						<th style="width:65px;">GD</th>
						<th style="width:65px;">Rem.</th>
					</tr>
					<?php
					$i = 1;
					while ($i <= $champrows && $r = mysqli_fetch_array($champ)) {
						$rem = 46 - $r['wins'] - $r['losses'] - $r['draws'];
						?>
						<tr>
							<td id="<?php echo $r['teamShort']; ?>"><img src="../../../Assets/EFL/Championship/<?php echo $r['logo']; ?>" style="float:left; padding:3px;" width=30 height=30><span style="float: right; padding: 8px;" width=100;><?php echo $r['nickname'] ?></span></td>
							<td><?php echo $r['pts']; ?></td>
							<td><?php echo $r['wins'] . "-" . $r['draws'] . "-" . $r['losses']; ?></td>
							<td><?php echo $r['gf']; ?></td>
							<td><?php echo $r['ga']; ?></td>
							<td><?php echo $r['gd']; ?></td>
							<td><?php echo $rem; ?></td>
						</tr>
					<?php
						$i++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>

</html>
<style>
	body {
		background-color: navy;
	}

	h1 {
		font-size: 120px;
		color: white;
		text-shadow: 3px 3px red;
		margin: 15px;
	}

	h2 {
		font-size: 30px;
		color: white;
		text-shadow: 2px 2px #ca0913;
	}

	.tab {
		border: 3px solid white;
		/* background-color: chocolate; */
		background-image: linear-gradient(red, white);
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		display: flex;
		overflow-x: scroll;
		scrollbar-width: none;
	}

	.tab::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0);
		box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
		border-radius: 10px;
		background-color: transparent;
	}

	.tab::-webkit-scrollbar {
		width: 0px;
		background-color: transparent;
	}

	.tab::-webkit-scrollbar-thumb {
		border-radius: 10px;
		-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0);
		box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
		background-color: rgba(0, 0, 0, 0);
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 15px 6px 15px 6px;
		text-align: center;
		transition: 0.3s;
		font-size: 18px;
		background-image: linear-gradient(black, purple);
		color: white;
		margin: 3px;
		width: 225px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-image: linear-gradient(purple, white);
		color: yellow;
		border: none;

	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-image: linear-gradient(navy, white);
		/* background-color: white; */
		color: black;

	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 3px solid white;
		border-top: none;
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		background-color: white;
		color: black;
		margin-bottom: 30px;
	}

	#mlsstandings {
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		margin-bottom: 15px;
	}

	caption {
		margin-bottom: 5px;
	}

	table {
		border-collapse: collapse;
		text-align: center;
	}

	#champ tr:nth-child(2) {
		background-color: gold;
	}

	#champ tr:nth-child(3) {
		background-color: rgba(0, 255, 0, .2);
	}

	#champ tr:nth-child(4) {
		background-color: rgba(0, 0, 255, .3);
	}

	#champ tr:nth-child(5) {
		background-color: rgba(0, 0, 255, .3);
	}

	#champ tr:nth-child(6) {
		background-color: rgba(0, 0, 255, .3);
	}

	#champ tr:nth-child(7) {
		background-color: rgba(0, 0, 255, .3);
	}

	#champ tr:nth-child(25) {
		background-color: rgba(255, 0, 0, .5);
	}

	#champ tr:nth-child(23) {
		background-color: rgba(255, 0, 0, .5);
	}

	#champ tr:nth-child(24) {
		background-color: rgba(255, 0, 0, .5);
	}

	#champ th {
		background-color: red;
		color: navy;
	}

	table td,
	th {
		border: 2px solid black;
		padding: 2px;
	}

	#NTG,
	#SHF {
		font-size: 14px;
	}
</style>