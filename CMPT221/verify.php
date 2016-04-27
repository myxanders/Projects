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
/*			float: left;*/
			/*clear: left;*/
			text-align: center;
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
/*			position: static;
*//*			visibility: hidden;*/
		}

		#Back {
			text-align: center;
		}

/*		#bubbles {
			
		
			display: inline-block;
			margin-right: 0px;
			clear: left;
			
		}*/

	</style>
</head>
	<body>
		<div class ="absolute" id="content">	
			<div class ="absolute" id = "box">
				<h1><strong> Residence Request Form </strong></h1> 
			    		<p><center><input type="hidden" name="Name" value="<?php $_SESSION['Name']; ?>" ></input></center></p>
							<?php

								$Name = $_POST["Name"];
								$_SESSION["Name"] = $Name;
								$CWID = $_POST["CWID"];
								$_SESSION["CWID"] = $CWID;
								$Gender = $_POST["Gender"];
								$_SESSION["Gender"] = $Gender;
								$SpecialNeeds = $_POST["SpecialNeeds"];
								$_SESSION["SpecialNeeds"] = $SpecialNeeds;
								$Laundry = $_POST["Laundry"];
								$_SESSION["Laundry"] = $Laundry;
								$Kitchen = $_POST["Kitchen"];
								$_SESSION["Kitchen"] = $Kitchen;
								$Error = "Error: The information you submitted is invalid. Please fix any errors and try again.";
								$Confirm = "Congrats! You've got a match! Press Continue to Confirm.";
								$Forgot = "Oops! You forgot to pick a gender!";
								$FrOnly = "Sorry! Only freshmen can live here. Try Again.";

								echo "<p><center>Name: $Name</center></p>";
								echo "<p><center>CWID: $CWID</center></p>";
								echo "<p><center>Gender: $Gender</center></p>";
								
								echo '<form method="post" action="results.php" id="form">';
								if(isset($_POST['submit']) ) {
									$Class = $_POST["Class"];
									$_SESSION["Class"] = $Class;
									$PrefResArea = $_POST["PrefResArea"];
									$_SESSION["PrefResArea"] = $PrefResArea;
										if (($PrefResArea == "Champagnat") || ($PrefResArea == "Leo") || ($PrefResArea == "Marian") || ($PrefResArea == "Sheahan")) {
											if($Laundry !== "No" && $Kitchen !== "Yes") { 
												if($Class == "Freshman") {
												echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
												?>
												<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
												<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
												<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$FrOnly</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
												?>
												<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
												<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
												<?php
											}
										}
										elseif (($PrefResArea == "Gartland") || ($PrefResArea == "Lower New") || ($PrefResArea == "Upper New")) {
											if($Laundry !== "No" && $Kitchen !== "No") {
												if($Class == "Sophomore") {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
												?>
												<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
												<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
												<?php
											}
										}
										elseif ($PrefResArea == "Foy") {
											if($Laundry !== "Yes" && $Kitchen !== "No") {
												if($Class == "Sophomore") {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
												?>
												<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
												<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
												<?php
											}
										}
										elseif ($PrefResArea == "Midrise") {
											if($Laundry !== "No" && $Kitchen !== "Yes") {
												if($Class == "Sophomore") {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
													<?php
												}
											}else {
												echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
												?>
												<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
												<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
												<?php
											}
										}
										elseif (($PrefResArea == "Lower West") || ($PrefResArea == "Upper West") || ($PrefResArea == "Lower Fulton") || ($PrefResArea == "Talmadge")) {
											if($Laundry !== "No" && $Kitchen !== "No") {
												if(($Class == "Junior") || ($Class == "Senior")) {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
												?>
												<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
												<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
												<?php
											}
										} 
										elseif (($PrefResArea == "Upper Fulton") || ($PrefResArea == "Middle Fulton")) {
											if($Laundry !== "Yes" && $Kitchen !== "No") {
												if(($Class == "Junior") || ($Class == "Senior")) {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
												?>
												<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
												<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
												<?php
											}
										}
										elseif ($PrefResArea == "No Preference") { 
											if ($Class == "Freshman") {
												if($Laundry !== "No" && $Kitchen !== "Yes") {
													?>
														<!-- <p><label>Please Select A Residence Area: </label><select name="PrefResArea">
																<option value="Champagnat">Champagnat Hall</option>
																<option value="Leo">Leo Hall</option>
																<option value="Marian">Marian Hall</option>
																<option value="Sheahan">Sheahan Hall</option></p> -->
													<center><label>Pick a Residence Area: </label></center> <br>
													<center><input type="radio" name="PrefResArea" value="Champagnat" checked="true"> Champagnat Hall </center><br>
										 		 	<center><input type="radio" name="PrefResArea" value="Leo"> Leo Hall </center><br>
										 		 	<center><input type="radio" name="PrefResArea" value="Marian"> Marian Hall </center><br>
										 		 	<center><input type="radio" name="PrefResArea" value="Sheahan"> Sheahan Hall </center><br>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>		
																<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
													?>
													<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
													<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
													<?php
												}	
											}
											elseif ($Class == "Sophomore") {
												if($Laundry == "Yes") {
													if($Kitchen == "Yes") {
														?>
														<!-- 	<p></center><label>Please Select A Residence Area: </label><select name="PrefResArea">
																<option value="Gartland">Gartland Commons</option>
																<option value="Lower New">Lower New Townhouses</option>
																<option value="Upper New">Upper New Townhouses</option> -->
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Gartland" checked="true"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>	
														<?php
													}
													elseif($Kitchen == "No") {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Midrise" checked="true"> Midrise Hall </center></br>
															<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
														<?php
													}
													else {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Gartland" checked="true"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Midrise"> Midrise Hall </center></br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
																<?php
													}
												}
												elseif($Laundry == "No") {
													if($Kitchen !== "No") {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Foy" checked="true"> Foy Townhouses </center><br>
															<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
																<?php
													}
													else {
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
														<p id="Continue"><input type="button" value="Continue >>" name="continue" disabled></p>
														<?php
													}
												}
												elseif($Laundry == "No Preference") {
													if ($Kitchen == "Yes") {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Foy" checked="true"> Foy Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Gartland"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
																<?php
													}
													elseif($Kitchen == "No Preference") {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Foy" checked="true"> Foy Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Gartland"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Midrise"> Midrise Hall </center></br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
																<?php
													}
													else {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Midrise" checked="true"> Midrise Hall </center></br>
															<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
																<?php
													}	
												}
											}
											elseif(($Class == "Junior") || ($Class == "Senior")) {
												if($Laundry == "No") {
													if($Kitchen !== "No") {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Middle Fulton" checked="true"> Middle Fulton Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Upper Fulton"> Upper Fulton Townhouses </center><br>
															<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
															<?php
													}
													else {
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
														<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
														<?php
													}
												}
												elseif($Laundry == "Yes") {
													if($Kitchen !== "No") {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Lower Fulton" checked="true"> Lower Fulton Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Lower West"> Lower West Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Talmadge"> Talmadge Court </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper West"> Upper West Townhouses </center></br>
											 		 		<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
											 		 		<?php
													}
													else {
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
														<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
														<?php
													}
												}
												elseif($Laundry == "No Preference") {
													if($Kitchen !== "No") {
														?>
															<center><label>Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Lower Fulton" checked="true"> Lower Fulton Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Lower West"> Lower West Townhouses </center><br>
															<center><input type="radio" name="PrefResArea" value="Middle Fulton"> Middle Fulton Townhouses </center></br>
											 		 		<center><input type="radio" name="PrefResArea" value="Talmadge"> Talmadge Court </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper Fulton"> Upper Fulton Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper West"> Upper West Townhouses </center></br>
											 		 		<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
															<p id="Continue"><input type="submit" value="Continue >>" name="continue"></p>
											 		 		<?php
													}
													else {
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
														<p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p>
														<?php
													}
												}
											}
										}
								}
								echo "</form>";						
							?>
<!-- 							<p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p> 
 --><!-- 							<p id="Continue"><input type="button" Onclick="location.href='http://localhost/xampp/cmpt221/results.php'" value="Continue >>" name="continue"></p>
 -->						</div>
			</div>
		</div>
	</body>		
</html>