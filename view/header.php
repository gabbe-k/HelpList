<script src="../js/gauth.js"></script>
<div class="header-inner-wrap">
  <div class="header-title">
    <h2>
    <?php
      if (isset($_SESSION['idToken']) && isset($_GET['page']) && $_GET['page'] == "listview") {
        echo "<h1>" . $_GET['teacherName'] . "'s classroom</h1>";
      }
      else {
        echo "<h1>HelpList</h1>";
      }
     ?>
   </h2>
  </div>
  <div class="header-login-wrap">

    <!-- Display Google sign-in button -->
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    

    <div class="header-logout-wrap">
      <form id="signout-form">
      <button href="#" onclick="signOut();">Sign out</button>
      </form>
    </div>




    <!-- Show the user profile details -->
    <div class="userContent" style="display: none;"></div>
    
  </div>
</div>
