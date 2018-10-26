<?php require('header.php'); ?>
<div class="row">
	<?php require('sidebar.php'); ?>
	<div class="col-6">
		<?php 

		$gpa_sum = 0.0;
		$credit_sum = 0;

		$sql1 = "SELECT * FROM marks,subject WHERE subject.SubjectCode=marks.SubjectId AND marks.CourseId='".$_SESSION['cid']."' AND marks.StudentNo='".$_SESSION['sno']."'";
		$result1 = mysqli_query($conn, $sql1);
		$resulCheck1 = mysqli_num_rows($result1);
		if($resulCheck1>0){
			while($row = mysqli_fetch_array($result1))
			{
				$creditSub = substr($row['SubjectId'], -1);
				if($row['Marks']){
					$credit_sum +=$creditSub;
					setGPA($row['Marks'],$creditSub);
				}	
			}
			echo "<h1>Cumulative GPA : ". round($gpa_sum/$credit_sum,2) . "</h1>";
		}


		function setGPA($m,$c){
			global $gpa_sum;
			if($m>84){
				$gpa_sum += 4.0*$c;
			}elseif($m>69){
				$gpa_sum += 4.0*$c;
			}elseif($m>64){
				$gpa_sum += 3.7*$c;
			}elseif($m>59){
				$gpa_sum += 3.3*$c;
			}elseif($m>54){
				$gpa_sum += 3.0*$c ;
			}elseif($m>49){
				$gpa_sum += 2.7*$c ;
			}elseif($m>44){
				$gpa_sum += 2.3*$c ;;
			}elseif($m>39){
				$gpa_sum += 2.0*$c ;
			}elseif($m>34){
				$gpa_sum += 1.7*$c ;
			}elseif($m>29){
				$gpa_sum += 1.3*$c ;
			}elseif($m>24){
				$gpa_sum += 1.0*$c ;
			}elseif($m>0){
				$gpa_sum += 0.0*$c ;
			}else{
			}
		}

		?>

		<div class="select">
			<select class="optionSelect" onload="getResults(3)" onchange="getResults(this.value)" name="semeseter" id="selectSem">
				<?php
					$lvl = (date('Y') - $_SESSION['ayear']-((date('m')>03)?1:2) );
					$currSem = $lvl*2-1;
					echo $lvl;
					for ($x = 1; $x <= 8; $x++) {
						if($x < $lvl*2){
							echo "<option value='". $x ."'>"."Semester ".$x."</option>";
						}else{
							break;
						}
					} 
				?>
			</select>
			<div class="select__arrow"></div>
		</div>
		
		<div class="clear"></div>

		<h3>Semester 0<span id='semNo'>1</span> Results : </h3>
		<table id="resultTable">
					<!-- results will fetch into here -->
		</table>
	</div>
</div>

	<style>
	.select {
		position: relative;
		display: inline-block;
		margin-bottom: 15px;
		//width: 100%;
	}
	.optionSelect{
		background: #cfd8dc;
		font-size: 1em;
		padding: 5px 30px 5px 10px;
		border: 0;
		color: #333;
		-moz-appearance: none;
		-webkit-appearance: none;
	}
	.optionSelect option{
		background:#fff;
		color:#333;
	}
	.select__arrow {
		position: absolute;
		top: 13px;
		right: 10px;
		width: 0;
		height: 0;
		pointer-events: none;
		border-style: solid;
		border-width: 8px 5px 0 5px;
		border-color: #888 transparent transparent transparent;
	}
	@media only screen and (max-width:768px) {
		table{
			width: 100%;
		}
	}
	</style>
	<script>
	document.addEventListener("load", getResults(1));
	function getResults(str) {
		document.getElementById('semNo').innerHTML = str;
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("resultTable").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET","modules/get-results.php?q="+str,true);
		xmlhttp.send();
	}
</script>
<?php require('footer.php'); ?>
