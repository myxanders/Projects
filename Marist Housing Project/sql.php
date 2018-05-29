<?php
	require 'sql_helper.php'; //We're going to need this to help us

//Create our database if it hasn't been made yet
	 if (!mysqli_select_db($conn, $dbname)) {
		$sql = "CREATE DATABASE $dbname";
		if (mysqli_query($conn, $sql)) {
			mysqli_select_db($conn, $dbname);
		} else {
			echo "Error creating database: " . mysqli_error($conn);
		}
	}
	//Identify our tables
	$table = "Residences";
	$table2 = "Reservations";
	
	//Create our residences table if it doens't already exist
	if(!tableExists($table)) {
		createTable($table, [
			"id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
			"name TINYTEXT NOT NULL",
			"year VARCHAR(1) NOT NULL",
			"laundry VARCHAR(1) NOT NULL",
			"kitchen VARCHAR(1) NOT NULL",
			"vacancy SMALLINT UNSIGNED NOT NULL"
			]);
		
		//Put all these places and their values into our database	
		createRA($table, ["'Leo'", "1", "1", "0"]);
		createRA($table, ["'Champagnat'", "1", "1", "0"]);
		createRA($table, ["'Marian'", "1", "1", "0"]);
		createRA($table, ["'Sheahan'", "1", "1", "0"]);
		createRA($table, ["'Midrise'", "2", "1", "0"]);
		createRA($table, ["'Foy'", "2", "0", "1"]);
		createRA($table, ["'Gartland'", "2", "1", "1"]);
		createRA($table, ["'Upper New'", "2", "1", "1"]);
		createRA($table, ["'Lower West'", "3", "1", "1"]);
		createRA($table, ["'Upper West'", "3", "1", "1"]);
		createRA($table, ["'Lower New'", "2", "1", "1"]);
		createRA($table, ["'Talmadge'", "3", "1", "1"]);
		createRA($table, ["'Lower Fulton'", "3", "1", "1"]);
		createRA($table, ["'Middle Fulton'", "3", "0", "1"]);
		createRA($table, ["'Upper Fulton'", "3", "0", "1"]);
	}

?>