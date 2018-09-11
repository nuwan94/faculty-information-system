<?php require('header.php'); ?>
<div class="row">
	<?php require('sidebar.php'); ?>
	<div class="col-6">
		<?php 
		echo "<h1>Cumulative GPA : </h1>"
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