<?php 
	include('inc/db_connect.php');
	print "<h1>Home Page</h1>"; 
	$results = DB::query("SELECT * FROM users");
	foreach($results as $result){
		print_r($result);
	}

?>