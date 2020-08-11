<?php
include("../../../session.php");
include("../../../eflsidenav.php");

$szns = [];
$eplwins = [];
$champwins = [];
$elowins = [];
$eltwins = [];
$fawins = [];
$eflwins = [];
$sql = mysqli_query($db, "SELECT * FROM epl_history ORDER BY year DESC");
$i=0;
$j = mysqli_num_rows($sql);
while ($i < $j && $r = mysqli_fetch_array($sql)){
    array_push($eplwins, $r['Champions']);
    $i++;
}
while ($j < 125){
    array_push($eplwins, NULL);
    $j++;
}
$sql = mysqli_query($db, "SELECT * FROM eflchamp_history ORDER BY year DESC");
$i=0;
$j = mysqli_num_rows($sql);
while ($i < $j && $r = mysqli_fetch_array($sql)){
    array_push($champwins, $r['Winners']);
    $i++;
}
while ($j < 125){
    array_push($champwins, NULL);
    $j++;
}
$sql = mysqli_query($db, "SELECT * FROM elo_history ORDER BY year DESC");
$i=0;
$j = mysqli_num_rows($sql);
while ($i < $j && $r = mysqli_fetch_array($sql)){
    array_push($elowins, $r['Winners']);
    $i++;
}
while ($j < 125){
    array_push($elowins, NULL);
    $j++;
}
$sql = mysqli_query($db, "SELECT * FROM elt_history ORDER BY year DESC");
$i=0;
$j = mysqli_num_rows($sql);
while ($i < $j && $r = mysqli_fetch_array($sql)){
    array_push($eltwins, $r['Winners']);
    $i++;
}
while ($j < 125){
    array_push($eltwins, NULL);
    $j++;
}
$sql = mysqli_query($db, "SELECT * FROM facup_history ORDER BY year DESC LIMIT 124");
$i=0;
$j = mysqli_num_rows($sql);
while ($i < $j && $r = mysqli_fetch_array($sql)){
    array_push($fawins, $r['Winners']);
    array_push($szns, $r['Year']);
    $i++;
}
while ($j < 125){
    array_push($fawins, NULL);
    $j++;
}
$sql = mysqli_query($db, "SELECT * FROM eflcup_history ORDER BY year DESC");
$i=0;
$j = mysqli_num_rows($sql);
while ($i < $j && $r = mysqli_fetch_array($sql)){
    array_push($eflwins, $r['Winners']);
    $i++;
}
while ($j < 125){
    array_push($eflwins, NULL);
    $j++;
}

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>Cup & Competition History</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel='stylesheet' type='text/css' href='../eflstyle.css'/>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../cups' style="text-decoration: none; color: white;">Cup & Competition History</a></h1>
		<div class="history" align="center" style="margin-top: 10px">
			<table align="center" id="bowls">
				<tr>
					<th style="width: 125px; text-align: center;">Season</th>
					<th style="width: 200px; text-align: center;">FA Cup</th>
					<th style="width: 200px; text-align: center;">EFL Cup</th>
                    <th style="width: 200px; text-align: center;">Premier League</th>
                    <th style="width: 200px; text-align: center;">Championship</th>
                    <th style="width: 200px; text-align: center;">League One</th>
                    <th style="width: 200px; text-align: center;">League Two</th>
				</tr>
				<?php
				$i=0;
				while ($i < sizeof($szns)){
                    //Spit out a table in a nice, readable format
				?>
				<tr>
                    <td style="background-color: white;"><?php echo $szns[$i];?></td>
                <?php
                    $sql = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '" . $fawins[$i] . "'");
                    $r = mysqli_fetch_array($sql);
                    $name = $r['nickname'];
                    $id = $fawins[$i];
                    if ($name == NULL){
                        $name = $fawins[$i];
                    }
                    $level = $r['league'];
                    if ($level == "None"){
                        $level = "/" . $fawins[$i];
                    }
                    elseif ($level == NULL){
                        $level = "TBD";
                        $id = "TBD";
                    }
                    else {
                        $level = $level . "/" . $fawins[$i];
                    }
                ?>
                    <td id="<?php echo $id;?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $fawins[$i];?>"><img src="../../../Assets/EFL/<?php echo $level;?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $name;?></span></td> 
                    <?php
                    $sql = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '" . $eflwins[$i] . "'");
                    $r = mysqli_fetch_array($sql);
                    $name = $r['nickname'];
                    $id = $eflwins[$i];
                    if ($name == NULL){
                        $name = $eflwins[$i];
                    }
                    $level = $r['league'];
                    if ($level == "None"){
                        $level = "/" . $eflwins[$i];
                    } 
                    elseif ($level == NULL){
                        $level = "TBD";
                        $id = "TBD";
                    }
                    else {
                        $level = $level . "/" . $eflwins[$i];
                    }
                ?>                                     
                    <td id="<?php echo $id;?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $eflwins[$i];?>"><img src="../../../Assets/EFL/<?php echo $level;?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $name;?></span></td>         
                <?php
                    $sql = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '" . $eplwins[$i] . "'");
                    $r = mysqli_fetch_array($sql);
                    $name = $r['nickname'];
                    $id = $eplwins[$i];
                    if ($name == NULL){
                        $name = $eplwins[$i];
                    }
                    $level = $r['league'];
                    if ($level == "None"){
                        $level = "/" . $eplwins[$i];
                    }
                    elseif ($level == NULL){
                        $level = "TBD";
                        $id = "TBD";
                    }
                    else {
                        $level = $level . "/" . $eplwins[$i];
                    }
                ?>                             
                    <td id="<?php echo $id;?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $eplwins[$i];?>"><img src="../../../Assets/EFL/<?php echo $level;?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $name;?></span></td>                  
                <?php
                    $sql = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '" . $champwins[$i] . "'");
                    $r = mysqli_fetch_array($sql);
                    $name = $r['nickname'];
                    $id = $champwins[$i];
                    if ($name == NULL){
                        $name = $champwins[$i];
                    }
                    $level = $r['league'];
                    if ($level == "None"){
                        $level = "/" . $champwins[$i];
                    }
                    elseif ($level == NULL){
                        $level = "TBD";
                        $id = "TBD";
                    }
                    else {
                        $level = $level . "/" . $champwins[$i];
                    }
                ?>                    
                    <td id="<?php echo $id?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $champwins[$i];?>"><img src="../../../Assets/EFL/<?php echo $level;?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $name;?></span></td>                 
                <?php
                    $sql = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '" . $elowins[$i] . "'");
                    $r = mysqli_fetch_array($sql);
                    $name = $r['nickname'];
                    $id = $elowins[$i];
                    if ($name == NULL){
                        $name = $elowins[$i];
                    }
                    $level = $r['league'];
                    if ($level == "None"){
                        $level = "/" . $elowins[$i];
                    }
                    elseif ($level == NULL){
                        $level = "TBD";
                        $id = "TBD";
                    }
                    else {
                        $level = $level . "/" . $elowins[$i];
                    }
                ?>                    
                    <td id="<?php echo $id?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $elowins[$i];?>"><img src="../../../Assets/EFL/<?php echo $level;?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $name;?></span></td>
                <?php
                    $sql = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '" . $eltwins[$i] . "'");
                    $r = mysqli_fetch_array($sql);
                    $name = $r['nickname'];
                    $id = $eltwins[$i];
                    if ($name == NULL){
                        $name = $eltwins[$i];
                    }
                    $level = $r['league'];
                    if ($level == "None"){
                        $level = "/" . $eltwins[$i];
                    } 
                    elseif ($level == NULL){
                        $level = "TBD";
                        $id = "TBD";
                    }
                    else {
                        $level = $level . "/" . $eltwins[$i];
                    }
                ?>                    
                    <td id="<?php echo $id?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $eltwins[$i];?>"><img src="../../../Assets/EFL/<?php echo $level;?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $name;?></span></td>
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
	</body>
</html>
<style>

body {
		background-image: linear-gradient(black,silver);
	}

	h1 {
		font-size: 100px;
		color: white;
		text-shadow: 4px 4px darkred;
		margin:15px;
	}

    .history {
    	margin-top: 100px;
    	margin-left: -8%;
    	margin-right: -8%;
        width: auto;
        margin-bottom: 2%;
        display: block;
    }

	#bowls {
		border-collapse: collapse;
		border-radius: 30px;
		font-size: 18px;
	}

	#bowls td{
		border: 1px solid grey;
		padding: 1%;
		text-align: center;
	}    

	#bowls th {
		background-color: darkred;
		color: white;
		text-align: center;
		border: 1px solid black;
		padding: 1%;
	}		

	td a {
		display: block;
		text-decoration: none;
		width: 100%;
		color:black;
	}

    #TBD {
        color: lightgrey;
    }

    #SHF, #NTG {
        font-size: 15px;
    }
</style> 