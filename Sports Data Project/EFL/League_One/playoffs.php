<?php
include("../../../session.php");
include("../../../eflsidenav.php");
//Variables for new lines and spaces make it easier for concatenation
$n = "<br>";
$sp = "&nbsp";

$home36_l1 = NULL;
$home36_l2 = NULL;
$home36_pks = NULL;
$away36_l1 = NULL;
$away36_l2 = NULL;
$away36_pks = NULL;
$home45_l1 = NULL;
$home45_l2 = NULL;
$home45_pks = NULL;
$away45_l1 = NULL;
$away45_l2 = NULL;
$away45_pks = NULL;
$homescore = NULL;
$home_pks = NULL;
$awayscore = NULL;
$away_pks = NULL;

//If the submit button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['home36_l1'])) {
        $home36_l1 = $_POST['home36_l1'];
    }
    if (isset($_POST['home36_l2'])) {
        $home36_l2 = $_POST['home36_l2'];
    }
    if (isset($_POST['home36_pks'])) {
        $home36_pks = $_POST['home36_pks'];
    }
    if (isset($_POST['away36_l1'])) {
        $away36_l1 = $_POST['away36_l1'];
    }
    if (isset($_POST['away36_l2'])) {
        $away36_l2 = $_POST['away36_l2'];
    }
    if (isset($_POST['away36_pks'])) {
        $away36_pks = $_POST['away36_pks'];
    }
    if (isset($_POST['home45_l1'])) {
        $home45_l1 = $_POST['home45_l1'];
    }
    if (isset($_POST['home45_l2'])) {
        $home45_l2 = $_POST['home45_l2'];
    }
    if (isset($_POST['home45_pks'])) {
        $home45_pks = $_POST['home45_pks'];
    }
    if (isset($_POST['away45_l1'])) {
        $away45_l1 = $_POST['away45_l1'];
    }
    if (isset($_POST['away45_l2'])) {
        $away45_l2 = $_POST['away45_l2'];
    }
    if (isset($_POST['away45_pks'])) {
        $away45_pks = $_POST['away45_pks'];
    }
    if (isset($_POST['homescore'])) {
        $homescore = $_POST['homescore'];
    }
    if (isset($_POST['awayscore'])) {
        $awayscore = $_POST['awayscore'];
    }
    if (isset($_POST['home_pks'])) {
        $home_pks = $_POST['home_pks'];
    }
    if (isset($_POST['away_pks'])) {
        $away_pks = $_POST['away_pks'];
    }

    if ($home36_l1 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET home_leg1 = $home36_l1 WHERE match_id = 'elo36'");
    };
    if ($home36_l2 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET home_leg2 = $home36_l2 WHERE match_id = 'elo36'");
    };
    if ($home36_pks != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET home_pks = $home36_pks WHERE match_id = 'elo36'");
    };
    if ($away36_l1 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET away_leg1 = $away36_l1 WHERE match_id = 'elo36'");
    };
    if ($away36_l2 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET away_leg2 = $away36_l2 WHERE match_id = 'elo36'");
    };
    if ($away36_pks != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET away_pks = $away36_pks WHERE match_id = 'elo36'");
    };
    if ($home45_l1 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET home_leg1 = $home45_l1 WHERE match_id = 'elo45'");
    };
    if ($home45_l2 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET home_leg2 = $home45_l2 WHERE match_id = 'elo45'");
    };
    if ($home45_pks != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET home_pks = $home45_pks WHERE match_id = 'elo45'");
    };
    if ($away45_l1 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET away_leg1 = $away45_l1 WHERE match_id = 'elo45'");
    };
    if ($away45_l2 != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET away_leg2 = $away45_l2 WHERE match_id = 'elo45'");
    };
    if ($away45_pks != NULL){
        mysqli_query($db, "UPDATE efl_playoff_semis SET away_pks = $away45_pks WHERE match_id = 'elo45'");
    };
    if ($homescore != NULL){
        mysqli_query($db, "UPDATE efl_playoff_finals SET homescore = $homescore WHERE match_id = 'elo'");
    };
    if ($home_pks != NULL){
        mysqli_query($db, "UPDATE efl_playoff_finals SET homepks = $home_pks WHERE match_id = 'elo'");
    };
    if ($awayscore != NULL){
        mysqli_query($db, "UPDATE efl_playoff_finals SET awayscore = $awayscore WHERE match_id = 'elo'");
    };
    if ($away_pks != NULL){
        mysqli_query($db, "UPDATE efl_playoff_finals SET awaypks = $away_pks WHERE match_id = 'elo'");
    };

   if ($home36_l2 != NULL) {
        $sql = mysqli_query($db, "SELECT home,away FROM efl_playoff_semis WHERE match_id = 'elo36'");
        $r = mysqli_fetch_array($sql);
        $home = $r['home'];
        $away = $r['away'];
        if ($home36_pks == NULL) {
            $home36_pks = 0;
            $away36_pks = 0;
        }
        if ($home36_l1 + $home36_l2 + $home36_pks > $away36_l1 + $away36_l2 + $away36_pks) {
            mysqli_query($db, "UPDATE efl_playoff_finals SET home = '$home' WHERE match_id = 'elo'");
        } elseif ($home36_l1 + $home36_l2 + $home36_pks < $away36_l1 + $away36_l2 + $away36_pks) {
            mysqli_query($db, "UPDATE efl_playoff_finals SET home = '$away' WHERE match_id = 'elo'");
        }
    }
    if ($home45_l2 != NULL) {
        $sql = mysqli_query($db, "SELECT home,away FROM efl_playoff_semis WHERE match_id = 'elo45'");
        $r = mysqli_fetch_array($sql);
        $home = $r['home'];
        $away = $r['away'];
        if ($home45_pks == NULL) {
            $home45_pks = 0;
            $away45_pks = 0;
        }
        if ($home45_l1 + $home45_l2 + $home45_pks > $away45_l1 + $away45_l2 + $away45_pks) {
            mysqli_query($db, "UPDATE efl_playoff_finals SET away = '$home' WHERE match_id = 'elo'");
        } elseif ($home45_l1 + $home45_l2 + $home45_pks < $away45_l1 + $away45_l2 + $away45_pks) {
            mysqli_query($db, "UPDATE efl_playoff_finals SET away = '$away' WHERE match_id = 'elo'");
        }
    }
    if ($homescore != 'NULL') {
        $sql = mysqli_query($db, "SELECT home,away FROM efl_playoff_finals WHERE match_id = 'elo'");
        $r = mysqli_fetch_array($sql);
        $home = $r['home'];
        $away = $r['away'];
        if ($home_pks == 'NULL') {
            $home_pks = 0;
            $away_pks = 0;
        }
        if ($homescore + $home_pks > $awayscore + $away_pks) {
            mysqli_query($db, "UPDATE efl_prorel SET elopro = '$home' WHERE `rank` = 3");
        } elseif ($homescore + $home_pks < $awayscore + $away_pks) {
            mysqli_query($db, "UPDATE efl_prorel SET elopro = '$away' WHERE `rank` = 3");
        }
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EFL League One Playoffs</title>
    <link rel='stylesheet' type='text/css' href='../eflstyle.css' />
    <link rel="stylesheet" type="text/css" href="../../../StyleSheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function openTab(evt, tabName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</head>

<body>
    <h1 align="center"><a href='../League_One' style="text-decoration: none; color:white;">2019-20 League One Playoffs</a></h1>
    <div class="tab" align="center">
        <button class="tablinks active" onclick="openTab(event, 'semis')" style="font-family: 'Cambo', Times, serif; font-size: 22px;">Semifinals</button>
        <button class="tablinks" onclick="openTab(event, 'finals')" style="font-family: 'Cambo', Times, serif; font-size: 22px;">Finals</button>
    </div>
    <div id="semis" class="tabcontent" style="display:block;">
        <h3>League One Playoff Semi-Finals</h3>
        <form action="playoffs.php" method="post" align="center">
            <div id="semifinals" class="champtable">
                <p>Semifinal 3/6</p>
                <?php
                $sql = mysqli_query($db, "SELECT * FROM efl_playoff_semis WHERE match_id = 'elo36'");
                $r = mysqli_fetch_array($sql);
                $home = $r['home'];
                $query = mysqli_query($db, "SELECT nickname FROM efl_clubs WHERE teamShort = '$home'");
                $q = mysqli_fetch_array($query);
                $hometeam = $q['nickname'];
                $away = $r['away'];
                $query = mysqli_query($db, "SELECT nickname FROM efl_clubs WHERE teamShort = '$away'");
                $q = mysqli_fetch_array($query);
                $awayteam = $q['nickname'];
                $home_leg1 = $r['home_leg1'];
                $away_leg1 = $r['away_leg1'];
                $home_leg2 = $r['home_leg2'];
                $away_leg2 = $r['away_leg2'];
                $home_pks = $r['home_pks'];
                $away_pks = $r['away_pks'];
                ?>
                <table class="tester">
                    <tr>
                        <th style="width: 250px;">Team</th>
                        <th style="width: 75px;">Leg 1</th>
                        <th style="width: 75px;">Leg 2</th>
                        <?php
                        if ($home_leg1 != NULL && $home_leg2 != NULL && ($home_leg1 + $home_leg2 == $away_leg1 + $away_leg2)) {
                        ?>
                            <th style="width: 75px;">PKs</th>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td id="<?php echo $home; ?>"><?php echo $hometeam; ?></td>
                        <td align="center">
                            <input type="text" name="home36_l1" placeholder="<?php echo $home_leg1; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $home_leg1; ?>">
                        </td>
                        <td align="center">
                            <input type="text" name="home36_l2" placeholder="<?php echo $home_leg2; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $home_leg2; ?>">
                        </td>
                        <?php
                        if ($home_leg1 != NULL && $home_leg2 != NULL && ($home_leg1 + $home_leg2 == $away_leg1 + $away_leg2)) {
                        ?>
                            <td align="center">
                                <input type="text" name="home36_pks" placeholder="<?php echo $home_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $home_pks; ?>">
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td id="<?php echo $away; ?>"><?php echo $awayteam; ?></td>
                        <td align="center">
                            <input type="text" name="away36_l1" placeholder="<?php echo $away_leg1; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $away_leg1; ?>">
                        </td>
                        <td align="center">
                            <input type="text" name="away36_l2" placeholder="<?php echo $away_leg2; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $away_leg2; ?>">
                        </td>
                        <?php
                        if ($home_leg1 != NULL && $home_leg2 != NULL && ($home_leg1 + $home_leg2 == $away_leg1 + $away_leg2)) {
                        ?>
                            <td align="center">
                                <input type="text" name="away36_pks" placeholder="<?php echo $away_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $away_pks; ?>">
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <br>
            <div id="semifinals" class="champtable">
                <p>Semifinal 4/5</p>
                <?php
                $sql = mysqli_query($db, "SELECT * FROM efl_playoff_semis WHERE match_id = 'elo45'");
                $r = mysqli_fetch_array($sql);
                $home = $r['home'];
                $query = mysqli_query($db, "SELECT nickname FROM efl_clubs WHERE teamShort = '$home'");
                $q = mysqli_fetch_array($query);
                $hometeam = $q['nickname'];
                $away = $r['away'];
                $query = mysqli_query($db, "SELECT nickname FROM efl_clubs WHERE teamShort = '$away'");
                $q = mysqli_fetch_array($query);
                $awayteam = $q['nickname'];
                $home_leg1 = $r['home_leg1'];
                $away_leg1 = $r['away_leg1'];
                $home_leg2 = $r['home_leg2'];
                $away_leg2 = $r['away_leg2'];
                $home_pks = $r['home_pks'];
                $away_pks = $r['away_pks'];
                ?>

                <table class="tester">
                    <tr>
                        <th style="width: 250px;">Team</th>
                        <th style="width: 75px;">Leg 1</th>
                        <th style="width: 75px;">Leg 2</th>
                        <?php
                        if ($home_leg1 != NULL && $home_leg2 != NULL && ($home_leg1 + $home_leg2 == $away_leg1 + $away_leg2)) {
                        ?>
                            <th style="width: 75px;">PKs</th>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td id="<?php echo $home; ?>"><?php echo $hometeam; ?></td>
                        <td align="center">
                            <input type="text" name="home45_l1" placeholder="<?php echo $home_leg1; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $home_leg1; ?>">
                        </td>
                        <td align="center">
                            <input type="text" name="home45_l2" placeholder="<?php echo $home_leg2; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $home_leg2; ?>">
                        </td>
                        <?php
                        if ($home_leg1 != NULL && $home_leg2 != NULL && ($home_leg1 + $home_leg2 == $away_leg1 + $away_leg2)) {
                        ?>
                            <td align="center">
                                <input type="text" name="home45_pks" placeholder="<?php echo $home_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $home_pks; ?>">
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td id="<?php echo $away; ?>"><?php echo $awayteam; ?></td>
                        <td align="center">
                            <input type="text" name="away45_l1" placeholder="<?php echo $away_leg1; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $away_leg1; ?>">
                        </td>
                        <td align="center">
                            <input type="text" name="away45_l2" placeholder="<?php echo $away_leg2; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $away_leg2; ?>">
                        </td>
                        <?php
                        if ($home_leg1 != NULL && $home_leg2 != NULL && ($home_leg1 + $home_leg2 == $away_leg1 + $away_leg2)) {
                        ?>
                            <td align="center">
                                <input type="text" name="away45_pks" placeholder="<?php echo $away_pks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $away_pks; ?>">
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <div align="center">
                <button type="submit" style="font-family: 'Cambo', Times, serif; padding:5px;">Submit</button>
            </div>
        </form>
    </div>
    <div id="finals" class="tabcontent"">
        <h3>League One Playoff Finals</h3>
        <form action=" playoffs.php" method="post" align="center">
        <div class=" champtable">
            <p>Finals</p>
            <?php
            $sql = mysqli_query($db, "SELECT * FROM efl_playoff_finals WHERE match_id = 'elo'");
            $r = mysqli_fetch_array($sql);
            $home = $r['home'];
            $query = mysqli_query($db, "SELECT nickname FROM efl_clubs WHERE teamShort = '$home'");
            $q = mysqli_fetch_array($query);
            $hometeam = $q['nickname'];
            $away = $r['away'];
            $query = mysqli_query($db, "SELECT nickname FROM efl_clubs WHERE teamShort = '$away'");
            $q = mysqli_fetch_array($query);
            $awayteam = $q['nickname'];
            $homescore = $r['homescore'];
            $awayscore = $r['awayscore'];
            $homepks = $r['homepks'];
            $awaypks = $r['awaypks'];
            ?>
            <table class="tester">
                <tr>
                    <th style="width: 250px;">Team</th>
                    <th style="width: 75px;">Score</th>
                    <?php
                    if ($homescore != NULL && ($homescore  == $awayscore)) {
                    ?>
                        <th style="width: 75px;">PKs</th>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td id="<?php echo $home; ?>"><?php echo $hometeam; ?></td>
                    <td align="center">
                        <input type="text" name="homescore" placeholder="<?php echo $homescore; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $homescore; ?>">
                    </td>
                    <?php
                    if ($homescore != NULL && ($homescore  == $awayscore)) {
                    ?>
                        <td align="center">
                            <input type="text" name="home_pks" placeholder="<?php echo $homepks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $homepks; ?>">
                        </td>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td id="<?php echo $away; ?>"><?php echo $awayteam; ?></td>
                    <td align="center">
                        <input type="text" name="awayscore" placeholder="<?php echo $awayscore; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $awayscore; ?>">
                    </td>
                    <?php
                    if ($homescore != NULL && ($homescore  == $awayscore)) {
                    ?>
                        <td align="center">
                            <input type="text" name="away_pks" placeholder="<?php echo $awaypks; ?>" pattern="\d*" maxlength="2" style="width:30px; text-align: right;" value="<?php echo $awaypks; ?>">
                        </td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div align="center">
            <button type="submit" style="font-family: 'Cambo', Times, serif; padding:5px;">Submit</button>
        </div>
        </form>
    </div>
    <!-- Back button needed to keep form submission clean -->
    <br>
    <div align="center" style="margin-bottom: 20px;">
        <button id="back" align="center" onclick="window.location.href='../League_One'" style="font-size: 20px; padding: 5px;"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to EPL Page</button>
    </div>
</body>

</html>
<style>
 	body {
		background-color: silver;
	}

	h1 {
		font-size: 90px;
		color: navy;
		text-shadow: 3px 3px black;
		margin:15px;
	}
	.tester {
	border-collapse: collapse;
	}

	.tester td, .tester th {
		border: 2px solid black;
		padding: 8px;
	}

	.tester th {
		background-color: darkgrey;
		color: black;
		text-align: center;
	}

	#elosched {
		font-family: 'Cambo', Times, serif;
		margin-left: 20%;
		margin-right: 20%;
		margin-bottom: 5%;
		width: auto;
		min-width: 800px;
		border: 3px solid black;
	}

	.tab {
		border: 3px solid white;
		/* background-color: chocolate; */
		background-image: linear-gradient(silver, white);
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		display: flex;
		overflow-x: scroll;
		scrollbar-width: none;
	}

	.tab::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0);
		box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
		border-radius: 10px;
		background-color: transparent;
	}

	.tab::-webkit-scrollbar {
		width: 0px;
		background-color: transparent;
	}

	.tab::-webkit-scrollbar-thumb {
		border-radius: 10px;
		-webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0);
		box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
		background-color: rgba(0, 0, 0, 0);
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 15px 6px 15px 6px;
		text-align: center;
		transition: 0.3s;
		font-size: 18px;
		background-image: linear-gradient(black, silver);
		color: white;
		margin: 3px;
		width: auto;
		min-width: 125px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-image: linear-gradient(black, white);
		color: yellow;
		border: none;

	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-image: none;
		background-color: white;
		color: black;

	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 3px solid white;
		border-top: none;
		margin-left: 20%;
		margin-right: 20%;
		width: auto;
		background-color: white;
		color: black;
	}

	#elogames {
		border-collapse: collapse;
		border-radius: 30px;
		width:450px;
		min-width: 360px;
	}

	#elogames td{
		border: 1px solid grey;
		padding: 2%;
		width: 45px;
	}

	#elogames th {
		background-color: black;
		color: white;
		text-align: center;
		border: 1px solid black;
		padding: 1%;
	}	

	#TBD {
	  	font-family: 'Cambo', Times, serif;
	 	background-color: white;
	 	color: black;
	}	
</style>