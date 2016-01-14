<?php
	include('inc/db_connect.php');
	$newPost = $_POST['newPost'];
	if($_SESSION['uid']){
		try{
			DB:: insert('posts',array(
				'uid' => $_SESSION['uid'],
				'content'=> $newPost
				));
			header('Location: /index.php');
		}catch(MeekroDBException $e){
			header('Location: /post.php?erro=yes');
		}
	}else{
		print "You screwed up,ERROR!";
	}
?>