<?php
include("../../session.php");
include("../../nestedsidenav.php");

$n = "<br>";
?>


<html>
	<head>
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
        <title>Promotion/Relegation</title>
        <link rel="stylesheet" type="text/css" href="eflstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>
	<body>
        <h1 align="center">EFL Promotion & Relegation</h1>
        <div class="prorel" id="premier">
            <?php
                $sql = mysqli_query($db, "SELECT eplrel FROM efl_prorel WHERE eplrel IS NOT NULL");
            ?>
            <h3 align="center">The following teams are positioned for <em>relegation</em> to the <ins>EFL Championship</ins>:</h3>
            <div class="container" align="center">
            <?php
                $i = 1;
                while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
                    $tsho = $r['eplrel'];
                    $query = mysqli_query($db, "SELECT * FROM efl_clubs WHERE teamShort = '$tsho'");
                    $q = mysqli_fetch_array($query);
                    $team = $q['nickname'];
                    $lg = $q['league'];
            ?>
                <div id="<?php echo $tsho;?>" style="width: 200px; height: 125px; display: inline-block; margin: 25px; text-align:center; border: 2px solid white; border-radius:1px;">
                    <figure>
                        <img src="../../Assets/EFL/<?php echo $lg . "/" . $tsho;?>.png" id = "<?php echo $tsho;?>" height=75 width=75/>
                        <br><figcaption><?php echo $team;?></figcaption>
                    </figure>
                </div>
            <?php
                $i++;
                }
            ?>   
            </div>         
        </div>
        <div class="prorel" id="premier">
            <?php
                $sql = mysqli_query($db, "SELECT champpro FROM efl_prorel WHERE champpro IS NOT NULL");
            ?>
            <h3 align="center">The following teams are positioned for <em>promotion</em> to the <ins>Premier League</ins>:</h3>
            <div class="container" align="center">
            <?php
                $i = 1;
                while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
                    $tsho = $r['champpro'];
                    $query = mysqli_query($db, "SELECT * FROM efl_clubs WHERE teamShort = '$tsho'");
                    $q = mysqli_fetch_array($query);
                    $team = $q['nickname'];
                    $lg = $q['league'];
            ?>
                <div id="<?php echo $tsho;?>" style="width: 200px; height: 125px; display: inline-block; margin: 25px; text-align:center; border: 2px solid white; border-radius:1px;">
                    <figure>
                        <img src="../../Assets/EFL/<?php echo $lg . "/" . $tsho;?>.png" id = "<?php echo $tsho;?>" height=75 width=75/>
                        <br><figcaption><?php echo $team;?></figcaption>
                    </figure>
                </div>
            <?php
                $i++;
                }
            ?>   
            </div>                      
        </div>  
        <div class="prorel" id="premier">
            <?php
                $sql = mysqli_query($db, "SELECT champrel FROM efl_prorel WHERE champrel IS NOT NULL");
            ?>
            <h3 align="center">The following teams are positioned for <em>relegation</em> to <ins>League One</ins>:</h3>
            <div class="container" align="center">
            <?php
                $i = 1;
                while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
                    $tsho = $r['champrel'];
                    $query = mysqli_query($db, "SELECT * FROM efl_clubs WHERE teamShort = '$tsho'");
                    $q = mysqli_fetch_array($query);
                    $team = $q['nickname'];
                    $lg = $q['league'];
            ?>
                <div id="<?php echo $tsho;?>" style="width: 200px; height: 125px; display: inline-block; margin: 25px; text-align:center; border: 2px solid white; border-radius:1px;">
                    <figure>
                        <img src="../../Assets/EFL/<?php echo $lg . "/" . $tsho;?>.png" id = "<?php echo $tsho;?>" height=75 width=75/>
                        <br><figcaption><?php echo $team;?></figcaption>
                    </figure>
                </div>
            <?php
                $i++;
                }
            ?>   
            </div>  
        </div>   
        <div class="prorel" id="premier">
            <?php
                $sql = mysqli_query($db, "SELECT elopro FROM efl_prorel WHERE elopro IS NOT NULL");
            ?>
            <h3 align="center">The following teams are positioned for <em>promotion</em> to the <ins>EFL Championship</ins>:</h3>
            <div class="container" align="center">
            <?php
                $i = 1;
                while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
                    $tsho = $r['elopro'];
                    $query = mysqli_query($db, "SELECT * FROM efl_clubs WHERE teamShort = '$tsho'");
                    $q = mysqli_fetch_array($query);
                    $team = $q['nickname'];
                    $lg = $q['league'];
            ?>
                <div id="<?php echo $tsho;?>" style="width: 200px; height: 125px; display: inline-block; margin: 25px; text-align:center; border: 2px solid white; border-radius:1px;">
                    <figure>
                        <img src="../../Assets/EFL/<?php echo $lg . "/" . $tsho;?>.png" id = "<?php echo $tsho;?>" height=75 width=75/>
                        <br><figcaption><?php echo $team;?></figcaption>
                    </figure>
                </div>
            <?php
                $i++;
                }
            ?>   
            </div>                      
        </div>  
        <div class="prorel" id="premier">
            <?php
                $sql = mysqli_query($db, "SELECT elorel FROM efl_prorel WHERE elorel IS NOT NULL");
            ?>
            <h3 align="center">The following teams are positioned for <em>relegation</em> to <ins>League Two</ins>:</h3>
            <div class="container" align="center">
            <?php
                $i = 1;
                while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
                    $tsho = $r['elorel'];
                    $query = mysqli_query($db, "SELECT * FROM efl_clubs WHERE teamShort = '$tsho'");
                    $q = mysqli_fetch_array($query);
                    $team = $q['nickname'];
                    $lg = $q['league'];
            ?>
                <div id="<?php echo $tsho;?>" style="width: 200px; height: 125px; display: inline-block; margin: 25px; text-align:center; border: 2px solid white; border-radius:1px;">
                    <figure>
                        <img src="../../Assets/EFL/<?php echo $lg . "/" . $tsho;?>.png" id = "<?php echo $tsho;?>" height=75 width=75/>
                        <br><figcaption><?php echo $team;?></figcaption>
                    </figure>
                </div>
            <?php
                $i++;
                }
            ?>   
            </div>  
        </div>   
        <div class="prorel" id="premier">
            <?php
                $sql = mysqli_query($db, "SELECT eltpro FROM efl_prorel WHERE eltpro IS NOT NULL");
            ?>
            <h3 align="center">The following teams are positioned for <em>promotion</em> to <ins>League One</ins>:</h3>
            <div class="container" align="center">
            <?php
                $i = 1;
                while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
                    $tsho = $r['eltpro'];
                    $query = mysqli_query($db, "SELECT * FROM efl_clubs WHERE teamShort = '$tsho'");
                    $q = mysqli_fetch_array($query);
                    $team = $q['nickname'];
                    $lg = $q['league'];
            ?>
                <div id="<?php echo $tsho;?>" style="width: 200px; height: 125px; display: inline-block; margin: 25px; text-align:center; border: 2px solid white; border-radius:1px;">
                    <figure>
                        <img src="../../Assets/EFL/<?php echo $lg . "/" . $tsho;?>.png" id = "<?php echo $tsho;?>" height=75 width=75/>
                        <br><figcaption><?php echo $team;?></figcaption>
                    </figure>
                </div>
            <?php
                $i++;
                }
            ?>   
            </div>                      
        </div>  
        <div class="prorel" id="premier">
            <?php
                $sql = mysqli_query($db, "SELECT eltrel FROM efl_prorel WHERE eltrel IS NOT NULL");
            ?>
            <h3 align="center">The following teams are positioned for <em>relegation</em> from <ins>League Two</ins>:</h3>
            <div class="container" align="center">
            <?php
                $i = 1;
                while ($i <= mysqli_num_rows($sql) && $r=mysqli_fetch_array($sql)){
                    $tsho = $r['eltrel'];
                    $query = mysqli_query($db, "SELECT * FROM efl_clubs WHERE teamShort = '$tsho'");
                    $q = mysqli_fetch_array($query);
                    $team = $q['nickname'];
                    $lg = $q['league'];
            ?>
                <div id="<?php echo $tsho;?>" style="width: 200px; height: 125px; display: inline-block; margin: 25px; text-align:center; border: 2px solid white; border-radius:1px;">
                    <figure>
                        <img src="../../Assets/EFL/<?php echo $lg . "/" . $tsho;?>.png" id = "<?php echo $tsho;?>" height=75 width=75/>
                        <br><figcaption><?php echo $team;?></figcaption>
                    </figure>
                </div>
            <?php
                $i++;
                }
            ?>   
            </div>  
        </div>   
        <div class="prorel">
            <h2 align="center">Are you ready to process Promotion & Relegation?</h2>
            <button class = "yes" onclick="window.location.href='moveTeams.php'">Yes</button>
            <button class = "no" onclick="window.location.href='index.php'">Not Yet</button>
        </div>                      
	</body>
</html>
<style>

	body {
		background-color: black;
	}

	h1 {
		font-size: 90px;
		color: purple;
		text-shadow: 3px 3px white;
		margin:15px;
	}

    .prorel {
    	margin-top: 100px;
        max-width: 60%;
        margin-left: 20%;
        margin-bottom: 5%;
        display: block;
        margin-top: 10px;
		background-color: rgba(255,255,255,.75);
        padding-top:20px;
        padding-bottom: 20px;
        border-radius: 12px;
        border: solid purple 8px;
        text-align: center;
    }

    button.yes {
        color: white;
        background-color: green;
        cursor: pointer;
        display: inline-block;
        font-size: 18px;
        border-radius: 2px;
        padding: 5px;
        width: 125px;
        margin: 5px;
    }

    button.yes:hover {
        color: green;
        background-color: white;
        font-weight: bold;
    }

    button.no {
        color: black;
        background-color: lightgrey;
        cursor: pointer;
        display: inline-block;
        font-size: 18px;
        border-radius: 2px;
        padding: 5px;
        width: 125px;
        margin: 5px;
        opacity: .5;
    }

    button.no:hover {
        color: yellow;
        background-color: red;
        font-weight: bold;
        opacity: 1
    }

    figcaption {
        display: ruby;
    }
</style> 