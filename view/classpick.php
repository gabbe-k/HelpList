<script src="../js/classpick.js"></script>

<div class="listview-wrap">

  <div class="listview-info-wrap">

    <div class="listview-info">
      <h1>Pick a classroom</h1>
    </div>

  </div>
  <?php
    if (isset($_SESSION['userUid'])){
   ?>

  <div class="request-wrap">
    
  </div>

  <?php
    }
    else {
    ?>
    <div class="tmp-wrap">
      <div class="">
        <p>Log in to view the current classrooms</p>
      </div>
    </div>
    <?php
    }
   ?>

</div>
