<?php
include('session.php');
$sql = "select eid from employee where username = '" . $login_session . "'";
$eid = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($eid);
$login_id = $row['eid'];

$appid = $_GET['id'];
$query = "select * from application_access_log where eid = '" . $login_id . "' and appid = '" . $appid . "'";
$access = mysqli_query($db,$query);
$r = mysqli_fetch_array($access);


if (!$r) {
	header("location: AccessDenied.php");
}
else {
	switch ($appid) {
		case 1:
			header("location:https://login.skype.com/login?message=signin_continue");
			break;
		
		case 2:
			header("location:https://login.salesforce.com/");
			break;

		case 3:
			header("location:https://www3.financialtrans.com/tf/FANWeb?tx=Disclaim&cz=d25201708020718022003030417");
			break;

		case 4:
			header("location:https://outlook.live.com/owa/");
			break;

		case 5:
			header("location:https://teamcity.jetbrains.com/login.html");
			break;

		case 6:
			header("location:https://www.jfrog.com/jira/login.jsp");
			break;			

		default:
			header("location:AccessDenied.php");
			break;
	}
	
}
?>