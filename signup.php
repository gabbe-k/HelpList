<?php
  require "header.php";
?>
        <main>
          <div class="#">
            <section class="#">
              <h1>Signup</h1>
              <form action="Includes/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
              </form>
            </section>
          </div>
        </main>
<?php
  require "footer.php";
?>
