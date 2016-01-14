<?php
	include('inc/db_connect.php');

?>

<!DOCTYPE html>
<html>
<head>
	<?php
	include('inc/head.php');
	?>

</head>
<body>
	<?php
		include('inc/nav.php');
	?>
	<main>
		<div class="row main">
			<div class="col-xs-6 col-xs-offset-3">
				<form class="well" method="post" action="processsignup.php">
				  <div class="form-group">
				    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
				  </div>
				  <button type="submit" class="btn btn-primary btn-lg form-control">Sign Up</button>
				</form>
			</div>
		</div>
	</main>
	<?php
		include('inc/footer.php');
	?>
</body>
</html>