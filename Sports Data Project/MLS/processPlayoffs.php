<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";

$e27away = NULL;
$e27home = NULL;
$w27away = NULL;
$w27home = NULL;
$e36away = NULL;
$e36home = NULL;
$w36away = NULL;
$w36home = NULL;
$e45away = NULL;
$e45home = NULL;
$w45away = NULL;
$w45home = NULL;
$e2pks = NULL;
$e3pks = NULL;
$e4pks = NULL;
$e5pks = NULL;
$e6pks = NULL;
$e7pks = NULL;
$w2pks = NULL;
$w3pks = NULL;
$w4pks = NULL;
$w5pks = NULL;
$w6pks = NULL;
$w7pks = NULL;
$e14away = NULL;
$e14home = NULL;
$w14away = NULL;
$w14home = NULL;
$e23away = NULL;
$e23home = NULL;
$w23away = NULL;
$w23home = NULL;
$e1pks = NULL;
$e2hipks = NULL;
$elopks = NULL;
$ehipks = NULL;
$w1pks = NULL;
$w2hipks = NULL;
$wlopks = NULL;
$whipks = NULL;
$westh = NULL;
$easth = NULL;
$westa = NULL;
$easta = NULL;
$westhpks = NULL;
$westapks = NULL;
$easthpks = NULL;
$eastapks = NULL;
$eastfinal = NULL;
$eastfinalpks = NULL;
$westfinal = NULL;
$westfinalpks = NULL;





if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['e27away'])) {
 		$e27away = $_POST['e27away'];
 	}
 	if (isset($_POST['e27home'])) {
 		$e27home = $_POST['e27home'];
 	}	
 	if (isset($_POST['w27away'])) {
 		$w27away = $_POST['w27away'];
 	}
 	if (isset($_POST['w27home'])) {
 		$w27home = $_POST['w27home'];
 	}
 	if (isset($_POST['e36away'])) {
 		$e36away = $_POST['e36away'];
 	}
 	if (isset($_POST['e36home'])) {
 		$e36home = $_POST['e36home'];
 	}	
 	if (isset($_POST['w36away'])) {
 		$w36away = $_POST['w36away'];
 	}
 	if (isset($_POST['w36home'])) {
 		$w36home = $_POST['w36home'];
 	}
 	if (isset($_POST['e45away'])) {
 		$e45away = $_POST['e45away'];
 	}
 	if (isset($_POST['e45home'])) {
 		$e45home = $_POST['e45home'];
 	}	
 	if (isset($_POST['w45away'])) {
 		$w45away = $_POST['w45away'];
 	}
 	if (isset($_POST['w45home'])) {
 		$w45home = $_POST['w45home'];
 	}
 	if (isset($_POST['e2pks'])) {
 		$e2pks = $_POST['e2pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$e2pks' WHERE seed = 'East2'");
 	}
 	if (isset($_POST['e3pks'])) {
 		$e3pks = $_POST['e3pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$e3pks' WHERE seed = 'East3'");
 	}
 	if (isset($_POST['e4pks'])) {
 		$e4pks = $_POST['e4pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$e4pks' WHERE seed = 'East4'"); 		
 	}
 	if (isset($_POST['e5pks'])) {
 		$e5pks = $_POST['e5pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$e5pks' WHERE seed = 'East5'"); 		
 	}
 	if (isset($_POST['e6pks'])) {
 		$e6pks = $_POST['e6pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$e6pks' WHERE seed = 'East6'"); 		
 	}
 	if (isset($_POST['e7pks'])) {
 		$e7pks = $_POST['e7pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$e7pks' WHERE seed = 'East7'");
 	} 	
 	if (isset($_POST['w2pks'])) {
 		$e2pks = $_POST['w2pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$w2pks' WHERE seed = 'West2'");
 	} 	
 	if (isset($_POST['w3pks'])) {
 		$w3pks = $_POST['w3pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$w3pks' WHERE seed = 'West3'"); 		
 	}
 	if (isset($_POST['w4pks'])) {
 		$w4pks = $_POST['w4pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$w4pks' WHERE seed = 'West4'");  		
 	} 
 	if (isset($_POST['w5pks'])) {
 		$w5pks = $_POST['w5pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$w5pks' WHERE seed = 'West5'");  		
 	}
 	if (isset($_POST['w6pks'])) {
 		$w6pks = $_POST['w6pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$w6pks' WHERE seed = 'West6'");  		
 	}  	
 	if (isset($_POST['w7pks'])) {
 		$w7pks = $_POST['w7pks'];
 		mysqli_query($db, "UPDATE mls_wildcard SET pks = '$w7pks' WHERE seed = 'West7'");
 	}  	
 	if (isset($_POST['e14away'])) {
 		$e14away = $_POST['e14away'];
 	}
 	if (isset($_POST['e14home'])) {
 		$e14home = $_POST['e14home'];
 	}	
 	if (isset($_POST['w14away'])) {
 		$w14away = $_POST['w14away'];
 	}
 	if (isset($_POST['w14home'])) {
 		$w14home = $_POST['w14home'];
 	}
 	if (isset($_POST['e23away'])) {
 		$e23away = $_POST['e23away'];
 	}
 	if (isset($_POST['e23home'])) {
 		$e23home = $_POST['e23home'];
 	}	
 	if (isset($_POST['w23away'])) {
 		$w23away = $_POST['w23away'];
 	}
 	if (isset($_POST['w23home'])) {
 		$w23home = $_POST['w23home'];
 	} 	 		
 	if (isset($_POST['e14homepk'])) {
 		$e1pks = $_POST['e14homepk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$e1pks' WHERE seed = 'East1'");
 	}
 	if (isset($_POST['e23homepk'])) {
 		$e2hipks = $_POST['e23homepk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$e2hipks' WHERE seed = 'East2'"); 		
 	}
 	if (isset($_POST['e14awaypk'])) {
 		$elopks = $_POST['e14awaypk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$elopks' WHERE seed = 'East4'"); 		
 	}
 	if (isset($_POST['e23awaypk'])) {
 		$ehipks = $_POST['e23awaypk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$ehipks' WHERE seed = 'East3'"); 		
 	}
 	if (isset($_POST['w14homepk'])) {
 		$w1pks = $_POST['w14homepk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$w1pks' WHERE seed = 'West1'"); 		
 	}
 	if (isset($_POST['w23homepk'])) {
 		$w2hipks = $_POST['w23homepk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$w2hipks' WHERE seed = 'West2'");  		
 	} 
 	if (isset($_POST['w14awayps'])) {
 		$wlopks = $_POST['w14awaypk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$wlopks' WHERE seed = 'West4'");  		
 	}
 	if (isset($_POST['w23awaypk'])) {
 		$whipks = $_POST['w23awaypk'];
 		mysqli_query($db, "UPDATE mls_conf_semis SET pks = '$whipks' WHERE seed = 'West3'");  		
 	} 
 	if (isset($_POST['easth'])) {
 		$easth = $_POST['easth'];
 	}
 	if (isset($_POST['easta'])) {
 		$easta = $_POST['easta'];
 	}	
 	if (isset($_POST['westh'])) {
 		$westh = $_POST['westh'];
 	}
 	if (isset($_POST['westa'])) {
 		$westa = $_POST['westa'];
 	}	
 	if (isset($_POST['easthomepk'])) {
 		$easthpks = $_POST['easthomepk'];
 		mysqli_query($db, "UPDATE mls_conf_finals SET pks = '$easthpks' WHERE seed = 'Easth'"); 		
 	}
 	if (isset($_POST['eastawaypk'])) {
 		$eastapks = $_POST['eastawaypk'];
 		mysqli_query($db, "UPDATE mls_conf_finals SET pks = '$eastapks' WHERE seed = 'Easta'"); 		
 	} 
 	if (isset($_POST['westhomepk'])) {
 		$westhpks = $_POST['westhomepk'];
 		mysqli_query($db, "UPDATE mls_conf_finals SET pks = '$westhpks' WHERE seed = 'Westh'"); 		
 	}
 	if (isset($_POST['westawaypk'])) {
 		$westapks = $_POST['westawaypk'];
 		mysqli_query($db, "UPDATE mls_conf_finals SET pks = '$westapks' WHERE seed = 'Westa'"); 		
 	} 
 	if (isset($_POST['westfinal'])) {
 		$westfinal = $_POST['westfinal'];
 	}
 	if (isset($_POST['eastfinal'])) {
 		$eastfinal = $_POST['eastfinal'];
 	} 
 	if (isset($_POST['westfinalpk'])) {
 		$westfinalpks = $_POST['westfinalpk'];
 		mysqli_query($db, "UPDATE mls_cup_finals SET pks = '$westfinalpks' WHERE seed = 'West'"); 		
 	}
 	if (isset($_POST['eastfinalpk'])) {
 		$eastfinalpks = $_POST['eastfinalpk'];
 		mysqli_query($db, "UPDATE mls_cup_finals SET pks = '$eastfinalpks' WHERE seed = 'East'"); 		
 	} 				 	  			
 }
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$e27home' WHERE seed = 'East2'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$e27away' WHERE seed = 'East7'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$e36home' WHERE seed = 'East3'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$e36away' WHERE seed = 'East6'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$e45home' WHERE seed = 'East4'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$e45away' WHERE seed = 'East5'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$w27home' WHERE seed = 'West2'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$w27away' WHERE seed = 'West7'"); 
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$w36home' WHERE seed = 'West3'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$w36away' WHERE seed = 'West6'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$w45home' WHERE seed = 'West4'");
 mysqli_query($db, "UPDATE mls_wildcard SET score = '$w45away' WHERE seed = 'West5'");

 if ($e23home != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$e23home' WHERE seed = 'East2'");
 }
 if ($e23away != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$e23away' WHERE seed = 'East3'");
 }
 if ($e14home != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$e14home' WHERE seed = 'East1'");
 }
 if ($e14away != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$e14away' WHERE seed = 'East4'");
 }
 if ($w23home != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$w23home' WHERE seed = 'West2'");
 }
 if ($w23away != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$w23away' WHERE seed = 'West3'");
 }
 if ($w14home != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$w14home' WHERE seed = 'West1'");
 }
 if ($w14away != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_semis SET score = '$w14away' WHERE seed = 'West4'");
 }

 if ($westh != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_finals SET score = '$westh' WHERE seed = 'Westh'");
 }
 if ($westa != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_finals SET score = '$westa' WHERE seed = 'Westa'");
 }
 if ($easth != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_finals SET score = '$easth' WHERE seed = 'Easth'");
 }
 if ($easta != NULL) {
 	mysqli_query($db, "UPDATE mls_conf_finals SET score = '$easta' WHERE seed = 'Easta'");
 }
 if ($eastfinal != NULL) {
 	mysqli_query($db, "UPDATE mls_cup_finals SET score = '$eastfinal' WHERE seed = 'East'");
 }
 if ($westfinal != NULL) {
 	mysqli_query($db, "UPDATE mls_cup_finals SET score = '$westfinal' WHERE seed = 'West'");  
 } 

/*COMPUTE SEEDING/MATCHUPS*/

//West 4-5 Winner Plays 1 Seed
if ($w45home > $w45away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West4'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West4'");
}
elseif ($w45home < $w45away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West5'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West4'");
}
elseif ($w45home == $w45away){
	if ($w4pks > $w5pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West4'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West4'");	
	}
	elseif ($w4pks < $w5pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West5'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West4'");		
	}
}
//West 2-7 Winners Decides Home Team Next Round
if ($w27home > $w27away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West2'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West2'");
}
elseif ($w27home < $w27away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West7'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West3'");	
}
elseif ($w27home == $w27away){
	if ($w2pks > $w7pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West2'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West2'");	
	}
	elseif ($w2pks < $w7pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West7'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West3'");		
	}
}
// West 3-6 Winner Plays West 2-7 Winner
if ($w36home > $w36away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West3'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West2'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West3'");
	}	
}
elseif ($w36home < $w36away) {
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West6'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West2'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West3'");
	}		
}
elseif ($w36home == $w36away){
	if ($w3pks > $w6pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West3'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West2'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West3'");
		}			
	}
	elseif ($w3pks < $w6pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'West6'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West2'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'West3'");
		}			
	}
}
//East 4-5 Winner Plays 1 Seed
if ($e45home > $e45away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East4'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East4'");
}
elseif ($e45home < $e45away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East5'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East4'");
}
elseif ($e45home == $e45away){
	if ($e4pks > $e5pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East4'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East4'");	
	}
	elseif ($e4pks < $e5pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East5'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East4'");		
	}
}
//East 2-7 Winners Decides Home Team Next Round
if ($e27home > $e27away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East2'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East2'");
}
elseif ($e27home < $e27away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East7'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East3'");	
}
elseif ($e27home == $e27away){
	if ($e2pks > $e7pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East2'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East2'");	
	}
	elseif ($e2pks < $e7pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East7'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East3'");		
	}
}
// East 3-6 Winner Plays East 2-7 Winner
if ($e36home > $e36away){
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East3'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East2'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East3'");
	}	
}
elseif ($e36home < $e36away) {
	$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East6'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East2'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East3'");
	}		
}
elseif ($e36home == $e36away){
	if ($e3pks > $e6pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East3'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East2'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East3'");
		}			
	}
	elseif ($e3pks < $e6pks){
		$sql = mysqli_query($db, "SELECT * FROM mls_wildcard WHERE seed = 'East6'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East2'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_semis SET team = '$winner' WHERE seed = 'East3'");
		}			
	}
}

//West 1-4 Winners Decides Home Team Next Round
if ($w14home > $w14away){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West1'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westh'");
}
elseif ($w14home < $w14away){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West4'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westa'");	
}
elseif ($w14home == $w14away){
	if ($w1pks > $wlopks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West1'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westh'");	
	}
	elseif ($w1pks < $wlopks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West4'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westa'");		
	}
}
// West 2-3 Winner Plays West 1-4 Winner
if ($w23home > $w23away){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westh'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westh'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westa'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westa'");
	}	
}
elseif ($w23home < $w23away) {
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westh'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westh'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westa'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westa'");
	}			
}
elseif ($w23home == $w23away){
	if ($w2hipks > $whipks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West2'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westh'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westh'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westa'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westa'");
		}		
	}
	elseif ($w2hipks < $whipks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'West3'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westh'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westh'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Westa'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Westa'");
		}			
	}
}
//East 1-4 Winners Decides Home Team Next Round
if ($e14home > $e14away){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East1'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easth'");
}
elseif ($e14home < $e14away){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East4'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easta'");	
}
elseif ($e14home == $e14away){
	if ($e1pks > $elopks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East1'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easth'");	
	}
	elseif ($e1pks < $elopks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East4'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easta'");		
	}
}
// East 2-3 Winner Plays East 1-4 Winner
if ($e23home > $e23away){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easth'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easth'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easta'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easta'");
	}	
}
elseif ($e23home < $e23away) {
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easth'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easth'");
	}
	$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easta'");
	$q = mysqli_fetch_array($query);
	$team = $q['team'];
	if ($team == NULL || $team == "TBD" || $team == $winner){
		mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easta'");
	}			
}
elseif ($e23home == $e23away){
	if ($e2hipks > $ehipks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East2'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easth'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easth'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easta'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easta'");
		}		
	}
	elseif ($e2hipks < $ehipks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_semis WHERE seed = 'East3'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easth'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easth'");
		}
		$query = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'Easta'");
		$q = mysqli_fetch_array($query);
		$team = $r['team'];
		if ($team == NULL || $team == "TBD" || $team == $winner){
			mysqli_query($db, "UPDATE mls_conf_finals SET team = '$winner' WHERE seed = 'Easta'");
		}			
	}
}

//West Finals
if ($westh > $westa){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'westh'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'West'");
}
elseif ($westh < $westa){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'westa'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'West'");
}
elseif ($westh == $westa){
	if ($westhpks > $westapks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'westh'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'West'");		
	}
	elseif ($westhpks < $westapks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'westa'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'West'");		
	}
}
//East Finals
if ($easth > $easta){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'easth'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'East");
}
elseif ($easth < $easta){
	$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'easta'");
	$r = mysqli_fetch_array($sql);
	$winner = $r['team'];
	mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'East'");
}
elseif ($easth == $easta){
	if ($easthpks > $eastapks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'easth'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'East'");		
	}
	elseif ($easthpks < $eastapks){
		$sql = mysqli_query($db, "SELECT * FROM mls_conf_finals WHERE seed = 'easta'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		mysqli_query($db, "UPDATE mls_cup_finals SET team = '$winner' WHERE seed = 'East'");		
	}
}


$year = date("Y");

if ($eastfinal != NULL && $westfinal != NULL){
	if ($eastfinal > $westfinal){
		//east wins mls cup
		$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'East'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$score = $r['score'];
		$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$winner'");
		$r = mysqli_fetch_array($sql);
		$id = $r['tid'];		
		mysqli_query($db, "UPDATE mlscup SET winner = '$winner', winnerscore = $score, winnerid = $id WHERE year = $year");
		$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'West'");
		$r = mysqli_fetch_array($sql);
		$loser = $r['team'];
		$score = $r['score'];
		$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$loser'");
		$r = mysqli_fetch_array($sql);
		$id = $r['tid'];
		mysqli_query($db, "UPDATE mlscup SET loser = '$loser', loserscore = $score, loserid = $id WHERE year = $year");	
	}
	elseif ($eastfinal < $westfinal){
		//west wins mls cup
		$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'West'");
		$r = mysqli_fetch_array($sql);
		$winner = $r['team'];
		$score = $r['score'];
		$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$winner'");
		$r = mysqli_fetch_array($sql);
		$id = $r['tid'];		
		mysqli_query($db, "UPDATE mlscup SET winner = '$winner', winnerscore = $score, winnerid = $id WHERE year = $year");
		$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'East'");
		$r = mysqli_fetch_array($sql);
		$loser = $r['team'];
		$score = $r['score'];
		$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$loser'");
		$r = mysqli_fetch_array($sql);
		$id = $r['tid'];		
		mysqli_query($db, "UPDATE mlscup SET loser = '$loser', loserscore = $score, loserid = $id WHERE year = $year");		
	}
	elseif ($eastfinal == $westfinal){
		//check pks
		if ($eastfinalpks > $westfinalpks){
			//east wins mls cup
			$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'East'");
			$r = mysqli_fetch_array($sql);
			$winner = $r['team'];
			$score = $r['score'];
			$pk = $r['pks'];
			$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$winner'");
			$r = mysqli_fetch_array($sql);
			$id = $r['tid'];			
			mysqli_query($db, "UPDATE mlscup SET winner = '$winner', winnerscore = $score, winnerpks = $pk, winnerid = $id WHERE year = $year");
			$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'West'");
			$r = mysqli_fetch_array($sql);
			$loser = $r['team'];
			$score = $r['score'];
			$pk = $r['pks'];
			$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$loser'");
			$r = mysqli_fetch_array($sql);
			$id = $r['tid'];			
			mysqli_query($db, "UPDATE mlscup SET loser = '$loser', loserscore = $score, loserpks = $pk, loserid = $id WHERE year = $year");
		}
		elseif ($eastfinalpks < $westfinalpks){
			//west wins mls cup
			$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'West'");
			$r = mysqli_fetch_array($sql);
			$winner = $r['team'];
			$score = $r['score'];
			$pk = $r['pks'];
			$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$winner'");
			$r = mysqli_fetch_array($sql);
			$id = $r['tid'];			
			mysqli_query($db, "UPDATE mlscup SET winner = '$winner', winnerscore = $score, winnerpks = $pk, winnerid = $id WHERE year = $year");
			$sql = mysqli_query($db, "SELECT * FROM mls_cup_finals WHERE seed = 'East'");
			$r = mysqli_fetch_array($sql);
			$loser = $r['team'];
			$score = $r['score'];
			$pk = $r['pks'];
			$sql = mysqli_query($db, "SELECT * FROM mlsteams WHERE teamShort = '$loser'");
			$r = mysqli_fetch_array($sql);
			$id = $r['tid'];
			mysqli_query($db, "UPDATE mlscup SET loser = '$loser', loserscore = $score, loserpks = $pk, loserid = $id WHERE year = $year");
		}
	}
}


$titles = mysqli_query($db, "SELECT * FROM mlsteams");
$numrows = mysqli_num_rows($titles);
$row = mysqli_fetch_array($titles);
$id = $row['tid'];

for ($i = 1; $i <= $numrows; $i++){
	$mlswins = mysqli_query($db, "SELECT winnerid, COUNT(*) AS 'wins' FROM mlscup WHERE winnerid = $i");
	$r = mysqli_fetch_array($mlswins);
	$cups = $r['wins'];
	mysqli_query($db, "UPDATE mlsteams SET cups = $cups WHERE tid = $i");
	$mlslosses = mysqli_query($db, "SELECT loserid, COUNT(*) AS 'losses' FROM mlscup WHERE loserid = $i");
	$r = mysqli_fetch_array($mlslosses);
	$loss = $r['losses'];
	$apps = $cups + $loss;
	mysqli_query($db, "UPDATE mlsteams SET conf_titles = $apps WHERE tid = $i");
	$uso = mysqli_query($db, "SELECT usopenwinner, COUNT(*) AS 'opens' FROM mlscup WHERE usopenid = $i");
	$r = mysqli_fetch_array($uso);
	$usopen = $r['opens'];
	mysqli_query($db, "UPDATE mlsteams SET usopen = $usopen WHERE tid = $i");
	$supsh = mysqli_query($db, "SELECT supportersshield, COUNT(*) AS 'shields' FROM mlscup WHERE ssid = $i");
	$r = mysqli_fetch_array($supsh);
	$shields = $r['shields'];
	mysqli_query($db, "UPDATE mlsteams SET shields = $shields WHERE tid = $i");	
}
header("location: updatePlayoffs.php");
