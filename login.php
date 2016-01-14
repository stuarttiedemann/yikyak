<?php
	include('inc/db_connect.php');

?>

<!DOCTYPE html>
<html>
<head>
	<?php
	include('head.php');
	?>

</head>
<body>
	<?php
		include('nav.php');
	?>
	<main>
		<div class="row main">
			<div class="col-xs-6 col-xs-offset-3">
				<form class="well" method="post" action="processlogin.php">
					<?php
						if(error){
							print "<span class='text-center'>User is not in the database.  Please try again.</span>";
						}
					?>
				  <h1 class="text-center">Log In</h1>		
				  <div class="form-group">
				    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
				  </div>
				  <button type="submit" class="btn btn-primary btn-lg form-control">Sign In</button>
				</form>
			</div>
		</div>
	</main>
	<?php
		include('footer.php');
	?>
</body>
</html>