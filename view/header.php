<div class="header-inner-wrap">
  <div class="header-title">
    <h2>
    <?php
      if (isset($_SESSION['userUid']) && isset($_GET['page']) && $_GET['page'] == "listview") {
        echo "<h1>" . $_GET['teacherName'] . "'s classroom</h1>";
      }
      else {
        echo "<h1>HelpList</h1>";
      }
     ?>
   </h2>
  </div>
  <div class="header-login-wrap">

    <?php
      if (!isset($_SESSION['userUid'])){
     ?>
     <div class="header-login-title">
       <h4>Login</h4>
     </div>

     <div class="header-login-form">
       <form class="" action="../Inc/login.inc.php" method="post">
         <input type="text" name="mailuid" placeholder="Username/Email">
         <input type="password" name="pwd" placeholder="Password">
         <input type="submit" name="login-submit" value="Submit">
       </form>
     </div>
     <div class="header-login-signup">
       <a href="../index.php?page=signup">No account?</a>
     </div>

    <?php
      }
      else {
        ?>
    <div class="header-logout-wrap">
      <div class="logout-wrap">
        <form id="logout-form" action="Inc/logout.inc.php" method="post">
          <input id="logout-button" type="submit" name="logout-submit" value="Logout">
        </form>
      </div>
    </div>
    <?php
      }
     ?>
  </div>
</div>
