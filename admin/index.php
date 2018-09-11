<?php require('header.php');  
if(isset($_SESSION['stno'])){
	header("Location: dashboard.php");
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
			<h2>Admin Dashboard Login</h2>
			<p></p>
			<input type="text" name="stno" placeholder="Username" required="" />
			<input type="password" name="pwd" placeholder="Password" required="" />
			<input type="submit" name="submit" class="btn" value="Login">
		</form>
		<p><a href="#">Forget password?</a></p>
		<p><a href="../index.php">Student Login</a></p>
	</div>
</div>
<?php require('../footer.php'); ?>