<?php
//Make sure Cup wins are correct
function updateTitles ($string){
    include("../../session.php");
    $n = "<br>";
    $sql = mysqli_query($db, "SELECT * FROM nhlteams WHERE teamShort = '$string'");
    $r = mysqli_fetch_array($sql);
    $id = $r['tid'];
    $tsho = $r['teamShort'];
    $wins = $r['cups'];
    $apps = $r['apps'];
    $losses = $apps - $wins;
    $query = mysqli_query($db, "SELECT COUNT(*) AS titles FROM stanleycups WHERE winnerid = $id");
    $q = mysqli_fetch_array($query);
    $titles = $q['titles'];
    $srch = mysqli_query($db, "SELECT COUNT(*) AS nopes FROM stanleycups WHERE loserid = $id");
    $s = mysqli_fetch_array($srch);
    $nopes = $s['nopes'];
    $beep = $titles + $nopes;
    //echo $tsho . ": " . $wins . "|" . $titles . "; " . $losses . "|" . $nopes . "; " . $apps . "|" . $beep . $n;
    if ($wins < $titles){
        mysqli_query($db, "UPDATE nhlteams SET cups = $titles WHERE tid = $id");
    }
    if ($apps < $beep){
        mysqli_query($db, "UPDATE nhlteams SET apps = $beep WHERE tid = $id");
    }
    return NULL;
}
?>