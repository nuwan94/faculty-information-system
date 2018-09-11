<?php require('header.php'); ?>
<?php 
if(isset($_SESSION['sno'])){
	header("Location: home.php");
}
?>
<?php 
if(isset($_SESSION['stno'])){
	header("Location: admin/dashboard.php");
}
?>
<style>
	form{
		padding: 2em;
		background: #ECEFF1;
		width: 500px;
		margin: 0 auto;
	}
</style>
<div class="row center">
	<div class="col-8">
		<form action="includes/signin.php" method="post">
			<h2>Welcome!</h2>
			<p>You must log in to use the Faculty Information System.</p>
			<p></p>
			<input type="text" name="sno" placeholder="XX/201X/XXX" required="" />
			<input type="password" name="pwd" placeholder="Password" required="" />
			<input type="submit" name="submit" class="btn" value="Login">
		</form>
		<p><a href="#">Forget password?</a></p>
		<p><a href="admin/index.php">Admin Login</a></p>
	</div>
</div>
<?php require('footer.php'); ?>