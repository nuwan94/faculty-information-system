<?php
session_start();

if(isset($_POST['submit'])){
	include_once 'db_connect.php';

	$sno = mysqli_real_escape_string($conn,$_POST['sno']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	if(empty($sno) || empty($pwd)){
		header("Location: ../?error=empty");
		exit();
	}else{
		$sql = "SELECT * FROM student WHERE StudentNo='$sno'";
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
					$_SESSION['sno'] = $row['StudentNo'];
					$_SESSION['sname'] = $row['StudentName'];
					$_SESSION['cid'] = $row['CourseId'];
					$_SESSION['ayear'] = $row['AcYear'];
					header("Location: ../home.php");
				}
			}
		}
	}

}else {
	header("Location: ../");
	exit();
}

?>
