<?php
	session_start();
	include_once("DataBase.php");
	//sätter upp det som ska skrivas på sidan
	if(isset($_POST['post'])){
		$title = strip_tags($_POST['title']);
		$content = strip_tags($_POST['content']);

		$title = mysqli_real_escape_string($DataBase, $title);
		$content = mysqli_real_escape_string($DataBase, $content);

		$date = date('l jS \of F Y h:i:s A');

		$sql = "INSERT into posts (title, content, date) VALUES ('$title', '$content', '$date')";

		if($title == "" || $content == ""){
			echo "Please complete your post!";
			return;
		}
		mysqli_query($DataBase,$sql);

		header("Location: index.php");
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
