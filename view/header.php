<div class="header-inner-wrap">
  <div class="header-title">
    <h2>Torbjörn's tech support</h2>
  </div>
  <div class="header-login-wrap">

    <div class="header-login-title">
      <h4>Login</h4>
    </div>

    <?php
      if (!isset($_SESSION['userUid'])){
     ?>
     <div class="header-login-form">
       <form class="" action="../Inc/login.inc.php" method="post">
         <input type="text" name="mailuid" placeholder="Username/Email">
         <input type="password" name="pwd" placeholder="Password">
         <input type="submit" name="login-submit" value="Submit">
       </form>
     </div>
    <?php
      }
      else {
        ?>
    <form action="Inc/logout.inc.php" method="post">
    <button type="submit" name="logout-submit">Logout</button>
    </form>
    <?php
      }
     ?>

    <div class="header-login-signup">
      <a href="../index.php?page=signup">No account?</a>
    </div>

  </div>
</div>
