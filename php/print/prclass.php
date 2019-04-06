
<?php
  include("../../Inc/dbh.inc.php");
  session_start();

  $stmt = $conn->prepare("SELECT classrooms.className, classrooms.classId, users.uid
  FROM users, classrooms
  WHERE classrooms.teacherId = users.id
  ORDER BY classrooms.classId ASC");

  $stmt->execute();
  $res = $stmt->get_result();

  if ($res->num_rows == 0) {
    ?>
    <div class="tmp-request">
      <p>No classrooms added</p>
    </div>
    <?php
  }
  else {

    for ($i=0; $i < $res->num_rows; $i++) {

      $row = $res->fetch_assoc();
      ?>

      <div class="request">
        <div class="request-classroom-wrap">
          <div class="request-classroom-inner-wrap">
            <a href="../index.php?page=listview&class=<?php echo $row['classId']; ?>&teacherName=<?php echo $row['uid']; ?>"><?php echo $row['className']; ?></a>
          </div>
        </div>
      </div>
      <?php

    }

  }

 ?>

 <?php
  if (isset($_SESSION['isTeachr']) &&  $_SESSION['isTeachr'] == 1) {
  ?>
 <div class="request-formsection-outer-wrap">
     <div class="request-form-wrap">
       <form id="request-form" action="./php/func/class.php" method="post" autocomplete="off">
         <input type="text" name="className" placeholder="Input your class name here...">
         <input type="submit" name="" value="Submit">
       </form>
     </div>
     <div class="remove-tags-wrap">
     </div>
 </div>
<?php
  }
  else {
    ?>
         <p>Sign in as a teacher to add classes</p>
    <?php
  }
 ?>
