<?php
include("../../../session.php");
include("../../../eflsidenav.php");

//Grab everything from the superbowls table where a Super Bowl has been played
$sql = mysqli_query($db, "SELECT * FROM facup_history ORDER BY year DESC");
$years = mysqli_num_rows($sql);

?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<title>FA Cup History</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel='stylesheet' type='text/css' href='../eflstyle.css'/>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>

		<h1 align="center"><a href='../cups' style="text-decoration: none; color: white;">FA Cup Winners</a></h1>
		<div class="history" align="center" style="margin-top: 10px">
			<table align="center" id="bowls">
				<tr>
					<th style="width: 125px; text-align: center;">Season</th>
                    <th style="width: 250px; text-align: center;">Champion</th>
                    <th style="width: 100px; text-align: center;">Score</th>                    
					<th style="width: 250px; text-align: center;">Runners-Up</th>
				</tr>
				<?php
				$i=1;
				while ($i <= $years && $r=mysqli_fetch_array($sql)){
                    //Spit out a table in a nice, readable format
                    $champs = $r['Winners'];
                    $second = $r['Runners-Up'];
                    $score = $r['Score'];
				?>
				<tr>
                    <td style="background-color: white;"><?php echo $r['Year'];?></td>
                    <?php
                        $query = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '$champs'");
                        $q = mysqli_fetch_array($query);
						$name = $q['nickname'];
                        $level = $q['league'] . "/";
                        if ($level == "None/"){
                            $level = "/";
						}
						$logo = $level . $champs;
						if ($name == NULL){
							$name = $champs;
							$champs = "TBD";
						}						
                    ?>
                    <td id="<?php echo $champs?>" style="font-weight: bold; text-align: right;"><a href="team.php?id=<?php echo $champs;?>"><img src="../../../Assets/EFL/<?php echo $level . $champs?>.png" style="float:left;" width=30 height=30></a><span style="float: right; padding-top: 6px;"><?php echo $name;?></span></td>
                    <td style="background-color: white;"><?php echo $score;?></td>
                    <?php
                        $query = mysqli_query($db, "SELECT nickname, league FROM efl_clubs WHERE teamShort = '$second'");
                        $q = mysqli_fetch_array($query);
                        $name = $q['nickname'];					
                        $level = $q['league'] . "/";
                        if ($level == "None/"){
                            $level = "/";
                        }             
                        $logo = $level . $second;  
                        if ($name == NULL){
                            $name = $second;
                            $second = "TBD";
                        }					         
                    ?>                    
                    <td id="<?php echo $second?>" style="font-weight: bold; text-align: left;"><a href="team.php?id=<?php echo $second;?>"><img src="../../../Assets/EFL/<?php echo $level . $second?>.png" style="float:right;" width=30 height=30></a><span style="float: left; padding-top: 6px;"><?php echo $name;?></span></td>
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
		/* background-color: crimson; */
		background-image: linear-gradient(crimson,silver)
	}

	h1 {
		font-size: 100px;
		color: white;
		text-shadow: 4px 4px navy;
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
		background-color: navy;
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
		background-color: lightgrey;
		color: black;
	}
</style> 