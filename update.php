<?php
require_once 'dbconfig.php';
require_once 'class.user.php';

session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

	
	if($_POST)
	{
		//$id = $_POST['id'];
		$userName= $_POST['userName'];
		$userEmail = $_POST['userEmail'];
		$userPass = $_POST['userPass'];
		
		$stmt = $user_home->runQuery("UPDATE tbl_users SET userName=:un, userEmail=:ue, userPass=:up WHERE userId=:id");
		$stmt->bindParam(":un", $userName);
		$stmt->bindParam(":ue", $userEmail);
		$stmt->bindParam(":up", $userPass);
		$stmt->bindParam(":id", $userId);
		
		if($stmt->execute())
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
	}

?>