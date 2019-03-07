<?php
  include("../../Inc/dbh.inc.php");

  $currentClass = $_POST['classId'];

  if (isset($_POST['classId'])) {


      $sql = "SELECT users.uid, requests.reqText, requests.postId FROM users, requests WHERE users.id = requests.id
      AND requests.classId = '$currentClass'";
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

  }
  else {
    echo "no";
  }
?>

 <script type="text/javascript">

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

   $(function () {

     var classId = getParameterByName("class");

     $('#request-form').on('submit', function (e) {

       e.preventDefault();

       $.post("../php/func/post.php",  {classId: classId, reqText: $('#request-form').children().val()}, function(data) {

          console.log(data);
          update();

       });

       /*$.ajax({
         type: 'post',
         url: '../php/func/post.php',
         data: $('#request-form').serialize(), classId,
         success: function () {
           console.log("form submitted");
           update();
         }
       }); */

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
