<script src="../../js/prreq.js"></script>

<?php

  include("../../Inc/dbh.inc.php");
  session_start();

  $currentClass = $_POST['classId'];

  if (isset($_POST['classId'])) {

      $stmt = $conn->prepare("SELECT uId, id, reqText, postId
      FROM requests  WHERE classId = (?)
      ORDER BY postId ASC");

      $stmt->bind_param("s", $currentClass);
      $stmt->execute();
      $res = $stmt->get_result();

      $stmtTeach = $conn->prepare("SELECT teacherName
      FROM classrooms WHERE classId = (?)");
      $stmtTeach->bind_param("s", $currentClass);
      $stmtTeach->execute();
      $resTeach = $stmtTeach->get_result();
      $rowId = $resTeach->fetch_assoc();

      if ($res->num_rows == 0) {
        ?>
        <div class="tmp-request">
          <p>No requests added</p>
        </div>
        <?php
      }
      else {

        for ($i=0; $i < $res->num_rows; $i++) {

          $row = $res->fetch_assoc();
          ?>
          <div class="request">
          <?php
          if ($_SESSION['idToken'] == $row['id']) {
           ?>
            <div class="request-checkmark-userpost">
            </div>
           <?php
           }
           else if ($rowId['teacherName'] == $_SESSION['uId']) {
           ?>
             <div class="request-checkmark">
             </div>
           <?php
           }
           else {
            ?>
            <script type="text/javascript">
              expandText();
            </script>
            <?php
            }
            ?>
            <div class="request-username-wrap">
              <p><?php echo $row['uId'] ?></p>
            </div>
            <div class="request-text-wrap">
              <p><?php echo $row['reqText']; ?></p>
            </div>
          </div>
          <form class="hidden-form" action="index.html" method="post">
            <input type="hidden" name="" value="<?php echo $row['postId'] ?>">
          </form>
          <?php

        }

      }

  }
  else {
    echo "no";
  }
?>

 <div class="request-formsection-outer-wrap">
     <div class="request-form-wrap">
       <?php
        if (!isset($_SESSION['numPost']) || $_SESSION['numPost'] == 0) {
        ?>
       <form id="request-form" action="./php/func/post.php" method="post" autocomplete="off">
         <input type="text" name="reqText" placeholder="Input your help request here...">
         <input id="submit-button" type="submit" name="" value="Submit">
         <input type="hidden" name="numPost" value="1">
       </form>
       <?php
         }
         else {
           echo "<div class='tmpMessage'>";
           echo "<p>Remove your current request to post again</p>";
           echo "</div>";
         }
        ?>
     </div>
     <div class="remove-tags-wrap">
      <?php
       if (isset($_SESSION['isTeachr']) && $_SESSION['isTeachr'] == 1) {
         ?>
          <button type="button" name="button" id="remove-tags-button">Remove</button>
         <?php
       }
       ?>
     </div>
 </div>
