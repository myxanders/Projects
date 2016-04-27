<?php 
require 'sql.php'; //We need sql.php for this page
session_start(); //Begins the session

//Creates the reservations table if it does not already exist.
if (!tableExists("Reservations")) {
	if (!createTable("Reservations", [
			"id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
			"name TINYTEXT NOT NULL",
			"residence TINYTEXT NOT NULL"
		])) {
		echo "ERROR: Could not create Reservations Table";
	}

}
//If the user picks a residence area on index.php, this inserts them into the database and removes an open spot in their dorm.
if($_SESSION["PrefResArea"] !== "No Preference") {
	$PrefResArea = $_SESSION["PrefResArea"];
	insertInto("Reservations", ["name", "residence"], ["'" . $_SESSION["Name"] . "'", "'" . $_SESSION["PrefResArea"] . "'"]);
	$results = query("SELECT vacancy FROM $table WHERE name= '$PrefResArea'");
	$vacancy = mysqli_fetch_assoc($results)["vacancy"];
	mysqli_free_result($results);

	$vacancy--;
	if (!query("UPDATE $table SET vacancy = $vacancy WHERE name= '$PrefResArea'")) {
		echo "ERROR: " . mysqli_error($conn);
	}
} 
else {//If the user picks a residence area on verify.php, this does the same.
	$PrefResArea = $_POST["PrefResArea"];
	insertInto("Reservations", ["name", "residence"], ["'" . $_SESSION["Name"] . "'", "'" . $_POST["PrefResArea"] . "'"]);
	$results = query("SELECT vacancy FROM $table WHERE name= '$PrefResArea'");
	$vacancy = mysqli_fetch_assoc($results)["vacancy"];
	mysqli_free_result($results);

	$vacancy--;
	if (!query("UPDATE $table SET vacancy = $vacancy WHERE name= '$PrefResArea'")) {
		echo "ERROR: " . mysqli_error($conn);
	}
}
?>
<html>
<title>Hack Attack Residence Recommendations</title> <!--Again, our site title-->
<head>
	<style type="text/css"> /*We want our page to look nice for you*/
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
				//This is where all of your information is recalled.
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
				//This is where all of that information gets displayed on screen.
    			echo "<p><center>Name: $Name</center></p>";
    			echo "<p><center>CWID: $CWID</center></p>"; 
    			echo "<p><center>Gender: $Gender</center></p>";
    			echo "<p><center>Special Needs: $SpecialNeeds</center></p>";
    			echo "<p><center>Laundry: $Laundry</center></p>";
    			echo "<p><center>Kitchen: $Kitchen</center></p>";
    			echo "<p><center>Class: $Class</center></p>";
    			echo "<p><center>Preferred Residence Area: $PrefResArea</center></p>";
    			?>
    			<center>Confirmation Number: <?php
    			//We fetch your ID number by located where you are located on our reservation list.
				$results = query("SELECT id FROM $table2 WHERE name = '" . $_SESSION["Name"] . "'");
				echo mysqli_fetch_assoc($results)['id'];
				mysqli_free_result($results);
    			?></center>
			</div>
		</div>
	</body>		
</html>
