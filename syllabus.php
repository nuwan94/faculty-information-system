<?php require('header.php');?>
<style>
	#subjectList {
		border-collapse: collapse;
		width: 100%;
		border: 1px solid #ddd;
		font-size: 1em;
	}
	#subjectList th, #subjectList td {
		text-align: left;
		padding: 12px;
	}
	#subjectList tr {
		border-bottom: 1px solid #ddd;
	}
	#subjectList tr.header, #myTable tr:hover {
		background-color: #f1f1f1;
	}
	#subjectList td:first-child {
		width:30%;
	}
	.fa-file-download{
		float:right;
		font-size:1.5em;
	}
	@media only screen and (max-width:768px) {
		#subjectList td{
			display: block;
			padding-left: 40px;
		}
		#subjectList td:first-child{
			width:100%;
			padding-left: 20px;
			font-weight: bold;
			background-color: #ddd;
		}
	}
</style>
<div class="row">
	<?php require('sidebar.php'); ?>
	<div class="col-6">
		<h1>Course Contents</h1>
		<input type="text" id="searchBar" oninput="getSubjects(this.value)" placeholder="Search with Course Code or Name" title="Type in a name">
		<table id="subjectList">
		<?php 
			$sql = "SELECT * FROM subject WHERE CourseId='".$_SESSION['cid']."' ORDER BY RAND() LIMIT 5";
			$result = mysqli_query($conn, $sql);
			$resulCheck = mysqli_num_rows($result);
			if($resulCheck>0){
				while($row = mysqli_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['SubjectCode'] . "</td>";
				echo "<td>" . $row['SubjectName'] . "<i class='fa fa-file-download'></i>";
				echo "</td></tr>";
				}
			}
		?>
		</table>
	</div>
</div>
<script>
function getSubjects(str) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subjectList").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","modules/search-subject.php?q="+str,true);
        xmlhttp.send();
}
</script>
<?php require('footer.php'); ?>