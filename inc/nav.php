<header>
	<div class="row heading">
		<div class="col-xs-3">
			<a href="index.php"><button class="btn">HOME</button></a>
		</div>
		<div class="col-xs-6 text-center">
			<h1>The Hippo Guardian</h1>
		</div>
		<div class="col-xs-3">
		<?php
			if($_SESSION['uid']){
				print "<p class='welcome'>Welcome, ".$_SESSION['name']."</p><a href='/logout.php'><button class='btn'>Log Out</button></a>";
		}else{
			print "<a href='/signup.php'><button class='btn'>Signup</button></a>
			<a href='/login.php'><button class='btn'>Log In</button></a>";
		}
		?>
		</div>
	</div>
</header>