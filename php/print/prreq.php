<?php
  include("././Inc/dbh.inc.php");

  $sql = "SELECT users.uid, requests.reqText FROM users, requests WHERE users.id = requests.id";
  $result = mysqli_query($conn, $sql);
  $resultLen = mysqli_num_rows($result);

  if ($resultLen == 0) {
    ?>
    <p>No requests added</p>
    <?php
  }
  else {

    for ($i=0; $i < $resultLen; $i++) {

      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="request">
        <div class="request-checkmark">
        </div>
        <div class="request-username-wrap">
          <p><?php echo $row['uid'] ?></p>
        </div>
        <div class="request-text-wrap">
          <p><?php echo $row['reqText']; ?></p>
        </div>
      </div>
      <?php

    }

  }

 ?>
