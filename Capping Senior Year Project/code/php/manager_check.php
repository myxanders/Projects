<?php
$sql = "select tid from employee where username = '" . $login_session . "'";
$id = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($id);
$login_id = $row['tid'];

if($login_id != 4){
	if($login_id != 2)
		header("location: Error.php");
}

?>