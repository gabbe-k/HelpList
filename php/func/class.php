<?php
	session_start();
  include("../../Inc/dbh.inc.php");

	if(isset($_POST['className'])){
		$className = strip_tags($_POST['className']);
		$className = mysqli_real_escape_string($conn, $className);

		if($className == ""){
			echo "Invalid input";
			return;
		}
		else {
			//include("../../Inc.sendmail.inc.php");
			//alert("Your class code has been sent to your registerd email.");
			$uId = $_SESSION['uId'];
			$id = $_SESSION['idToken'];
			$stmt = $conn->prepare("INSERT INTO classrooms (teacherName,teacherId,className) VALUES (?,?,?)");
			$stmt->bind_param('sss', $uId, $id, $className);
			$stmt->execute();
			exit;
		}

	}
?>
