<?php
require "header.php";
?>
<body>
  <div class="#">
      <?php
      //if seesion is active, show user theese options
          if (isset($_SESSION['userId'])){
           echo '</form>
           <form action="Includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
           </form>';
          }
          // if session is not active, show user theese options
          else{
            echo '<a href="signup.php" class="header-signup">Signup</a>
            <form action="Includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username..">
            <input type="password" name="pwd" placeholder="Password..">
            <button type="submit" name="login-submit">Login</button> </form>';
          }
        ?>
  </div>
<body>
<?php
  require "footer.php";
?>
