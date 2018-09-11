<?php require('header.php'); ?>
<div class="row">
	<?php require('sidebar.php'); ?>
	<div class="col-6">
		<h1>Help</h1>
		<input type="text" id="searchBar" disabled onkeyup="searchTable()" placeholder="Search with keyword" title="Type in a name">
		<?php 
					$sql = "SELECT * FROM faq ORDER BY RAND() LIMIT 5";
					$result = mysqli_query($conn, $sql);
					$resulCheck = mysqli_num_rows($result);
					while($row = mysqli_fetch_array($result))
					{
					echo "<button class='accordion'>". $row['faqHeading'] . "</button>";
					echo "<div class='panel'>" . $row['faqContent'] . "</div>";
					}
				?>
	</div>
</div>
<script type="text/javascript">
	var acc = document.getElementsByClassName("accordion");
	var i;
	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
	    this.classList.toggle("accordian-active");
	    var panel = this.nextElementSibling;
	    if (panel.style.maxHeight){
	      panel.style.maxHeight = null;
	    } else {
	      panel.style.maxHeight = panel.scrollHeight+10 + "px";
	    } 
	  });
	}
</script>

<?php require('footer.php'); ?>