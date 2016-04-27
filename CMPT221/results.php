<?php 
session_start();
?>
<html>
<title>Hack Attack Residence Recommendations</title>
<head>
	<style type="text/css">
		#content.absolute {
			position: absolute;
			width: 100%;
			right: 0;
			top: 60px;
		}
		#box.absolute {
			position: absolute;
			width: 500px;
			height: auto;
			background-color: #eeeeee;
			padding: 15px;
			border: 15px solid black;
			margin-left: 31%;
		}
		body {
			background: #c8102e;
		}
		label {
			display: inline-block;
			float: left;
			clear: left;
			width: 50%;
			text-align: right;
		}
		input {
			display: inline-block;
		}
		h1 {
			text-align: center;
			font-size: 36pt;
		}
		#Continue {
			text-align: center;
		}
		#Back {
			text-align: center;
		}
	</style>
</head>
	<body>
		<div class ="absolute" id="content">	
			<div class ="absolute" id = "box">
							<h1><strong> Residence Request Confirmation </strong></h1> 
								<?php
								//echo '<form action="results.php" method="post">';
									
								
										
												

									$Name = $_SESSION["Name"];
									$CWID = $_SESSION["CWID"];
									$Gender = $_SESSION["Gender"];
									$SpecialNeeds = $_SESSION["SpecialNeeds"];
									$Laundry = $_SESSION["Laundry"];
									$Kitchen = $_SESSION["Kitchen"];
									$Class = $_SESSION["Class"];
									// $PrefResArea = $_POST["PrefResArea"];									
									if($_SESSION["PrefResArea"] == "No Preference") {
										$PrefResArea = $_POST["PrefResArea"];
									} else {
										$PrefResArea = $_SESSION["PrefResArea"];
									}
		

									
								echo "<p><center>Name: $Name</center></p>";
								echo "<p><center>CWID: $CWID</center></p>"; 
								echo "<p><center>Gender: $Gender</center></p>";
								echo "<p><center>Special Needs: $SpecialNeeds</center></p>";
								echo "<p><center>Laundry: $Laundry</center></p>";
								echo "<p><center>Kitchen: $Kitchen</center></p>";
								echo "<p><center>Class: $Class</center></p>";
								echo "<p><center>Preferred Residence Area: $PrefResArea</center></p>";

							?>
					</div>
				
			</div>
		</div>
	</body>		
</html>