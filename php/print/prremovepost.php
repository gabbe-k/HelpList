<?php
  include("../../Inc/dbh.inc.php");

  $postIdArr = $_POST['postIdArr'];

  for ($i=0; $i < count($postIdArr); $i++) {

    $stmt = $conn->prepare("DELETE FROM `requests` WHERE postId = (?)");
    $stmt->bind_param('s', $postIdArr[$i]);
    $stmt->execute();

  }

 ?>
