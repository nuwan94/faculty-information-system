<?php
session_start();
include_once('../../includes/db_connect.php');
$q = $_GET['q'];
$sql="SELECT * FROM course WHERE (CourseId LIKE '%".$q."%' OR CourseName LIKE '%".$q."%') ORDER BY CourseId LIMIT 5" ;
    $result = mysqli_query($conn,$sql);
    $resulCheck = mysqli_num_rows($result);
if($q == ''){
	$sql = "SELECT DISTINCT * FROM course ORDER BY RAND() LIMIT 5";
	$result = mysqli_query($conn, $sql);
}
if(($resulCheck)>0){
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
		echo "<td>" . $row['CourseId'] . "</td>";
		echo "<td>" . $row['CourseName'] . "</td></tr>";
    }
}
mysqli_close($conn);
?>