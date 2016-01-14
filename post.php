<?php
	include('inc/db_connect.php');

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<?php include('inc/head.php') ?>

	
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php include('inc/nav.php'); ?>
	 <div class="container">
        <form action="processpost.php" method="post">
            <div class="form-group">
                <label for="new-post">POST</label>
                <textarea class="form-control" rows="5" name="newPost" id="new-post"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post it!</button>
        </form>
    </div>
	<?php include('inc/footer.php'); ?>
</body>
</html>