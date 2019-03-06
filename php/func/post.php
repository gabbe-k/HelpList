<?php
	session_start();
  include("../../Inc/dbh.inc.php");
  include("../../Inc/dupesearch.inc.php");
	//sätter upp det som ska skrivas på sidan
	if(isset($_POST['reqText'])){
		$reqText = strip_tags($_POST['reqText']);
		$reqText = mysqli_real_escape_string($conn, $reqText);

		if($reqText == ""){
			echo "Please complete your post!";
			return;
		}
		else {
			$id = $_SESSION['userId'];
			$uid = $_SESSION['userUid'];
    	$postId = GetId($conn, "requests", "postId");

			$stmt = $conn->prepare("INSERT INTO requests (id, postId, reqText, idTeachr) VALUES ('$id', '$postId', (?), '100')");
			$stmt->bind_param('s', $reqText);
			$stmt->execute();
			exit;
		}

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
