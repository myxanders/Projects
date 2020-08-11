<?php
function clearTies() {
	mysqli_query($db, "UPDATE nbateams SET headtohead = 0");
	echo "done";
}

clearTies();
header("location: standings.php");
?>