<script src="../js/signup.js"></script>

<div class="listview-wrap">

  <div class="listview-info-wrap">

    <div class="listview-info">
      <h1>Sign up</h1>
    </div>

  </div>

  <div class="request-wrap">

      <div class="listview-signup-wrap">

        <div class="listview-signup-form-wrap">
          <form action="Inc/signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="E-mail">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <div class="checkbox-wrap">
              <div class="checkbox-text">
                <p>Would you like to sign up as a teacher?</p>
              </div>
              <div class="checkbox">
                <input type="checkbox" name="isTeachr" value="1">
              </div>
            </div>
            <input type="submit" name="signup-submit" value="Submit">
          </form>
        </div>

      </div>

  </div>

</div>
