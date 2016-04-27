<?php
require'database.php';
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
			#Submit {
				text-align: center;
			}
		</style>
	</head>
		<body>
			<div class ="absolute" id="content">	
				<div class ="absolute" id = "box">
					<h1><strong> Residence Request Form </strong></h1> 
				    	<form action="verify.php" method="post">
							<div id="form">
								<label>Full Name: </label><input type="text" name="Name" value="<?php $_SESSION['Name']; ?>"> <br> <br>
								<label>CWID: </label><input type="text" name="CWID"> <br> <br>
								<label>Gender: </label><input type="radio" name="Gender" value="Male" checked="true"> M 
										<input type="radio" name="Gender" value="Female"> F <br> <br>	
								<label>Special Needs?  </label><input type="radio" name="SpecialNeeds" value="Yes"> Y
												<input type="radio" name="SpecialNeeds" value="No"> N
												<input type="radio" name="SpecialNeeds" value="No Preference" checked="true"> No Preference <br> <br>
								<label>On-Site Laundry? </label><input type="radio" name="Laundry" value="Yes"> Y
										 		 <input type="radio" name="Laundry" value="No"> N
										 		 <input type="radio" name="Laundry" value="No Preference" checked="true"> No Preference <br> <br>
								<label>Full Kitchen? </label><input type="radio" name="Kitchen" value="Yes"> Y
											  <input type="radio" name="Kitchen" value="No"> N
											  <input type="radio" name="Kitchen" value="No Preference" checked="true"> No Preference <br> <br>
								<label>Class Year: </label><select name="Class">
												<option value="Freshman">Freshman</option>
												<option value="Sophomore">Sophomore</option>
												<option value="Junior">Junior</option>
												<option value="Senior">Senior</option>
											</select>
											<br> <br>
								<label>Preferred Residential Area: </label><select name="PrefResArea">
																<option value="No Preference">--------No Preference--------</option>
																<option value="Champagnat">Champagnat Hall</option>
																<option value="Foy">Foy Townhouses</option>
																<option value="Gartland">Gartland Commons</option>
																<option value="Leo">Leo Hall</option>
																<option value="Lower Fulton">Lower Fulton Townhouses</option>
																<option value="Lower New">Lower New Townhouses</option>
																<option value="Lower West">Lower West Townhouses</option>
																<option value="Marian">Marian Hall</option>
																<option value="Middle Fulton">Middle Fulton Townhouses</option>
																<option value="Midrise">Midrise Hall</option>
																<option value="Sheahan">Sheahan Hall</option>
																<option value="Talmadge">Talmadge Court</option>
																<option value="Upper Fulton">Upper Fulton Townhouses</option>
																<option value="Upper New">Upper New Townhouses</option>
																<option value="Upper West">Upper West Townhouses</option>
															</select>
															<br> <br>
															<?php
															// $_SESSION["Name"] = $Name;															
															// $_SESSION["CWID"] = "CWID";															
															// $_SESSION["Gender"] = "Gender";															
															// $_SESSION["SpecialNeeds"] = "Special Needs";															
															// $_SESSION["Laundry"] = ":Laundry";															
															// $_SESSION["Kitchen"] = "Kitchen";															
															// $_SESSION["Class"] = "Class";															
															// $_SESSION["PrefResArea"] = "PrefResArea";															
																													
															?>
								<p id="Submit"><input type="submit" value="Submit" name="submit"></p>
							</form>
						</div>
				</div>
			</div>
		</body>		
</html>