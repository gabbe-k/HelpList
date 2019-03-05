<div class="listview-wrap">

  <div class="listview-info-wrap">

    <div class="listview-info">
      <h1>Current requests</h1>
    </div>

  </div>

  <div class="request-wrap">

    <?php require_once('././php/print/prreq.php') ?>

    <div class="request-formsection-outer-wrap">
        <div class="request-form-wrap">
          <form id="request-form" action="./php/func/post.php" method="post">
            <input type="text" name="reqText" placeholder="Input your help request here...">
            <input type="submit" name="" value="Submit">
          </form>
        </div>
    </div>

  </div>

</div>
