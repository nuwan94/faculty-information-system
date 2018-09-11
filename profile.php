<?php require('header.php'); ?>
<style>
table{
	max-width: 500px;
	border-collapse: collapse;
}
td{
	padding:  1em;
}
tr td:first-child{
	text-align: right;
	font-weight: bold;
}
</style>
<div class="row">
	<?php require('sidebar.php'); ?>
	<div class="col-6">
		<h1>Profile</h1>
		<div class="row">
			<table>
			<?php
				$sql = "SELECT * FROM student where StudentNo='" . $_SESSION['sno']. "'";
				$result = mysqli_query($conn, $sql);
				$resulCheck = mysqli_num_rows($result);
				while($row = mysqli_fetch_array($result))
				{
				echo "<tr><td>Student No</td>";
				echo "<td>" . $row['StudentNo'] . " (Level ". (date('Y') - $row['AcYear']-((date('m')>03)?1:2) ) .")</td></tr>";
				echo "<tr><td>Name</td>";
				echo "<td>" . $row['StudentName'] . "</td></tr>";
				echo "<tr><td>Address</td>";
				echo "<td>" . $row['Address'] . "</td></tr>";
				echo "<tr><td>Email(s)</td>";
				echo "<td><a target='_blank' title='Click to send mail' href='mailto:" . $row['EmailPersonal'] . "'>".$row['EmailPersonal']."</a><br>";
				echo "<a target='_blank' title='Click to send mail' href='mailto:" . $row['EmailKLN'] . "'>".$row['EmailKLN']."</a></td></tr>";
				echo "<tr><td>Contact No</td>";
				echo "<td><a href='tel:" . $row['ContactNo'] . "'>".$row['ContactNo'] ."</a></td></tr>";
				echo "<tr><td>Z-Score</td>";
				echo "<td>" . $row['ZScore'] . "</td></tr>";
				echo "<tr><td>Current GPA</td>";
				echo "<td>" . $row['GPA'] . "</td></tr>";
				}
			?>
			</table>
		</div>
	</div>
</div>

<?php require('footer.php'); ?>