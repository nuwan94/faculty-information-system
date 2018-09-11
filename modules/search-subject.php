<?php
session_start();
include_once('../includes/db_connect.php');
$q = $_GET['q'];
$sql="SELECT * FROM subject WHERE CourseId='".$_SESSION['cid']."' AND (SubjectName LIKE '%".$q."%' OR SubjectCode LIKE '%".$q."%' ) ORDER BY SubjectCode LIMIT 5" ;
    $result = mysqli_query($conn,$sql);
    $resulCheck = mysqli_num_rows($result);
if($q == ''){
	$sql = "SELECT * FROM subject WHERE CourseId='".$_SESSION['cid']."' ORDER BY RAND() LIMIT 5";
	$result = mysqli_query($conn, $sql);
}
if(($resulCheck)>0){
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
		echo "<td>" . $row['SubjectCode'] . "</td>";
		echo "<td>" . $row['SubjectName'] . "<i class='fa fa-file-download'></i>";
		echo "</td></tr>";
    }
}
mysqli_close($conn);
?>