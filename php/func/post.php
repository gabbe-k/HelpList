<?php
	session_start();
  include("../../Inc/dbh.inc.php");

  $currentClass = $_POST['classId'];

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

			$stmt = $conn->prepare("INSERT INTO requests (id,reqText,classId) VALUES (?,?,?)");
			$stmt->bind_param('sss', $id, $reqText, $currentClass);
			$stmt->execute();
			exit;
		}

	}
?>
