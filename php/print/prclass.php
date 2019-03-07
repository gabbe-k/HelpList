<?php
  include("../../Inc/dbh.inc.php");

  $sql = "SELECT classrooms.className, classrooms.classId
  FROM users, classrooms
  WHERE classrooms.teacherId = users.id";

  $result = mysqli_query($conn, $sql);
  $resultLen = mysqli_num_rows($result);

  if ($resultLen == 0) {
    ?>
    <div class="tmp-request">
      <p>No classrooms added</p>
    </div>
    <?php
  }
  else {

    for ($i=0; $i < $resultLen; $i++) {

      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="request">
        <div class="request-classroom-wrap">
          <a href="../index.php?page=listview&class=<?php echo $row['classId']; ?>"><?php echo $row['className']; ?></a>
        </div>
      </div>
      <?php

    }

  }

 ?>

 <script type="text/javascript">
   $(function () {

     $('#request-form').on('submit', function (e) {

       e.preventDefault();

       $.ajax({
         type: 'post',
         url: '../php/func/post.php',
         data: $('#request-form').serialize(),
         success: function () {
           console.log("form submitted");
           update();
         }
       });

     });

   });
 </script>

 <div class="request-formsection-outer-wrap">
     <div class="request-form-wrap">
       <form id="request-form" action="./php/func/post.php" method="post" autocomplete="off">
         <input type="text" name="reqText" placeholder="Input your help request here...">
         <input type="submit" name="" value="Submit">
       </form>
     </div>
     <div class="remove-tags-wrap">
       <button type="button" name="button" id="remove-tags-button">Remove</button>
     </div>
 </div>
