<?php
include("../session.php");
include("../sidenav.php");
$n = "<br>";

?>


<html>
	<head>
		<meta charset="UTF-8">
		<Title>Sports</Title>
		<link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="../StyleSheet.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon2.ico">
	</head>	
	<body>
        <!-- JS based accordion menu -->
		<h2 align="center">Pick a league.</h2>
		<div id="leagues" align="left">
			<button class="accordion" id="football">Football</button>
            <div class="panel">
            <?php 
                $i = 1;
                $sql = mysqli_query($db,"SELECT * FROM leagues WHERE sport = 'football'");
                while($row=mysqli_fetch_array($sql)) {
                    ?>
                    <button class="app" id="<?php echo $row['leagueName'];?>" style="font-family: 'Cambo', Times, serif;"onclick="window.location.href='<?php echo $row['leagueName'];?>'"><img src="../Assets/<?php echo $row['leagueName'];?>/TBD.png"></button>
                <?php
                $i++;
                }
                ?>                
			</div>
			<button class="accordion" id="basketball">Basketball</button>
            <div class="panel">
            <?php 
                $i = 1;
                $sql = mysqli_query($db,"SELECT * FROM leagues WHERE sport = 'basketball'");
                while($row=mysqli_fetch_array($sql)) {
                    ?>
                    <button class="app" id="<?php echo $row['leagueName'];?>" style="font-family: 'Cambo', Times, serif;"onclick="window.location.href='<?php echo $row['leagueName'];?>'"><img src="../Assets/<?php echo $row['leagueName'];?>/TBD.png"></button>
                <?php
                $i++;
                }
                ?>                
			</div>
			<button class="accordion" id="baseball">Baseball</button>
            <div class="panel">
                <?php 
                $i = 1;
                $sql = mysqli_query($db,"SELECT * FROM leagues WHERE sport = 'baseball'");
                while($row=mysqli_fetch_array($sql)) {
                    ?>
                    <button class="app" id="<?php echo $row['leagueName'];?>" style="font-family: 'Cambo', Times, serif;"onclick="window.location.href='<?php echo $row['leagueName'];?>'"><img src="../Assets/<?php echo $row['leagueName'];?>/TBD.png"></button>
                <?php
                $i++;
                }
                ?>                
			</div>	
			<button class="accordion" id="hockey">Hockey</button>
            <div class="panel">
                <?php 
                $i = 1;
                $sql = mysqli_query($db,"SELECT * FROM leagues WHERE sport = 'hockey'");
                while($row=mysqli_fetch_array($sql)) {
                    ?>
                    <button class="app" id="<?php echo $row['leagueName'];?>" style="font-family: 'Cambo', Times, serif;"onclick="window.location.href='<?php echo $row['leagueName'];?>'"><img src="../Assets/<?php echo $row['leagueName'];?>/TBD.png"></button>
                <?php
                $i++;
                }
                ?>                
			</div>
			<button class="accordion" id="soccer">Soccer</button>
            <div class="panel">
                <?php 
                $i = 1;
                $sql = mysqli_query($db,"SELECT * FROM leagues WHERE sport = 'soccer'");
                while($row=mysqli_fetch_array($sql)) {
                    ?>
                    <button class="app" id="<?php echo $row['leagueName'];?>" style="font-family: 'Cambo', Times, serif;"onclick="window.location.href='<?php echo $row['leagueName'];?>'"><img src="../Assets/<?php echo $row['leagueName'];?>/TBD.png"></button>
                <?php
                $i++;
                }
                ?>                
			</div>
			<button class="accordion" id="racing">Racing</button>
            <div class="panel">
                <?php 
                $i = 1;
                $sql = mysqli_query($db,"SELECT * FROM leagues WHERE sport = 'racing'");
                while($row=mysqli_fetch_array($sql)) {
                    ?>
                    <button class="app" id="<?php echo $row['leagueName'];?>" style="font-family: 'Cambo', Times, serif;"onclick="window.location.href='<?php echo $row['leagueName'];?>'"><img src="../Assets/<?php echo $row['leagueName'];?>/TBD.png"></button>
                <?php
                $i++;
                }
                ?>                
			</div>	
			<button class="accordion" id="racing">Jelle's Marble Runs</button>
            <div class="panel">
                <?php 
                $i = 1;
                $sql = mysqli_query($db,"SELECT * FROM leagues WHERE sport = 'marbles'");
                while($row=mysqli_fetch_array($sql)) {
                    ?>
                    <button class="app" id="<?php echo $row['leagueName'];?>" style="font-family: 'Cambo', Times, serif;"onclick="window.location.href='JMR/<?php echo $row['leagueName'];?>'"><img src="../Assets/JMR/<?php echo $row['leagueName'];?>/TBD.png"></button>
                <?php
                $i++;
                }
                ?>                
			</div>	            															
        </div>
        <!-- Enable the accordion -->
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");

                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                panel.style.display = "none";
                } else {
                panel.style.display = "block";
                }
            });
            } 
        </script>   
	</body>
</html>
<style>

	h2 {
		font-size: 40px;
		text-shadow: 2px 2px white;
	}     

    img {
        width: 125px;
        height: 125px;
    }         

    #leagues {
    	padding-top: 2%;
		margin-left: 20%;
		margin-right: 20%;
		width: auto;    	
    }    

    .accordion {
        background-color: black;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: 1px solid white;
        text-align: left;
        outline: none;
        font-size: 20px;
        transition: 0.4s;
    }

    .active {
        background-color: white; 
        color: black;
    }

    .accordion:hover {
        background-color: #ccc;
        color: black;
    }

    .accordion:after {
        content: '\02795'; /* Unicode character for "plus" sign (+) */
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2796"; /* Unicode character for "minus" sign (-) */
    }

    .panel {
        padding: 20px;
        display: none;
        background-color: white;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }    

    .app {
        background-color: black;
        color: white;
        border: 2px solid white;
        border-radius: 4px;
        width: 150px;
        height: 150px;
    }
</style> 