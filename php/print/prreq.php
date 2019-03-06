<?php
  include("../../Inc/dbh.inc.php");

  $sql = "SELECT users.uid, requests.reqText, requests.postId FROM users, requests WHERE users.id = requests.id";
  $result = mysqli_query($conn, $sql);
  $resultLen = mysqli_num_rows($result);

  if ($resultLen == 0) {
    ?>
    <div class="tmp-request">
      <p>No requests added</p>
    </div>
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
      <form class="hidden-form" action="index.html" method="post">
        <input type="hidden" name="" value="<?php echo $row['postId'] ?>">
      </form>
      <?php

    }

  }

 ?>

 <script type="text/javascript">
   /*$(function () {

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

   }); */
 </script>

 <div class="request-formsection-outer-wrap">
     <div class="request-form-wrap">
       <form id="request-form" action="./php/func/post.php" method="post">
         <input type="text" name="reqText" placeholder="Input your help request here...">
         <input type="submit" name="" value="Submit">
       </form>
     </div>
     <div class="remove-tags-wrap">
       <button type="button" name="button" id="remove-tags-button">Remove</button>
     </div>
 </div>
