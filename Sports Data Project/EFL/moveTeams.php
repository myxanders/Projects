<?php
include("../../session.php");
include("variables.php");
$sp = "&nbsp";
$n = "<br>";
$tab = $sp . $sp . $sp . $sp;

$epl = [];
$cha = [];
$elo = [];
$elt = [];

$sql = mysqli_query($db, "SELECT eplrel FROM efl_prorel WHERE eplrel IS NOT NULL");
$i=1;
while ($i <= 3 && $r=mysqli_fetch_array($sql)){
    array_push($epl,$r['eplrel']);
    $i++;
}
$sql = mysqli_query($db, "SELECT champpro FROM efl_prorel WHERE champpro IS NOT NULL");
$i=1;
while ($i <= 3 && $r=mysqli_fetch_array($sql)){
    $tsho = $r['champpro'];
    $cha[$tsho] = "pro";
    $i++;
}
$sql = mysqli_query($db, "SELECT champrel FROM efl_prorel WHERE champrel IS NOT NULL");
$i=1;
while ($i <= 3 && $r=mysqli_fetch_array($sql)){
    $tsho = $r['champrel'];
    $cha[$tsho] = "rel";
    $i++;
}
$sql = mysqli_query($db, "SELECT elopro FROM efl_prorel WHERE elopro IS NOT NULL");
$i=1;
while ($i <= 3 && $r=mysqli_fetch_array($sql)){
    $tsho = $r['elopro'];
    $elo[$tsho] = "pro";
    $i++;
}
$sql = mysqli_query($db, "SELECT elorel FROM efl_prorel WHERE elorel IS NOT NULL");
$i=1;
while ($i <= 4 && $r=mysqli_fetch_array($sql)){
    $tsho = $r['elorel'];
    $elo[$tsho] = "rel";
    $i++;
}
$sql = mysqli_query($db, "SELECT eltpro FROM efl_prorel WHERE eltpro IS NOT NULL");
$i=1;
while ($i <= 4 && $r=mysqli_fetch_array($sql)){
    $tsho = $r['eltpro'];
    $elt[$tsho] = "pro";
    $i++;
}
$sql = mysqli_query($db, "SELECT eltrel FROM efl_prorel WHERE eltrel IS NOT NULL");
$i=1;
while ($i <= 2 && $r=mysqli_fetch_array($sql)){
    $tsho = $r['eltrel'];
    $elt[$tsho] = "rel";
    $i++;
}
foreach($epl as $x){
    $img = $x . ".png";
    $oldname = $filepath . "Premier/" . $img;
    $newname = $filepath  . "Championship/" . $img;
    rename($oldname, $newname);
}
foreach ($cha as $x => $y) {
    $img = $x . ".png";
    if ($y == "pro"){
        $oldname = $filepath . "Championship/" . $img;
        $newname = $filepath  . "Premier/" . $img;
        rename($oldname, $newname);
    }
    elseif ($y == "rel"){
        $oldname = $filepath . "Championship/" . $img;
        $newname = $filepath  . "League_One/" . $img; 
        rename($oldname, $newname);      
    }
}
foreach ($elo as $x => $y) {
    $img = $x . ".png";
    if ($y == "pro"){
        $oldname = $filepath . "League_One/" . $img;
        $newname = $filepath  . "Championship/" . $img;
        rename($oldname, $newname);
    }
    elseif ($y == "rel"){
        $oldname = $filepath . "League_One/" . $img;
        $newname = $filepath  . "League_Two/" . $img; 
        rename($oldname, $newname);      
    }
}

foreach ($elt as $x => $y) {
    $img = $x . ".png";
    if ($y == "pro"){
        $oldname = $filepath . "League_Two/" . $img;
        $newname = $filepath  . "League_One/" . $img;
        rename($oldname, $newname);
    }
    elseif ($y == "rel"){
        $oldname = $filepath . "League_Two/" . $img;
        $newname = $filepath . $img;       
        rename($oldname, $newname);
    }
}
header("location: index.php");
?>