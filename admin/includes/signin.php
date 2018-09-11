<?php
session_start();
include_once '../../includes/db_connect.php';

if(isset($_POST['submit'])){
	
	$stno = mysqli_real_escape_string($conn,$_POST['stno']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	if(empty($stno) || empty($pwd)){
		header("Location: ../?error=empty");
		exit();
	}else{
		$sql = "SELECT * FROM staff WHERE StaffNo='$stno'";
		$result = mysqli_query($conn, $sql);
		$resulCheck = mysqli_num_rows($result);

		if($resulCheck == 0){
			header("Location: ../?error=missing");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = $row['Password'];
				if($pwdCheck!=$pwd){
					header("Location: ../?error=wrong");
					exit();
				}else{
					$_SESSION['stno'] = $row['StaffNo'];
					$_SESSION['lvl'] = $row['Level'];
					header("Location: ../dashboard.php");
				}
			}
		}
	}

}else {
	header("Location: ../?error=access_denied");
	exit();
}

?>
