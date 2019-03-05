<?php
	session_start();
  include("../../Inc/dbh.inc.php");
	//sätter upp det som ska skrivas på sidan
	if(isset($_POST['reqText'])){
		$reqText = strip_tags($_POST['reqText']);
		$reqText = mysqli_real_escape_string($conn, $reqText);

		$sql = "INSERT INTO requests (id, reqText, idTeachr) VALUES ('100', '$reqText', '100')";

		if($reqText == ""){
			echo "Please complete your post!";
			return;
		}
		mysqli_query($conn,$sql);

		header("Location: ../../index.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC" rel="stylesheet">
		<title>Blog - Post</title>
	</head>
	<body>
		<div class="LoginPage">
		<form action="post.php" method="post" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Title" autofocus size="48"><br/><br/>
			<textarea placeholder="Content" name="content" rows="20" cols="50"></textarea><br/>
			<input name="post" type="submit" value="Post">
		</form>
	</div>
</html>
