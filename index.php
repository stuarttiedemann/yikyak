<?php 

	include('inc/db_connect.php');
	$_SESSION['page'] = 'active';

?>

<!DOCTYPE html>
<html>
<head>
	<?php include('inc/head.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>	
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div id="total-wrapper">
		<?php include('inc/nav.php') ?>
		<section class="main-callout">
			<h1>Help Save the Hippos!</h1>
		</section>
		<section id="post-holder">
			<h2 class="text-center">Recent Posts</h2>
			<?php
				if(isset($_SESSION['uid'])){
					print "<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>
 				 Show Your Hippo Love!
				 </button>";
				}
				else{
					print "<p>Please Log In to show your hippo love!</p>";
				}
			?>
			
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
			      </div>
			      <div class="modal-body">
			        <form action="processpost.php" method="post">
			            <div class="form-group">
			                <label for="new-post">POST</label>
			                <textarea class="form-control" rows="5" name="newPost" id="new-post"></textarea>
			            </div>
			            <button type="submit" class="btn btn-primary">Post it!</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			      </div>
			    </div>
			  </div>
			</div>

			<?php
				if(!isset($_SESSION['uid'])){
					$result = DB::query(
						"SELECT posts.content, posts.timestamp, users.username FROM posts
							LEFT JOIN users ON posts.uid = users.uid
							ORDER BY posts.timestamp desc limit 30");
				}else{
					$results_following = DB::query("SELECT distinct(user_id_to_follow) FROM following following
					WHERE following.user_id=%i" , $_SESSION['uid']);

					$last = count($results_following);

					if($last > 0){
						$i = 0;
						$following_array = '';
						foreach($results_following as $following){
							$i++;
							$following_array .= $following['user_id_to_follow'];
							if($i != $last){$following_array .= ",";}
						}

						$result = DB::query("SELECT posts.content, posts.timestamp, users.username, posts.id FROM posts 
							LEFT JOIN users on posts.uid=users.uid
							WHERE uid IN ($following_array)");					


					}else{
						$result = DB::query(
							"SELECT posts.content, posts.timestamp, users.username FROM posts
								LEFT JOIN users on posts.uid=users.uid
								ORDER BY posts.timestamp desc limit 30");
						//we now have all results, max of 30, orderd by time posted.

					}
				}

					foreach($result as $row){
						$content = $row['content'];
						date_default_timezone_set("UTC");
						$timestamp = $row['timestamp'];
						$timestamp = strtotime($timestamp);


			
						print "<div class='posts'><div class='content'><h3>".$content."</h3></div>
									<div class='votes'>
										<a href='#'><span class='glyphicon glyphicon-menu-up'></span></a>
										<a href='#'><h3>0</h3></a>
										<a href='#'><span class='glyphicon glyphicon-menu-down'></span></a>

									</div>
									<div class='time-stamp'>
										<h3>".date('m-d-Y, g:i a', $timestamp)."</h3>
									</div>

								</div>";
					}
				

			?>

		</section>
		<?php include('inc/footer.php') ?>
	</div>
</body>

</html>