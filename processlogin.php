<?php
	include('inc/db_connect.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	// print_r($username);
	// print_r($password);

	try{
		// Get the hash from the DB
		$result = DB::query("SELECT * FROM users where username=%s",$username);
		// print_r($result);
		foreach($result as $row){
			$hash = $row['password'];
			// print_r('The hash is: '.$hash);
			$uid = $row['uid'];
			$passwordVerify = password_verify($password, $hash);
		}
	}catch(MeekroDBException $e){
		header('Location: /signup.php?erro=yes');
	}
	// print_r("The value of $passwordVerify is: ".$passwordVerify);
	// exit;
	if($passwordVerify){
		// Password is good
		$_SESSION['username'] = $username; // $_SESSION is a cookie that is around as long as the browser is open.
		$_SESSION['uid'] = $uid;
		header('Location: index.php');
		print "You are Logged In";
		exit;
	}else{
		$error=1;
		header('Location: login.php');
	}
	

?>