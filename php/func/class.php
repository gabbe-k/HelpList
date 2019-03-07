<?php
	session_start();
  include("../../Inc/dbh.inc.php");
  include("../../Inc/dupesearch.inc.php");

	if(isset($_POST['className'])){
		$className = strip_tags($_POST['className']);
		$className = mysqli_real_escape_string($conn, $className);

		if($className == ""){
			echo "Invalid input";
			return;
		}
		else {
			$id = $_SESSION['userId'];
			$stmt = $conn->prepare("INSERT INTO classrooms (teacherId,className) VALUES (?,?)");
			$stmt->bind_param('ss', $id, $className);
			$stmt->execute();
			exit;
		}

	}
?>