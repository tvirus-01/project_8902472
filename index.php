<?php
	session_start();
	if (isset($_SESSION['fb_access_token'])) {
		header("Location: module/members.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Project 890472</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col">
				<h1 class="text-primary">facebook access token genarator</h1>
				<a href="module/login.php" target="blank" class="btn btn-primary">Login with facebook</a>
			</div>
		</div>
	</div>
</body>
</html>