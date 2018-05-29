
	<?php
	
	









		

		$connect = mysqli_connect("localhost", "root", "", "corporate_directory");

		if(!$connect) {
			die('Could not connect: '.mysqli_error());
		} else {
			echo 'JSON.API';
		}
		$query = "SELECT firstname FROM employee";
				 $result = mysqli_query($connect, $query);
			$row = mysqli_fetch_array($result);
				 


		if($_SERVER['REQUEST_METHOD'] = 'GET') {
		
			if(isset($_GET["name"])) {

				 $connect = mysqli_connect("localhost", "root", "", "corporate_directory");
				 
				 $query = "SELECT firstname FROM employee";

				 $result = mysqli_query($connect, $query);
				 $row = mysqli_fetch_array($result);
				 
				
				 
				 	header('Content-Type: application/json');
			 		print(json_encode($row, JSON_PRETTY_PRINT));
			 	
			} else {
				echo 'not found';
			}
		}

	
	?>