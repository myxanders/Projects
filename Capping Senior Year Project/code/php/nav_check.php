<?php
$sql = "select tid from employee where username = '" . $login_session . "'";
$nav = mysqli_query($db,$sql);
$rowNav = mysqli_fetch_assoc($nav);
$login_nav = $rowNav['tid'];

switch ($login_nav) {
    case "2":
        include('navbar_admin.php');
        break;
    case "3":
         include('navbar_HR.php');
        break;
	case "4":
		include('navbar_manager.php');
	break;
    default:
         include('navbar_reg.php');
}
?>