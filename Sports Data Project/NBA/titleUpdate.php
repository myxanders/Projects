<?php
function updateTitles ($string){
    include("../../session.php");
    $n = "<br>";    
    $sql = mysqli_query($db, "SELECT * FROM nbateams WHERE teamShort = '$string'");
    $r = mysqli_fetch_array($sql);
    $id = $r['tid'];
    $tsho = $r['teamShort'];
    $wins = $r['finals'];
    $apps = $r['apps'];
    $losses = $apps - $wins;
    $query = mysqli_query($db, "SELECT COUNT(*) AS titles FROM nba_finals_history WHERE winnerid = $id");
    $q = mysqli_fetch_array($query);
    $titles = $q['titles'];
    $srch = mysqli_query($db, "SELECT COUNT(*) AS nopes FROM nba_finals_history WHERE loserid = $id");
    $s = mysqli_fetch_array($srch);
    $nopes = $s['nopes'];
    $beep = $titles + $nopes;
    //echo $tsho . ": " . $wins . "|" . $titles . "; " . $losses . "|" . $nopes . "; " . $apps . "|" . $beep . $n;
    if ($wins < $titles){
        mysqli_query($db, "UPDATE nbateams SET finals = $titles WHERE tid = $id");
    }
    if ($apps < $beep){
        mysqli_query($db, "UPDATE nbateams SET apps = $beep WHERE tid = $id");
    }
    return NULL;
}
?>