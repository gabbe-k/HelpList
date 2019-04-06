<?php
    session_start();
    include("../../Inc/dbh.inc.php");

    $idToken = $_SESSION['idToken'];

    $stmt = $conn->prepare("DELETE FROM `requests` WHERE `id` = (?)");
		$stmt->bind_param('s', $idToken);

    echo "DELETE FROM `requests` WHERE 'id' = $idToken";

    $stmt->execute();
 ?>
