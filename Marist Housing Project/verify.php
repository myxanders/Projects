<!-- @authors: Mitchell Xanders, Reynaldo Alvarez-->
<?php
session_start(); //Let's start again
?>
<html>
<title>Marist Residence Recommendations</title> <!--Reminder of what our site is titled-->
<head>
	<link rel="stylesheet" type="text/css" href="housingstyle.css">
</head>
	<body>
		<div class ="absolute" id="content">	
			<div class ="absolute" id = "box">
				<h1><strong> Residence Request Form </strong></h1> <!--Titling the form-->
			    		<p><center><input type="hidden" name="Name" value="<?php $_SESSION['Name']; ?>" ></input></center></p>
							<?php
								require'sql.php'; //We need this file to work our magic
								//We need to store your info for this session
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
								//Different messages for different circumstances
								$Error = "The information did not create any matches. Please try again.";
								$Confirm = "Congrats! You've got a match! Press Continue to Confirm.";
								$FrOnly = "Sorry. Only Freshmen are allowed to live here. Try Again.";
								$SoOnly = "Sorry. Only Sophomores are allowed to live here. Try Again.";
								$JrSrOnly = "Sorry. Only Juniors and Seniors are allowed to live here. Try Again.";
								$PrefError = "Sorry. The residence area you selected does not match your preferenes.";
								//We display your name, CWID, and gender on this page to remind you who you are.
								echo "<p><center>Name: $Name</center></p>";
								echo "<p><center>CWID: $CWID</center></p>";
								echo "<p><center>Gender: $Gender</center></p>";
								//This is the complex part that displays a residence area or suggestions on where to live.
								echo '<form method="post" action="results.php" id="form">';
								if(isset($_POST['submit']) ) {
									$Class = $_POST["Class"];
									$_SESSION["Class"] = $Class;
									//Setting classes to numerical values
									if ($_POST["Class"] == "Freshman") {
										$Class = 1;
									} elseif ($_POST["Class"] == "Sophomore") {
										$Class = 2;
									} else {
										$Class = 3;
									}	
									$PrefResArea = $_POST["PrefResArea"];
									$_SESSION["PrefResArea"] = $PrefResArea;
									//If you meet the criteria you can live in any of these four dorms
										if (($PrefResArea == "Champagnat") || ($PrefResArea == "Leo") || ($PrefResArea == "Marian") || ($PrefResArea == "Sheahan")) {
											if($Laundry !== "No" && $Kitchen !== "Yes") { 
												if($Class == 1) {
												echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
												?>
												<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
												<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
												<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$FrOnly</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$PrefError</font></strong></center></p>";
												?>
												<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
												<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
												<?php
											}
										}
										//Some Sophomore houses have different perks so they are split a little
										elseif (($PrefResArea == "Gartland") || ($PrefResArea == "Lower New") || ($PrefResArea == "Upper New")) {
											if($Laundry !== "No" && $Kitchen !== "No") {
												if($Class == 2) {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$SoOnly</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$PrefError</font></strong></center></p>";
												?>
												<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
												<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
												<?php
											}
										}
										//Foy doesn't technically have on-site laundry...it's at Upper New
										elseif ($PrefResArea == "Foy") {
											if($Laundry !== "Yes" && $Kitchen !== "No") {
												if($Class == 2) {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$SoOnly</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$PrefError</font></strong></center></p>";
												?>
												<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
												<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
												<?php
											}
										}
										//Midrisers don't get full kitchens
										elseif ($PrefResArea == "Midrise") {
											if($Laundry !== "No" && $Kitchen !== "Yes") {
												if($Class == 2) {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$SoOnly</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
													<?php
												}
											}else {
												echo "<p><center><strong><font color=\"red\">$PrefError</font></strong></center></p>";
												?>
												<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
												<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
												<?php
											}
										}
										//These are the upperclassmen housing with all the perks
										elseif (($PrefResArea == "Lower West") || ($PrefResArea == "Upper West") || ($PrefResArea == "Lower Fulton") || ($PrefResArea == "Talmadge")) {
											if($Laundry !== "No" && $Kitchen !== "No") {
												if($Class == 3) {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$JrSrOnly</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$PrefError</font></strong></center></p>";
												?>
												<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
												<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
												<?php
											}
										} 
										//Upper and Middle Fulton residents have to walk quite a ways to do their laundry
										elseif (($PrefResArea == "Upper Fulton") || ($PrefResArea == "Middle Fulton")) {
											if($Laundry !== "Yes" && $Kitchen !== "No") {
												if($Class == 3) {
													echo "<p><center><strong><font color=\"green\">$Confirm</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
													<?php
												}
												else {
													echo "<p><center><strong><font color=\"red\">$JrSrOnly</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
													<?php
												}
											}
											else {
												echo "<p><center><strong><font color=\"red\">$PrefError</font></strong></center></p>";
												?>
												<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
												<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
												<?php
											}
										}
										//This is where suggestions begin to pop up
										elseif ($PrefResArea == "No Preference") { 
											if ($Class == 1) {
												//The freshman dorms are practically the same
												if($Laundry !== "No" && $Kitchen !== "Yes") {
													?>
													<!--This is where you pick a place for yourself now that we've narrowed it down for you-->
													<center><label id="pick">Pick a Residence Area: </label></center> <br>
													<center><input type="radio" name="PrefResArea" value="Champagnat" checked="true"> Champagnat Hall </center><br>
										 		 	<center><input type="radio" name="PrefResArea" value="Leo"> Leo Hall </center><br>
										 		 	<center><input type="radio" name="PrefResArea" value="Marian"> Marian Hall </center><br>
										 		 	<center><input type="radio" name="PrefResArea" value="Sheahan"> Sheahan Hall </center><br>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>		
																<?php
												}
												else { //If you don't qualify for these dorms
													echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
													?>
													<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
													<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
													<?php
												}	
											}
											elseif ($Class == 2) {
												//Sophomore housing gets more dicey
												if($Laundry == "Yes") {
													//These have laundry on-stie
													if($Kitchen == "Yes") {
														//And a kitchen
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Gartland" checked="true"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>	
														<?php
													}
													elseif($Kitchen == "No") {
														//And no kitchen
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Midrise" checked="true"> Midrise Hall </center></br>
															<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
														<?php
													}
													else {
														//If you care about where you do your laundry but not where you eat your food
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Gartland" checked="true"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Midrise"> Midrise Hall </center></br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
																<?php
													}
												}
												elseif($Laundry == "No") {
													//Foy doesn't have laundry
													if($Kitchen !== "No") {
														//But it has a full kitchen
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Foy" checked="true"> Foy Townhouses </center><br>
															<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
																<?php
													}
													else {
														//You messed up somewhere
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
														<center><p id="Continue"><input type="button" value="Continue >>" name="continue" disabled></p></center>
														<?php
													}
												}
												elseif($Laundry == "No Preference") {
													//If you don't care where you do laundry
													if ($Kitchen == "Yes") {
														//But want your own kitchen
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Foy" checked="true"> Foy Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Gartland"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
																<?php
													}
													elseif($Kitchen == "No Preference") {
														//or you're just really easy-going.
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Foy" checked="true"> Foy Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Gartland"> Gartland Commons </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Lower New"> Lower New Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Midrise"> Midrise Hall </center></br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper New"> Upper New Townhouses </center><br>
											 		 		<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
																<?php
													}
													else {
														//There's no kitchen here.
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Midrise" checked="true"> Midrise Hall </center></br>
															<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
																<?php
													}	
												}
											}
											elseif($Class == 3) {
												//These are suggestions for Juniors and Seniors
												if($Laundry == "No") {
													//If you'd rather get exercise while you go do laundry
													if($Kitchen !== "No") {
														//All these places have full kitchens so you're going to have one
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Middle Fulton" checked="true"> Middle Fulton Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Upper Fulton"> Upper Fulton Townhouses </center><br>
															<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
															<?php
													}
													else {
														//Or else you get this error
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
														<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
														<?php
													}
												}
												elseif($Laundry == "Yes") {
													//If you prefer your laundry closer to home you have these options
													if($Kitchen !== "No") {
														//There are still no options without a kitchen
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Lower Fulton" checked="true"> Lower Fulton Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Lower West"> Lower West Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Talmadge"> Talmadge Court </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper West"> Upper West Townhouses </center></br>
											 		 		<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
											 		 		<?php
													}
													else {
														//Mistakes will be made
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
														<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
														<?php
													}
												}
												elseif($Laundry == "No Preference") {
													//If you don't care how far you go for laundry
													if($Kitchen !== "No") {
														//The houses are all pretty much the same then
														?>
															<center><label id="pick">Pick a Residence Area: </label></center> <br>
															<center><input type="radio" name="PrefResArea" value="Lower Fulton" checked="true"> Lower Fulton Townhouses </center></br>
															<center><input type="radio" name="PrefResArea" value="Lower West"> Lower West Townhouses </center><br>
															<center><input type="radio" name="PrefResArea" value="Middle Fulton"> Middle Fulton Townhouses </center></br>
											 		 		<center><input type="radio" name="PrefResArea" value="Talmadge"> Talmadge Court </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper Fulton"> Upper Fulton Townhouses </center><br>
											 		 		<center><input type="radio" name="PrefResArea" value="Upper West"> Upper West Townhouses </center></br>
											 		 		<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
															<center><p id="Continue"><input type="submit" value="Continue >>" name="continue"></p></center>
											 		 		<?php
													}
													else {
														//No matches
														echo "<p><center><strong><font color=\"red\">$Error</font></strong></center></p>";
														?>
														<center><p id="Back"><input type="button" Onclick="history.back();" value="<< Back" name="back"></p></center> 
														<center><p id="Continue"><input type="submit" value="Continue >>" name="continue" disabled></p></center>
														<?php
													}
												}
											}
										}
								}
								echo "</form>";						
							?>
			</div>
		</div>
	</body>		
</html>
