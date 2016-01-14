<?php
	include('inc/db_connect.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	try{
		DB:: insert('users',array(
			'username'=> $username,
			'password'=> $hashed_password,
			'email' => $email,
			'name' => $name,
			'status' => 1
		));
	}catch(MeekroDBException $e){
		header('Location: /signup.php?erro=yes');
	}
	$_SESSION['username'] = $username; // $_SESSION is a cookie that is around as long as the browser is open.
	$_SESSION['uid'] = DB:: insertId(); // This will get the last auto-incremented id that was inserted into the database.
	$_SESSION['name'] = $name;
	header('Location: /?callback=registration');



?>