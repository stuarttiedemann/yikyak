<?php 

	include('inc/db_connect.php');
	$_SESSION['page'] = 'active';

?>

<!DOCTYPE html>
<html>
<head>
	<?php include('inc/head.php') ?>
</head>
<body>
	<div id="total-wrapper">
		<?php include('inc/nav.php') ?>
		<section class="main-callout">
			<h1>Help Save the Hippos!</h1>
		</section>
		<section id="post-holder">
			<h2 class="text-center">Recent Posts</h2>
			<a href="/post.php"><button class="btn btn-success">Post Your Hippo Love!</button></a>

			<?php
				if(isset($_SESSION['uid'])){
					$result = DB::query("SELECT * FROM posts
						ORDER BY timestamp desc limit 30");
					foreach($result as $row){
						$content = $row['content'];
						$timestamp = $row['timestamp'];
						date_default_timezone_set("America/Chicago");
						print "<div class='posts'><div class='content'><h3>".$content."</h3></div>
									<div class='votes'>
										<a href='#'><h3>/\</h3></a>
										<a href='#'><h3>0</h3></a>
										<a href='#'><h3>\/</h3></a>
									</div>
									<div class='time-stamp'>
										<h3>".$timestamp."</h3>
									</div>

								</div>";
					}
				}

			?>

		</section>
		<?php include('inc/footer.php') ?>
	</div>
</body>

</html>