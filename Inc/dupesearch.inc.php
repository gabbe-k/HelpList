<?php
  function GetId($conn, $database, $item) {

    $dupe = true;

    while ($dupe) {

      $idVal = rand(0, 9999);

      /*$stmt = $conn->prepare("SELECT $item FROM $database WHERE $item = (?)");
      $stmt->bind_param('s', $idVal);
      $stmt->execute(); */

      $result = mysqli_stmt_get_result($stmt);

      if (!$result) {
        $dupe = false;
      }
      else {
        $dupe = true;
      }

    }

    return $idVal;

  }
 ?>
