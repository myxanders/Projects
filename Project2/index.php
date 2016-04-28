<?php
require'sql.php'; //We need sql.php to run this page
$result = mysqli_query($conn, "SELECT name, vacancy FROM $table"); //We are defining our results here.
session_start(); //Let's start the session!
?>
<html>
	<title>Hack Attack Residence Recommendations</title> <!-- This is the title of our page-->
	<head>
		<style type="text/css"> /* We wanted to make our page look neater.*/
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
					<h1><strong> Residence Request Form </strong></h1> <!-- This is the title at the top of the form. --> 
				    	<form action="verify.php" method="post"> <!-- This sends the completed form to verify once the button is pressed. -->
							<div id="form">
								<label>Full Name: </label><input type="text" name="Name" required="required" autofocus="autofocus"> <br> <br> <!--You insert your full name into a textbox.-->
								<label>CWID: </label><input type="text" name="CWID" required="required" maxlength="8"> <br> <br><!--You insert your CWID into a textbox-->
								<label>Gender: </label><input type="radio" name="Gender" required="required" value="Male"> M <!-- This creates radio buttons for the male and female gender-->
										<input type="radio" name="Gender" value="Female"> F <br> <br>	
								<label>Special Needs?  </label><input type="radio" name="SpecialNeeds" value="Yes"> Y <!--This creates radio buttons to adjust your Special Needs Preferences-->
												<input type="radio" name="SpecialNeeds" value="No"> N
												<input type="radio" name="SpecialNeeds" value="No Preference" checked="true"> No Preference <br> <br> <!--This defaults the selection to "No Preference"-->
								<label>On-Site Laundry? </label><input type="radio" name="Laundry" value="Yes"> Y <!--This creates radio buttons to adjust your Laundry Preferences-->
										 		 <input type="radio" name="Laundry" value="No"> N
										 		 <input type="radio" name="Laundry" value="No Preference" checked="true"> No Preference <br> <br> <!--This defaults the selection to "No Preference"-->
								<label>Full Kitchen? </label><input type="radio" name="Kitchen" value="Yes"> Y <!--This creates radio buttons to adjust your Kitchen Preferences-->
											  <input type="radio" name="Kitchen" value="No"> N
											  <input type="radio" name="Kitchen" value="No Preference" checked="true"> No Preference <br> <br> <!--This defaults the selection to "No Preference"-->
								<label>Class Year: </label><select name="Class"> <!-- We added a dropdown bar for you to pick which class you're in-->
												<option value="Freshman">Freshman</option>
												<option value="Sophomore">Sophomore</option>
												<option value="Junior">Junior</option>
												<option value="Senior">Senior</option>
											</select>
											<br> <br>
								<label>Preferred Residential Area: </label><select name="PrefResArea"> <!-- This is where you pick where you want to live-->
									<option value= "No Preference">~~No Preference~~</option> <!--If you're not sure yet, this option is defaulted and suggests residence areas on the next page-->
										<?php 
										//We have to display some housing choices.
											while ($row = mysqli_fetch_assoc($result)) {
												echo '<option value="' . $row['name'] . '" ';
												//We don't want you picking a place that is full.
													if ($row['vacancy'] <=0) {
														echo 'disabled="true"';
													}
												else {
													echo '> ' . $row['name'] . ' (' . $row['vacancy'] . ')</option>';
												}
											}	
										?>			
										</select>
										<br>
								<p id="Submit"><input type="submit" value="Submit" name="submit"></p> <!--You have to submit the form before you can move on-->
							</form>
						</div>
				</div>
			</div>
		</body>		
</html>
